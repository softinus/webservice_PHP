<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
$param = "code=$code&category=$category&searchopt=$searchopt&searchkey=$searchkey";
?>
<script language="JavaScript" type="text/javascript">
<!--

// 체크박스 전체선택
function selectAll(){
	var i;
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].idx != null){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = true;
			}
		}
	}
	return;
}

// 체크박스 선택해제
function selectCancel(){
	var i;
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].select_checkbox){
			if(document.forms[i].idx != null){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

// 체크박스선택 반전
function selectReverse(form){
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectCancel();
	}
}

// 체크박스 선택리스트
function selectValue(){
	var i;
	var selbbs = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].idx != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selbbs = selbbs + document.forms[i].idx.value + "|";
				}
			}
	}
	return selbbs;
}

//선택게시물 삭제
function delBbs(){

	selbbs = selectValue();

	if(selbbs == ""){
		alert("삭제 할 신청서를 선택하세요.");
		return false;
	}else{
		if(confirm("선택한 신청서를 정말 삭제하시겠습니까?")){
			document.location = "feed_save.php?mode=delbbs&selbbs=" + selbbs;
		}
	}
}

// 고객 메일발송
function sendEmail(seluser){
	var i;
	var seluser = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].id != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked) seluser = seluser +""+ document.forms[i].email.value + ",";
			}
		}
	}

	if(seluser == ""){
		alert("이메일 발송할 회원을 선택하세요.");
		return false;
	}else{
		var url = "../member/send_email.php?seluser=" + seluser;
		window.open(url,"sendEmail","height=620, width=700, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
}

// 고객 sms발송
function sendSms(seluser){
	var i;
	var seluser = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].idx != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked){
					seluser = seluser + document.forms[i].hphone.value + ",";
				}
			}
		}
	}

   if(seluser == ""){
		alert("SMS 발송할 회원을 선택하세요.");
		return false;
	}else{
	   var url = "../member/send_sms.php?seluser=" + seluser;
	   window.open(url,"sendSms","height=350, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
	}
	
}

//-->
</script>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">구독신청관리</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt"> 구독신청을 통해 입력받은 SMS, 이메일 발송/관리합니다.</td>
	</tr>
</table>
<br>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<form name="searchForm" action="oneday_sns.php" method="get">
	<tr>
		<td width="60" class="tit_sub"><img src="../image/ics_tit.gif"> 분류</td>
		<td>
			<select name="searchopt" onchange="this.form.submit();">
				<option value="">:: 선택하세요 ::</option>
				<option <?if($searchopt=="feed_email"){?>selected<?}?> value="feed_email">이메일</option>
				<option <?if($searchopt=="feed_sms"){?>selected<?}?> value="feed_sms">SMS</option>
			</select>
		</td>
	</tr>
	<tr><td height="3"></td></tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="layout:fixed;">
	<colgroup>
		<col width = "5%" />
		<col width = "40%" />
		<col width = "40%" />
		<col width = "15%" />
	</colgroup>
<form>
	<tr><td class="t_rd" colspan="20"></td></tr>
	<tr class="t_th">
		<th width="5%"><input type="checkbox" name="select_tmp" onClick="selectReverse(this.form)"></th>
		<th>이메일</th>
		<th>SMS</th>
		<th>신청일시</th>
	</tr>
	<tr>
		<td class="t_rd" colspan="20"></td>
	</tr>
</form>
<?

$lists = 20;

if($searchopt <> ""){
	$addQuery = " where $searchopt <> '' ";
}

$sql = "select count(idx) as total from wiz_feed $addQuery order by idx desc";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_array($result);
$total = $row["total"];

$rows = 20;
$lists = 5;
$ttime = mktime(0,0,0,date('m'),date('d'),date('Y'));
$today = date('Ymd');
$page_count = ceil($total/$rows);
if(!$page || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $total-$start;


$sql = "select * from wiz_feed $addQuery order by idx desc limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_array($result)){
?>
	<!--<tr><td colspan="20" class="t_line"></td></tr>-->
<form>
	<input type="hidden" name="idx" value="<?=$row[idx]?>">
	<input type="hidden" name="email" value="<?=$row[feed_email]?>">
	<input type="hidden" name="hphone" value="<?=$row[feed_sms]?>">
	
	
	<tr>
		<td align="center" height="30" ><input type="checkbox" name="select_checkbox"></td>
		<td align="center"><?=$row["feed_email"]?></td>
		<td align="center"><?=$row["feed_sms"]?></td>
		<td align="center"><?=$row["wdate"]?></td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
</form>
<?
}
if($total <= 0){
?>
	<tr><td height=25 colspan=5 align=center>작성된 글이 없습니다.</td></tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
}
?>
</table>
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td width="33%">
			<img src="../image/btn_seldel.gif" style="cursor:pointer" onClick="delBbs();">
			<img src="../image/btn_sendmail.gif" style="cursor:pointer" onClick="sendEmail('');">
			<img src="../image/btn_sendsms.gif" style="cursor:pointer" onClick="sendSms('');">
		</td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, $param); ?></td>
		<td width="33%" align="right">
		</td>
	</tr>
</table>
<? include "../footer.php"; ?>