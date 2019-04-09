function createExistingTodo()
{
    $('#ft_list').html(decodeURIComponent(getCookie('cookie_todo_jquery')));
}

$('#button').click(function() {
    var input = prompt("Please enter your new To Do element below");
    if (input === null || input === "" || !input.trim())
        return;
    $('#ft_list').prepend(`<div class="list-elem" onclick=deleteItem(this)>${input}</div>`);
    var html_content = $("#ft_list").html();
    setCookie('cookie_todo_jquery', encodeURIComponent(html_content));
});


function deleteItem(item) 
{
    if (window.confirm(`Are you sure you want to delete ${item.textContent} ?`))
    {
		$(item).remove();
        var html_content = $("#ft_list").html();
        setCookie('cookie_todo_jquery', encodeURIComponent(html_content));
    }
    else
        return;
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

function setCookie(cname, cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (30*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=./";
}