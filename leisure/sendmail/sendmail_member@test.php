<?
//if ($_POST['key'] == "cf829f613e2225a2acd4") {
	$conn = mysql_connect("localhost","u50i50","u50i501379","u50i50");
	mysql_select_db("u50i50", $conn);

	if($_POST['testmode'] == 1){
		$result = mysql_query("select count(*) as cnt from wiz_member");// ���� �׽�Ʈ�� , �޴� ��� �� �� ���� (���� �߼ۿ� ������ �������� ���� �ۼ����ּ���)
		if($result){
			$data = mysql_fetch_array($result, MYSQL_ASSOC);
			echo $data['cnt'];
		}
	}else{
		$result = mysql_query("select name, email, hphone from wiz_member where reemail='Y'"); // ���� �߼ۿ� ����
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