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

var_dump($_SESSION);
//var_dump($_POST);
?>
<head>
    <link rel="stylesheet" href="bootstrap.css">
    </head>
<style>
    #my_td{
        text-align: right;
        padding-right: 2%;
    }
    #my2{
        /*width: 66%;*/
    }


</style>
</td>
<td>
    <form action="/form.php" method="post">
        <div align="center" id="my_div">
            <table>
                <tbody>
                <tr>
                    <td id="my_td">
                        <label>Имя</label>
                    </td>
                    <td>
                        <input class="form-control" id="name" type="text" name="name" placeholder="Name" required
                               value="<?= !empty($_SESSION['name']) ? $_SESSION['name'] : ''; ?>"/>
                    </td>
                    <td class="mu2">
                        <?php
                        if (!empty($_SESSION['error']['ename'])) {
                            echo '<span style="color:red;">' . $_SESSION['error']['ename'] . '</span>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td id="my_td">
                        <label>Мыло</label>
                    </td>
                    <td>
                        <input class="form-control" id="email" type="text" name="email" placeholder="Email" required
                               value="<?= !empty($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"/>
                    </td>
                    <td class="mu2">
                        <?php
                        if (!empty($_SESSION['error']['email'])) {
                            echo '<span style="color:red;">' . $_SESSION['error']['email'] . '</span>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td id="my_td">
                        <label  class="text-right" "> Дата рождания</label>
                    </td>
                    <td id="111" class="form-inline">
<!--                    <td id="111">-->
<!--                    <td id="111">-->

                        <select  class="form-control" id="year" name="year"><?php
                            for ($i = (int)date('Y') - 100; $i <= (int)date('Y'); $i++){
                                if(!empty($_SESSION['year'])&&$i==$_SESSION['year']){

                                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                                }else{

                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }

                            }
                            ?></select>
                        <select  class="form-control" id="month" name="month"><?php
                            for ($i = 1; $i <= 12; $i++) {
                                if(!empty($_SESSION['month'])&&$i==$_SESSION['month']){

                                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                                }else{

                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                            ?></select>
                        <select  class="form-control" id="day" name="day"><?php
                            for ($i = 1; $i <= 31; $i++) {
                                if(!empty($_SESSION['day'])&&$i==$_SESSION['day']){

                                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                                }else{

                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                            ?></select>
                    </td>
                    <td>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td id="my_td">
                        <label>Пол</label>
                    </td>
                    <td>
                        <label class="radio-inline" for="gender">Man</label>
                        <input class="form-inline" id="gender" type="radio" name="gender" value="1" required/>
                        <label class="radio-inline" for="gender">Women</label>
                        <input class="form-inline" id="gender" type="radio" name="gender" value="2" required/>
                    </td>
                    <td>
                    </td>
                </tr>


                <tr>
                    <td id="my_td">
                        <label for="message">Message</label>
                    </td>
                    <td>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </td>
                    <td>

                    </td>

                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input id="my_s" class="btn btn-block btn-success " type="submit" value="Send"/><br/>


</td>

</tbody>
</table>

<div>
    </form>

