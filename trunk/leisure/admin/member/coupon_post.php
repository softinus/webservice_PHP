<?
include "../../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../../inc/util.inc"; 		   		// ��ƿ ���̺귯��

//if($wiz_session[id] == "") error("�α����� �̿��ϼ���.");

/*
// ��ǰ����
if($prdcode != ""){
	// ��ǰ����
	$sql = "select * from wiz_product where prdcode='$prdcode'";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);
	$prd_info = mysql_fetch_object($result);

	if($total <= 0) error("��ǰ������ �����ϴ�.");
	$today = date('Y-m-d');

	if($prd_info->coupon_sdate <= $today && $prd_info->coupon_edate >= $today) {
		// �������
		if($prd_info->coupon_limit == "N" || ($prd_info->coupon_limit == "" && $prd_info->coupon_amount > 0)){
			$coupon_name = $prd_info->prdname;
			$memid = $wiz_session[id];
			$coupon_use = "N";
			$coupon_dis = $prd_info->coupon_dis;
			$coupon_type = $prd_info->coupon_type;
			$coupon_sdate = $prd_info->coupon_sdate;
			$coupon_edate = $prd_info->coupon_edate;

			$sql = "select idx from wiz_mycoupon where memid='$memid' and prdcode='$prdcode' and coupon_use != 'Y' and coupon_sdate <= '$today' and coupon_edate >= '$today'";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			if($total > 0) error("�̹� �߱޵� �����Դϴ�.");

			$sql = "insert into wiz_mycoupon(idx,memid,prdcode,coupon_name,coupon_dis,coupon_type,coupon_sdate,coupon_edate,coupon_use,wdate)values('','$memid','$prdcode','$coupon_name','$coupon_dis','$coupon_type','$coupon_sdate','$coupon_edate','$coupon_use',now())";
			mysql_query($sql) or error("�������� �ٿ�� ������ �߻��Ͽ����ϴ�.\\n\\n�����ڿ��� �����ϼ���.");
		}

		if($prd_info->coupon_limit != "N"){
			$sql = "update wiz_product set coupon_amount = coupon_amount - 1 where prdcode='$prdcode'";
			mysql_query($sql) or error(mysql_error());
		}
		comalert("���������� �߱޵Ǿ����ϴ�.");
	} else {
		alert("���Ⱓ�� ���� �����Դϴ�.");
	}

// �̺�Ʈ ����
}else{
*/
// ��������
$idx = $_POST["idx"];
$id = $_POST["seluser"];
$arrUserId = explode(",",$id);


$sql = "select * from wiz_coupon where idx='$idx'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$coupon_info = mysql_fetch_object($result);

if($total <= 0) error("���������� �����ϴ�.");
if($coupon_info->coupon_sdate <= date('Y-m-d') && $coupon_info->coupon_edate >= date('Y-m-d')) {
// �������
	if($coupon_info->coupon_limit == "N" || ($coupon_info->coupon_limit == "" && $coupon_info->coupon_amount > 0)){

		$coupon_name = $coupon_info->coupon_name;
		$memid = $wiz_session[id];
		$coupon_use = "N";
		$coupon_dis = $coupon_info->coupon_dis;
		$coupon_type = $coupon_info->coupon_type;
		$coupon_sdate = $coupon_info->coupon_sdate;
		$coupon_edate = $coupon_info->coupon_edate;


		for($i=0; $i<count($arrUserId); $i++){
			$sql = "select idx from wiz_mycoupon where memid='$arrUserId[$i]' and eventidx='$idx' and coupon_use != 'Y' and coupon_sdate <= curdate() and coupon_edate >= curdate()";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			if($total == 0) {
				$sql = "delete from wiz_mycoupon where memid = '$arrUserId[$i]' and eventidx='$idx' and coupon_use != 'Y'";
				mysql_query($sql) or error(mysql_error());
				$sql = "insert into wiz_mycoupon(idx,memid,eventidx,coupon_name,coupon_dis,coupon_type,coupon_sdate,coupon_edate,coupon_use,wdate) values('','$arrUserId[$i]','$idx','$coupon_name','$coupon_dis','$coupon_type','$coupon_sdate','$coupon_edate','$coupon_use',now())";
				mysql_query($sql) or error("�������� �ٿ�� ������ �߻��Ͽ����ϴ�.\\n\\n�����ڿ��� �����ϼ���.");
			}
		}
/*
		$sql = "select idx from wiz_mycoupon where memid='$memid' and eventidx='$eventidx' and coupon_use != 'Y' and coupon_sdate <= curdate() and coupon_edate >= curdate()";
		$result = mysql_query($sql) or error(mysql_error());
		$total = mysql_num_rows($result);

		if($total > 0) error("�̹� �߱޵� �����Դϴ�.");

		$sql = "delete from wiz_mycoupon where memid = '$memid' and eventidx='$eventidx' and coupon_use != 'Y'";
		mysql_query($sql) or error(mysql_error());

		$sql = "insert into wiz_mycoupon(idx,memid,eventidx,coupon_name,coupon_dis,coupon_type,coupon_sdate,coupon_edate,coupon_use,wdate) values('','$memid','$eventidx','$coupon_name','$coupon_dis','$coupon_type','$coupon_sdate','$coupon_edate','$coupon_use',now())";
		mysql_query($sql) or error("�������� �ٿ�� ������ �߻��Ͽ����ϴ�.\\n\\n�����ڿ��� �����ϼ���.");
*/


	}
	if($coupon_info->coupon_limit != "N"){
		$sql = "update wiz_coupon set coupon_amount = coupon_amount - 1 where idx='$eventidx'";
		mysql_query($sql) or error(mysql_error());
	}
	comalert("���������� �߱޵Ǿ����ϴ�.");
} else {
	comalert("���Ⱓ�� ���� �����Դϴ�.");
}
/*
}
*/

?>