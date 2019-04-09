<?PHP
    session_start();
    $con = mysqli_connect("127.0.0.1", "root", "123456", "rush00");

        // to database

        if ($_POST['login'] !== '' && $_POST['passwd'] !== '' && $_POST['submit'] === 'OK') {
            $user_login = $_POST['login'];
            $user_pwd = hash('whirlpool', $_POST["passwd"]);
         
            $query_check = "SELECT customer_login FROM customers WHERE customer_login='$user_login'";
            $run = mysqli_query($con, $query_check);
            $check = mysqli_num_rows($run);
         
            if ($check) {
              $_SESSION["user"] = $user_login;
            } else 
            {
                $query = "INSERT INTO customers
                        SET customer_login = '$user_login', 
                        customer_passwd = '$user_pwd'";
                 $run_pro = mysqli_query($con, $query);
                if (!$run_pro) {
                    die("ERROR: ". mysqli_error($con));
                }
            }
        }

        // to session cookie

    $account = "private/passwd";
    if ($_POST['login'] !== '' && $_POST['passwd'] !== '' && $_POST['submit'] === 'OK')
    {
        if (strlen($_POST['passwd']) < 5) {
            header("Location: create.html");
            exit;
        } 
        $user = [
            "login" => $_POST['login'],
            "passwd" => hash("whirlpool", $_POST['passwd'])
        ];
        if (file_exists($account))
        {
            $data = unserialize(file_get_contents($account));
            foreach($data as $instance)
            {
                if($user['login'] === $instance['login'])
                {
                    header("Location: create.html");
                    exit; 
                }
            }
            $data[] = $user;
        }  else {
            if (!file_exists('private'))
                mkdir('private', 0755);
            $data[] = $user;
        }
        file_put_contents($account, serialize($data));
        header("Location: login.html");
    }
    else
    {   
        header("Location: create.html");
        return; 
    }

?>