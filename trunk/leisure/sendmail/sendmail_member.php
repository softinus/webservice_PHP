<?
if ($_POST['key'] == "�����ڵ�") {
	$conn = mysql_connect("localhost","wizoneday","wiz0822","wizoneday");
	mysql_select_db("wizoneday", $conn);

	if($_POST['testmode'] == 1){
		$result = mysql_query("select count(*) as cnt from wiz_member where reemail='Y'");// ���� �׽�Ʈ�� , �޴� ��� �� �� ���� (���� �߼ۿ� ������ �������� ���� �ۼ����ּ���)
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
}else{
	exit;
}
?>