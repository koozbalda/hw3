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


//echo '<h2 align="center" style="color: #ff245c">ДЗ№3</h2><br/><br/>';

//var_dump($_SESSION);
//var_dump($_POST);
?>
<head>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<style>
    #my_td {
        text-align: right;
        padding-right: 2%;
    }

    #my2 {
        /*width: 66%;*/
    }


</style>
    <div align="center" id="my_div">
        <table class="table-bordered">
            <tbody>
            <tr>
                <td id="my_td">
                    <label>Ваше имя</label>
                </td>
                <td>
                    <?= $_SESSION['name'] ?>
                </td>
            </tr>
            <tr>
                <td id="my_td">
                    <label>Ваше мыло</label>
                </td>
                <td>

                    <?= !empty($_SESSION['email']) ? $_SESSION['email'] : ''; ?>
                </td>
            </tr>
            <tr>
                <td id="my_td">
                    <label class="text-right" "> Вам</label>
                </td>
                <td id="111" class="form-inline">
                    <?php
                    $born = strtotime("{$_SESSION['day']}-{$_SESSION['month']}-{$_SESSION['year']}");
                    $age = date('Y') - date('Y', $born);
                    if (date('md', $born) > date('md')) {
                        $age--;
                    }
                    echo $age . ' полных лет';
                    ?>
                </td>
            </tr>
            <tr>
                <td id="my_td">
                    <label class="text-right">Пол</label>
                </td>
                <td>
                    <?= $_SESSION['gender'] == 1 ? 'Man' : 'Women' ?>
                </td>
            </tr>
            <tr>
                <td id="my_td">
                    <label class="text-right">Сообщение&nbsp</label>
                </td>
                <td>
                    <?= $_SESSION['message'] ?>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <a href="index.php" id="my_s" class="btn btn-block btn-success ">Return</><br/>


                </td>

            </tbody>
        </table>
        <div>

