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

include("header.php");
include(XOOPS_ROOT_PATH."/header.php");
include (XOOPS_ROOT_PATH."/modules/userpoints/funcs.php");
/////////////////////////////////

$func = '';
$det = 0;

foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}
/////////////////////////////////

/////////////////////////////////
//Display the Point Totals (default action)
function displayPoints($details) {
	
/////////////////////////////////	
    global $toshow, $xoopsDB, $score, $xoopsConfig, $xoopsModuleConfig, $periodej;
	global  $actifnewbb, $actifxmovievotes, $actifweblinks, $actifweblinksvotes, $actifxmovie, $actifextgallery, $actifxcgal, $actifxcgalsvote, $actifsmartsection, $actifsmartfaq, $actifwordbook, $actifcomments, $actifdloads, $actifdloadsvotes,  $actifwfdloads, $actifwfdloadsvotes, $actiflinks, $actiflinksvotes, $actifwfsections, $actiffriends, $actifnewbbex, $actifnews, $actifbonus;
/////////////////////////////////

	if (empty($details)) $details = 0;

	echo "<table border='0' cellspacing='1' cellpadding ='3' align = center width = 100%>";
	echo "<tr><td>";
	echo "<center><h4>"._UP_THE." $toshow "._UP_TITLE." ".$xoopsConfig['sitename']."</h4>";

	echo "<center>"._UP_CLASS." ";
	echo formatTimeStamp($periodej,"m","".$xoopsConfig['server_TZ']."");
	echo "</center><p>";

	echo "<table border='0' cellspacing='1' cellpadding='2' class ='outer' width = 100%>";
	echo "<tr>";
	echo "<td align='center' class = 'itemHead'><b>"._UPNO."</b></td>";
	echo "<td align='center' class = 'itemHead'><b>"._UPUNAME."</b></td>";
/////////////////////////////////
	
	if ($details) {
		/*if ($actifuser)
			 echo "<td align='center' class = 'itemHead'><b>"._UPUSER."</b></td>";*/
		if ($actifnews)
			 echo "<td align='center' class = 'itemHead'><b>"._UPSTORIES."</b></td>";
		if ($actifsmartsection)
			 echo "<td align='center' class = 'itemHead'><b>"._UPSMARTSECTION."</b></td>";
		if ($actifwfsections)
			echo "<td align='center' class = 'itemHead'><b>"._UPWFSECTIONS."</b></td>";	
		if ($actifnewbbex)
			echo "<td align='center' class = 'itemHead'><b>"._UPPOSTS."</b></td>";			 
		if ($actifnewbb)
			echo "<td align='center' class = 'itemHead'><b>"._UPNEWBB."</b></td>";
		if ($actifsmartfaq)
			 echo "<td align='center' class = 'itemHead'><b>"._UPSMARTFAQ."</b></td>";
		 if ($actifwordbook)
			echo "<td align='center' class = 'itemHead'><b>"._UPWORDBOOK."</b></td>";
		 if ($actifxcgal)
			 echo "<td align='center' class = 'itemHead'><b>"._UPXCGAL."</b></td>";
		if ($actifxcgalsvote)
			 echo "<td align='center' class = 'itemHead'><b>"._UPXCGALVOTE."</b></td>";
		if ($actifextgallery)
			 echo "<td align='center' class = 'itemHead'><b>"._UPEXTGALLERY."</b></td>";
		if ($actifdloads)
			echo "<td align='center' class = 'itemHead'><b>"._UPDOWNLOADS."</b></td>";
		if ($actifdloadsvotes)
			echo "<td align='center' class = 'itemHead'><b>"._UPDLOADVOTES."</b></td>";	
		if ($actifwfdloads)
			echo "<td align='center' class = 'itemHead'><b>"._UPWFDOWNLOADS."</b></td>";
		if ($actifwfdloadsvotes)
			echo "<td align='center' class = 'itemHead'><b>"._UPWFDLOADVOTES."</b></td>";	
		if ($actiflinks)
			echo "<td align='center' class = 'itemHead'><b>"._UPLINKS."</b></td>";
		if ($actiflinksvotes)
			echo "<td align='center' class = 'itemHead'><b>"._UPLINKVOTES."</b></td>";
		if ($actifweblinks)
			 echo "<td align='center' class = 'itemHead'><b>"._UPWEBLINKS."</b></td>";
		if ($actifweblinksvotes)
			 echo "<td align='center' class = 'itemHead'><b>"._UPWEBLINKSVOTES."</b></td>"; 	 	 
		if ($actifxmovie)
			 echo "<td align='center' class = 'itemHead'><b>"._UPXMOVIE."</b></td>";
		if ($actifxmovievotes)
			 echo "<td align='center' class = 'itemHead'><b>"._UPXMOVIEV."</b></td>";	 
		if ($actifcomments)
			 echo "<td align='center' class = 'itemHead'><b>"._UPCOMMENTS."</b></td>";
		if ($actiffriends)
			echo "<td align='center' class = 'itemHead'><b>"._UPWFSVOTES."</b></td>";
		if ($actifbonus)
			echo "<td align='center' class = 'itemHead'><b>"._UPBONUS."</b></td>";
	}
/////////////////////////////////
	echo "<td align='center' class = 'itemHead'><b>"._UPPOINTS."</b></td>";
	echo "</tr>";
/////////////////////////////////		
	$query = $xoopsDB->query("SELECT uid,uname,news,smartsection,wfsections,newbbex,newbb,smartfaq,wordbook,xcgal,xcgalvote,extgallery,dloads,dloadsvotes,wfdloads,wfdloadsvotes,links,linksvotes,weblinks,weblinksvotes,xmovie,xmovievotes,comments,friends,bonus,points FROM ".$xoopsDB->prefix("user_points")." ORDER BY points DESC, uname ASC LIMIT $toshow");

	$rank = 1;
	while(list($uid,$uname,$news,$smartsection,$wfsections,$newbbex,$newbb,$smartfaq,$wordbook,$xcgal,$xcgalvote,$extgallery,$dloads,$dloadsvotes,$wfdloads,$wfdloadsvotes,$links,$linksvotes,$weblinks,$weblinksvotes,$xmovie,$xmovievotes,$comments,$friends,$bonus, $totalpnts) = $xoopsDB->fetchRow($query)) {
/////////////////////////////////	
	if ($totalpnts > 0) {
	echo "<tr>";
	echo "<td align='center' class = 'head'>$rank</td>";
	echo "<td align='center' class = 'even'><a href='../../userinfo.php?uid=$uid'>$uname</a></td>";

		if ($details) {
				/*if ($actifuser)
					echo "<td align='center' class = 'even' >$user</td>";*/
				if ($actifnews)
					echo "<td align='center' class = 'even' >$news</td>";
				if ($actifsmartsection)
					echo "<td align='center' class = 'even' >$smartsection</td>";	
				if ($actifwfsections)
					echo "<td align='center' class = 'even'>$wfsections</td>";	
				if ($actifnewbbex)
					echo "<td align='center' class = 'even'>$newbbex</td>";	
				if ($actifnewbb)
					echo "<td align='center' class = 'even'>$newbb</td>";
				if ($actifsmartfaq)
					echo "<td align='center' class = 'even' >$smartfaq</td>";
				if ($actifwordbook)
					echo "<td align='center' class = 'even' >$wordbook</td>";
				if ($actifxcgal)
					echo "<td align='center' class = 'even' >$xcgal</td>";
				if ($actifxcgalsvote)
					echo "<td align='center' class = 'even' >$xcgalvote</td>";
				if ($actifextgallery)
					echo "<td align='center' class = 'even' >$extgallery</td>";
				if ($actifdloads)
					echo "<td align='center' class = 'even'>$dloads</td>";
				if ($actifdloadsvotes)
					echo "<td align='center' class = 'even'>$dloadsvotes</td>";
					if ($actifwfdloads)
					echo "<td align='center' class = 'even'>$wfdloads</td>";
				if ($actifwfdloadsvotes)
					echo "<td align='center' class = 'even'>$wfdloadsvotes</td>";
				if ($actiflinks)
					echo "<td align='center' class = 'even'>$links</td>";
				if ($actiflinksvotes)
					echo "<td align='center' class = 'even'>$linksvotes</td>";
				if ($actifweblinks)
					echo "<td align='center' class = 'even'>$weblinks</td>";
				if ($actifweblinksvotes)
					echo "<td align='center' class = 'even'>$weblinksvotes</td>";
				if ($actifxmovie)
					echo "<td align='center' class = 'even' >$xmovie</td>";
				if ($actifxmovievotes)
					echo "<td align='center' class = 'even' >$xmovievotes</td>";		
				if ($actifcomments)
					echo "<td align='center' class = 'even'>$comments</td>";
				if ($actiffriends)
					echo "<td align='center' class = 'even'>$friends</td>";
				if ($actifbonus)
					echo "<td align='center' class = 'even'>$bonus</td>";
			}
			echo "<td align='center' class = 'even'><b>$totalpnts</b></td>";
			echo "</tr>";
			$rank++;
		}
	}
/////////////////////////////////
	echo "</table><br />";
/////////////////////////////////	
	echo "<center>[ <a href=index.php?det=";
	if ($details){
		echo "0>"._UPMOREOFF;
	}else{
		echo "1>"._UPMOREON;
	}
	echo "</a> ]</center><P>";
	echo "<br /><br />";
	echo "<b>"._UPEXLTITLE."</b><br />";
/////////////////////////////////
	/*if ($actifuser){
		echo _UPFOREACH_USER." $score[user] ";
		pointshow($score[user]);
	}*/
	if ($actifnews){
		echo _UPFOREACH_STORY." $score[news] ";
		pointshow($score[news]);
	}
	if ($actifsmartsection){
		echo _UPFOREACH_SMARTSECTION." $score[smartsection] ";
		pointshow($score[smartsection]);
	}
	if ($actifwfsections){
		echo _UPFOREACH_WFSECTIONS." $score[wfsections]";
		pointshow($score[wfsections]);
	}
	if ($actifnewbbex) {
		echo _UPFOREACH_POSTS." $score[newbbex]";
		pointshow($score[newbbex]);
	}
	if ($actifnewbb){
		echo _UPFOREACH_NEWBB." $score[newbb]";
		pointshow($score[newbb]);
	}
	if ($actifsmartfaq){
		echo _UPFOREACH_SMARTFAQ." $score[smartfaq] ";
		pointshow($score[smartfaq]);
	}
	if ($actifwordbook){
		echo _UPFOREACH_WORDBOOK." $score[wordbook] ";
		pointshow($score[wordbook]);
	}
	if ($actifxcgal){
		echo _UPFOREACH_XCGAL." $score[xcgal] ";
		pointshow($score[xcgal]);
	}
	if ($actifxcgalsvote){
		echo _UPFOREACH_XCGALVOTE." $score[xcgalvote] ";
		pointshow($score[xcgalvote]);
	}
	if ($actifextgallery){
		echo _UPFOREACH_EXTGALLERY." $score[extgallery] ";
		pointshow($score[extgallery]);
	}
	if ($actifdloads) {
		echo _UPFOREACH_DOWNLOADS." $score[dloads] ";
		pointshow($score[dloads]);
	}
	if ($actifdloadsvotes) {
		echo _UPFOREACH_DLOADVOTES." $score[dloadsvotes]";
		pointshow($score[dloadsvotes]);
	}
	if ($actifwfdloads) {
		echo _UPFOREACH_WFDOWNLOADS." $score[wfdloads] ";
		pointshow($score[wfdloads]);
	}
	if ($actifwfdloadsvotes) {
		echo _UPFOREACH_WFDLOADVOTES." $score[wfdloadsvotes]";
		pointshow($score[wfdloadsvotes]);
	}
	if ($actiflinks) {
		echo _UPFOREACH_LINKS." $score[links]";
		pointshow($score[links]);
	}
	if ($actiflinksvotes) {
		echo _UPFOREACH_LINKVOTES." $score[linksvotes]";
		pointshow($score[linksvotes]);
	}
	if ($actifweblinks){
		echo _UPFOREACH_WEBLINKS." $score[weblinks]";
		pointshow($score[weblinks]);
	}
	if ($actifweblinksvotes){
		echo _UPFOREACH_WEBLINKSVOTES." $score[weblinksvotes]";
		pointshow($score[weblinksvotes]);
	}
	if ($actifxmovie){
		echo _UPFOREACH_XMOVIE." $score[xmovie] ";
		pointshow($score[xmovie]);
	}
	if ($actifxmovievotes){
		echo _UPFOREACH_XMOVIEV." $score[xmovievotes] ";
		pointshow($score[xmovievotes]);
	}
	if ($actifcomments){
		echo _UPFOREACH_COMMENTS." $score[comments]";
		pointshow($score[comments]);
	}
	if ($actiffriends){
		echo _UPFOREACH_WFSVOTES." $score[friends]";
		pointshow($score[friends]);
	}
	
/////////////////////////////////
		
	echo "</td></tr></table>";
	echo "<br />";
}

