function createListElem() {
    var input = prompt("Please enter your new To Do element below");
    var main_div = document.getElementById("ft_list");
    var array = new Array();

    if (input === null || input === "" || !input.trim())
        return;
    var text_node = document.createTextNode(input);
    var new_element = document.createElement('div');
    new_element.appendChild(text_node);
    new_element.setAttribute("class", "list-elem");
    if (main_div.childElementCount === 0)
    {
        main_div.appendChild(new_element);
        var todo_list = document.getElementsByClassName('list-elem');
        for (var i = 0; i < todo_list.length; i++)
            array.push(todo_list[i].innerText);
        var cookie_list = JSON.stringify(array);
        setCookie("cookie_todo", cookie_list);
    }
    else
    {
        main_div.insertBefore(new_element, main_div.firstChild);
        var todo_list = document.getElementsByClassName('list-elem');;
        for (var i = 0; i < todo_list.length; i++)
            array.push(todo_list[i].innerText);
        var cookie_list = JSON.stringify(array);
        setCookie("cookie_todo", cookie_list);
    }
    deleteItem();
}

function createTodo() {
    if (getCookie("cookie_todo"))
    {
        cookie = JSON.parse(getCookie("cookie_todo"));
        var main_div = document.getElementById("ft_list");
        
        for (var i = 0; i < cookie.length; i++) {
            var text_node = document.createTextNode(cookie[i]);
            var new_element = document.createElement('div');
            new_element.appendChild(text_node);
            new_element.setAttribute("class", "list-elem");
            main_div.appendChild(new_element);
        }
    }
    deleteItem();
}

function deleteItem() {
    var i = 0;
    var array = new Array();

    var listItems = document.getElementsByClassName("list-elem");
    while (i < listItems.length) {
        listItems[i].onclick = function() {
            if (window.confirm(`Are you sure you want to delete ${this.textContent} ?`))
            {
                this.parentNode.removeChild(this);
                array = [];
                for (var i = 0; i < listItems.length; i++)
                    array.push(listItems[i].innerText);
                var cookie_list = JSON.stringify(array);
                setCookie("cookie_todo", cookie_list);
            }
            else
                return;
            }
            i++;
        }
}

// BEWARE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! ---------- Cookie needs to be tested with a server, otherwise it won't set the cookie - NEED MAMP OR USE FIREFOX

function setCookie(cname, cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (30*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=./";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') 
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}