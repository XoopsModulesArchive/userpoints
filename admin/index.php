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

include_once( "admin_header.php" );
include_once '../../../include/cp_header.php';
include_once XOOPS_ROOT_PATH.'/modules/userpoints/admin/functions.php';
/////////////////////////////////
if ( !is_object($xoopsUser) || !is_object($xoopsModule) || !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
	exit("Access Denied");
}
/////////////////////////////////
xoops_cp_header();
userpoints_adminmenu(0);
/////////////////////////////////
global $xoopsDB, $xoopsModuleConfig;
/////////////////////////////////

$list_admin = $xoopsModuleConfig['list_admin'];

echo "<center><h4>"._AM_USERPOINTS_THE." $list_admin "._AM_USERPOINTS_TITLE." ".$xoopsConfig['sitename']."</h4>";

echo "<table width='100%' border='0' cellspacing='1' cellpadding ='1' align='center' class = 'Head'>";
  echo "<tr>";
    echo "<td class = 'bg3' align='center'><b>" . _AM_USERPOINTS_RANK . "</b></td>";
    echo "<td class = 'bg3' align='center'><b>" . _AM_USERPOINTS_MEMBRE . "</b></td>";
    echo "<td class = 'bg3' align='center'><b>" . _AM_USERPOINTS_POINTS . "</b></td>";
  echo "</tr>";
  
  	$query = $xoopsDB->query("SELECT uid,uname,points FROM ".$xoopsDB->prefix("user_points")." ORDER BY points DESC, uname ASC LIMIT $list_admin");

	$rank = 1;
	while(list($uid, $uname, $points) = $xoopsDB->fetchRow($query)) {
	
	 {
	echo "<tr>";
	echo "<td align='center' class = 'head'>$rank</td>";
	echo "<td align='center' class = 'even'><a href=". XOOPS_URL ."/userinfo.php?uid=$uid>$uname</a></td>";
	echo "<td align='center' class = 'even'>$points</td>";
	echo "</tr>";
	$rank++;
	}
	}
	echo "</table><br />";
	
		echo "
		<br><br><fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_USERPOINTS_TITRE_INDEX . "</legend>\n
		<div style='padding: 8px;'>" . _AM_USERPOINTS_INDEX . "</div>\n
		</fieldset>\n";

/////////////////////////////////
info();
xoops_cp_footer();
?>