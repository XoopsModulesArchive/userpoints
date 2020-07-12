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

////
global $score, $toshow, $periodej, $xoopsDB, $xoopsModuleConfig;
/////////////////////////////////////
       
        $result = $xoopsDB->query("SELECT actifnews, poinnews, actifsmartsection, poinsmartsection,  actifwfsections, poinwfsections, actifnewbbex, poinnewbbex, actifnewbb, poinnewbb, actifsmartfaq, poinsmartfaq, actifwordbook, poinwordbook, actifxcgal, poinxcgal, actifxcgalvote, poinxcgalvote, actifextgallery, poinextgallery, actifdloads, poindloads, actifdloadsvotes, poindloadsvotes, actifwfdloads, poinwfdloads, actifwfdloadsvotes, poinwfdloadsvotes, actiflinks, poinlinks, actiflinksvotes, poinlinksvotes, actifweblinks, poinweblinks, actifweblinksvotes, poinweblinksvotes, actifxmovie, poinxmovie, actifxmovievotes, poinxmovievotes,  actifcomments, poincomments, actiffriends, poinfriends, actifbonus FROM " . $xoopsDB->prefix('user_points_config') . " ");
        list($actifnews, $poinnews, $actifsmartsection, $poinsmartsection, $actifwfsections, $poinwfsections, $actifnewbbex, $poinnewbbex, $actifnewbb, $poinnewbb, $actifsmartfaq, $poinsmartfaq, $actifwordbook, $poinwordbook, $actifxcgal, $poinxcgal, $actifxcgalvote, $poinxcgalvote, $actifextgallery, $poinextgallery, $actifdloads, $poindloads, $actifdloadsvotes, $poindloadsvotes, $actifwfdloads, $poinwfdloads, $actifwfdloadsvotes, $poinwfdloadsvotes, $actiflinks, $poinlinks, $actiflinksvotes, $poinlinksvotes, $actifweblinks, $poinweblinks, $actifweblinksvotes, $poinweblinksvotes, $actifxmovie, $poinxmovie, $actifxmovievotes, $poinxmovievotes, $actifcomments, $poincomments, $actiffriends, $poinfriends, $actifbonus) = $xoopsDB->fetchrow($result);
		


/////////////////////////////////
$toshow = $xoopsModuleConfig['list_member'];
$periodej = mktime(00,00,00,$xoopsModuleConfig['mois'],$xoopsModuleConfig['jours'],$xoopsModuleConfig['annees']);
/////////////////////////////////

// Setup activity scoring system (what each action is worth)
$score = array(
	/*"user" => $poinuser,	                // for every Enregistrement d'un membre*/
	"news" => $poinnews,				    // for every News
	"smartsection" => $poinsmartsection,	// for every Smartsection 
	"wfsections" => $poinwfsections,		// for Wfsections
	"newbbex" => $poinnewbbex,				// for Forum Newbbex
	"newbb" => $poinnewbb,	    		    // for every Newbb
	"smartfaq" => $poinsmartfaq,			// for every SmartFaq
	"wordbook" => $poinwordbook,			// for every Wordbook
	"xcgal" => $poinxcgal,	                // for every Xcgal
	"xcgalvote" => $poinxcgalsvote,			// for every Xcgalvote
	"extgallery" => $poinextgallery,	    // for every Extgallery
	"dloads" => $poindloads,			    // for Submited MyDownloads
	"dloadsvotes" => $poindloadsvotes,		// for votes on MyDownloads
	"wfdloads" => $poinwfdloads,			// for Submited WfDownloads
	"wfdloadsvotes" => $poinwfdloadsvotes,  // for votes on WfDownloads
	"links" => $poinlinks,					// for Web Links
	"linksvotes" => $poinlinksvotes,		// for votes on Links
	"weblinks" => $poinweblinks,			// for Weblinks
	"weblinksvotes" => $poinweblinksvotes,  // for vote on Weblinks
	"xmovie" => $poinxmovie,	    		// for every Xmovie
	"xmovievotes" => $poinxmovievotes,	    // for every Xmovievote
	"comments" => $poincomments, 			// for Story Comments
	"friends" => $poinfriends, 			    // for Tell a friends
);
/////////////////////////////////

