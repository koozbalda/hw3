<?php
session_start();
//session_destroy();
//exit();
/**
 * Created by PhpStorm.
 * User: Kooz
 * Date: 01.02.2018
 * Time: 18:31
 */




/**
 * @param $name
 * check input name on our rules
 * @return bool
 */
function forName($name){
    $name=trim($name);
    $arr=explode(' ',$name);
    if(count($arr)>1){
        $_SESSION['error']['ename'] = "Поле Имя введено неверно. Допустимо только одно слово";
        return false;
    }
    if(strlen($name)<3||strlen($name)>15){
        $_SESSION['error']['ename'] = "Поле Имя введено неверно, длинна должна быть больше 3х символов и менее 15";
        return false;
    }
        return true;
}


function forEmail($email){
    $email=trim($email);
    $arr=explode(' ',$email);
   if( strlen($email)<6||(count($arr)>1)){
       $_SESSION['error']['email'] = "Поле Email введено неверно";
       return false;
   }
    $arr=explode('@',$email);
    if (count($arr)>1){
        return true;

    }
    return false;

}

function forDate($d,$m,$y){
    if(!checkdate($m,$d,$y)){
        $_SESSION['error']['date'] = "Дата рождения введена неренальная";
        return false;
    }
    return true;
}





//part 1 check name
if (!empty($_POST['name']) && forName($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
    unset($_SESSION['error']['ename']);
} else {
    unset($_SESSION['ename']);
}



//part 1 check email
if (!empty($_POST['email']) && forEmail($_POST['email'])) {
    $_SESSION['email'] = $_POST['email'];
    unset($_SESSION['error']['email']);
} else {
    unset($_SESSION['email']);
}

//part 1 check email
if (!empty($_POST['year']) && !empty($_POST['day']) && !empty($_POST['month']) && forDate($_POST['day'],$_POST['month'],$_POST['year'])) {
    $_SESSION['day'] = $_POST['day'];
    $_SESSION['month'] = $_POST['month'];
    $_SESSION['year'] = $_POST['year'];
    unset($_SESSION['error']['date']);
} else {
    unset($_SESSION['email']);
}


//if (!empty($_POST['password']) && $_POST['password'] == $password) {
//    $_SESSION['password'] = $password;
//    unset($_SESSION['epassword']);
//} else {
//    $_SESSION['epassword'] = "Поле password введено неверно";
//    unset($_SESSION['password']);
//}


//var_dump($_SESSION);
header('Location: /index.php');
exit();
?>

<br>
<br>
<br>
<br>
<a href="index.php">back</a>>

















