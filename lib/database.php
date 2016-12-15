<?php
function openDB () {
	if ( ! mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS) ) {
		die('Failed To Connect to Host');
	}
	if ( ! mysql_select_db(MYSQL_DB) ) {
		die('Failed To Connect to Database');
	}
}

function getDBData($table,$extended = "",$count=0){
	$tabledata = "hello";
	$tabledata = mysql_query("SELECT * FROM ".$table.$extended);
	if($count==1){
		return mysql_affected_rows();
	}
	else{
		mysql_fetch_array($tabledata);
		return $tabledata;
	}
}
?>