<script type="text/javascript">
    var myJavascriptVar =12345;
    document.cookie = "myJavascriptVar";
</script>

<?php 
   $phpVar =  $_COOKIE['myJavascriptVar'];

   echo $phpVar;
?>