/////////////////////////////////
// Setup which activities we will be scoring - Calculate score = 1, ignore = 0
$calc = array(
	/*"user" => $actifuser,                   // for every Enregistrement d'un membre*/
	"news" => $actifnews,				    // for every News
	"smartsection" => $actifsmartsection,	// for every Smartsection 
	"wfsections" => $actifwfsections,		// for Wfsections
	"newbbex" => $actifnewbbex,				// for Forum Newbex
	"newbb" => $actifnewbb,	    		    // for every Newbb
	"smartfaq" => $actifsmartfaq,			// for every SmartFaq
	"wordbook" => $actifwordbook,			// for every Wordbook
	"xcgal" => $actifxcgal,	                // for every Xcgal
	"xcgalvote" => $actifxcgalsvote,		// for every Xcgalvote
	"extgallery" => $actifextgallery,	    // for every Extgallery
	"dloads" => $actifdloads,			    // for Submited MyDownloads
	"dloadsvotes" => $actifdloadsvotes,		// for votes on MyDownloads
	"wfdloads" => $actifwfdloads,			// for Submited WfDownloads
	"wfdloadsvotes" => $actifwfdloadsvotes, // for votes on WfDownloads
	"links" => $actiflinks,					// for  myLinks
	"linksvotes" => $actiflinksvotes,		// for votes on myLinks
	"weblinks" => $actifweblinks,			// for Weblinks
	"weblinksvotes" => $actifweblinksvotes, // for vote on Weblinks
	"xmovie" => $actifxmovie,	    		// for every Xmovie
	"xmovievotes" => $actifxmovievotes,	    // for every Xmovievote
	"comments" => $actifcomments, 			// for Story Comments
	"friends" => $actiffriends, 			// for Tell a friends

);
//	End Configuration Section
/////////////////////////////////

/////////////////////////////////
function tabBonus($uids) {
	global $xoopsDB, $periodej;
	list($poits) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  SUM(bonus)  FROM ".$xoopsDB->prefix("user_points_bonus")." WHERE uid='$uids'"));
	$abacus = $poits;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
/*function tabUser($uids) {
	global $xoopsDB, $periodej;
	list($us) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("users")." WHERE uid='$uids'"));
	// AND user_regdate > '$periodej'
	$abacus = $us;
	return $abacus;
}*/
/////////////////////////////////

/////////////////////////////////
function tabNewbb($uids) {
	global $xoopsDB, $periodej;
	list($bb) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("bb_posts")." WHERE uid='$uids' AND post_time > '$periodej'"));
	$abacus = $bb;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabXmovie($uids) {
	global $xoopsDB, $periodej;
	list($xmo) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("x_movie")." WHERE submitter='$uids' AND date > '$periodej'"));
	$abacus = $xmo;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabXmovievotes($uids) {
	global $xoopsDB, $periodej;
	list($xmov) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("x_movie_votedata")." WHERE ratinguser='$uids' AND ratingtimestamp > '$periodej'"));
	$abacus = $xmov;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabXcgal($uids) {
	global $xoopsDB, $periodej;
	list($gal) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("xcgal_pictures")." WHERE owner_id='$uids' AND mtime > '$periodej'"));
	$abacus = $gal;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabExtgallery($uids) {
	global $xoopsDB, $periodej;
	list($gale) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("extgallery_publicphoto")." WHERE photo_id='$uids' AND photo_date > '$periodej'"));
	$abacus = $gale;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabXcgalvote($uids) {
	global $xoopsDB, $periodej;
	list($galvote) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("xcgal_votes")." WHERE v_uid='$uids' AND vote_time > '$periodej'"));
	$abacus = $galvote;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabSmartsection($uids) {
	global $xoopsDB, $periodej;
	list($section) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("smartsection_items")." WHERE uid='$uids' AND datesub > '$periodej'"));
	$abacus = $section;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabSmartfaq($uids) {
	global $xoopsDB, $periodej;
	list($faq) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("smartfaq_answers")." WHERE uid='$uids' AND datesub > '$periodej'"));
	$abacus = $faq;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabWordbook($uids) {
	global $xoopsDB, $periodej;
	list($entries) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("wbentries")." WHERE uid='$uids' AND datesub > '$periodej'"));
	$abacus = $entries;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabNews($uids) {
	global $xoopsDB, $periodej;
	list($comst) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("stories")." WHERE (uid='$uids' AND published > '$periodej') AND published > '0'"));
	$abacus = $comst;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabComments($uids) {
	global $xoopsDB, $periodej;
	list($comb) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("xoopscomments")." WHERE com_uid='$uids' AND com_created > '$periodej'"));
	$abacus = $comb;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabNewbbex($uids) {
	global $xoopsDB, $periodej;
	list($posts) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("bbex_posts")." WHERE uid='$uids' AND post_time > '$periodej'"));
	$abacus = $posts;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabDownloads($uids) {
	global $xoopsDB, $periodej;
	list($don) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("mydownloads_downloads")." WHERE submitter ='$uids' AND date > '$periodej'"));
	$abacus = $don;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabDloadsvotes($uids) {
	global $xoopsDB, $periodej;
	list($dono) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("mydownloads_votedata")." WHERE ratinguser ='$uids' AND ratingtimestamp > '$periodej'"));
	$abacus = $dono;
	return $abacus;
}
/////////////////////////////////

