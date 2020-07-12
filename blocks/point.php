<?php
#####################################################
#
#  Based on User Points for Postnuke
#  by Brian K. Virgin (webmaster@madhatt.info) http://www.madhatt.info
#  Licence: GPL
#
#  Adapted, modified and improved for Xoops 1.0 RC3
#  by Pascal Le Boustouller
#  pascal@xoopsien.net - http://www.xoopsien.net
#  Copyright © 2002
#  
#  Adapted, Modified and some improvement and possible bugs for Xoops v2
#  By Catzwolf
#  Catzwolf@wfsections.xoops2.com - http://wfsections.xoops2.com - http://modules.xoops2.com
#  Copyright © 2003
#
#  Midified by Kraven30 of Xoops France	
#  http://xoopskraven30.free.fr/ - xoops_kraven30@hotmail.fr
#  Copyright © 2007 	
#####################################################


function b_userpoints_show($options){

	global $xoopsDB;
	
	include_once '../../../include/cp_header.php';
	
	//$tobloc = $xoopsModuleConfig['member_bloc'];

	
	$block = array();
	$myts =& MyTextSanitizer::getInstance();
	$block['title'] = _UP_BL_TITLE;

		$block['content'] .= "<CENTER><table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" width=100%>\n";
		$block['content'] .= "<tr class='itemHead'>\n";
		$block['content'] .= "<td align=\"center\"><b>ID</b></td>\n";
		$block['content'] .= "<td align=\"center\"><b>"._UP_BL_USER."</b></td>\n";
		$block['content'] .= "<td align=\"center\"><b>"._UP_BL_POINTS."</b></td>\n";
		$block['content'] .= "</tr>\n";
		$query = $xoopsDB->queryF("SELECT uid, uname, points FROM ".$xoopsDB->prefix("user_points")." ORDER BY points DESC, uname ASC LIMIT $options[0]");

	
	$rank = 1;
	while(list($num, $uname, $totalpnts) = mysql_fetch_row($query)) {
	
	if ($totalpnts > 0) {
		if(is_integer($rank/2)) $color="even";
		else $color="odd";
			$block['content'] .= "<TR class='$color'>\n";
			$block['content'] .= "<td align=\"center\">$rank</td>\n";	
			$block['content'] .= "<td align=\"center\"><a href=\"".$xoopsConfig['xoops_url']."/userinfo.php?uid=$num\">$uname</a></td><td align=\"center\"><b>$totalpnts</b></td>";
			$block['content'] .= "</tr>\n";
			$rank++;
		}
	}
		$block['content'] .= "</table></CENTER>\n";
		$block['content'] .= "<DIV ALIGN=\"right\"><A HREF=\"".$xoopsConfig['xoops_url']."/modules/userpoints/\">"._UP_ALL_LIST."</A></DIV>";
        return $block;
}


function b_userpoints_edit($options) 
{
$form = _UP_USERPOINTS_BLOCK."&nbsp;<input type='text' name='options[]' value='".$options[0]."' />";
	return $form;

}
?>