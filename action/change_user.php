<?php

/*
 * created by arcady.1254@gmail.com 6/3/2012
 */
$id = intval($attributes[user_id]);

$email_id = intval($attributes[email_id]);

$surname = quote_smart($attributes[surname]);

$name = quote_smart($attributes[name]);

$patronymic = quote_smart($attributes[patronymic]);

$residens = quote_smart($attributes[residens]);

$email = quote_smart($attributes[email]);

$phone = "$attributes[phone]";

$word = quote_smart($attributes[word]);

$bank_card = quote_smart($attributes[bank_card]);

$query = "UPDATE eps_users 
                           SET surname = $surname, 
                               name = $name,
                               patronymic = $patronymic,
                               address = $residens,
                               phone = '$phone',
                               key_word = $word,
                               bank_card = $bank_card
                            WHERE id = $id";

$result = mysql_query($query) or die($query);

mysql_query("UPDATE eps_sender SET email = $email WHERE id = $email_id");

//if(!$result){
//   
//}  else {}

header("location:index.php?act=reg&id=$id");


// echo "$query";


?>
