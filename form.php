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
function forName($name)
{
    $name = trim($name);
    $arr = explode(' ', $name);
    if (count($arr) > 1) {
        $_SESSION['error']['name'] = "Поле Имя введено неверно. Допустимо только одно слово";
        return false;
    }
    if (strlen($name) < 4 || strlen($name) > 15) {
        $_SESSION['error']['name'] = "Поле Имя введено неверно, длинна должна быть больше 3х символов и менее 15";
        return false;
    }
    return true;
}


function forEmail($email)
{
    $email = trim($email);
    $arr = explode(' ', $email);
    if (strlen($email) < 6 || (count($arr) > 1)) {
        $_SESSION['error']['email'] = "Поле Email введено неверно";
        return false;
    }
    $arr = explode('@', $email);
    if (count($arr) != 2) {
        $_SESSION['error']['email'] = "Не забывай символ @";
        return false;

    }
    return true;

}

function forDate($d, $m, $y)
{
//
//    if(!checkdate($m,$d,$y)){
//        $_SESSION['error']['date'] = "Дата рождения введена нереальная";
//        return false;
//    }
    /*
     * больше нравится первый вариант
     * так как там автоматически учитывается высокосный год и нет необходимости строить громоздкие условия
     *
     */


    if (
        ($m == 2 && $d >= 29 + date('L', mktime(0, 0, 0, 1, 1, $y)))
        ||
        ($d > (30 + $m % 2))
    ) {
        $_SESSION['error']['date'] = "В этом месяце нет такого дня!!!";
        return false;
    }

    return true;
}

function antimat($mess)
{
    $mess = mb_strtolower($mess, 'utf-8');
    $cenzor = array('осел', 'козел', 'очкарик', 'ботан');
    $uncenzor = array('ослик', 'козлик', 'ховрашок', 'банан');
    return str_replace($cenzor, $uncenzor, $mess);

}


function translit($mess)
{
    $mess = mb_strtolower($mess, 'utf-8');

    $rus = array(
        'а',
        'б',
        'в',
        'г',
        'д',
        'е',
        'ё',
        'ж',
        'з',
        'и',
        'й',
        'к',
        'л',
        'м',
        'н',
        'о',
        'п',
        'р',
        'с',
        'т',
        'у',
        'ф',
        'х',
        'ц',
        'ч',
        'ш',
        'щ',
        'ъ',
        'ы',
        'ь',
        'э',
        'ю',
        'я',
    );
    $eng = array(
        'a',
        'b',
        'v',
        'g',
        'd',
        'ye',
        'yo',
        'zh',
        'z',
        'i',
        'y',
        'k',
        'l',
        'm',
        'n',
        'o',
        'p',
        'r',
        's',
        't',
        'u',
        'f',
        'h',
        'ts',
        'ch',
        'sh',
        'sch',
        '\'',
        'yi',
        '',
        'e',
        'yu',
        'ya',
    );
    return str_replace($rus, $eng, $mess);

}

function forMessage($message)
{

    $message = antimat($message);
    $message = translit($message);
    return $message;

}


//Function from send correct data or error message in session
function session_prepared($index, $bool = true)
{
    if (!empty($_POST[$index]) && $bool) {
        $_SESSION[$index] = $_POST[$index];
        unset($_SESSION['error'][$index]);
    } else {
        if (empty($_SESSION['error'][$index])) {
            $_SESSION['error'][$index] = "Поле обязательно для заполнения";
        }
        unset($_SESSION[$index]);
    }
}


//part 1 check name
session_prepared('name', forName($_POST['name']));


//part 1 check email
session_prepared('email', forEmail($_POST['email']));

//part 1 check date
if (!empty($_POST['year']) && !empty($_POST['day']) && !empty($_POST['month']) && forDate($_POST['day'], $_POST['month'], $_POST['year'])) {
    $_SESSION['day'] = $_POST['day'];
    $_SESSION['month'] = $_POST['month'];
    $_SESSION['year'] = $_POST['year'];
    unset($_SESSION['error']['date']);
} else {
    unset($_SESSION['day']);
}


//part 1 check gender
session_prepared('gender');

//part 1 check message

if (!empty($_POST['message'])) {
    $_SESSION['message'] = forMessage($_POST['message']);
    unset($_SESSION['error']['message']);
} else {
    $_SESSION['error']['message'] = "Поле обязательно для заполнения";
    unset($_SESSION['message']);
}


if (count($_SESSION['error']) == 0) {
    header('Location: /index2.php');
    exit();
}

header('Location: /index.php');
exit();
?>


















