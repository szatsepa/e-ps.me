 <?php
 // created by arcady.1254@gmail.com 2/3/2012
 
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

  
include 'action/connect.php';

include 'action/quotesmart.php';

if($attributes[act] != 'registration'){

if(isset ($_SESSION[id])) include 'query/checkauth.php';

}

switch ($attributes[act]) {
    
        case 'auth':
//        include 'main/header.php';
        include 'query/authentication.php';
       break;

    default:
        break;
}

include 'action/disconnect.php';
?>
