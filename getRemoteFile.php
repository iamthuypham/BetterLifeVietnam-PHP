<?php
ignore_user_abort(1);
set_time_limit(1800);
if($_POST['Submitted']){
  file_put_contents($_POST['path'].$_POST['filename'], fopen($_POST['file_url'], 'r'));
}
?>
<html>
<head><title>File Fetch</title></head>
<body>
Get Remote File<br /><br />
<form name="getRemoteFile" method="POST" action="<?php echo($_SERVER['PHP_SELF']) ?>">
<input name="file_url" placeholder="File URL" size="100" /><br /><br />
<input name="path" placeholder="local path, include slash in the end" size="80"/><br /><br />
<input name="filename" placeholder="File to be saved as" size="50" /><br /><br />
<input type="HIDDEN" name="Submitted" value="TRUE" />
<input type="submit" name="SubBut" value="Fetch File" />
</form>
</body>
</html>