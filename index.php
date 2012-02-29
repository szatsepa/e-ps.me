 <?php
 // created by arcady.1254@gmail.com 2/2/2012
 if(!isset($attributes) || !is_array($attributes)) {
        $attributes = array();
        $attributes = array_merge($_GET,$_POST,$_COOKIE); 
}
if(!isset($_SESSION)){

    session_start();  
}
if(isset($attributes[di]) && !isset ($_SESSION[auth])){
         
   $_SESSION[id] = $attributes[di];
   
   $_SESSION[auth] = 1;
         
}

//print_r($_REQUEST);
//echo "<br/>";

//print_r($_SESSION);
//echo "<br/>";
//print_r($attributes);  

  
include 'main/connect.php';
include 'action/quotesmart.php';


include 'main/disconnect.php';
?>
