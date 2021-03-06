  <?php
 // created by arcady.1254@gmail.com 2/3/2012
 
 if(!isset($attributes) || !is_array($attributes)) {
     
        $attributes = array();
        
        $attributes = array_merge($_GET,$_POST,$_COOKIE); 
}
if(!isset($_SESSION)){

    session_start();  
}

if($_SESSION[auth] != 1)$_SESSION[auth] = 0;

if(isset($attributes[id])){
         
   $_SESSION[id] = $attributes[id];
   
   $_SESSION[auth] = 1;
         
}

if(isset($attributes[di]) && !isset ($_SESSION[auth])){
         
   $_SESSION[id] = $attributes[di];
   
   $_SESSION[auth] = 1;
         
}

//print_r($_SESSION);  
//echo "<br/>"; 
//print_r($attributes);  

include 'classes/User.php';
  
include 'action/connect.php';

include 'action/quotesmart.php';

if(isset ($_SESSION[id])) {
    include 'query/checkauth.php';
}else{
    include 'query/my_mail.php';
}
 
//echo "<br/>";
//print_r($user);

switch ($attributes[act]) {
    
  case 'auth':
        include 'main/header.php';
        include 'query/authentication.php';
       break;
   
   case 'main':
       $title = "Почта счастья!";
       include 'main/header.php';
       include 'main/selector.php';
       include 'main/main.php';
       break;
   
   case 'epsmail':
       include 'query/eps_mail.php';
       break;
   
   case 'rmail':
       $title = "Регистрация адреса.";
       include 'main/header.php';
       include 'main/selector.php';
       include 'main/add_email.php';
       break;
   
   case 'addmail':
       include 'action/add_email.php';
       break;
   
   case 'reg':
       $title = "Регистрация на $host.";
       include 'main/header.php';
       include 'main/selector.php';
       include 'main/registration.php';
       break;
   
   case 'addus':
       include 'action/add_user.php';
       break;
   
   case 'chngus':
       include 'main/header.php';
       include 'action/change_user.php';
       break;
   
   case 'chcode':
       include 'action/change_eps.php';
       break;

    case "logout":
        include 'action/logout.php'; 
        break;
 
     case 'statistics':
         include 'action/statistics.php';
         break;
     
    default :
        include 'action/redirect.php';
        break;
}
include 'main/footer.php';
include 'action/disconnect.php';
?>
