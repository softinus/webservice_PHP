<?
include_once "$DOCUMENT_ROOT/inc/common.inc";
include_once "$DOCUMENT_ROOT/inc/util.inc";

if(!empty($sch_code)) $code = $sch_code;
else if(!empty($_REQUEST["code"])) $code = $_REQUEST["code"];

$sql = "select * from wiz_bbsinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$sch_info = mysql_fetch_array($result);
if($total <= 0 || $sch_info[usetype] != "Y") error("�ش� ���������� �������� �ʽ��ϴ�.");

$upfile_max = 3;	// ����÷�� : �ִ�12��������, ����������� skin���� ������� ����

// �������� ���� �Խ����ΰ��
if($total <= 0){
	$msg = "<font color=red><b>".$code."</b></font> �Խ����� ���� �������� �ʾҽ��ϴ�.";
	echo "<table align=center><tr><td height=25>&nbsp;&nbsp;".$msg."&nbsp;&nbsp;</td></tr></table>";
}

// ��Ų��ġ
$skin_dir = "/schedule/skin/".$sch_info[skin];

// �Խ��� ���ٱ���
$level_info = level_info();
$mem_level = $level_info[$wiz_session[level]][level];

if(strpos($PHP_SELF,"/schedule/") !== false) {

	$lpermi = $level_info[$sch_info[lpermi]][level];
	$rpermi = $level_info[$sch_info[rpermi]][level];
	$wpermi = $level_info[$sch_info[wpermi]][level];
	$apermi = $level_info[$sch_info[apermi]][level];
	$cpermi = $level_info[$sch_info[cpermi]][level];
	
}

// ���Ͼ��ε� ����
$upfile_path = $DOCUMENT_ROOT."/data/bbs/".$code;		// ���ε����� ��ġ
$upfile_idx = date('ymdhis').rand(1,9);						// ���ε����ϸ�
$imgsize_s = $sch_info[simgsize];
$imgsize_m = $sch_info[mimgsize];

if($imgsize_s == 0) $imgsize_s = 120;
if($imgsize_m == 0) $imgsize_m = 500;

// �Խ��� ������ �ش� �������� ����� ���� �߻� ����
$idx = $_REQUEST[idx];

?>