<?
if(empty($bbs_info[header])) include_once "../inc/oneday_header.inc"; 				// ��ܵ�����
else {
	include $DOCUMENT_ROOT."/".$bbs_info[header]; 							// ��ܵ�����
}
include "../inc/bbs_info.inc"; 	 		// �Խ��� ����



include "../inc/bbs_info_set.inc"; 	 								// �Խ��� ����

$now_position = "<a href=/>Home</a> &gt; Ŀ�´�Ƽ &gt; $bbs_info[title]";
include "../inc/now_position.inc";	// ������ġ

// �Խ��� ������ �ش� �������� ����� ���� �߻� ����
$idx = $_REQUEST[idx];
$category = $_REQUEST[category];
$searchopt = $_REQUEST[searchopt];
$searchkey = $_REQUEST[searchkey];

// �˻� �Ķ����
$param = "code=$code";
if($idx != "") $param .= "&idx=$idx";
if($page != "") $param .= "&page=$page";
if($category != "") $param .= "&category=$category";
if($searchkey != "") $param .= "&searchopt=$searchopt&searchkey=$searchkey";


if(empty($bbs_info[datetype_view])) $bbs_info[datetype_view] = "%Y-%m-%d";

// �Խù� ����
$sql = "select wb.*,from_unixtime(wb.wdate, '".$bbs_info[datetype_view]."') as wdate, wc.catname, wc.caticon
			from wiz_bbs as wb left join wiz_bbscat as wc on wb.category = wc.idx
			where wb.idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$bbs_row = mysql_fetch_array($result);

$memid 		= $bbs_row[memid];
$name 		= $bbs_row[name];
$email 		= $bbs_row[email];
$tphone 	= $bbs_row[tphone];
$hphone 	= $bbs_row[hphone];
$zipcode 	= $bbs_row[zipcode];
$address 	= $bbs_row[address];
$subject 	= $bbs_row[subject];
$content 	= $bbs_row[content];
$wdate 		= $bbs_row[wdate];
$count 		= $bbs_row[count];
$recom 		= $bbs_row[recom];
$ip 			= $bbs_row[ip];

$addinfo1 = $bbs_row[addinfo1];
$addinfo2 = $bbs_row[addinfo2];
$addinfo3 = $bbs_row[addinfo3];
$addinfo4 = $bbs_row[addinfo4];
$addinfo5 = $bbs_row[addinfo5];

$name = xss_check($name);
$email = xss_check($email);
$tphone = xss_check($tphone);
$hphone = xss_check($hphone);
$zipcode = xss_check($zipcode);
$address = xss_check($address);
$subject = xss_check($subject);
$content = xss_check($content);
$reply = xss_check($reply);

$addinfo1 = xss_check($addinfo1);
$addinfo2 = xss_check($addinfo2);
$addinfo3 = xss_check($addinfo3);
$addinfo4 = xss_check($addinfo4);
$addinfo5 = xss_check($addinfo5);

if($bbs_row[caticon] != "") $catname = "<img src='/data/category/".$code."/".$bbs_row[caticon]."' align='absmiddle'> ";		// category
else if($bbs_row[catname] != "") $catname = "[".$bbs_row[catname]."] ";

if($bbs_row[ctype] != "H"){
	$content = htmlspecialchars($content);
	$content = str_replace("\n", "<br>", $content);
}

$_ResizeCheck = false;
// ÷������ �̹����ΰ�� �����ֱ�
if(strcmp($bbs_info[imgview], "N")) {

	for($ii = 1; $ii <= 12; $ii++) {
		if(img_type($DOCUMENT_ROOT."/data/bbs/$code/M".$bbs_row[upfile.$ii])) {
			${upimg.$ii} = "<div align='".$bbs_info[img_align]."'><a href=javascript:openImg('".$bbs_row[upfile.$ii]."');><img src='/data/bbs/$code/M".$bbs_row[upfile.$ii]."' border='0'></a></div>";
			$_ResizeCheck = true;
		}
	}
}

