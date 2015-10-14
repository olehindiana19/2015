<?php
include('includes/db.php');
include('includes/functions.php');
if (!isset($_REQUEST['last'])) {
    $arr = formElements();
    foreach ($arr as $value) {
        $_REQUEST["$value"]="";
    }
}
if (isset( $_REQUEST['go'])) {
    $errors=getFormErrors();
    if (empty($errors)) {
        if ($ContactItemIns = mysqli_query($link, "INSERT INTO `contacts`
	(last,	first,	email,	home, 	work,	cell,	address1, 	address2,	city,	state, 	zip , 	country,
	birthday, best_phone)	values ('$_REQUEST[last]',   '$_REQUEST[first]',  '$_REQUEST[email]', '$_REQUEST[home]', '$_REQUEST[work]',
	'$_REQUEST[cell]', '$_REQUEST[address1]', '$_REQUEST[address2]', '$_REQUEST[city]', '$_REQUEST[state]', '$_REQUEST[zip]', '$_REQUEST[country]',
	'$_REQUEST[birthday]', '$_REQUEST[best]') ")
        ) {
            goRedirect('index.php?message=Ithem added successfully');
        } else {
            goRedirect('index.php?message=Some problems with query:( ');
        }
    } else {
        echo "Check your <b>" . $errors . "</b>";
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body id="index">
<div class="main" align="center">
    <h3> Registration </h3>

    <form action="registration.php"  name="update">
        <table border="0">
            <tr>
                <td>Last*</td>
                <td></td>
                <td><input name="last" value="<?php echo $_REQUEST["last"] ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>First*</td>
                <td></td>
                <td><input name="first" value="<?php echo $_REQUEST["first"] ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Email*</td>
                <td></td>
                <td><input name="email" value="<?php echo $_REQUEST["email"] ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Home</td>
                <td><input name="best" type="radio" value="home"></td>
                <td><input name="home" value="<?php echo $_REQUEST["home"] ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Work</td>
                <td><input name="best" type="radio" value="work"></td>
                <td><input name="work" value="<?php echo $_REQUEST["work"] ?>" type="text" size="150px" maxlength="30"/></td>
            </tr>
            <tr>
                <td>Cell*</td>
                <td><input name="best" type="radio" value="cell" checked></td>
                <td><input name="cell" value="<?php echo $_REQUEST["cell"] ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Address 1</td>
                <td></td>
                <td><input name="address1" value="<?php echo $_REQUEST["address1"] ?>" type="text" size="150px"
                           maxlength="30"/></td>
            </tr>
            <tr>
                <td>Address 2</td>
                <td></td>
                <td><input name="address2" value="<?php echo $_REQUEST["address2"] ?>" type="text" size="150px"
                           maxlength="30"/></td>
            </tr>
            <tr>
                <td>City</td>
                <td></td>
                <td><input name="city" value="<?php echo $_REQUEST["city"] ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>State</td>
                <td></td>
                <td><input name="state" value="<?php echo $_REQUEST["state"] ?>" type="text" size="150px" maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Zip</td>
                <td></td>
                <td><input name="zip" value="<?php echo $_REQUEST["zip"] ?>" type="text" size="150px" maxlength="30"/></td>
            </tr>
            <tr>
                <td>Country</td>
                <td></td>
                <td><input name="country" value="<?php echo $_REQUEST["country"] ?>" type="text" size="150px"
                           maxlength="30"/>
                </td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td></td>
                <td><input name="birthday" value="<?php echo $_REQUEST["birthday"] ?>" type="text" size="150px"
                           maxlength="30"/></td>
            </tr>
            <tr>
                <td colspan="2">
                <td align="right">
                    <input name="go" type="submit" value="Done"/>
                </td>
            </tr>
        </table>
    </form>
</div>


</body>
</html>