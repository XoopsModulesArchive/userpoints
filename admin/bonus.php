<?php

#  Midified by Kraven30 of Xoops France	
#  http://xoopskraven30.free.fr/ - xoops_kraven30@hotmail.fr
#  Copyright © 2007

include_once( "admin_header.php" );
include_once XOOPS_ROOT_PATH.'/modules/userpoints/admin/functions.php';
include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include "../../../include/cp_header.php";

/////////////////////////////////
if ( !is_object($xoopsUser) || !is_object($xoopsModule) || !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
	exit("Access Denied");
}
/////////////////////////////////
xoops_cp_header();
userpoints_adminmenu(2);
/////////////////////////////////
//echo "<b>";// verifier

$op = "";
if (isset($_POST)) {
	foreach ($_POST as $k => $v) {
		${$k} = $v;
	}
}
if (isset($_GET['op'])) {
	$op = $_GET['op'];
}
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
/////////////////////////////////

$myts =& MyTextSanitizer::getInstance();

switch($op) {
	/////////////////////////////////
	case "add":
	
		$form = new XoopsThemeForm(_AM_USERPOINTS_ADDCONTACT,"form", "bonus.php");
		$form->addElement(new XoopsFormSelectUser(_AM_USERPOINTS_CONTACTNAME, "user", false, null, 5, false)) ;
		$form->addElement(new XoopsFormText(_AM_USERPOINTS_CONTENT, "bonus", 20, 30), true);
		$form->addElement(new XoopsFormTextarea(_AM_USERPOINTS_COMMENT, "comments", _AM_USERPOINTS_TEXTAREA, 5), false);
		$form->addElement(new XoopsFormHidden("op", "record"), true);
		$form->addElement(new XoopsFormButton("", "submit", _AM_USERPOINTS_ENREG, "submit"), true);
		$form->display();
		
			echo "
		<br><br><fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_USERPOINTS_TITRE_AIDE_ADD_BONUS . "</legend>\n
		<div style='padding: 8px;'>" . _AM_USERPOINTS_AIDE_ADD_BONUS . "</div>\n
		</fieldset>\n";
	break;
	/////////////////////////////////
	case "list":
	
		$query = "select uid from ".$xoopsDB->prefix("user_points_bonus")." group by uid";
		$result = $xoopsDB->queryF($query);
		$form = new XoopsThemeForm(_AM_USERPOINTS_CHOOSECONTACT,"form", "bonus.php");
		$select = new XoopsFormSelect(_AM_USERPOINTS_CONTACTNAME, "user", null, 5, false) ;
		while($user = $xoopsDB->fetchArray($result))
		{
			$select->addOption($user["uid"],XoopsUser::getUnameFromId($user["uid"])) ;
		}
		$form->addElement($select) ;
		$form->addElement(new XoopsFormHidden("op", "datalist"), true);
		$form->addElement(new XoopsFormButton("", "submit", _AM_USERPOINTS_MODIFY, "submit"), true);
		$form->display();
		
			echo "
		<br><br><fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_USERPOINTS_TITRE_AIDE_LIST_BONUS . "</legend>\n
		<div style='padding: 8px;'>" . _AM_USERPOINTS_AIDE_LIST_BONUS . "</div>\n
		</fieldset>\n";
	break ;
	/////////////////////////////////
	case "datalist":
		$query = "select id,bonus,comments from ".$xoopsDB->prefix("user_points_bonus")." where uid=$user order by id";
		$result = $xoopsDB->queryF($query);
		$form = new XoopsThemeForm(_AM_USERPOINTS_MODIFY." ".XoopsUser::getUnameFromId($user),"form", "bonus.php");
		$i = 0 ;
		while($data = $xoopsDB->fetchArray($result))
		{
			$form = new XoopsThemeForm(_AM_USERPOINTS_MODIFY,"form", "bonus.php");
			$form->addElement(new XoopsFormHidden("op", "modify"), true);
			$form->addElement(new XoopsFormHidden("user", $user), true);
			$form->addElement(new XoopsFormHidden("id", $data["id"]), true);
			$container[$i] = new XoopsFormElementTray($data["id"]) ;
			$container[$i]->addElement(new XoopsFormText(_AM_USERPOINTS_CONTENT, "bonus", 20, 30, $data["bonus"]), true);
			$container[$i]->addElement(new XoopsFormTextarea(_AM_USERPOINTS_COMMENT, "comments", $data["comments"]), true);
			$container[$i]->addElement(new XoopsFormButton("", "modify", _AM_USERPOINTS_UPDATE, "submit")) ;
			$container[$i]->addElement(new XoopsFormButton("", "delete", _AM_USERPOINTS_DELETE, "submit")) ;
			$form->addElement($container[$i]) ;
			$form->display();
			$i++ ;
		}	
		echo "<br><br><fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_USERPOINTS_TITRE_AIDE_DATALIST_BONUS . "</legend>\n<div style='padding: 8px;'>" . _AM_USERPOINTS_AIDE_DTALIST_BONUS . "</div>\n</fieldset>\n";
			
	break ;
	/////////////////////////////////	
	case "modify" :
		if($modify != "") {
			$bonus = $myts->previewTarea($bonus);
			$comments = $myts->previewTarea($comments);
			$query = "update ".$xoopsDB->prefix("user_points_bonus")." set bonus='$bonus', comments='$comments' where id=$id";
			$result = $xoopsDB->queryF($query);
			redirect_header("bonus.php", 1, _AM_USERPOINTS_ENREGOK);
		}
		else if($delete != "") {
			$query = "delete from ".$xoopsDB->prefix("user_points_bonus")." where id=$id";
			$result = $xoopsDB->queryF($query);
			redirect_header("bonus.php", 1, _AM_USERPOINTS_ENREGOK);
		}
		
	break ;
	/////////////////////////////////	
	case "record":
	
		
		$user = $myts->previewTarea($user);
		$bonus = $myts->previewTarea($bonus);
		$comments = $myts->previewTarea($comments);
		
		$query = "INSERT INTO `".$xoopsDB->prefix("user_points_bonus")."` ( `id` , `uid` , `bonus`, `comments`) VALUES ('', $user, '$bonus', '$comments')";
		if($xoopsDB->queryF($query))
		{ redirect_header("bonus.php", 1, _AM_USERPOINTS_ENREGOK); }
		else
		{ redirect_header("bonus.php", 1, _AM_USERPOINTS_ENREGNOK); }		
	break;
	/////////////////////////////////	
	//menu principal des bonus
	case "default":
	default:

		echo"<table width='100%' border='0' cellpadding='0' cellspacing='2' class='bg2'><tr><td class=\"odd\">";
		echo "<h3 align='center'>"._AM_USERPOINTS_TITLECONTACT."</h3>\n";
		echo " - <b><a href='bonus.php?op=add'>"._AM_USERPOINTS_ADMENU1."</a></b>\n";
		echo "<br /><br />\n";
		echo " - <b><a href='bonus.php?op=list'>"._AM_USERPOINTS_ADMENU2."</a></b>";
		echo"</td></tr></table>";
		
		echo "
		<br><br><fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_USERPOINTS_TITRE_AIDE_BONUS . "</legend>\n
		<div style='padding: 8px;'>" . _AM_USERPOINTS_AIDE_BONUS . "</div>\n
		</fieldset>\n";
	break;
	/////////////////////////////////
}

/////////////////////////////////
info();
xoops_cp_footer();

?>	