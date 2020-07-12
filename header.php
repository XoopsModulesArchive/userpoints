<?php
include("../../mainfile.php");
/////////////////////////////////

if(file_exists(XOOPS_ROOT_PATH."/modules/userpoints/language/".$xoopsConfig['language']."/global.php")){
	include(XOOPS_ROOT_PATH."/modules/userpoints/language/".$xoopsConfig['language']."/global.php");
}else{
	include(XOOPS_ROOT_PATH."/modules/userpoints/language/english/global.php");
}
?>