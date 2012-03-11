<?php

/*
 * created by arcady.1254@gmail.com 5/3/2012
 */

    $email = $attributes[email];
    
    $eps = $attributes[eps];
    
if($attributes[err] == 1 && $_SESSION[id] != 0){ 
    
    ?>
<script language="javascript">
    
    alert("К такому адресу уже прикреплен валшебний код!!!\n \t\t\t\t<?php echo $eps;?>");
</script>
    <?php
}else{
   if($user->data){
         $email = $user->data[email];
    
         $key_word = $user->data[key_word]; 
    
    }
}
?>
<div class="envelope_base">
    <div class="add_mail">
            <div class="txt_add_mail">
                <p>Для регистрации почтового ящика введите емейл.</p>
            </div>
        <form id="cnf">
            <div class="input_mail">
                <input type="text" name="email" size="22" value="<?php echo $email;?>"/>
            </div>
            <div class="confirm">
                <input type="button" value="Подтвердить" onclick="javascript:_addMail('cnf');"/>
            </div>
            </form>
        <div class="stamp_add_mail">
            <input type="image" src="http://e-ps.me/images/stamp.gif" width="145" height="145" alt="BUTTON" onclick="javascript:document.location.href='index.php?act=main';"/> 
        </div>
   </div>
</div>
