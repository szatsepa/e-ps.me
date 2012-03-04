<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */

class User{
    
    var $data;
    
    function User(){
        $this->data = array();
    }
    
    function setUser($id){  
        
        $query = "SELECT * FROM eps_users WHERE id = $id";
        
        $result = mysql_query($query) or die ($query);
        
        $row = mysql_fetch_assoc($result);
        
        $this->data = $row; 
        
        unset($row);
        
        mysql_free_result($result);
    }
 
}

// Проверка аутентификации

$user = new User();

if (isset($_SESSION['auth']) and !isset($attributes[out])) {
	
    
    $user_id = $_SESSION['id'];
    
   if($_SESSION[auth] == 1) $user->setUser($user_id);
     
}
?>
