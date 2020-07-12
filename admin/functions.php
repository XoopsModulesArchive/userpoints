<?php
//  ------------------------------------------------------------------------ //
//                      MARQUEE - MODULE FOR XOOPS 2                         //
//                    Copyright (c) 2005 Hervé Thouzard                      //
//                     <http://www.herve-thouzard.com/>                      //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}
/////////////////////////////////
function userpoints_adminmenu ($currentoption = 0, $breadcrumb = '')
{

	/* Nice buttons styles */
	echo "
    	<style type='text/css'>
    	#buttontop { float:left; width:100%; background: #e7e7e7; font-size:12px; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    	#buttonbar { float:left; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/newbb/images/bg.png') repeat-x left bottom; font-size:12px; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }
    	#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
		#buttonbar li { display:inline; margin:0; padding:0; }
		#buttonbar a { float:left; background:url('" . XOOPS_URL . "/modules/newbb/images/left_both.png') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }
		#buttonbar a span { float:left; display:block; background:url('" . XOOPS_URL . "/modules/newbb/images/right_both.png') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
		/* Commented Backslash Hack hides rule from IE5-Mac \*/
		#buttonbar a span {float:none;}
		/* End IE5-Mac hack */
		#buttonbar a:hover span { color:#333; }
		#buttonbar #current a { background-position:0 -150px; border-width:0; }
		#buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
		#buttonbar a:hover { background-position:0% -150px; }
		#buttonbar a:hover span { background-position:100% -150px; }
		</style>
    ";

	global $xoopsModule, $xoopsConfig;

	$tblColors = Array();
	$tblColors[0] = $tblColors[1] = $tblColors[2] = '';
	$tblColors[$currentoption] = 'current';

	if (file_exists(XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/language/' . $xoopsConfig['language'] . '/modinfo.php';
	} else {
		include_once XOOPS_ROOT_PATH . '/modules/newbb/language/english/modinfo.php';
	}

	echo "<div id='buttontop'>";
	echo "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
	echo "<td style=\"width: 60%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\"><a class=\"nobutton\" href=\"../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=".$xoopsModule -> getVar( 'mid' )."\">" . _MI_USERPOINTS_SETTINGS . "</a> | <a class=\"nobutton\" href=\"../index.php\">" . _MI_USERPOINTS_MODULE . "</a> | <a class=\"nobutton\" href=\"../admin/about.php\">" . _MI_USERPOINTS_ABOUT . "</a>";
	echo "<td style=\"width: 40%; font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;\"><b>" . $xoopsModule->name() . "  " . _MI_MARQUEE_MODULEADMIN . "</b> " . $breadcrumb . "</td>";
	echo "</tr></table>";
	echo "</div>";

	echo "<div id='buttonbar'>";
	echo "<ul>";
	echo "<li id='" . $tblColors[0] . "'><a href=\"index.php\"\"><span>"._MI_USERPOINTS_MENU_01 ."</span></a></li>\n";
	echo "<li id='" . $tblColors[1] . "'><a href=\"modules.php\"\"><span>"._MI_USERPOINTS_MENU_02 ."</span></a></li>\n";
	echo "<li id='" . $tblColors[2] . "'><a href=\"bonus.php\"\"><span>"._MI_USERPOINTS_MENU_03 ."</span></a></li>\n";

	echo "</ul></div>";
	echo "<br /><br /><pre>&nbsp;</pre><pre>&nbsp;</pre>";
}
/////////////////////////////////

/////////////////////////////////
function info() {
	echo '<p/>';
    OpenTable();
	echo '<div>';
    echo sprintf(_MI_USERPOINTS_VISITSUPPORT);
    echo '</div>';
	CloseTable();
	echo '<p/>';
}
/////////////////////////////////


?>
