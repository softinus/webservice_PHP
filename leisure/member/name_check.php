<?
include_once "$_SERVER[DOCUMENT_ROOT]/inc/common.inc";
include_once "$_SERVER[DOCUMENT_ROOT]/inc/shop_info.inc";

// =============================================//
// version : 1.5 (2003.07.3)
// ����� : 
// nc_p.php Page�� Post ������� a1=�̸�,a2=�ֹι�ȣ�� ������.
// =============================================//

// =============================================//
// ȸ���� ID, ��й�ȣ �� ��Ÿ  ����
// =============================================//
// sURLnc�� ���� ���� �� �������� �θ��� page�� �����ؾ� �����մϴ�.
// �ܺ� ����ڰ� �� URL�� ��ũ�����Ͽ� �ҹ����� ����ϴ� ���� ���� ����.

// 	define("sURLnc", "@URLNC.PHP");   	// ���� URL�� �Է��ϼ���. 
//	define("sURLnc", "http://www.test.co.kr/nc.php");

// @SITEID �� @SITEPW �� ���� �ο� ���� ����Ʈ id �� �н������ �� �ٲٱ� �ٶ��ϴ�.

$sSiteID = $shop_info->namecheck_id;  	// ����Ʈ id 
$sSitePW = $shop_info->namecheck_pw;   // ��й�ȣ

$cb_encode_path = $_SERVER[DOCUMENT_ROOT]."/member/cb_namecheck";			// cb_namecheck ����� ��ġ�� ��ġ 

// ============================================ //
// Main ���� 
// ============================================ //
// Passed Data value : 
// $a1 : �̸� 
// $a2 : �ֹι�ȣ
// ============================================ //

	$strJumin= $resno1.$resno2;		// �ֹι�ȣ
	$strName = $name;		//�̸�
	
	$iReturnCode  = "";	

// sURLnc�� ���� ���� �� �������� �θ��� page(HTTP_REFERER)�� �����ؾ� �����մϴ�.
// echo "HTTP_REFERER=($HTTP_REFERER)"; �� ���� Ȯ���� ���� �ս��ϴ�.
// nc_p.php �������� �ܺ� ����ڰ� �ҹ����� ����ϴ� ���� ���� ����.
//	if ($HTTP_REFERER == sURLnc)
//	 {
		$iReturnCode = `$cb_encode_path $sSiteID $sSitePW $strJumin $strName`;		
//	 }

//	echo "����Ȯ�� ���� ���<hr><p>���� Ȯ�� ��� ���� ����� \$iReturnCode�� �̿��Ͽ� ȸ���� �߰�ó�� ��ƾ�� ����<P>";
//	echo "iReturnCode=($iReturnCode)" ;

$iReturnMsg[2] = "���� �ƴ�";
$iReturnMsg[4] = "�ý��� ���";
$iReturnMsg[5] = "�ֹι�ȣ ����";
$iReturnMsg[9] = "request ����Ÿ ����.";
$iReturnMsg[10] = "����Ʈ �ڵ� ����";
$iReturnMsg[11] = "������ ����Ʈ";
$iReturnMsg[12] = "�ش����Ʈ ��й�ȣ ����";
$iReturnMsg[13] = "����Ʈ ���� �ý��� ���";
$iReturnMsg[15] = "Decoding ����(Data)";
$iReturnMsg[16] = "Decoding �ý������";
$iReturnMsg[30] = "���� ��� ";
$iReturnMsg[32] = "����� �̻�";
$iReturnMsg[34] = "����� ��ֹ߻�";
$iReturnMsg[50] = "�������� ���� ��û �ֹι�ȣ";
$iReturnMsg[55] = "�ܱ��� ��ȣ Ȯ�� ����";
$iReturnMsg[56] = "�ܱ��� ��ȣ Ȯ�� ����";
$iReturnMsg[57] = "�ܱ��� ��ȣ Ȯ�� ����";
$iReturnMsg[58] = "���Ա� ������ ��� ����";

if($iReturnCode != "1"){
	echo "<script>alert('������ ���� �Ͽ����ϴ�. ���л���[".$iReturnMsg[$iReturnCode]."]');</script>";
}else{
	echo "<script>alert('�Ǹ����� �Ǿ����ϴ�.');parent.document.nameCheck.submit();</script>";
}
?>