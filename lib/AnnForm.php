<?php
session_start();
$AnnFile="lib/announcements.txt";
$submissionStatus="";
if($_POST['AnnSubmitted']=="true"){
	$AnnMsg=$_POST['AnnMessage'];
	if($_POST['activedisp']!="YES"){
		$AnnMsg=$_POST['oldAnnMsg'];
	}
	$newcont=$_POST['activedisp']."\n".$AnnMsg;
	$AnnCont=fopen($AnnFile, 'w');
	fwrite($AnnCont, $newcont);
	fclose($AnnCont);
	$submissionStatus="<div id='SubStatus'>Settings updated successfully</div>";
}
if(file_exists($AnnFile)){
	$AnnCont=file($AnnFile);
	$j=0;
	$AnnMessage="";
	foreach($AnnCont as $subcont){
		$j++;
		if($j==1 && trim($subcont)=="YES"){
			$activedisp=trim($subcont);
		}
		else{
			$AnnMessage.=$subcont;
		}
	}
	$checkStatus="";
	if($activedisp=="YES"){
		$checkStatus=" checked";
	}
}
?>
	    <div class="AnnForm" id="aform">
		<form name="AnnForm" id="Ann-Form" method="post" action="admin">
		<div id="AnnWrapping">
		    <div id="AnnHeader">
		        Announcement
		    </div>
		    <? echo($submissionStatus) ?>
		    <div id="AnnForm1">
		        <input type="checkbox" name="activedisp" id="checkbx" class="checkbx" value="YES" onClick="AnnMsg(this)" <? echo($checkStatus) ?>> <label id="checkboxlabel"> Check to display | Uncheck to hide</label>
		    </div>
		    <div id="AnnForm2">
		        <textarea name="AnnMessage" id="AnnMessage" maxlength="1000" placeholder="Write each announcement in a separate line" class="textar"><? echo(stripslashes($AnnMessage)) ?></textarea>
		    </div>
		    <div id="buttons">
			<input type="submit" name="submit" id="loginbtn" class="loginbtn" tabindex="3" value="Save">
			<input type="hidden" name="oldAnnMsg" id="AnnSubmitted" value="<? echo($AnnMessage) ?>" />
			<input type="hidden" name="AnnSubmitted" id="AnnSubmitted" value="true" />
		    </div>
		    <br style="clear: left;" />
		</form>
		</div>
	    </div>