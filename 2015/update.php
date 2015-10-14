<?php
include('includes/db.php');
include('includes/functions.php');
if (isset($_POST['logout'])) {
    session_destroy();
    goRedirect('login.php');
}
if ($_SESSION['status'] == 'login') {
$id = $_GET['id'];
$ContactItem = mysqli_query($link, "SELECT * FROM `contacts` WHERE id = '$id' ");
$row = mysqli_fetch_array($ContactItem);
/*check best phone */
$best = $row['best_phone'];
$home = "home";
$work = "work";
$cell = "cell";
switch ($best) {
    case $home:
        $home = "checked";
        break;
    case $work:
        $work = "checked";
        break;
    case $cell:
        $cell = "checked";
        break;
}
/*check best phone */
if (isset($_REQUEST['go'])) {
    $id = $_REQUEST['hid_id'];
    if ($ContactItemUpd = mysqli_query($link, "UPDATE `contacts` SET last='$_REQUEST[last]',  first='$_REQUEST[first]', email='$_REQUEST[email]',
home='$_REQUEST[home]', work='$_REQUEST[work]', cell='$_REQUEST[cell]', address1='$_REQUEST[address1]', address2='$_REQUEST[address2]',
city='$_REQUEST[city]', state='$_REQUEST[state]', zip = '$_REQUEST[zip]', country='$_REQUEST[country]', birthday='$_REQUEST[birthday]',
best_phone='$_REQUEST[best]' WHERE id='$id' ")) {
        goRedirect('index.php?message=Ithem updated successfully');
    }
    else {
        goRedirect('index.php?message=Some problems with query:( ');
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body id="index">
<div align="center" class="main">
    <h3>Contact details</h3>

    <form action="update.php" name="update">
        <table border="0">
            <tr>
                <td>Last</td>
                <td></td>
                <td><input name="last" value="<?php echo $row['last']; ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>First</td>
                <td></td>
                <td><input name="first" value="<?php echo $row['first']; ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td></td>
                <td><input name="email" value="<?php echo $row['email']; ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Home</td>
                <td><input name="best" type="radio" <?php echo $home ?>  value="home"></td>
                <td><input name="home" value="<?php echo $row['home']; ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Work</td>
                <td><input name="best" type="radio" <?php echo $work ?>  value="work"></td>
                <td><input name="work" value="<?php echo $row['work']; ?>" type="text" size="150px" maxlength="30"/></td>

            </tr>
            <tr>
                <td>Cell</td>
                <td><input name="best" type="radio" <?php echo $cell ?> value="cell"></td>
                <td><input name="cell" value="<?php echo $row['cell']; ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Address 1</td>
                <td></td>
                <td><input name="address1" value="<?php echo $row['address1']; ?>" type="text" size="150px"
                           maxlength="30"/></td>
            </tr>
            <tr>
                <td>Address 2</td>
                <td></td>
                <td><input name="address2" value="<?php echo $row['address2']; ?>" type="text" size="150px"
                           maxlength="30"/></td>
            </tr>
            <tr>
                <td>City</td>
                <td></td>
                <td><input name="city" value="<?php echo $row['city']; ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>State</td>
                <td></td>
                <td><input name="state" value="<?php echo $row['state']; ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Zip</td>
                <td></td>
                <td><input name="zip" value="<?php echo $row['zip']; ?>" type="text" size="150px" maxlength="30"/></td>
            </tr>
            <tr>
                <td>Country</td>
                <td></td>
                <td><input name="country" value="<?php echo $row['country']; ?>" type="text" size="150px"
                           maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td></td>
                <td><input name="birthday" value="<?php echo $row['birthday']; ?>" type="text" size="150px"
                           maxlength="30"/></td>
            </tr>
            <input name="hid_id" type="hidden" value="<?php echo $id ?> "/>
            <tr>
                <td>
                    <a class="goto" href="index.php">GO TO MANAGMENT MAIN PAGE</a>
                </td>
                <td></td>
                <td align="right">
                    <input name="go" type="submit" value="Done"/>
                </td>
            </tr>
        </table>
    </form>
    <?php
    }
    else {
        goRedirect('login.php');
    }
    ?>
</div>
</body>
</html>