/////////////////////////////////
// Update the Users Scores (refresh table)

function updatePoints() {
	global $xoopsDB,  $xoopsModuleConfig, $score, $bonus;
	global $actifxcgalsvote, $actifnewbb, $actifxmovie, $actifxmovievotes, $actifextgallery, $actifxcgal, $actifcomments, $actifwordbook, $actifsmartsection, $actifsmartfaq, $actifdloads, $actifdloadsvotes, $actifwfdloads, $actifwfdloadsvotes, $actiflinks, $actiflinksvotes, $actifweblinks, $actifweblinksvotes, $actifwfsections, $actiffriends, $actifnewbbex, $actifnews, $actifbonus;
	
	$uname = '';
	$countwebm = 1;
//Timer look for
	$query = $xoopsDB->query("SELECT uname FROM ".$xoopsDB->prefix("user_points")." WHERE uid='-1'");
	list($numrows) = $xoopsDB->fetchRow($query);

	if (!$numrows) {
// Timer entry not yet entered, update table
		/*$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("user_points")." (uid, uname, user, news, smartsection, wfsections, newbbex, newbb, smartfaq, wordbook, xcgal, xcgalvote, extgallery, dloads,  dloadvotes,  links,  linksvotes, weblinks, weblinksvotes, xmovie, xmovievotes, comments, friends, bonus, points ) VALUES ('-1', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')");*/
		$uname = '';
	} else {
// Entry found, prep for check
		$uname = $numrows;
	}
	
	if ($uname == '') {
		$uname = 0;
	}
	
	if (time() - $uname) {
// Timer expired, update table
		$uname = time();
		$xoopsDB->queryF("UPDATE ".$xoopsDB->prefix("user_points")." SET uname='$uname'  WHERE uid='-1'");

// Prep to calculate user points
		if ($countwebm == 0) {
			$query = $xoopsDB->query("SELECT uid, uname FROM ".$xoopsDB->prefix("users")." WHERE rank='0' ORDER BY uid");
		} else {
			$query = $xoopsDB->query("SELECT uid, uname FROM ".$xoopsDB->prefix("users")." ORDER BY uid");
		}
		while(list($uids, $uname) =$xoopsDB->fetchRow($query)) {
		
/////////////////////////////////
// Calculate User Points
			$points = 0;

				/*if ($actifuser){
					$count['user'] = tabUser($uids);
					$points = $points + ($count['user'] * $score['user']);
				} else {
				
					$count['user'] = 0;
				}*/
				if ($actifnews){
					$count['news'] = tabNews($uids);
					$points = $points + ($count['news'] * $score['news']);
				} else {
				
					$count['news'] = 0;
				}
				if ($actifsmartsection){
					$count['smartsection'] = tabSmartsection($uids);
					$points = $points + ($count['smartsection'] * $score['smartsection']);
				} else {
				
					$count['smartsection'] = 0;
				}
				if ($actifwfsections){
					$count['wfsections'] = tabWfsections($uids);
					$points = $points +  $count['wfsections'] * $score['wfsections'];
				} else {
					$count['wfsections'] = 0;
				}
				if ($actifnewbbex) {
					$count['newbbex'] = tabNewbbex($uids);
					$points = $points +  $count['newbbex'] * $score['newbbex'];
				} else {
					$count['newbbex'] = 0;
				}
				if ($actifnewbb) {
					$count['newbb'] = tabNewbb($uids);
					$points = $points +  $count['newbb'] * $score['newbb'];
				} else {
					$count['newbb'] = 0;
				}
				if ($actifsmartfaq){
					$count['smartfaq'] = tabSmartfaq($uids);
					$points = $points + ($count['smartfaq'] * $score['smartfaq']);
				} else {
				
					$count['smartfaq'] = 0;
				}
				if ($actifwordbook){
					$count['wordbook'] = tabWordbook($uids);
					$points = $points + ($count['wordbook'] * $score['wordbook']);
				} else {
				
					$count['wordbook'] = 0;
				}
				if ($actifxcgal){
					$count['xcgal'] = tabXcgal($uids);
					$points = $points + ($count['xcgal'] * $score['xcgal']);
				} else {
				
					$count['xcgal'] = 0;
				}
				if ($actifxcgalsvote){
					$count['xcgalvote'] = tabXcgalvote($uids);
					$points = $points + ($count['xcgalvote'] * $score['xcgalvote']);
				} else {
				
					$count['xcgalvote'] = 0;
				}
				if ($actifextgallery){
					$count['extgallery'] = tabExtgallery($uids);
					$points = $points + ($count['extgallery'] * $score['extgallery']);
				} else {
				
					$count['extgallery'] = 0;
				}
				if ($actifdloads) {
					$count['dloads'] = tabDownloads($uids);
					$points = $points + ($count['dloads'] * $score['dloads']);
				} else {
					$count['dloads'] = 0;
				}
				if ($actifdloadsvotes) {
					$count['dloadsvotes'] = tabDloadsvotes($uids);
					$points = $points + $count['dloadsvotes'] * $score['dloadsvotes'];
				} else {
					$count['dloadsvotes'] = 0;
				}
				
			
				if ($actifwfdloads) {
					$count['wfdloads'] = tabWfdownloads($uids);
					$points = $points + ($count['wfdloads'] * $score['wfdloads']);
				} else {
					$count['wfdloads'] = 0;
				}
				if ($actifwfdloadsvotes) {
					$count['wfdloadsvotes'] = tabWfdloadsvotes($uids);
					$points = $points + $count['wfdloadsvotes'] * $score['wfdloadsvotes'];
				} else {
					$count['wfdloadsvotes'] = 0;
				}
				
				if ($actiflinks) {
					$count['links'] = tabLinks($uids);
					$points = $points +  $count['links'] * $score['links'];
				} else {
					$count['links'] = 0;
				}
				if ($actiflinksvotes) {
					$count['linksvotes'] = tabLinksvotes($uids);
					$points = $points +  $count['linksvotes'] * $score['linksvotes'];
				} else {
					$count['linksvotes'] = 0;
				}
				if ($actifweblinks){
					$count['weblinks'] = tabWeblinks($uids);
					$points = $points +  $count['weblinks'] * $score['weblinks'];
				} else {
					$count['weblinks'] = 0;
				}
				if ($actifweblinksvotes){
					$count['weblinksvotes'] = tabWeblinksvotes($uids);
					$points = $points +  $count['weblinksvotes'] * $score['weblinksvotes'];
				} else {
					$count['weblinksvotes'] = 0;
				}
				if ($actifxmovie){
					$count['xmovie'] = tabXmovie($uids);
					$points = $points + ($count['xmovie'] * $score['xmovie']);
				} else {
				
					$count['xmovie'] = 0;
				}
				if ($actifxmovievotes){
					$count['xmovievotes'] = tabXmovievotes($uids);
					$points = $points + ($count['xmovievotes'] * $score['xmovievotes']);
				} else {
				
					$count['xmovievotes'] = 0;
				}
				if ($actifcomments){
					$count['comments'] = tabComments($uids);
					$points = $points + ($count['comments'] * $score['comments']);
				} else {
					$count['comments'] = 0;
				}
				if ($actiffriends){
					$count['friends'] = tabTellFriends($uids);
					$points = $points +  $count['friends'] * $score['friends'];
				} else {
					$count['friends'] = 0;
				}
				
				if ($actifbonus) {
					$count['bonus'] = tabBonus($uids);
					$points = $points +  $count['bonus'];
				} else {
					$count['bonus'] = 0;
				}
/////////////////////////////////
		
		if ($points > 0) {
			$query2 = $xoopsDB->query("SELECT uid FROM ".$xoopsDB->prefix("user_points")." WHERE uid='$uids'");
			$result2 = $xoopsDB->getRowsNum($query2);
			if ($result2) {
					$xoopsDB->queryF("UPDATE ".$xoopsDB->prefix("user_points")." SET  news='$count[news]', smartsection='$count[smartsection]', wfsections='$count[wfsections]', newbbex='$count[newbbex]', newbb='$count[newbb]', smartfaq='$count[smartfaq]', wordbook='$count[wordbook]', xcgal='$count[xcgal]', xcgalvote='$count[xcgalvote]',    extgallery='$count[extgallery]', dloads='$count[dloads]', dloadsvotes='$count[dloadsvotes]', wfdloads='$count[wfdloads]', wfdloadsvotes='$count[wfdloadsvotes]', links='$count[links]', linksvotes='$count[linksvotes]', weblinks='$count[weblinks]', weblinksvotes='$count[weblinksvotes]', xmovie='$count[xmovie]', xmovievotes='$count[xmovievotes]', comments='$count[comments]', friends='$count[friends]', bonus='$count[bonus]', points='$points' WHERE uid='$uids'");
				} else {
					$xoopsDB->queryF("INSERT INTO ".$xoopsDB->prefix("user_points")." (uid, uname, news, smartsection, wfsections, newbbex, newbb, smartfaq, wordbook, xcgal, xcgalvote, extgallery, dloads, dloadsvotes, wfdloads, wfdloadsvotes, links, linksvotes, weblinks, weblinksvotes, xmovie, xmovievotes, comments, friends, bonus, points)  VALUES ('$uids', '$uname', '$count[news]', '$count[smartsection]', '$count[wfsections]', '$count[newbbex]', '$count[newbb]', '$count[smartfaq]', '$count[wordbook]', '$count[xcgal]', '$count[xcgalvote]', '$count[extgallery]', '$count[dloads]', '$count[dloadsvotes]', '$count[wfdloads]', '$count[wfdloadsvotes]', '$count[links]', '$count[linksvotes]', '$count[weblinks]', '$count[weblinksvotes]', '$count[xmovie]', '$count[xmovievotes]', '$count[comments]', '$count[friends]', '$count[bonus]', '$points')");
				}
			}
		
		}
	}
}
/////////////////////////////////
updatePoints();
switch($func) {

    default:
		displayPoints($det);
	break;

}
/////////////////////////////////
include(XOOPS_ROOT_PATH."/footer.php");
?>