// �̹��� ������� ���ؼ� ó���ϴ� �κ�
if(strpos(strtolower($content), "<img") !== false || $_ResizeCheck == true) {
	$content = preg_replace("/(\<img)(.*)(\>?)/i","\\1 name=wiz_target_resize style=\"cursor:pointer\" onclick=window.open(this.src) \\2 \\3", $content);
	$content = "<table border=0 cellspacing=0 cellpadding=0 style='width:".$bbs_info[mimgsize]."px;height:0px;' id='wiz_get_table_width'>
								<col width=100%></col>
								<tr>
									<td><img src='' border='0' name='wiz_target_resize' width='0' height='0'></td>
								</tr>
							</table>
							<table border=0 cellspacing=0 cellpadding=0 width=100%>
								<col width=100%></col>
								<tr><td valign=top>".$content."</td></tr>
							</table>";
	$_ResizeCheck = true;
}

// �ۺ��� ����üũ
if($rpermi < $mem_level) error($bbs_info[permsg],$bbs_info[perurl]);

// ��ȣ�� ����
if(strcmp($code, "review")) {
	$hide_star_start = "<!--"; $hide_star_end = "-->";
}

// ��ȣ��
$star = "<img src='/images/icon_star_".$bbs_row[star].".gif'>";

// ��б��ΰ�� üũ
if($bbs_row[privacy] == "Y"){

	$sql = "select idx from wiz_bbs where code='$code' and grpno='$bbs_row[grpno]' and passwd='$passwd'";
	$result = mysql_query($sql) or error(mysql_error());
	$grp_passwd = mysql_num_rows($result);

	if(
	$mem_level == 0 ||																																				// ��ü������
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
	($bbs_row[memid] != "" && $bbs_row[memid] == $wiz_session[id]) || 												// �ڽ��Ǳ�
	($bbs_row[passwd] != "" && $bbs_row[passwd] == $passwd) ||																// ��й�ȣ��ġ
	($wiz_session[id] != "" && strpos($bbs_row[memgrp],$wiz_session[id]) !== false) ||				// �׷��Ǳ�
	($grp_passwd > 0)																																					// �׷���
	){
	}else{
		if($passwd) error("��й�ȣ�� ��ġ���� �ʽ��ϴ�.","?auth.php?&mode=view&$param");
		else  error("������ �����ϴ�.","auth.php?mode=view&$param");
	}

}

// ��ȸ�� ����
$sql = "update wiz_bbs set count = count+1 where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());

// ��ư����
$list_btn = "<a href='list.php?$param'><image src='$skin_dir/image/btn_list.gif' border='0'></a>";
if($wpermi >= $mem_level){
	$write_btn = "<a href='input.php?mode=write&$param'><image src='$skin_dir/image/btn_write.gif' border='0'></a>";
	$modify_btn = "<a href='input.php?mode=modify&$param'><image src='$skin_dir/image/btn_modify.gif' border='0'></a>";
	$delete_btn = "<a href='auth.php?mode=delete&$param'><image src='$skin_dir/image/btn_delete.gif' border='0'></a>";
} else {
	if(!strcmp($bbs_info[btn_view], "Y")) {
		if(!empty($bbs_info[perurl])) $perurl = " document.location='$bbs_info[perurl]'; ";
		$write_btn = "<img src='$skin_dir/image/btn_write.gif' border='0' onClick=\"alert('$bbs_info[permsg]'); $perurl \" style='cursor:pointer'>";
	}
}
if($apermi >= $mem_level){
	$reply_btn = "<a href='input.php?mode=reply&$param'><image src='$skin_dir/image/btn_reply.gif' border=0></a>";
} else {
	if(!strcmp($bbs_info[btn_view], "Y")) {
		if(!empty($bbs_info[perurl])) $perurl = " document.location='$bbs_info[perurl]'; ";
		$reply_btn = "<img src='$skin_dir/image/btn_reply.gif' border='0' onClick=\"alert('$bbs_info[permsg]'); $perurl \" style='cursor:pointer'>";
	}
}

