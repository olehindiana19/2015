<?php
include('includes/db.php');
include('includes/functions.php');
if (isset($_REQUEST['go'])) {
if(!(fieldEmpty($_REQUEST['login'])) and !(fieldEmpty($_REQUEST['pass']) )) {
    if (getUser ($link, $_REQUEST['login'], $_REQUEST['pass'] )) {
        $_SESSION['status'] = 'login';
        goRedirect('index.php');
    }
    else {
        echo "Wrong login or password";
    }
}
    else {
        echo "Empty fields";
    }
}

?>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <title>Contact manager Login</title>
    </head>
    <body>
    <form action="login.php" >
        <table class="login">
            <tr valign=center>
                <td align="center">
                    <table width="300" class="logintabl" border="0">
                        <tr>
                            <td align="right">Login</td>
                            <td><input name="login" value="<?php echo (isset($_REQUEST['login'])) ? $_REQUEST['login']: "Enter your login"  ?>"  type="text" size="30" maxlength="50"/></td>
                        </tr>
                        <tr>
                            <td align="right">Password</td>
                            <td><input name="pass" type="password" size="30" maxlength="50"/></td>
                        </tr>
                        <tr>
                            <td><a href="registration.php">Register</a></td>
                            <td align="right"><input name="go" type="submit" value="SIGN IN"/></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    </body>
    </html>
