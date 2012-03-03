<?php

/*
 * created by arcady.1254@gmail.com 3/3/2012
 */
$eps = $user->data[eps];
echo "$eps<br/>";
?>
<form id="out"> 
<div style="position: relative; float: left; width: 96%; padding-top: 8px;">
<div class="envelope">   
    <input type="image" src="http://e-ps.me/images/envelope.jpg" width="358" height="134" alt="image" onclick="javascript:_mySend('out');"/>
</div>
    <div class="envelope_txt"> 
        <input type="hidden" name="eps" value="<?php echo $eps;?>"/>
        <p><small>Кому: email получателя</small></p>
        <p><input required type="text" size="36" name="recipient" value=""/></p>
        <p><small>От кого: email отправителя</small></p>
        <p><input required type="text" size="36" name="sender" value=""/></p>
        <p><input type="button" value="Отправить" onclick="javascript:_mySend('out');"/></p>
    </div>
</div> 
</form>
<script language="javascript">
    function _mySend(ID){

        var obj = document.getElementById(ID);
        
        var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        
        var da = obj.recipient.value;

        if (!da.match(reg)) {
            alert("Пожалуйста, проверте правильно ли введен адрес получателя.");
        }else{
            da = obj.sender.value;
            
            if (!da.match(reg)) {
                 alert("Пожалуйста, проверте правильно ли введен адрес отправителя.");
             }else{
                 alert("Адреса верные, шо дальше??? и ёпс = "+obj.eps.value);
                }
        }

    }

</script>

