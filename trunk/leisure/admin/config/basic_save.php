<?
include "../../inc/common.inc";
include "../../inc/util.inc";
include "../../inc/admin_check.inc";


// �⺻��������
if($mode == "shop_info"){

	$upfile_path = "../../data/config";

	// ������ �ΰ�
	if($admin_logo[size] > 0){
		file_check($admin_logo[name]);
		copy($admin_logo[tmp_name], $upfile_path."/admin_logo.gif");
		chmod($upfile_path."/admin_logo.gif", 0606);
	}

	$sql = "update wiz_shopinfo set admin_title='$admin_title', admin_footer='$admin_footer',site_key='$site_key'
					,designer_id='$designer_id',designer_pw='$designer_pw',start_page='$start_page'
					,sch_use='$sch_use',poll_use='$poll_use',design_use='$design_use',addbbs_use='$addbbs_use'
					,sms_use='$sms_use',namecheck_use='$namecheck_use',namecheck_id='$namecheck_id',namecheck_pw='$namecheck_pw',estimate_use='$estimate_use',ssl_use='$ssl_use',ssl_port='$ssl_port'";

	$result = mysql_query($sql) or error(mysql_error());
	
	$sql = "update wiz_operinfo set sms_id='$sms_id', sms_pw='$sms_pw'";
	mysql_query($sql) or error(mysql_error());

	complete("�⺻���� ������ ����Ǿ����ϴ�.","basic_config.php");

}

?>