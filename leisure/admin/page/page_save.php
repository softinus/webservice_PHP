<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

$upfile_path = "../../data/subimg";		// ���ε����� ��ġ
	
function addUpdate($type,$subimg,$subimg_size,$subimg_name){
	
	global $content, $upfile_path, $content2, $addinfo, $addinfo2, $info_use, $info_ess;
	
	if($subimg_size > 0){
		file_check($subimg_name);
	
    copy($subimg, $upfile_path."/".$subimg_name);
    @chmod($upfile_path."/".$subimg_name, 0606);
    $subimg_sql = " subimg='$subimg_name', ";
	}
	
	$sql = "select idx from wiz_page where  type='$type'";
	$result = mysql_query($sql) or error(mysql_error());
	$exist = mysql_num_rows($result);
	
	for($ii=0; $ii<count($info_use); $ii++){
   $addinfo .= $info_use[$ii]."/";
	}
	for($ii=0; $ii<count($info_ess); $ii++){
	   $addinfo2 .= $info_ess[$ii]."/";
	}

	if($exist > 0){
		$sql = "update wiz_page set $subimg_sql content='$content', content2='$content2', addinfo='$addinfo', addinfo2='$addinfo2' where type='$type'";
	}else{
		$sql = "insert into wiz_page(idx,type,subimg,content,addinfo,addinfo2) values('','$type','$subimg_name','$content','$addinfo','$addinfo2')";
	}

	$result = mysql_query($sql) or error(mysql_error());
	
}


if($mode == "update"){
	
	addUpdate($type,$subimg[tmp_name],$subimg[size],$subimg[name]);
	
	complete("�����Ǿ����ϴ�.","$page");

}else if($mode == "delimg"){

	@unlink($upfile_path."/".$subimg);
	
	$sql = "update wiz_page set subimg = '' where type='$type'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("�̹����� �����Ǿ����ϴ�.","");
	
}else if($mode == "other"){
	
	if($sitemap_subimg[size] > 0)
		addUpdate("sitemap",$sitemap_subimg[tmp_name],$sitemap_subimg[size],$sitemap_subimg[name]);
	
	if($faq_subimg[size] > 0)
		addUpdate("faq",$faq_subimg[tmp_name],$faq_subimg[size],$faq_subimg[name]);
	
	if($login_subimg[size] > 0)
		addUpdate("login",$login_subimg[tmp_name],$login_subimg[size],$login_subimg[name]);
	
	if($myshop_subimg[size] > 0)
		addUpdate("myshop",$myshop_subimg[tmp_name],$myshop_subimg[size],$myshop_subimg[name]);
	
	if($orderform_subimg[size] > 0)
		addUpdate("orderform",$orderform_subimg[tmp_name],$orderform_subimg[size],$orderform_subimg[name]);
	
	if($orderpay_subimg[size] > 0)
		addUpdate("orderpay",$orderpay_subimg[tmp_name],$orderpay_subimg[size],$orderpay_subimg[name]);
	
	if($ordercom_subimg[size] > 0)
		addUpdate("ordercom",$ordercom_subimg[tmp_name],$ordercom_subimg[size],$ordercom_subimg[name]);
	
	if($orderdel_subimg[size] > 0)
		addUpdate("orderdel",$orderdel_subimg[tmp_name],$orderdel_subimg[size],$orderdel_subimg[name]);
		
	if($prdsearch_subimg[size] > 0)
		addUpdate("prdsearch",$prdsearch_subimg[tmp_name],$prdsearch_subimg[size],$prdsearch_subimg[name]);
	
	if($new_subimg[size] > 0)
		addUpdate("new",$new_subimg[tmp_name],$new_subimg[size],$new_subimg[name]);
		
	if($recom_subimg[size] > 0)
		addUpdate("recom",$recom_subimg[tmp_name],$recom_subimg[size],$recom_subimg[name]);
		
	if($popular_subimg[size] > 0)
		addUpdate("popular",$popular_subimg[tmp_name],$popular_subimg[size],$popular_subimg[name]);
		
	if($sale_subimg[size] > 0)
		addUpdate("sale",$sale_subimg[tmp_name],$sale_subimg[size],$sale_subimg[name]);
		
	if($best_subimg[size] > 0)
		addUpdate("best",$best_subimg[tmp_name],$best_subimg[size],$best_subimg[name]);
		
	complete("�����Ǿ����ϴ�.","page_other.php");


// ������ �߰�
}else if($mode == "page_insert"){
	
	$sdate = $sdate_year."-".$sdate_month."-".$sdate_day;
	$edate = $edate_year."-".$edate_month."-".$sdate_day;
	
	$sql = "insert into wiz_content(idx,type,isuse,scroll,posi_x,posi_y,size_x,size_y,sdate,edate,linkurl,popup_type,title,content,wdate)
									values('','$type', '$isuse', '$scroll', '$posi_x', '$posi_y', '$size_x', '$size_y', '$sdate', '$edate', '$linkurl', '$popup_type', '$title', '$content',now())";

	$result = mysql_query($sql) or error(mysql_error());
	
	if($type == "popup") complete("�߰��Ǿ����ϴ�.","page_popup.php");
	else complete("�߰��Ǿ����ϴ�.","page_content.php");
	
// ������ ����
}else if($mode == "page_update"){
	
	$sdate = $sdate_year."-".$sdate_month."-".$sdate_day;
	$edate = $edate_year."-".$edate_month."-".$edate_day;
	
	if(!empty($type)) $where_sql = " where type = '$type' and idx = '$idx'";
	else $where_sql = " where idx = '$idx'";
	
	$sql = "update wiz_content set isuse='$isuse', scroll='$scroll', posi_x='$posi_x', posi_y='$posi_y', size_x='$size_x', size_y='$size_y', 
							sdate='$sdate', edate='$edate', linkurl='$linkurl', popup_type='$popup_type', title='$title', content='$content' $where_sql";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("�����Ǿ����ϴ�.","");


// ������ ����	
}else if($mode == "page_delete"){
	
	$sql = "delete from wiz_content where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("�����Ǿ����ϴ�.","");
	
}


?>