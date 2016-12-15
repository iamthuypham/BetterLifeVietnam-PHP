<?php
$filename=$_GET['f'];
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename='.$filename);
readfile('docs/'.$filename);
?>