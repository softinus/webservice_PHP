<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

$upfile_path = "../../data/oneday";	// 원데이몰에 쓰일 이미지 저장경로

if($advert_img[size] > 0){
	file_check($advert_img[name]);
	copy($advert_img[tmp_name], $upfile_path."/advert_img.gif");
	@chmod($upfile_path."/advert_img.gif", 0606);
	$advert_img = "advert_img.gif";
}else{
	$advert_img = "advert_img.gif";
}




$sql = "update wiz_advert  set ";
$sql .= " advert_use='$advert_use', ";
$sql .= " advert_img='$advert_img', ";
$sql .= " advert_url='$advert_url', ";
$sql .= " advert_point='$advert_point', ";
$sql .= " wdate=now() ";
mysql_query($sql)or die($sql);



	complete("수정되었습니다.","oneday_advert.php");
//complete("등록되었습니다.","oneday_advert.php");

?>

