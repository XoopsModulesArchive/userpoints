<?php
/////////////////////////////////
$modversion['name'] = ""._MI_USERPOINTS_NAME."";
$modversion['version'] = "3.0";
$modversion['description'] = ""._MI_USERPOINTS_DESC."";
$modversion['credits'] = "Version original par Brian K. Virgin, mise à jour pour Xoops 2.0 par Catzwolf";
$modversion['remerciments'] = "Merci à Eparcyl92 pour avoir testé le module et rapporté les bugs";
$modversion['author'] = "Kraven30";
$modversion['license'] = "GPL";
$modversion['official'] = 0;
$modversion['image'] = "images/logo.jpg";
$modversion['dirname'] = "userpoints";
/////////////////////////////////
$modversion['releasedate'] = "11 Juin 2007";
$modversion['status'] = "stable";
$modversion['xoopsversion'] = "2.0+";
$modversion['author_website'][1]['url'] = "http://xoopskraven30.free.fr";
$modversion['author_website'][1]['name'] = "Xoops Kraven30";
/////////////////////////////////
$modversion['author_email'] = "xoops_kraven30@hotmail.fr";
$modversion['support_site_url'] = "http://www.frxoops.org/";
$modversion['support_site_name'] = "Xoops France";
/////////////////////////////////
// Blocks
$modversion['blocks'][1]['file'] = "point.php";
$modversion['blocks'][1]['name'] = ""._MI_USERPOINTS_BNAME."";
$modversion['blocks'][1]['show_func'] = "b_userpoints_show";
$modversion['blocks'][1]['edit_func'] = "b_userpoints_edit";
$modversion['blocks'][1]['options'] = "3";
/////////////////////////////////
// Menu
$modversion['hasMain'] = 1;
/////////////////////////////////
// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";
/////////////////////////////////
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/user_points.sql";
/////////////////////////////////
// Tables created by sql file (without prefix!)
$modversion['tables'][0] = "user_points";
$modversion['tables'][1] = "user_points_bonus";
$modversion['tables'][2] = "user_points_config";
/////////////////////////////////
//Mise à jour des points
/*$modversion['config'][1] = array( 
	'name'			=> 'update_pts' ,
	'title'			=> '_MI_USERPOINTS_UPDATE_PTS' ,
	'description'	=> '' ,
	'formtype'		=> 'select' ,
	'valuetype'		=> 'int' ,
	'default'		=> '7200' ,
	'options'		=> array( '0:00'=>0 , '1:00'=>3600 , '2:00'=>7200 , '3:00'=>10800 , '4:00'=>14400 , '5:00'=>18000 , '6:00'=>21600 )
) ;*/
//List des membres, affichage utilisateurs
$modversion['config'][1] = array(
	'name'			=>'list_member',
	'title' 		=>'_MI_USERPOINTS_LIST_MEMBER',
	'description'	=> '',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'int',
	'default'		=> '30',
	'options'		=> array()
) ;

//List des membres, affichage admin
$modversion['config'][2] = array(
	'name'			=>'list_admin',
	'title' 		=>'_MI_USERPOINTS_ADMIN',
	'description'	=> '',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'int',
	'default'		=> '10',
	'options'		=> array()
) ;

/*//Compter les admins
$modversion['config'][3] = array(
	'name'			=>'compt_admin',
	'title' 		=>'_MI_USERPOINTS_COMPT_ADMIN',
	'description'	=> '',
	'formtype'		=> 'yesno',
	'valuetype'		=> 'int',
	'default'		=> '0',
	'options'		=> array()
) ;*/
//Jours
$modversion['config'][3] = array(
	'name'			=>'jours',
	'title' 		=>'_MI_USERPOINTS_JOURS',
	'description'	=> '_MI_USERPOINTS_DESC_JOURS',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'int',
	'default'		=> '02',
	'options'		=> array()
) ;
//Mois
$modversion['config'][4] = array(
	'name'			=>'mois',
	'title' 		=>'_MI_USERPOINTS_MOIS',
	'description'	=> '_MI_USERPOINTS_DESC_MOIS',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'int',
	'default'		=> '11',
	'options'		=> array()
) ;
//Années
$modversion['config'][5] = array(
	'name'			=>'annees',
	'title' 		=>'_MI_USERPOINTS_ANNEES',
	'description'	=> '_MI_USERPOINTS_DESC_ANNEES',
	'formtype'		=> 'textbox',
	'valuetype'		=> 'int',
	'default'		=> '2002',
	'options'		=> array()
) ;
/////////////////////////////////

?>