function tabWfdownloads($uids) {
	global $xoopsDB, $periodej;
	list($wfdon) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("wfdownloads_downloads")." WHERE submitter ='$uids' AND date > '$periodej'"));
	$abacus = $wfdon;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabWfdloadsvotes($uids) {
	global $xoopsDB, $periodej;
	list($wfdonov) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("wfdownloads_votedata")." WHERE ratinguser ='$uids' AND ratingtimestamp > '$periodej'"));
	$abacus = $wfdonov;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabLinks($uids) {
	global $xoopsDB, $periodej;
	list($lien) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("mylinks_links")." WHERE (submitter ='$uids' AND date > '$periodej')  AND status > '0'"));
	$abacus = $lien;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabLinksvotes($uids) {
	global $xoopsDB, $periodej;
	list($lienv) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("mylinks_votedata")." WHERE ratinguser ='$uids' AND ratingtimestamp > '$periodej'"));
	$abacus = $lienv;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabWeblinks($uids) {
	global $xoopsDB, $periodej;
	list($liens1) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("weblinks_link")." WHERE uid='$uids' AND time_create > '$periodej'"));
	$abacus = $liens1;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabWeblinksvotes($uids) {
	global $xoopsDB, $periodej;
	list($liens1v) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("weblinks_votedata")." WHERE ratinguser='$uids' AND ratingtimestamp  > '$periodej'"));
	$abacus = $liens1v;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabWfsections($uids) {
	global $xoopsDB, $periodej;
	list($tuts) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("wfs_article")." WHERE uid ='$uids' AND (published > 0 AND published <= ".time().") AND noshowart = 0 AND offline = '0' AND (expired = 0 OR expired > $periodej)" ));
	$abacus = $tuts;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function tabTellFriends($uids) {
	global $xoopsDB, $periodej;
	list($tutsV) = $xoopsDB->fetchRow($xoopsDB->query("SELECT  COUNT(*)  FROM ".$xoopsDB->prefix("tellafriend_log")." WHERE uid ='$uids' AND  timestamp > '$periodej'"));
	$abacus = $tutsV;
	return $abacus;
}
/////////////////////////////////

/////////////////////////////////
function pointshow($thispoint) {
if ($thispoint >1 ){
			echo ""._UPPOINTS2."<br />";
		}else{
			echo ""._UPPOINTS1."<br />";
		}
}
/////////////////////////////////



?>