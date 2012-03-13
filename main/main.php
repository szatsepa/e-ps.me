<?php

/*
 * created by arcady.1254@gmail.com 3/3/2012
 */ 
if($user->data){
$eps = $user->data[eps];

$email = $user->data[email];



}else if(isset ($attributes[ismail])){
    
    $email = $attributes[email];
    
    $recipe = $attributes[recipe];
    
    $eps = $attributes[eps];
}
if(isset ($attributes[ismail]))$ismail = intval($attributes[ismail]);

if(!$ismail && isset ($attributes[ismail])){
    ?>
<script language="javascript">
    alert("К сожалению к такому адресу не прикреплен вoлшебний код!!!");
</script> 
<?php
}
if($eps)$eps_array = str_split($eps);
?>
<div class="envelope_base">
    <div class="envelope">
            <input type="hidden" name="eps" value="<?php echo $eps;?>"/>
        <div class="stamp">
            <input type="image" src="http://e-ps.me/images/stamp.gif" width="145" height="145" alt="BUTTON" title="Зарегистрировать адрес" onclick="javascript:document.location.href='index.php?act=rmail';"/> 
        </div>
      <form id="cover">
        <div class="recipe">
            <input type="text" name="recipe" size="22" value="<?php echo $recipe;?>" title="Введите адрес электронной почты, код которой вы желаете получить" required placeholder="Адрес получателя"/>
        </div>
        <div class="send">
            <input type="text" name="send" size="22" value="<?php echo $email;?>" title="Введите адрес электронной почты на который вы желаете получить код" required placeholder="Ваш адрес"/>
        </div>
            <div class="submit_cover">
                <input type="image" src="http://e-ps.me/images/submit_cover.jpg"  alt="BUTTON" onclick="javascript:_mySend('cover',<?php echo $_SESSION[auth];?>);"/>
            </div>
    </form>
            <?php if($eps){
                     $eps = '"'.$eps.'"';
            }?>
            <div class="reg_index" style="margin-top: 100px;"> 
            
            <?php 
            
            for($i=0;$i<8;$i++){
                $ml = ($i*45)."px";
                 
                 if($eps){
                     echo "<div class='r_index_0' style='margin-left: ".$ml.";'><input type='image' src='http://".$host."/images/symbols/".  strtolower($eps_array[$i]).".png' onclick='javascript:_copyToclipboard($eps);'  title='Скопировать код в буфер обмена' />";//
                 }else{
                     echo "<div class='r_index_0' style='margin-left: ".$ml.";'><img src='http://".$host."/images/symbols/index_plase.jpg'/>";
                 }
                echo "</div>";
          }?>
        </div>
    </div>
</div>


