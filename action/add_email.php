<?php

/*
 * created by arcady.1254@gmail.com 5/3/2012
 */

$email = $attributes[email];

$eps_cod = '';

$simbol_array = array('A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P','Z','X','C','V','B','N','M');

for($i = 0;$i<2;$i++){
    $eps_cod .= $simbol_array[rand(0, count($simbol_array))];
}
$eps_cod .= '_';
for($i = 0;$i<6;$i++){
    $eps_cod .= rand(0, 9);
}

$query = "SELECT Count(*) FROM eps_sender WHERE email = '$email'";

$res = mysql_query($query) or die ($query);

$row = mysql_fetch_row($res);

if($row[0] == 0){

$query = "INSERT INTO eps_sender (email, eps_cod) VALUES ('$email', '$eps_cod')";

$result = mysql_query($query) or die($query);

if(_gomail($email, $eps_cod)){
     header("location:index.php?act=main&eps=$eps_cod");
}
            
}  else {
    
    $query = "SELECT eps_cod FROM eps_sender WHERE email = '$email'";
    
    $result = mysql_query($query) or die ($query);
    
    $row = mysql_fetch_assoc($result);
    
    $eps_cod = $row[eps_cod];
    
    if(_gomail($email, $eps_cod)){
     header("location:index.php?act=info&err=1&eps=$eps_cod&email=$email");
}
    
}
function _gomail($email, $eps){
    
            $message ="Здравствуйте товарисчЪ! Ваш валшебный ключ - $eps.\n C уважением. Администрация. ";              
             
            $headers = 'From: administrator@'. $host. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
                    
            mail($email, 'Ваш валшебный ключ', $message, $headers);
            
            return 1;
    
}
?>
