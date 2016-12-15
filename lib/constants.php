<?php
DEFINE ('MYSQL_HOST','localhost');
DEFINE ('MYSQL_USER','euphony1_nsi');
DEFINE ('MYSQL_PASS','rsnsi0709');
DEFINE ('MYSQL_DB','euphony1_nsi');

DEFINE ('SESSION_TIMEOUT','3600'); //Set Seconds to Timeout
DEFINE ('SESSION_SECURITY', TRUE); //TRUE = Enable Session Security
DEFINE ('CSESSION','nsi'); //Set a unique identifier

DEFINE ('COOKIESUPPORT', TRUE); //TRUE = Enable Cookie Support
DEFINE ('COOKIETIMEOUT','3600'); //Set Seconds to Timeout

/*Set PHP Initialization Globals
-If you're getting looping redirects or cannot upload images
-Uncomment the lines below
*/

//ini_set("file_uploads","1");
//ini_set("register_globals","0");
?>