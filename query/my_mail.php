<?php

/*
 * created by arcady.1254@gmail.com 7/3/2012
 */
$eps_cod = quote_smart($attributes[eps]);

$key_word = quote_smart($attributes[key]);

$query = "SELECT * FROM eps_users AS u, eps_sender AS s WHERE u.email_id = s.id AND u.key_word = $key_word";

$result = mysql_query($query) or die($query);

$user_data = mysql_fetch_assoc($result);

mysql_free_result($result);

$user = new User();

$user->setUserKey($user_data);

unset ($user_data);

?>
