let inactivityTime = function ()
{
    let time;
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    document.onclick = resetTimer;

    function logout()
    {
        alert("You are now logged out.")
        window.location.assign("login.php");// redirects if user is not logged in
    }

    function resetTimer()
    {
        clearTimeout(time);
        time = setTimeout(logout, 1000)
    }
};