if($bbs_info[recom] == "Y"){
	$recom_btn = "<a href='/bbs/save.php?mode=recom&prev=view.php&$param'><image src='$skin_dir/image/btn_recom.gif' border=0></a>";
}

// ÷������
for($ii = 1; $ii <= 12; $ii++) {
	if($bbs_row[upfile.$ii] != "") ${upfile.$ii}  = "<a href='/bbs/down.php?code=$code&idx=$idx&no=".$ii."'>".$bbs_row[upfile.$ii._name]."</a>";
}

if($bbs_row[movie1] != "") $movie1 = "<embed src='/data/bbs/$code/".$bbs_row[movie1]."' autostart=false></embed><br>";
if($bbs_row[movie2] != "") $movie2 = "<embed src='".$bbs_row[movie2]."' autostart=false></embed><br>";
if($bbs_row[movie3] != "") $movie3 = "<embed src='".$bbs_row[movie3]."' autostart=false></embed><br>";

// �ڽ��� �� �� �Ǵ� �ڽ��� �ۿ� �޸� �亯��
if($mybbs) $my_sql = " and (memid='$wiz_session[id]' or memgrp like '".$wiz_session[id].",%')";

// ������
$sql = "select idx,subject, privacy, memid from wiz_bbs where code = '$code' and prino > '$bbs_row[prino]' $my_sql order by prino asc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_array($result)) {
	$prev = "<a href='view.php?code=$code&idx=$row[idx]'>$row[subject]</a>";

	if($row[privacy] == "Y"){
		$lock_icon = "<img src='$skin_dir/image/lock.gif' border='0' align='absmiddle'>";																																	// privacy
		if(
			($mem_level == "0") ||																																		// ��ü������
			($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
			($row[memid] != "" && $row[memid] == $wiz_session[id])																 ||	// �ڽ��Ǳ�
			($wiz_session[id] != "" && strpos($row[memgrp],$wiz_session[id]) !== false)								// �׷��Ǳ�
		){
		}else{
			$prev = "<a href='auth.php?mode=view&code=$code&idx=$row[idx]'>$row[subject]</a> ".$lock_icon;
		}
	}

}

// ������
$sql = "select idx,subject, privacy, memid from wiz_bbs where code = '$code' and prino < '$bbs_row[prino]' $my_sql order by prino desc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_array($result)) {
	$next = "<a href='view.php?ptype=view&code=$code&idx=$row[idx]'>$row[subject]</a>";

	if($row[privacy] == "Y"){
		$lock_icon = "<img src='$skin_dir/image/lock.gif' border='0' align='absmiddle'>";																																	// privacy
		if(
			($mem_level == "0") ||																																		// ��ü������
			($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
			($row[memid] != "" && $row[memid] == $wiz_session[id])																 ||	// �ڽ��Ǳ�
			($wiz_session[id] != "" && strpos($row[memgrp],$wiz_session[id]) !== false)								// �׷��Ǳ�
		){
		}else{
			$next = "<a href='auth.php?mode=view&code=$code&idx=$row[idx]'>$row[subject]</a> ".$lock_icon;
		}
	}

}

// ��� �ۼ� ��й�ȣ ����
if($wiz_session[id] != ""){
	$hide_passwd_start = "<!--"; $hide_passwd_end = "-->";
}

// ÷������ ��뿩��
if($bbs_info[upfile] != "Y"){
	$hide_upfile_start = "<!--"; $hide_upfile_end = "-->";
}

// ��õ��� ��뿩��
if($bbs_info[recom] != "Y"){
	$hide_recom_start = "<!--"; $hide_recom_end = "-->";
}

