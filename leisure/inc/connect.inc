<?

// 로봇 체크
function check_robots() {
	$robots = array('1Noonbot', 'Accoona-AI-Agent', 'Allblog.net', 'Baiduspider', 'Blogbeat', 'Crawler', 'DigExt', 'DrecomBot', 'Exabot', 'FeedChecker', 'FeedFetcher', 'Gigabot', 'Googlebot', 'HMSE_Robot', 'IP*Works!', 'IRLbot', 'Jigsaw', 'LWP::Simple', 'Labrador', 'MJ12bot', 'Mirror Checking', 'Missigua Locator', 'NG/2.0', 'NaverBot', 'NutchCVS', 'PEAR HTTP_Request', 'PostFavorites', 'SBIder', 'W3C_Validator', 'WISEbot', 'Y!J-BSC', 'Yahoo! Slurp', 'ZyBorg', 'archiver', 'carleson', 'cfetch', 'compatible; Eolin', 'favicon', 'feedfinder', 'findlinks', 'genieBot', 'ichiro', 'kinjabot', 'larbin', 'lwp-trivial', 'msnbot', 'psbot', 'sogou', 'urllib/1.15', 'voyager');
	foreach($robots as $robot)
		if(strpos($_SERVER['HTTP_USER_AGENT'], $robot) !== false)
			return false;
	return true;
}

if(strlen($HTTP_COOKIE_VARS["wiz_connect"])==0 && check_robots()){
   setcookie("wiz_connect", "true");

	// 접속시간 저장
   $time = date('YmdH');
   $sql = "select time from wiz_contime where time = '$time'";
   $result = @mysql_query($sql);

   if(@mysql_num_rows($result) > 0){

   	$sql = "update wiz_contime set cnt = cnt + 1 where time = '$time'";
   	$result = @mysql_query($sql);

	}else{

		$sql = "insert into wiz_contime(time,cnt) values('$time',1)";
   	$result = @mysql_query($sql);

	}

	// 접속레퍼러 저장
	$referer = $_SERVER['HTTP_REFERER'];
	$parse_url = parse_url($referer);
	$host = $parse_url[host];

	// 현재 host와 다른 경우 저장
	if(strcmp($host, $_SERVER['HTTP_HOST'])) {

	   $sql = "select referer from wiz_conrefer where referer = '$referer'";
	   $result = @mysql_query($sql);

	   if(@mysql_num_rows($result) > 0){

	   	$sql = "update wiz_conrefer set cnt = cnt + 1 where referer = '$referer'";
	   	$result = @mysql_query($sql);

		}else{

			$sql = "insert into wiz_conrefer(referer,host,cnt) values('$referer','$host',1)";
	   	$result = @mysql_query($sql);

		}

	}

}
?>