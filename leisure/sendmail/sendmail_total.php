<?
if ($_POST['key'] == "인증코드") {
	$conn = mysql_connect("localhost","wizoneday","wiz0822","wizoneday");
	mysql_select_db("wizoneday", $conn);

	if($_POST['testmode'] == 1){
		$result = mysql_query("select count(*) as cnt from wiz_feed");// 연동 테스트용 , 받는 사람 총 수 쿼리 (실제 발송용 쿼리와 조건절을 같게 작성해주세요)
		if($result){
			$data = mysql_fetch_array($result, MYSQL_ASSOC);
			$cnt1 = $data['cnt'];
		}
		$result = mysql_query("select count(*) as cnt from wiz_member where reemail='Y'");// 연동 테스트용 , 받는 사람 총 수 쿼리 (실제 발송용 쿼리와 조건절을 같게 작성해주세요)
		if($result){
			$data = mysql_fetch_array($result, MYSQL_ASSOC);
			$cnt2 = $data['cnt'];
		}
		echo $cnt1+$cnt2;
	}else{
		$result = mysql_query("select feed_email from wiz_feed"); // 실제 발송용 쿼리
		if($result){
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				echo $row["feed_email"];
				echo "\n";
			}
		}
		mysql_free_result($result);
		$result = mysql_query("select name, email, hphone from wiz_member where reemail='Y'"); // 실제 발송용 쿼리
		if($result){
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				echo $row["name"].",".$row["email"].",".$row['hphone'];
				echo "\n";
			}
		}
		mysql_free_result($result);
	}
	mysql_close($conn);
}else{
	exit;
}
?>