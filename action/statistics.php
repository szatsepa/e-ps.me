<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$color = quote_smart($attributes[colorDepth]);

$ip=$_SERVER['REMOTE_ADDR'];

$ip = quote_smart($ip);

if(!isset ($_SESSION[id])){
    $id = 0;
}  else {
    $id = intval($_SESSION[id]);
}

   
$resolution = quote_smart($attributes[scr_W]."x".$attributes[scr_H]);


$agent = quote_smart($_SERVER["HTTP_USER_AGENT"]);

$query = "INSERT INTO eps_statistics 
                        (ip,
                         user,
                        resolution,
                        agent,
                        colorDepth)
                VALUES ($ip,
                        $id,
                        $resolution,
                        $agent,
                        $color)";

$act_stat = mysql_query($query) or die($query);

header("location:index.php?act=main"); 
?>
