<?php
ini_set('session.gc_maxlifetime',10800);
ob_start("ob_gzhandler");
session_start();

header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' );

if($_GET['logout']==1){
	unset($_SESSION['User']);
}
$LoginStr="";
if($_SESSION['User']!=""){
	$LoginStr="<a class='loginstr' href='admin?logout=1'>Logout</a>";
}
?>
<!DOCTYPE html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$Lpagehead = $pagehead;
$Path=$_SERVER[PHP_SELF];
$ExpPath=explode("/",$Path);
$Page=$ExpPath[sizeof($ExpPath)-1];
$PageParent=$ExpPath[sizeof($ExpPath)-2];
$Page=str_replace("&","&amp;",$Page);
$PageParent=str_replace("&","&amp;",$PageParent);
$Pages=array("about", "our-team", "what-we-do", "responsible-tourism", "contact");
$Sublinks[1]="";
$Sublinks[2]=array("free-book-library", "scholarships-for-underprivileged", "job-assistance-to-youth");
$Sublinks[3]=array("tours-for-books", "voluntourism");
$PageLinkStr="<header id='header'>
	<ul id='menu'>";
for($SlinkC=1;$SlinkC<=3;$SlinkC++){
  $SublinksStr[$SlinkC]="";
  if($Sublinks[$SlinkC]!=""){
    $SublinksStr[$SlinkC]="<ul>";
    for($j=0;$j<sizeof($Sublinks[$SlinkC]);$j++){
      $SublinksStr[$SlinkC].="<li><a id='sublinks".$SlinkC."' href='".$Sublinks[$SlinkC][$j]."'>".ucfirst(str_replace("-"," ",$Sublinks[$SlinkC][$j]))."</a></li>";
    }
    $SublinksStr[$SlinkC].="</ul></li>";
  }
}
$StrippedPage = rtrim($Page, ".php");
$IfSublink[2] = "FALSE";
$IfSublink[3] = "FALSE";
for($SlinkC=1;$SlinkC<=3;$SlinkC++){
  for($j=0;$j<sizeof($Sublinks[$SlinkC]);$j++){
    if(strcasecmp($StrippedPage,$Sublinks[$SlinkC][$j])==0){
      $IfSublink[$SlinkC] = "TRUE";
    }
  }
}
for($i=0;$i<sizeof($Pages);$i++){
  if($Sublinks[$i]!="" && $IfSublink[$i] == "TRUE"){
    if($i==1){
        $PageLinkStr.="<li><a href='".$Pages[$i]."'>".strtoupper(str_replace("-"," ",$Pages[$i]))."</a>".$SublinksStr[$i];
    }
    else{
        $PageLinkStr.="<li id='nolink'>".strtoupper(str_replace("-"," ",$Pages[$i])).$SublinksStr[$i];
    }
  }
  elseif(strcasecmp($StrippedPage,$Pages[$i])==0){
    if($Sublinks[$i]!=""){
        $PageLinkStr.="<li class='CurrentLink'>".strtoupper(str_replace("-"," ",$Pages[$i])).$SublinksStr[$i];
    }
    else{
        $PageLinkStr.="<li class='CurrentLink'>".strtoupper(str_replace("-"," ",$Pages[$i]))."</li>";
    }
  }
  else{
    if($Sublinks[$i]!="" && $i==1){
        $PageLinkStr.="<li><a href='".$Pages[$i]."'>".strtoupper(str_replace("-"," ",$Pages[$i]))."</a>".$SublinksStr[$i];
    }
    elseif($Sublinks[$i]!=""){
        $PageLinkStr.="<li id='nolink'>".strtoupper(str_replace("-"," ",$Pages[$i])).$SublinksStr[$i];
    }
    else{
      $PageLinkStr.="<li><a href='".$Pages[$i]."'>".strtoupper(str_replace("-"," ",$Pages[$i]))."</a></li>";
    }
  }
}
$PageLinkStr.="</ul>
</header>";
$TitleSeparator=" < ";
if($HomePage=="YES"){
  $TitleSeparator="";
}
?>
<title><?php echo($Lpagehead.$TitleSeparator) ?>Better Life Vietnam</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="css/better-life-vietnam.css" />
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/showMore.js'></script>
<script type='text/javascript' src='js/slideshow.js'></script>
<script type='text/javascript' src="js/dropdown.js"></script>
<?php echo($ExtraHeader) ?>
</head>
<body <?php echo($bodyjs.$bodyBG) ?>>
<div class="ParentContainer">
<div class="Logo"><a href="/"><img src="images/Better-Life-Vietnam.png" alt="Better Life Vietnam" /></a></div>
<?php
echo($LoginStr);
echo($PageLinkStr);
?>