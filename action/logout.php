<?php

$res = $_SERVER[SERVER_NAME];

unset ($attributes);

unset($_SESSION[auth]);

unset($_SESSION[user]);

unset ($_SESSION[id]);

setcookie("di", '', time()-(3600));

session_unset();

session_destroy();

?>
<form action="http://<?php echo $host;?>" method="post">
    <script language="javascript">
    document.write ('</form>');
    document.forms[0].submit();
    </script>