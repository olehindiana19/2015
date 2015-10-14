<?php
include('includes/db.php');
include('includes/functions.php');
if (isset($_POST['logout'])) {
    session_destroy();
    goRedirect('login.php');
}
if ($_SESSION['status'] == 'login') {
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset = windows-1251"/>
    <title>ADD MANAGMENT MAIN PAGE</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body id="index">
<div class="main">
    <?php
    if (isset($_GET['message'])) {
        echo $_GET['message'];
    }
    ?>
    <h3>ADD MANAGMENT MAIN PAGE</h3>
    <?php
    $fileName="index";
    include ('includes/pagination.php');
    ?>

    <p><a class="add" href="registration.php">ADD</a></p>
    <table width="100%" id="mytable" class="tabl" border="0">
        <tr>
            <td><a href=index.php?field=last&order=<?php echo $order ?>&pageOrder=<?php echo $page ?> > <b>Last</b> </a> <?php echo $lastArrow ?>  </td>
            <td><a href=index.php?field=first&order=<?php echo $order ?>&pageOrder=<?php echo $page ?> ><b>First</b></a> <?php echo $firstArrow ?> </td>
            <td>Email</td>
            <td>Best Phone</td>
            <td>Edit/view</td>
            <td>Delete</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($ContactItem)) {
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
                <td> <?php echo $row['last'] ?> </td>
                <td> <?php echo $row['first'] ?> </td>
                <td> <?php echo $row['email'] ?></td>
                <td> <?php echo $best ?></td>
                <td><a href=update.php?id=<?php echo $row['id'] ?> > edit/view </a></td>
                <td><a href=delete.php?id=<?php echo $row['id'] ?> > delete </a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <p><a class="add" href="registration.php">ADD</a></p>

    <p><a class="goto" href="selection.php">GO TO SELECTION MAIN PAGE</a></p>

    <form action="index.php" method="post">
        <input name="logout" type="submit" value="Log out">
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