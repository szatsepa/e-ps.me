/* 
 * created by arcady.1254@gmail.com 5/3/2012
 */

function _emlWalidation(eml){
    
    var email = eml;
        
        var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        
        if (!email.match(reg)){
            return false;
        }else{
            return true;
        }
}
function _mySend(ID){

        var obj = document.getElementById(ID);
        
        var da = obj.recipe.value;
        
        var yes = _emlWalidation(da);

        if (!yes) {
            alert("Пожалуйста, проверте правильно ли введен адрес получателя.");
        }else{
            yes = _emlWalidation(obj.send.value);
            
            if (!yes) {
                 alert("Пожалуйста, проверте правильно ли введен адрес отправителя.");
             }else{                
                document.write("<form action='index.php?act=epsmail' method='post'><input type='hidden' name='send' value='"+obj.send.value+"'/></form>");
                document.forms[0].submit();
                }                 
        }
}
function _addMail(ID){
        
        var obj = document.getElementById(ID);
        
        var email = obj.email.value;
        
        var yes = _emlWalidation(email);
        
        if(!yes){
            alert("Пожалуйста, проверте правильно ли введен адрес получателя.");
        }
        else
        {
            document.location = "http://e-ps.me/index.php?act=addmail&email="+email;
        }
        
}