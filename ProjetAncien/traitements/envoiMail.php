<?php
/**
 * Created by PhpStorm.
 * User: Rémy
 * Date: 17/05/2018
 * Time: 16:00
 */
if(isset($_POST['mails'])){
    $dest = $_POST['dest'];
    $obj = $_POST['obj'];
    $corps = $_POST['corps'];
    $header = 'From: toto';

    $mails = explode(';', $dest);
    foreach ($mails as $mail){
        if(mail($mail, $obj, $corps, $header)) echo "Mail envoyé !";
        else print_r(error_get_last());
    }
}