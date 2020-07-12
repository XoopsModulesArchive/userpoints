<?
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
include_once XOOPS_ROOT_PATH.'/modules/userpoints/admin/functions.php';
/////////////////////////////////
if ( !is_object($xoopsUser) || !is_object($xoopsModule) || !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
	exit("Access Denied");
}
/////////////////////////////////
$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : "default";
/////////////////////////////////
switch ($op) {
/////////////////////////////////
    case "save":
		////
        global $xoopsDB;
		////
		//$actifuser = $_POST['actifuser'];
		//$poinuser = $_POST['poinuser'];
		$actifnews = $_POST['actifnews'];
		$poinnews = $_POST['poinnews'];
		$actifsmartsection = $_POST['actifsmartsection'];
		$poinsmartsection = $_POST['poinsmartsection'];
		$actifwfsections = $_POST['actifwfsections'];
		$poinwfsections = $_POST['poinwfsections'];
		$actifnewbbex = $_POST['actifnewbbex'];
		$poinnewbbex = $_POST['poinnewbbex'];
        $actifnewbb = $_POST['actifnewbb'];
		$poinnewbb = $_POST['poinnewbb'];
		$actifsmartfaq = $_POST['actifsmartfaq'];
		$poinsmartfaq = $_POST['poinsmartfaq'];
		$actifwordbook = $_POST['actifwordbook'];
		$poinwordbook = $_POST['poinwordbook'];
		$actifxcgal = $_POST['actifxcgal'];
		$poinxcgal = $_POST['poinxcgal'];
		$actifxcgalvote = $_POST['actifxcgalvote'];
		$poinxcgalvote = $_POST['poinxcgalvote'];
		$actifextgallery = $_POST['actifextgallery'];
		$poinextgallery = $_POST['poinextgallery'];
		$actifdloads = $_POST['actifdloads'];
		$poindloads = $_POST['poindloads'];
		$actifdloadsvotes = $_POST['actifdloadsvotes'];
		$poindloadsvotes = $_POST['poindloadsvotes'];
		$actifwfdloads = $_POST['actifwfdloads'];
		$poinwfdloads = $_POST['poinwfdloads'];
		$actifwfdloadsvotes = $_POST['actifwfdloadsvotes'];
		$poinwfdloadsvotes = $_POST['poinwfdloadsvotes'];
		$actiflinks = $_POST['actiflinks'];
		$poinlinks = $_POST['poinlinks'];
		$actiflinksvotes = $_POST['actiflinksvotes'];
		$poinlinksvotes = $_POST['poinlinksvotes'];
		$actifweblinks = $_POST['actifweblinks'];
		$poinweblinks = $_POST['poinweblinks'];
		$actifweblinksvotes = $_POST['actifweblinksvotes'];
		$poinweblinksvotes = $_POST['poinweblinksvotes'];
		$actifxmovie = $_POST['actifxmovie'];
		$poinxmovie = $_POST['poinxmovie'];
		$actifxmovievotes = $_POST['actifxmovievotes'];
		$poinxmovievotes = $_POST['poinxmovievotes'];
		$actifcomments = $_POST['actifcomments'];
		$poincomments = $_POST['poincomments'];
		$actiffriends = $_POST['actiffriends'];
		$poinfriends = $_POST['poinfriends'];
		$actifbonus = $_POST['actifbonus'];
/////////////////////////////////

       $xoopsDB->query("update " . $xoopsDB->prefix("user_points_config") . " set  actifnews='$actifnews', poinnews='$poinnews', actifsmartsection='$actifsmartsection', poinsmartsection='$poinsmartsection', actifwfsections='$actifwfsections', poinwfsections='$poinwfsections', actifnewbbex='$actifnewbbex', poinnewbbex='$poinnewbbex', actifnewbb='$actifnewbb', poinnewbb='$poinnewbb', actifsmartfaq='$actifsmartfaq', poinsmartfaq='$poinsmartfaq', actifwordbook='$actifwordbook', poinwordbook='$poinwordbook', actifxcgal='$actifxcgal', poinxcgal='$poinxcgal', actifxcgalvote='$actifxcgalvote', poinxcgalvote='$poinxcgalvote', actifextgallery='$actifextgallery', poinextgallery='$poinextgallery', actifdloads='$actifdloads', poindloads='$poindloads', actifdloadsvotes='$actifdloadsvotes', poindloadsvotes='$poindloadsvotes', actifwfdloads='$actifwfdloads', poinwfdloads='$poinwfdloads', actifwfdloadsvotes='$actifwfdloadsvotes', poinwfdloadsvotes='$poinwfdloadsvotes', actiflinks='$actiflinks', poinlinks='$poinlinks', actiflinksvotes='$actiflinksvotes', poinlinksvotes='$poinlinksvotes', actifweblinks='$actifweblinks', poinweblinks='$poinweblinks', actifweblinksvotes='$actifweblinksvotes', poinweblinksvotes='$poinweblinksvotes', actifxmovie='$actifxmovie', poinxmovie='$poinxmovie', actifxmovievotes='$actifxmovievotes', poinxmovievotes='$poinxmovievotes', actifcomments='$actifcomments', poincomments='$poincomments', actiffriends='$actiffriends', poinfriends='$poinfriends', actifbonus='$actifbonus'");
        redirect_header("modules.php", 1, _AM_UPDATED);
        exit();

        break;
/////////////////////////////////
    default:
/////////////////////////////////       
        include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
		////		
        global  $xoopsDB;
		////
        $result = $xoopsDB->query("SELECT actifnews, poinnews, actifsmartsection, poinsmartsection, actifwfsections, poinwfsections, actifnewbbex, poinnewbbex, actifnewbb, poinnewbb, actifsmartfaq, poinsmartfaq, actifwordbook, poinwordbook, actifxcgal, poinxcgal, actifxcgalvote, poinxcgalvote, actifextgallery, poinextgallery, actifdloads, poindloads, actifdloadsvotes, poindloadsvotes, actifwfdloads, poinwfdloads, actifwfdloadsvotes, poinwfdloadsvotes, actiflinks, poinlinks, actiflinksvotes, poinlinksvotes, actifweblinks, poinweblinks, actifweblinksvotes, poinweblinksvotes, actifxmovie,  poinxmovie, actifxmovievotes, poinxmovievotes, actifcomments, poincomments, actiffriends, poinfriends,  actifbonus FROM " . $xoopsDB->prefix('user_points_config'));
        list($actifnews, $poinnews, $actifsmartsection, $poinsmartsection, $actifwfsections, $poinwfsections, $actifnewbbex, $poinnewbbex, $actifnewbb, $poinnewbb, $actifsmartfaq, $poinsmartfaq, $actifwordbook, $poinwordbook, $actifxcgal, $poinxcgal, $actifxcgalvote, $poinxcgalvote, $actifextgallery, $poinextgallery, $actifdloads, $poindloads, $actifdloadsvotes, $poindloadsvotes, $actifwfdloads, $poinwfdloads, $actifwfdloadsvotes, $poinwfdloadsvotes, $actiflinks, $poinlinks, $actiflinksvotes, $poinlinksvotes, $actifweblinks, $poinweblinks, $actifweblinksvotes, $poinweblinksvotes, $actifxmovie, $poinxmovie, $actifxmovievotes, $poinxmovievotes, $actifcomments, $poincomments, $actiffriends, $poinfriends, $actifbonus) = $xoopsDB->fetchrow($result);
/////////////////////////////////
        xoops_cp_header();
        userpoints_adminmenu(1);
/////////////////////////////////
		$sform = new XoopsThemeForm(_AM_USERPOINTS_MODIFY, "op", xoops_getenv('PHP_SELF'));
		//echo "<h3 align='center'>"._UP_TITLECONTACT."</h3>\n";
		/////////////////////////////////	
		$sform->insertBreak('<b><u>'._AM_USERPOINTS_SOUSTITRE_ARTICLE.'</u></b>','odd');
		/////////////////////////////////	
		//news
		if (XoopsModule::getByDirname("news")) {
		$bouton_actifnews = new XoopsFormRadioYN(_AM_USERPOINTS_NEWS_ON, 'actifnews', $actifnews, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifnews);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_NEWSPTS, 'poinnews', 6, 6, $poinnews), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_NEWS, _AM_USERPOINTS_NOINSTALL_NEWS)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//smartsection
		if (XoopsModule::getByDirname("smartsection")) {
		$bouton_actifsmartsection = new XoopsFormRadioYN(_AM_USERPOINTS_SMARTSECTION_ON, 'actifsmartsection', $actifsmartsection, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifsmartsection);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_SMARTSECTIONPTS, 'poinsmartsection', 6, 6, $poinsmartsection), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_SMARTSECTION, _AM_USERPOINTS_NOINSTALL_SMARTSECTION)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//wfsections
		if (XoopsModule::getByDirname("wfsection")) {
		$bouton_actifwfsections = new XoopsFormRadioYN(_AM_USERPOINTS_WFSECTIONS_ON, 'actifwfsections', $actifwfsections, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifwfsections);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_WFSECTIONSPTS, 'poinwfsections', 6, 6, $poinwfsections), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_WFSECTIONS, _AM_USERPOINTS_NOINSTALL_WFSECTIONS)); 
		}
		/////////////////////////////////
				
		$sform->insertBreak('<b><u>'._AM_USERPOINTS_SOUSTITRE_FORUM.'</u></b>','odd');
		/////////////////////////////////
		/////////////////////////////////		
		/////////////////////////////////
		//newbbex
		if (XoopsModule::getByDirname("newbbex")) {
		$bouton_actifnewbbex = new XoopsFormRadioYN(_AM_USERPOINTS_NEWBBEX_ON, 'actifnewbbex', $actifnewbbex, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifnewbbex);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_NEWBBEXPTS, 'poinnewbbex', 6, 6, $poinnewbbex), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_NEWBBEX, _AM_USERPOINTS_NOINSTALL_NEWBBEX)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////		
		//newbb
		if (XoopsModule::getByDirname("newbb")) {
		$bouton_actifnewbb = new XoopsFormRadioYN(_AM_USERPOINTS_NEWBB_ON, 'actifnewbb', $actifnewbb, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifnewbb);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_NEWBBPTS, 'poinnewbb', 6, 6, $poinnewbb), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_NEWBB, _AM_USERPOINTS_NOINSTALL_NEWBB)); 
		}
		/////////////////////////////////
		$sform->insertBreak('<b><u>'._AM_USERPOINTS_SOUSTITRE_LINKS.'</u></b>','odd');
		/////////////////////////////////
		//links
		if (XoopsModule::getByDirname("mylinks")) {
		$bouton_actiflinks = new XoopsFormRadioYN(_AM_USERPOINTS_MYLINKS_ON, 'actiflinks', $actiflinks, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actiflinks);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_MYLINKSPTS, 'poinlinks', 6, 6, $poinlinks), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_MYLINKS, _AM_USERPOINTS_NOINSTALL_MYLINKS)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//linksvotes
		if (XoopsModule::getByDirname("mylinks")) {
		$bouton_actiflinksvotes = new XoopsFormRadioYN(_AM_USERPOINTS_MYLINKSVOTE_ON, 'actiflinksvotes', $actiflinksvotes, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actiflinksvotes);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_MYLINKSVOTEPTS, 'poinlinksvotes', 6, 6, $poinlinksvotes), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_MYLINKSVOTE, _AM_USERPOINTS_NOINSTALL_MYLINKS)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//weblinks
		if (XoopsModule::getByDirname("weblinks")) {
		$bouton_actifweblinks = new XoopsFormRadioYN(_AM_USERPOINTS_WEBLINKS_ON, 'actifweblinks', $actifweblinks, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifweblinks);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_WEBLINKSPTS, 'poinweblinks', 6, 6, $poinweblinks), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_WEBLINKS, _AM_USERPOINTS_NOINSTALL_WEBLINKS)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//weblinksvotes
		if (XoopsModule::getByDirname("weblinks")) {
		$bouton_actifweblinksvotes = new XoopsFormRadioYN(_AM_USERPOINTS_WEBLINKS_ON, 'actifweblinksvotes', $actifweblinksvotes, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifweblinksvotes);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_WEBLINKSPTS, 'poinweblinksvotes', 6, 6, $poinweblinksvotes), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_WEBLINKS, _AM_USERPOINTS_NOINSTALL_WEBLINKS)); 
		}
		/////////////////////////////////
		$sform->insertBreak('<b><u>'._AM_USERPOINTS_SOUSTITRE_PICTURE.'</u></b>','odd');
		/////////////////////////////////
		//extgallery
		if (XoopsModule::getByDirname("extgallery")) {
		$bouton_actifextgallery = new XoopsFormRadioYN(_AM_USERPOINTS_EXTGALLERY_ON, 'actifextgallery', $actifextgallery, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifextgallery);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_EXTGALLERYPTS, 'poinextgallery', 6, 6, $poinextgallery), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_EXTGALLERY, _AM_USERPOINTS_NOINSTALL_EXTGALLERY)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//xcgal
		if (XoopsModule::getByDirname("xcgal")) {
		$bouton_actifxcgal = new XoopsFormRadioYN(_AM_USERPOINTS_XCGAL_ON, 'actifxcgal', $actifxcgal, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifxcgal);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_XCGALPTS, 'poinxcgal', 6, 6, $poinxcgal), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_XCGAL, _AM_USERPOINTS_NOINSTALL_XCGAL)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//xcgalvote
		if (XoopsModule::getByDirname("xcgal")) {
		$bouton_actifxcgalvote = new XoopsFormRadioYN(_AM_USERPOINTS_XCGALVOTE_ON, 'actifxcgalvote', $actifxcgalvote, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifxcgalvote);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_XCGALVOTEPTS, 'poinxcgalvote', 6, 6, $poinxcgalvote), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_XCGALVOTE, _AM_USERPOINTS_NOINSTALL_XCGAL)); 
		}
		/////////////////////////////////
		$sform->insertBreak('<b><u>'._AM_USERPOINTS_SOUSTITREDOWNLOAD.'</u></b>','odd');
		/////////////////////////////////
		//dloads
		if (XoopsModule::getByDirname("mydownloads")) {
		$bouton_actifdloads = new XoopsFormRadioYN(_AM_USERPOINTS_DL_ON, 'actifdloads', $actifdloads, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifdloads);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_DLPTS, 'poindloads', 6, 6, $poindloads), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_DL, _AM_USERPOINTS_NOINSTALL_MYDOWN)); 
	  	}
		/////////////////////////////////
		
		/////////////////////////////////
		//dloadvotes
		if (XoopsModule::getByDirname("mydownloads")) {
		$bouton_actifdloadsvotes = new XoopsFormRadioYN(_AM_USERPOINTS_DLVOTE_ON, 'actifdloadsvotes', $actifdloadsvotes, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifdloadsvotes);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_DLVOTEPTS, 'poindloadsvotes', 6, 6, $poindloadsvotes), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_DLVOTE, _AM_USERPOINTS_NOINSTALL_MYDOWN)); 
		}
		/////////////////////////////////
				/////////////////////////////////
		//wfdloads
		if (XoopsModule::getByDirname("wfdownloads")) {
		$bouton_actifwfdloads = new XoopsFormRadioYN(_AM_USERPOINTS_WFDL_ON, 'actifwfdloads', $actifwfdloads, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifwfdloads);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_WFDLPTS, 'poinwfdloads', 6, 6, $poinwfdloads), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_WFDL, _AM_USERPOINTS_NOINSTALL_WFDOWN)); 
	  	}
		/////////////////////////////////
		
		/////////////////////////////////
		//wfdloadvotes
		if (XoopsModule::getByDirname("wfdownloads ")) {
		$bouton_actifwfdloadsvotes = new XoopsFormRadioYN(_AM_USERPOINTS_WFDLVOTE_ON, 'actifwfdloadsvotes', $actifwfdloadsvotes, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifwfdloadsvotes);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_WFDLVOTEPTS, 'poinwfdloadsvotes', 6, 6, $poinwfdloadsvotes), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_WFDLVOTE, _AM_USERPOINTS_NOINSTALL_WFDOWN)); 
		}
		/////////////////////////////////
		$sform->insertBreak('<b><u>'._AM_USERPOINTS_SOUSTITRE_MOVIE.'</u></b>','odd');
		/////////////////////////////////
		/////////////////////////////////
		/////////////////////////////////
		/////////////////////////////////
		//xmovie
		if (XoopsModule::getByDirname("x_movie")) {
		$bouton_actifxmovie = new XoopsFormRadioYN(_AM_USERPOINTS_XMOVIE_ON, 'actifxmovie', $actifxmovie, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifxmovie);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_XMOVIEPTS, 'poinxmovie', 6, 6, $poinxmovie), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_XMOVIE, _AM_USERPOINTS_NOINSTALL_XMOVIE)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//xmoviev
		if (XoopsModule::getByDirname("x_movie")) {
		$bouton_actifxmovievot = new XoopsFormRadioYN(_AM_USERPOINTS_XMOVIEV_ON, 'actifxmovievotes', $actifxmovievotes, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifxmovievot);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_XMOVIEVPTS, 'poinxmovievotes', 6, 6, $poinxmovievotes), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_XMOVIEV, _AM_USERPOINTS_NOINSTALL_XMOVIEVOTES)); 
		}
		/////////////////////////////////
		$sform->insertBreak('<b><u>'._AM_USERPOINTS_SOUSTITRE_OTHER_MODULES.'</u></b>','odd');
		/////////////////////////////////
		//smartfaq
		if (XoopsModule::getByDirname("smartfaq")) {
		$bouton_actifsmartfaq = new XoopsFormRadioYN(_AM_USERPOINTS_SMARTFAQ_ON, 'actifsmartfaq', $actifsmartfaq, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifsmartfaq);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_SMARTFAQPTS, 'poinsmartfaq', 6, 6, $poinsmartfaq), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_SMARTFAQ, _AM_USERPOINTS_NOINSTALL_SMARTFAQ)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//wordbook
		if (XoopsModule::getByDirname("wordbook")) {
		$bouton_actifwordbook = new XoopsFormRadioYN(_AM_USERPOINTS_WORDBOOK_ON, 'actifwordbook', $actifwordbook, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifwordbook);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_WORDBOOKPTS, 'poinwordbook', 6, 6, $poinwordbook), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_WORDBOOK, _AM_USERPOINTS_NOINSTALL_WORDBOOK)); 
		}
		/////////////////////////////////
		
		/////////////////////////////////
		//friends
		if (XoopsModule::getByDirname("tellafriend")) {
		$bouton_actiffriends = new XoopsFormRadioYN(_AM_USERPOINTS_TELLAFRIEND_ON, 'actiffriends', $actiffriends, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actiffriends);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_TELLAFRIENDPTS, 'poinfriends', 6, 6, $poinfriends), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_TELLAFRIEND, _AM_USERPOINTS_NOINSTALL_TELLAFRIEND)); 
		}
		/////////////////////////////////
		$sform->insertBreak('<b><u>'._AM_USERPOINTS_SOUSTITRE_MORE.'</u></b>','odd');
		/////////////////////////////////
		//user
		/*if (XoopsModule::getByDirname("system")) {
		$bouton_actifuser = new XoopsFormRadioYN(_AM_USERPOINTS_USER_ON, 'actifuser', $actifuser, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifuser);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_USERPTS, 'poinuser', 6, 6, $poinuser), false);
		} else {
		$sform->addElement(new XoopsFormLabel(_AM_USERPOINTS_USER, _AM_USERPOINTS_NOINSTALL_USER)); 
		}*/
		/////////////////////////////////
		
		/////////////////////////////////
		//comments
		
		$bouton_actifcomments = new XoopsFormRadioYN(_AM_USERPOINTS_COMM_ON, 'actifcomments', $actifcomments, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifcomments);
		$sform->addElement(new XoopsFormText(_AM_USERPOINTS_COMMPTS, 'poincomments', 6, 6, $poincomments), false);
		
		
		/////////////////////////////////
		
				/////////////////////////////////
		//bonus
		$bouton_actifbonus = new XoopsFormRadioYN(_AM_USERPOINTS_BONUS_ON, 'actifbonus', $actifbonus, ' ' . _AM_USERPOINTS_ACTIVE . '', ' ' . _AM_USERPOINTS_NOACTIVE . '');
		$sform->addElement($bouton_actifbonus);
		/////////////////////////////////
        $button_tray = new XoopsFormElementTray('', '');
        $hidden = new XoopsFormHidden('op', 'save');
        $button_tray->addElement($hidden);
        $button_tray->addElement(new XoopsFormButton('', 'post', _AM_USERPOINTS_SAVE, 'submit'));
        $sform->addElement($button_tray);
        $sform->display();
        break;
		/////////////////////////////////
}
	echo "<br />";
	echo "
		<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_USERPOINTS_TITRE_AIDE_INDEXPAGE . "</legend>\n
		<div style='padding: 8px;'>" . _AM_USERPOINTS_AIDE_INDEXPAGE . "</div>\n
		</fieldset>\n
		";
/////////////////////////////////		
info();
xoops_cp_footer();

?>		
		
				
		
		
		
		
		
		
		
		
		
	