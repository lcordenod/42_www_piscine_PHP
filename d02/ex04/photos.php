#!/usr/bin/php
<?PHP

function    ft_get_html($url)
{
    if (@($content = file_get_contents($url)) == false)
        return (-1);
    else
        return ($content);
}

function    ft_get_imgs_url($html, $url)
{
    $i = 0;
    preg_match_all('/<img[^>]+src="([^\s>]+)"/', $html, $matches);
    foreach ($matches[1] as $res)
    {
        $pos = strpos($res,"/"); 
        $img = $res;
        if (preg_match("/^.*\.(svg|jpg|jpeg|gif|gmp|ico|png|tiff)$/i", $img))
        {
            if($pos == 0)
                $url_tab[$i] = "$url" . $img;
            else
                $url_tab[$i] = $img;
            $i++;
        }
    }
    return ($url_tab);
}

function    ft_create_folder($address)
{
    preg_match_all("|^(http(s?):\/\/)(.*)|", $address, $matches);
    $dir = implode($matches[0]);
    $short_dir = strstr($dir, "www");
    if (preg_match("/\//", $short_dir))
        $short_dir = strstr($short_dir, "/", 1);
    if (@mkdir($short_dir) === false)
        return (-1);
    else
        return ($short_dir);
}

function    ft_rm_folder($address)
{
    preg_match_all("|^(http(s?):\/\/)(.*)|", $address, $matches);
    $dir = implode($matches[0]);
    $short_dir = strstr($dir, "www");
    if (preg_match("/\//", $short_dir))
        $short_dir = strstr($short_dir, "/", 1);
    $files = glob($short_dir."/*");
    foreach ($files as $file)
    {
        if (is_file($file))
        unlink($file);
    }
    rmdir($short_dir);
}

function    ft_dl_img($dir, $tab)
{
    foreach ($tab as $url)
    {
        $filename = basename("$url");
        $file = fopen($dir."/".$filename, 'w+');
        $c = curl_init(str_replace(" ", "%20", $url));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($c, CURLOPT_TIMEOUT, 50);
        curl_setopt($c, CURLOPT_FILE, $file); 
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($c);
        curl_close($c);
        fclose($file);
    }
}

if ($argc == 2)
{
    $html = ft_get_html($argv[1]);
    $tab = ft_get_imgs_url($html, $argv[1]);
    if ($tab == 0)
        echo "No accessible image found on url given, try another url\n";
    else
    {
        if (($dir = ft_create_folder($argv[1])) == -1)
        {
            echo "Folder already exists and is now up-to-date\n";
            ft_rm_folder($argv[1]);
            $dir = ft_create_folder($argv[1]);
            ft_dl_img($dir, $tab);
        }
        else
        {
            ft_dl_img($dir, $tab);
        }
    }
}
else
    echo "Please enter a single valid url\n";

?>