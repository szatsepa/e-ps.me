<?php

/*
 * created by arcady.1254@gmail.com 15/3/2012
 */

$email = $attributes[email];

$eps = _cod (6, 2);
    
mysql_query("UPDATE eps_sender SET eps_cod = '$eps' WHERE email = '$email'");
    
$message ="Здравствуйте! К почтовому ящику  - $email изменен код $eps.\r\n\r\n C уважением. Администрация. ";              
             
$headers = 'From: administrator@'. $host. "\r\n";
            
$headers  .= 'MIME-Version: 1.0' . "\r\n";
            
$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
                    
if(mail($email, 'Изменен код ', $message, $headers)){

header("location:index.php?act=reg&chg=1");

}else{
    
header("location:index.php?act=reg&chg=0"); 
 
}

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
