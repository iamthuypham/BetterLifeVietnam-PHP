<?php
session_start();
$error="";
if($_POST['submitted']=="true"){
	$lfile="lib/ldb.txt";
	if(file_exists($lfile)){
		$linfo=file($lfile);
		$i=0;
		foreach($linfo as $lup){
			$i++;
			if($i==1){
				$User=trim($lup);
			}
			if($i==2){
				$Pass=trim($lup);
			}
		}
	}
	if($_POST['username']==$User && $_POST['password']==$Pass){
		$_SESSION['User']=$User;
	}
	else{
		$error="<span class='error'>Incorrect Username or Password</span>";
	}
}
$pagehead="Admin";
$bodyjs = " onLoad='foc()'";
if($_SESSION['User']!=""){
  $bodyjs = " onLoad='AnnMsg()'";
}
$ExtraHeader="<link rel='stylesheet' href='css/login.css' />
<script type='text/javascript' src='js/login.js'></script>";
include_once("lib/header.php");
?>
<div class="BodyBox PeopleBodyBox">
        <div class="Pagehead">Admin</div>
        <div class="Subcontent2">
	<?php if($_SESSION['User']==""){
	    echo($error);
	?>
	    <div class="loginform" id="lform">
		<form name="loginform" id="login-form" method="post" action="admin" onSubmit='return check(this)'>
		<div id="wrapping">
		    <div id="textboxes">
		        <input type="text" name="username" id="name" placeholder="Username" autocomplete="off" tabindex="1" class="txtinput" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>">
		        <input type="password" name="password" id="telephone" placeholder="Password" tabindex="2" class="txtinput" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>">
		    </div>
		    <div id="buttons">
			<input type="submit" name="submit" id="loginbtn" class="loginbtn" tabindex="3" value="Login">
			<input type="hidden" name="submitted" id="submitted" value="true" />
		    </div>
		    <br style="clear: left;" />
		</form>
		</div>
	    </div>
	<?php }
	elseif($_SESSION['User']!=""){
		include_once("lib/AnnForm.php");
        } ?>
        </div>
<?
@include_once("lib/footer.php");
?>
    </body>
</html>