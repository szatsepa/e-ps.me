<?php

/*
 * created by arcady.1254@gmail.com 5/3/2012
 */

$email = $attributes[email];

//$key = $attributes[key];

$eps_cod = _cod(6,2);

$query = "SELECT Count(*) FROM eps_sender WHERE email = '$email'";

$res = mysql_query($query) or die ($query);

$row = mysql_fetch_row($res);

if($row[0] == 0){

$query = "INSERT INTO eps_sender (email, eps_cod) VALUES ('$email', '$eps_cod')";

$result = mysql_query($query) or die($query);

$new_id = mysql_insert_id();

if($new_id){
    $key_word = _cod(5, 3);
    
    $query = "INSERT INTO eps_users (email_id, key_word) VALUES ($new_id,'$key_word')";
    
    mysql_query($query) or die($query);
    
    $new_id = mysql_insert_id();
    
    if(_gomail($email, $eps_cod, $key_word)){ 
        
                 header("location:index.php?act=reg&eps=$eps_cod&key=$key_word&id=$new_id&email=$email");
        }
    }          
}  else {
    
    $_SESSION[email] = $email;  
    
    $query = "SELECT u.id, u.key_word FROM eps_sender AS s, eps_users AS u WHERE s.email = '$email' AND s.id = u.email_id";
    
    $result = mysql_query($query) or die ($query);
    
    $row = mysql_fetch_assoc($result);
    
    $key = $row[key_word];
 
            $message ="Здравствуйте! Пароль для входа  - $key.\r\n\r\n C уважением. Администрация. ";              
             
            $headers = 'From: administrator@'. $host. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
                    
           if(mail($email, 'Пароль к личному кабинету', $message, $headers)){
               header("location:index.php?act=auth&code=null&ismail=1");
           }
}
function _gomail($email, $eps, $key){ 

            $message ="Здравствуйте! Почтовый ящик  - $email имеет код $eps.\r\n Пароль для входа - $key.\r\n\r\n C уважением. Администрация. ";              
             
            $headers = 'From: administrator@'. $host. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
                    
            mail($email, 'Регистрация адреса', $message, $headers);
            
            return 1;
    
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
