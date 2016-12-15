<?php
$ports = array(25,80,43);
for($i=0;$i<sizeof($ports);$i++){
  $fp = @fsockopen('127.0.0.1', $ports[$i], $errno, $errstr, 5);
  if (!$fp) {
      echo($ports[$i]." is closed or blocked<br />");
  } else {
      echo($ports[$i]." is open<br />");
      fclose($fp);
  }
}
?>