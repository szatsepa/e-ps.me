<?php

/*
 * created by arcady.1254@gmail.com 5/3/2012
 */

$email = $attributes[send];

$recipe = $attributes[recipe];

$query = "SELECT Count(id) FROM eps_sender WHERE email = '$email'";

$result = mysql_query($query) or die ($query);

$row = mysql_fetch_row($result);

$count = $row[0];

if($count > 0){
    
$query = "SELECT eps_cod, id FROM eps_sender WHERE email = '$recipe'";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($result);

$eps = $row[eps_cod];

$id = $row[id]; 

$ismail = 1;

if($eps){

            $message ="Здравствуйте!\r\nПочтовый ящик $recipe имеет код $eps\r\n \r\nC уважением. Администрация. ";              
             
            $headers = 'From: administrator@'. $host. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
            
            $sabject = 'Ключ';
            
            mail($email, $sabject, $message, $headers);
             
}else{
          
     $ismail = 0;
}


           
if($ismail == 0){                  ?>
<script language="javascript">
    document.write('<form action="index.php?act=main" method="post"><input type="hidden" name="email" value="<?php echo $email;?>"/><input type="hidden" name="recipe" value="<?php echo $recipe;?>"/><input type="hidden" name="ismail" value="<?php echo $ismail;?>"/></form>');
    document.forms[0].submit();
</script>
    <?php  }else{
?>  
<script language="javascript">
   document.write('<form action="index.php?act=main" method="post"><input type="hidden" name="eps" value="<?php echo $eps;?>"/><input type="hidden" name="email" value="<?php echo $email;?>"/><input type="hidden" name="recipe" value="<?php echo $recipe;?>"/><input type="hidden" name="ismail" value="<?php echo $ismail;?>"/></form>');
    document.forms[0].submit();
</script>
  <?php      
    }
}else{
?>
<script language="javascript">
   document.write('<form action="index.php?act=rmail" method="post"><input type="hidden" name="ismail" value="0"/><input type="hidden" name="email" value="<?php echo $email;?>"/></form>');
    document.forms[0].submit();
</script>
<?php
}
?>