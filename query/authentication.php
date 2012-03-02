<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */
$code = quote_smart($attributes[code]);

        $query = "SELECT id FROM users WHERE pwd = $code";
        
        $result = mysql_query($query) or die($query);
        
         $num_rows = mysql_num_rows($result);
         
         if($num_rows != 0){
        
                 $row = mysql_fetch_row($result);
    
                     $_SESSION['id'] = $row[0];
         
                     $_SESSION['auth'] = 1;
                     
                     setcookie("di", $_SESSION['id'], time()+(3600*12));
               
                     
               
?>

<!--<form action="index.php?act=pres" method="post">
    <script language="javascript">
    document.write ('<input name="scr_W" type="hidden" value="'+ screen.width + '"><input name="scr_H" type="hidden" value="'+screen.height + '"><input name="colorDepth" type="hidden" value="'+screen.colorDepth+ '"></form>');
    document.forms[0].submit();
    </script>-->
    
    <?php 
    }else{
    ?>
<!--<script language="javascript">   
  if(!confirm("Зарегистрироватся???")){  
         document.write ('<form action="index.php?act=look" method="post"><input name="scr_W" type="hidden" value="'+ screen.width + '"><input name="scr_H" type="hidden" value="'+screen.height + '"><input name="colorDepth" type="hidden" value="'+screen.colorDepth+ '"></form>');
         document.forms[0].submit();
    }else{
        document.write ('<form action="index.php?act=registration" method="post"></form>');
        document.forms[0].submit();   
    } 
</script>    -->
    <?php } ?>
