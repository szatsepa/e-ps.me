<?php

/*
 * created by arcady.1254@gmail.com 5/3/2012
 */

$email = $attributes[send];

$query = "SELECT eps_cod FROM eps_sender WHERE email = '$email'";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($result);

$eps = $row[eps_cod];

            $message ="Здравствуйте товарисчЪ! Ваш валшебный ключ - $eps.\n C уважением. Администрация. ";              
             
             $headers = 'From: administrator@'. $host. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
            
            echo "<br/>$email, 'Ваш валшебный ключ', $message, $headers<br/>";
        
            mail($email, 'Ваш валшебный ключ', $message, $headers);
            
            header("location:index.php?act=main&eps=$eps");
                
                 ?>


