<?php

function fieldEmpty($field)
{
    return (empty($field)) ? TRUE : FALSE;
}


function getUser($link, $login, $pass)
{
    $login = htmlspecialchars(trim($login));
    $pass = htmlspecialchars(trim($pass));
    $pass=md5($pass);
    $user = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='$login'
and `pass` = '$pass' and `role` = '1' ");
    if (mysqli_num_rows($user) > 0) {
        return TRUE;

    } else {
        return FALSE;
    }
}

function formElements()
{
    $form = array('last', 'first', 'email', 'home', 'work', 'cell', 'address1',
        'address2', 'city', 'state', 'zip', 'country', 'birthday');
    return $form;
}

function getFormErrors()
{
   if (!checkMail( $_REQUEST['email'])){
        $formErrors="email";
    }

    if (!checkPhone( $_REQUEST['cell'])){
        $formErrors="cell";
    }

    if (!checkName( $_REQUEST['last'],  $_REQUEST['first'])){
        $formErrors="last or first";
    }

   return $formErrors;
}

function checkMail($mail)
{
    if (fieldEmpty($mail)) {
        return FALSE;
    } else {
        $template = "/^\w+([\.\w]+)*\w@\w((\.\w)*\w+)*\.\w{2,3}$/";
        if (!(preg_match($template, $mail))) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

}
function checkPhone($cell)
{
    if (fieldEmpty($cell)) {
        return FALSE;
    } else {
        if (!is_numeric($cell)) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
}

function checkName($name, $last)
{
    if (fieldEmpty($name) or fieldEmpty($last) ) {
        return FALSE;
    }
    else {
        if (is_numeric($name) or is_numeric($last)) {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
}

function getOrderPage ($link, $field, $order, $page, $itemCount) {
    $ContactItem = mysqli_query($link, "SELECT * FROM `contacts` ORDER BY $field $order LIMIT $page, $itemCount ");
    return $ContactItem;
}

function goRedirect ($file) {
header("Location: $file ");
exit;
}