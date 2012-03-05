<?php

/*
 * created by arcady.1254@gmail.com 3/3/2012
 */ 
$eps = $user->data[eps];
//echo "$eps<br/>";
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
            <input type="text" name="send" size="22" required/>
        </div>
            <div class="submit_cover">
                <input type="image" src="http://e-ps.me/images/submit_cover.jpg"  alt="BUTTON" onclick="javascript:_mySend('cover');"/>
            </div>
    </form>
    </div>
</div>


