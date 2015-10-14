<?php
include('includes/db.php');
include('includes/functions.php');
if (isset($_POST['logout'])) {
    session_destroy();
    goRedirect('login');
}
if ($_SESSION['status'] == 'login') {
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset = windows-1251"/>
    <title>SELECTION MAIN PAGE</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body id="index">
<?php
$ContactItem = mysqli_query($link, "SELECT * FROM `contacts` ");
$count = mysqli_query($link, "SELECT MAX(id) FROM `contacts` ");
$count = mysqli_fetch_array($count);
$count = $count[0];
$fileName = "selection";
include('includes/pagination.php');
?>
<div class="main">
    <form action="mail.php" method="post">
        <p><strong> SELECTION MAIN PAGE</strong></p>

        <p><input type="submit" value="SEND"></p>
        <table width="100%" id="mytable" class="tabl" border="0">
            <tr>
                <td align="left">
                    <input type="checkbox" name='sel_all'
                           onChange='for (i in this.form.elements) this.form.elements[i].checked = this.checked'/>All
                </td>
                <td><a href=selection.php?field=last&order=<?php echo $order ?>&pageOrder=<?php echo $page ?> > <b>Last</b> </a> <?php echo $lastArrow ?>  </td>
                <td><a href=selection.php?field=first&order=<?php echo $order ?>&pageOrder=<?php echo $page ?> ><b>First</b></a> <?php echo $firstArrow ?> </td>
                <td>Email</td>
                <td>Best Phone</td>
            </tr>
            <?php
            while (($row = mysqli_fetch_array($ContactItem))) {
                switch ($row['best_phone']) {
                    case "home":
                        $best = $row['home'];
                        break;
                    case "work":
                        $best = $row['work'];
                        break;
                    case "cell":
                        $best = $row['cell'];
                        break;
                }
                ?>
                <tr>
                    <td align=left><input id="item" type="checkbox"
                                          name=<?php echo $row['id'] ?> value= <?php echo $row['id'] ?> /></td>
                    <td>  <?php echo $row['last'] ?> </td>
                    <td> <?php echo $row['first'] ?> </td>
                    <td> <?php echo $row['email'] ?> </td>
                    <td> <?php echo $best ?> </td>
                </tr>
                <input name="hid_id" type="hidden" value=<?php echo $count ?>/>
            <?php

            }
            ?>
        </table>
        <p><input type="submit" value="SEND"></p>
    </form>
    <p><a class="goto" href="index.php">GO TO MANAGMENT MAIN PAGE</a></p>

    <form action="selection.php" method="post">
        <input name="logout" type="submit" value="logout">
    </form>
</div>
<?php
}
else {
    goRedirect('login.php');
}
?>
</body>
</html>





