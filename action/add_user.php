<?php

/*
 * created by arcady.1254@gmail.com 6/3/2012
 */

$surname = quote_smart($attributes[surname]);

$name = quote_smart($attributes[name]);

$patronymic = quote_smart($attributes[patronymic]);

$residens = quote_smart($attributes[residens]);

$email = quote_smart($attributes[email]);

$phone = quote_smart($attributes[phone]);

$word = quote_smart($attributes[word]);

$bank_card = quote_smart($attributes[bank_card]);

$query = "INSERT INTO eps_users (surname,
                                 name,
                                 patronymic,
                                 address,
                                 email,
                                 phone,
                                 pwd,
                                 bank_card)
                 VALUES 
                        ($surname, 
                         $name,
                         $patronymic,
                         $residens,
                         $email,
                         $phone,
                         $word,
                         $bank_card)";

$result = mysql_query($query) or die($query);

header("location:index.php?act=reg");
?>