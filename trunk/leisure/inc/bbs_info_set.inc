<?

if(!empty($_REQUEST["code"])) $code = $_REQUEST["code"];

if($bbs_info[titleimg] != "") $subimg = "<img src=/data/bbs/$code/$bbs_info[titleimg]>";

$upfile_max = 3;	// ����÷�� : �ִ�12��������, ����������� skin���� ������� ����

// �Խ��� ���ٱ���
$level_info = level_info();
$mem_level = $level_info[$wiz_session[level]][level];

$lpermi = $level_info[$bbs_info[lpermi]][level];
$rpermi = $level_info[$bbs_info[rpermi]][level];
$wpermi = $level_info[$bbs_info[wpermi]][level];
$apermi = $level_info[$bbs_info[apermi]][level];
$cpermi = $level_info[$bbs_info[cpermi]][level];

// ���Ͼ��ε� ����
$upfile_path = $DOCUMENT_ROOT."/data/bbs/".$code;		// ���ε����� ��ġ
$upfile_idx = date('ymdhis').rand(1,9);						// ���ε����ϸ�
$imgsize_s = $bbs_info[simgsize];
$imgsize_m = $bbs_info[mimgsize];

// ��Ų��ġ
$skin_dir = "/bbs/skin/".$bbs_info[skin];

// �Խ��� ������ �ش� �������� ����� ���� �߻� ����
$idx = $_REQUEST[idx];
$category = $_REQUEST[category];
$searchopt = $_REQUEST[searchopt];
$searchkey = $_REQUEST[searchkey];

// �Խ��ǰ����� üũ
$bbsadmin_list = explode(",", $bbs_info[bbsadmin]);
for($ii = 0; $ii < count($bbsadmin_list); $ii++) {
	if(!empty($wiz_session[id]) && !strcmp($bbsadmin_list[$ii], $wiz_session[id])) {
		$mem_level = 0; break;
	}
}

?>