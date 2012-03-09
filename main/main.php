<?php

/*
 * created by arcady.1254@gmail.com 3/3/2012
 */ 
$eps = $user->data[eps];

$email = $user->data[email];

$eps_array = str_split($eps);
?>
<div class="envelope_base">
    <div class="envelope">
            <input type="hidden" name="eps" value="<?php echo $eps;?>"/>
        <div class="stamp">
            <input type="image" src="http://e-ps.me/images/stamp.gif" width="145" height="145" alt="BUTTON" onclick="javascript:document.location.href='index.php?act=info';"/> 
        </div>
      <form id="cover">
        <div class="recipe">
            <input type="text" name="recipe" size="22" required/>
        </div>
        <div class="send">
            <input type="text" name="send" size="22" value="<?php echo $email;?>" required/>
        </div>
            <div class="submit_cover">
                <input type="image" src="http://e-ps.me/images/submit_cover.jpg"  alt="BUTTON" onclick="javascript:_mySend('cover',<?php echo $_SESSION[auth];?>);"/>
            </div>
    </form>
            <div class="reg_index" style="margin-top: 100px;">
            
            <?php 
            if($eps){
                     $eps = '"'.$eps.'"';
            }
            for($i=0;$i<8;$i++){
                $ml = ($i*45)."px";
                 
                 if($eps){
//                     $eps = '"'.$eps.'"';
                     echo "<div class='r_index_0' style='margin-left: ".$ml.";'><input type='image' src='http://".$host."/images/symbols/".  strtolower($eps_array[$i]).".png' title='Скопировать код в буфер обмена' onclick='javascript:_copyToclipboard($eps)'/>";//
                 }else{
                     echo "<div class='r_index_0' style='margin-left: ".$ml.";'><img src='http://".$host."/images/symbols/index_plase.jpg'/>";
                 }
                echo "</div>";
          }?>
        </div>
    </div>
</div>


