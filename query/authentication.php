<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */
if(isset ($attributes[ismail]) && $attributes[ismail] == 1){
    
    $email = $_SESSION[email];
    
    unset($_SESSION[email]);
    ?>
<script language="javascript">   
    
    alert("На адрес <?php echo $email;?>, был отправлен ключ.");
    
        document.location.href = "http://e-ps.me/index.php?act=main";
    
</script>
    <?php
}else{
    
$code = quote_smart($attributes[code]);

        $query = "SELECT id FROM eps_users WHERE key_word = $code";
        
        $result = mysql_query($query) or die($query);
        
         $num_rows = mysql_num_rows($result);
         
         if($num_rows != 0){
        
                 $row = mysql_fetch_row($result);
    
                     $_SESSION['id'] = $row[0];
         
                     $_SESSION['auth'] = 1;
                     
                     setcookie("di", $_SESSION['id'], time()+(3600*12));
               
                     
               
?>


    <script language="javascript">
//        alert(<?php echo $query;?>);
    document.write ('<form action="index.php?act=main" method="post"><input name="scr_W" type="hidden" value="'+ screen.width + '"><input name="scr_H" type="hidden" value="'+screen.height + '"><input name="colorDepth" type="hidden" value="'+screen.colorDepth+ '"></form>');
    document.forms[0].submit();
    </script>
    
    <?php 
    }else{
        
     $lo = logout();   
    ?>
<script language="javascript">   
//        alert(<?php echo $query;?>); 
         document.write ('<form action="index.php?act=info" method="post"><input name="scr_W" type="hidden" value="'+ screen.width + '"><input name="scr_H" type="hidden" value="'+screen.height + '"><input name="colorDepth" type="hidden" value="'+screen.colorDepth+ '"></form>');
         document.forms[0].submit();
    
</script>    
    <?php } 
    
} 
    
  function logout(){
      
        unset($_SESSION[id]);
        unset ($_SESSION[auth]);
        unset($_COOKIE[di]);
        return NULL;   
  }
  
  ?>
