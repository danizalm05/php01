
<?php
function CreateErrMsg($err_title, $err_msg)
{
  $GLOBALS['err_flg'] =1;
 
 echo  '<h1>'.$err_title.'</h1>';
 echo '<p><h2>'. $err_msg . '</h2></p>' ;
  
}
?>