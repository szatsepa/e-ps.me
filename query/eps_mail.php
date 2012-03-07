<?php

/*
 * created by arcady.1254@gmail.com 5/3/2012
 */

$email = $attributes[send];

$recipe = $attributes[recipe];

//$recipe = quote_smart($recipe);

$query = "SELECT eps_cod, id FROM eps_sender WHERE email = '$email'";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($result);

$eps = $row[eps_cod];

$id = $row[id]; 

            $message ="Здравствуйте товарисчЪ! Ваш валшебный ключ - $eps.\n C уважением. Администрация. ";              
             
             $headers = 'From: administrator@'. $host. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
            
            mail($email, 'Ваш валшебный ключ', $message, $headers);
            
 $query = "INSERT INTO eps_recipient (sender_id, recipient) VALUES ($id, '$recipe')";
 
 mysql_query($query) or die($query);
            
            header("location:index.php?act=main");
                
                 ?>


