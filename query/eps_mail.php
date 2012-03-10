<?php

/*
 * created by arcady.1254@gmail.com 5/3/2012
 */
//print_r($attributes);

$email = $attributes[send];

$recipe = $attributes[recipe];

//$recipe = quote_smart($recipe);

$query = "SELECT eps_cod, id FROM eps_sender WHERE email = '$email'";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($result);

$eps = $row[eps_cod];

$id = $row[id]; 

            $message ="Здравствуйте товарисчЪ! Ваш валшебный ключ - $eps.\r\n Добавлен новый емейл - $recipe\r\nC уважением. Администрация. ";              
             
            $headers = 'From: administrator@'. $host. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
            
             mail($email, 'Ваш валшебный ключ', $message, $headers);
            
 $query = "INSERT INTO eps_recipient (sender_id, recipient) VALUES ($id, '$recipe')";
 
 mysql_query($query) or die($query);
 
            $message ="Здравствуйте товарисчЪ! Некто, (емайл - $email) прислал Вам валшебный ключ - $eps.\r\nC уважением. Администрация. ";              
             
            $headers = 'From: '. $email. "\r\n";
             
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
            
            mail($recipe, 'Ваш валшебный ключ', $message, $headers);
           
 header("location:index.php?act=main");
                
                 ?>


