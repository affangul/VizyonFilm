<?php
 session_destroy(); 
 setcookie("kullanici","",time()-1); 
 echo "<script> window.location.href='giris.php';</script>"; 
?>