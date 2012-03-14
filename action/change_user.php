<?php

/*
 * created by arcady.1254@gmail.com 6/3/2012
 */
print_r($attributes);

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

$eps = quote_smart($attributes[code]);

if($attributes[upd] == 1){
    
    $eps = quote_smart (_cod (6, 2));
    
    mysql_query("UPDATE eps_sender SET email = $email, eps_cod = $eps WHERE email = $email");
    
    $message ="Здравствуйте! К почтовому ящику  - $email изменен код $eps.\r\n\r\n C уважением. Администрация. ";              
             
            $headers = 'From: administrator@'. $host. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
                    
            mail($email, 'Изменен код ', $message, $headers);
    
}

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

header("location:index.php?act=reg&id=$id");

function _cod($num_cnt, $str_cnt){
    
   $cod = '';

$simbol_array = array('A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P','Z','X','C','V','B','N','M');

for($i = 0;$i<$str_cnt;$i++){
    $cod .= $simbol_array[rand(0, count($simbol_array))];
}

for($i = 0;$i<$num_cnt;$i++){
    $cod .= rand(0, 9);
}

return $cod;
}
?>