// ���Ա�üũ��� ��뿩��
if(!strcmp($bbs_info[spam_check], "N")){
	$hide_spam_check_start = "<!--"; $hide_spam_check_end = "-->";
}

?>
<script language="javascript">
<!--
function openImg(img){
   var url = "openimg.php?code=<?=$code?>&img=" + img;
   window.open(url,"openImg","width=300,height=300,scrollbars=yes");
}
//-->
</script>

<?
if($bbs_row[prdcode] != ""){
	$prd_sql = "select prdcode,prdname,sellprice,strprice,prdimg_R from wiz_product where prdcode='$bbs_row[prdcode]'";
	$prd_result = mysql_query($prd_sql);
	$prd_info = mysql_fetch_object($prd_result);

	if(!empty($prd_info->strprice)) $prd_info->sellprice = $prd_info->strprice;
	else $prd_info->sellprice = number_format($prd_info->sellprice)."��";

	// ��ǰ �̹���
	if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$prd_info->prdimg_R)) $prd_info->prdimg_R = "/images/noimg_M.gif";
	else $prd_info->prdimg_R = "/data/prdimg/".$prd_info->prdimg_R;
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11"><img src="<?=$skin_dir?>/image/prd_left_top.gif"></td>
		<td width="99%" background="<?=$skin_dir?>/image/prd_top_bg.gif"></td>
		<td width="11"><img src="<?=$skin_dir?>/image/prd_right_top.gif"></td>
	</tr>
	<tr>
		<td background="<?=$skin_dir?>/image//prd_left_bg.gif"></td>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="<?=$prd_info->prdimg_R?>" width="100" height="100"></td>
								<td width="10"></td>
								<td>
									<table width="100%" border="0" cellspacing="0" cellpadding="2">
										<tr>
											<td><?=$prd_info->prdname?><br></td>
										</tr>
										<tr>
											<td class="11red_01"><font class="price"><?=$prd_info->sellprice?></font></td>
										</tr>
<!--
										<tr>
											<td>
												<table border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td>����</td>
														<td>
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td><img src="<?=$skin_dir?>/image/prd_star_over.gif"><img src="<?=$skin_dir?>/image/prd_star_over.gif"><img src="<?=$skin_dir?>/image/prd_star_over.gif"><img src="<?=$skin_dir?>/image/prd_star_over.gif"><img src="<?=$skin_dir?>/image/prd_star_over.gif"></td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr>
-->
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td align="right"><a href="/shop/prd_view.php?prdcode=<?=$prd_info->prdcode?>"><img src="<?=$skin_dir?>/image/prd_detail_view.gif" border="0"></a></td>
				</tr>
			</table>
		</td>
		<td background="<?=$skin_dir?>/image/prd_right_bg.gif"></td>
	</tr>
	<tr>
		<td><img src="<?=$skin_dir?>/image/prd_left_bottom.gif" width="11" height="11"></td>
		<td background="<?=$skin_dir?>/image/prd_bottom_bg.gif"></td>
		<td><img src="<?=$skin_dir?>/image/prd_right_bottom.gif" width="11" height="11"></td>
	</tr>
	<tr><td height="5"></td></tr>
</table>

<?
}
?>

<?php

// �佺Ų ��Ŭ���
@include "$DOCUMENT_ROOT/$skin_dir/view_head.php";
@include "$DOCUMENT_ROOT/bbs/comment.inc";
@include "$DOCUMENT_ROOT/$skin_dir/view_foot.php";

view_img_resize();

if(!strcmp($bbs_info[view_list], "Y")) {
	$view_idx = $idx;
	include "$_SERVER[DOCUMENT_ROOT]/bbs/view_list.php";
}

if(empty($bbs_info[footer]))include "../inc/oneday_footer.inc"; 		// �ϴܵ�����
else  include $DOCUMENT_ROOT."/".$bbs_info[footer]; 				// �ϴܵ�����
?>