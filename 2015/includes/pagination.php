<?php
$select = mysqli_query($link, "SELECT * FROM `contacts` ");
$itemCount = ITEM_COUNT;
$page = 0;
$field = "id";
$order = "ASC";
$lastArrow="";
$firstArrow="";
$rowCount = mysqli_num_rows($select);
$pagesCount = ceil($rowCount / $itemCount);
if (isset($_GET['page'])) {
    $page = $_GET['page'] * $itemCount - $itemCount;
}
if (isset($_GET['pageOrder'])) {
    $page = $_GET['pageOrder'];
}
if (isset($_GET['field'])) {
    $field = $_GET['field'];
    $order = $_GET['order'];
}

for ($i = 1; $i <= $pagesCount; $i++) {
    ?>
    <a href=<?php echo $fileName ?>.php?page=<?php echo $i ?>&order=<?php echo $order ?>&field=<?php echo $field ?> ><?php echo $i ?>  </a>
<?php
}
$ContactItem = getOrderPage($link, $field, $order, $page, $itemCount);
if ($order=="ASC" and $field=='last') {
    $order="DESC";
    $lastArrow='&darr;';

}
elseif ($order=="DESC" and $field=='last') {
    $order="ASC";
    $lastArrow='&UpArrow;';
}

elseif ($order=="ASC" and $field=='first') {
    $order="DESC";
    $firstArrow='&darr;';
}

elseif ($order=="DESC" and $field=='first') {
    $order="ASC";
    $firstArrow='&UpArrow;';
}


