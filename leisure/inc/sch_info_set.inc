<?
include_once "$DOCUMENT_ROOT/inc/common.inc";
include_once "$DOCUMENT_ROOT/inc/util.inc";

if(!empty($sch_code)) $code = $sch_code;
else if(!empty($_REQUEST["code"])) $code = $_REQUEST["code"];

if($sch_info[titleimg] != "") $subimg = "<img src=/data/bbs/$code/$sch_info[titleimg]>";

$upfile_max = 3;	// 파일첨부 : 최대12까지가능, 사용자페이지 skin에는 적용되지 않음

// 스킨위치
$skin_dir = "/schedule/skin/".$sch_info[skin];

// 게시판 접근권한
$level_info = level_info();
$mem_level = $level_info[$wiz_session[level]][level];

$lpermi = $level_info[$sch_info[lpermi]][level];
$rpermi = $level_info[$sch_info[rpermi]][level];
$wpermi = $level_info[$sch_info[wpermi]][level];
$apermi = $level_info[$sch_info[apermi]][level];
$cpermi = $level_info[$sch_info[cpermi]][level];

// 파일업로드 설정
$upfile_path = $DOCUMENT_ROOT."/data/bbs/".$code;		// 업로드파일 위치
$upfile_idx = date('ymdhis').rand(1,9);						// 업로드파일명
$imgsize_s = $sch_info[simgsize];
$imgsize_m = $sch_info[mimgsize];

if($imgsize_s == 0) $imgsize_s = 120;
if($imgsize_m == 0) $imgsize_m = 500;

// 게시판 위에서 해당 변수명을 쓸경우 에러 발생 방지
$idx = $_REQUEST[idx];

?>