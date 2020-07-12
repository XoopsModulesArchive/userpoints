<?php

#
#  Midified by Kraven30 of Xoops France	
#  http://xoopskraven30.free.fr/ - xoops_kraven30@hotmail.fr
#  Copyright © 2007

include("admin_header.php");
include_once XOOPS_ROOT_PATH.'/modules/userpoints/admin/functions.php';
include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
include '../../../include/cp_header.php';

/////////////////////////////////
xoops_cp_header();
userpoints_adminmenu(0);
/////////////////////////////////
$myts = &MyTextSanitizer::getInstance();

$module_handler =& xoops_gethandler('module');
$versioninfo =& $module_handler->get($xoopsModule->getVar('mid'));
/////////////////////////////////
//En tete
echo "<a href='index.php'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule -> dirname() . "/" . $versioninfo -> getInfo('image') . "' alt='' hspace='10' vspace='0' align='left'></a>";
echo "<div style='margin-top: 10px; color: #33538e; margin-bottom: 4px; font-size: 18px; line-height: 18px; font-weight: bold; display: block;'>" . $versioninfo->getInfo('name') . " version " . $versioninfo->getInfo('version') . "</div>";
echo "</div>";
echo "<div>" . _MI_USERPOINTS_RELEASE . ": " . $versioninfo -> getInfo('releasedate') . "</div>";
/////////////////////////////////
//Information de l'auteur
$sform = new XoopsThemeForm(_MI_USERPOINTS_AUTHOR_INFO, "", "");
if  ( $versioninfo->getInfo('author_realname'))
	$author_name = $versioninfo->getInfo('author') . " (" . $versioninfo->getInfo('author_realname') . ")";
else
	$author_name = $versioninfo->getInfo('author');
$sform -> addElement(new XoopsFormLabel(_MI_USERPOINTS_AUTHOR_NAME, $author_name));
$author_sites = $versioninfo -> getInfo('author_website');
$author_site_info = "";
foreach($author_sites as $site){
	$author_site_info .= "<a href='" . $site['url'] . "' target='blank'>" . $site['name'] . "</a> ";
}
$sform -> addElement(new XoopsFormLabel(_MI_USERPOINTS_AUTHOR_WEBSITE, $author_site_info));
$sform -> addElement(new XoopsFormLabel(_MI_USERPOINTS_AUTHOR_EMAIL, "<a href='mailto:" . $versioninfo -> getInfo('author_email') . "'>" . $versioninfo -> getInfo('author_email') . "</a>"));
$sform -> addElement(new XoopsFormLabel(_MI_USERPOINTS_AUTHOR_CREDITS, $versioninfo -> getInfo('credits')));
$sform -> addElement(new XoopsFormLabel(_MI_USERPOINTS_AUTHOR_REMERCIMENTS, $versioninfo -> getInfo('remerciments')));
$sform -> display();

/////////////////////////////////

$sform = new XoopsThemeForm(_MI_USERPOINTS_MODULE_INFO, "", "");
$sform -> addElement(new XoopsFormLabel(_MI_USERPOINTS_MODULE_STATUS, $versioninfo -> getInfo('status')));
$sform -> addElement(new XoopsFormLabel(_MI_USERPOINTS_MODULE_XOOPSVERSION, $versioninfo -> getInfo('xoopsversion')));
$sform -> addElement(new XoopsFormLabel(_MI_USERPOINTS_MODULE_SUPPORT, "<a href='" . $versioninfo -> getInfo('support_site_url') . "' target='blank'>" . $versioninfo -> getInfo('support_site_name') . "</a>"));
$sform -> display();

/////////////////////////////////
info();
xoops_cp_footer();

?>