<?
if ($_POST['key'] == "�����ڵ�") {
	$conn = mysql_connect("localhost","wizoneday","wiz0822","wizoneday");
	mysql_select_db("wizoneday", $conn);

	if($_POST['testmode'] == 1){
		$result = mysql_query("select count(*) as cnt from wiz_feed");// ���� �׽�Ʈ�� , �޴� ��� �� �� ���� (���� �߼ۿ� ������ �������� ���� �ۼ����ּ���)
		if($result){
			$data = mysql_fetch_array($result, MYSQL_ASSOC);
			echo $data['cnt'];
		}
	}else{
		$result = mysql_query("select feed_email from wiz_feed"); // ���� �߼ۿ� ����
		if($result){
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				echo $row["feed_email"];
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