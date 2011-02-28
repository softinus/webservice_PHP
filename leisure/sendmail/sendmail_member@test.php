<?
//if ($_POST['key'] == "cf829f613e2225a2acd4") {
	$conn = mysql_connect("localhost","u50i50","u50i501379","u50i50");
	mysql_select_db("u50i50", $conn);

	if($_POST['testmode'] == 1){
		$result = mysql_query("select count(*) as cnt from wiz_member");// 연동 테스트용 , 받는 사람 총 수 쿼리 (실제 발송용 쿼리와 조건절을 같게 작성해주세요)
		if($result){
			$data = mysql_fetch_array($result, MYSQL_ASSOC);
			echo $data['cnt'];
		}
	}else{
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
/*}else{
	exit;
}*/
?>