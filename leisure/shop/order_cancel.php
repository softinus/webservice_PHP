<?
include "../inc/common.inc"; 				// DB컨넥션, 접속자 파악
include "../inc/oper_info.inc"; 		// 운영 정보
include "../inc/util.inc";		      // 유틸lib

if($cancel == "true"){
	
	$sql = "update wiz_order set cancelmsg='$cancelmsg', status='RD' where orderid='$orderid'";
	mysql_query($sql);
	
	echo "<script>alert('취소요청이 정상적으로 처리되었습니다.');self.close();opener.document.location.reload();</script>";
	exit;
	
}
?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title>:: 주문취소 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
<script language="JavaScript">
<!--
function inputCheck(frm){
	if(frm.cancelmsg.value == ""){
		alert("취소사유를 작성해주세요");
		frm.cancelmsg.focus();
		return false;
	}
}
//-->
</script>
</head>

<body style="background-color:#F6F6F6">

<table border=0 cellpadding=0 cellspacing=0 width=350>
	<tr><td height=55><img src="/images/ordercancel_title.gif"></td></tr>
	<tr>
		<td bgcolor=#ffffff valign=top align=center>
		
			<table border=0 cellpadding=0 cellspacing=0  width=90%>
			<form name="frm" method="post" action="<?=$PHP_SELF?>" onSubmit="return inputCheck(this);">
	    <input type="hidden" name="cancel" value="true">
	    <input type="hidden" name="orderid" value="<?=$orderid?>">
			<tr><td colspan=2 align=center style="padding:15 5 5 5" height="10"></td></tr>
			<tr><td colspan=2 height=3 bgcolor=#f0f0f0></td></tr>
			<tr><td colspan=2 height=1 bgcolor=#dadada></td></tr>
			<tr height=30>
				<td width=5%><img src="/images/ordercancel_id.gif"></td>
				<td><?=$orderid?></td>
			</tr>
			<tr height=50>
				<td width=5%><img src="/images/ordercancel_icon.gif"></td>
				<td><textarea rows="6" cols="10" name="cancelmsg" class="input" style="width:100%"></textarea></td>
			</tr>
			<tr><td colspan=2 align=center style="padding:15 5 5 5" height="10"></td></tr>
			<tr><td colspan=2 height=1 bgcolor=#dadada></td></tr>
			<tr><td colspan=2 height=3 bgcolor=#f0f0f0></td></tr>
			<tr><td colspan=2 height=10 bgcolor=#ffffff></td></tr>
			<tr>
				<td colspan=2 align=center>
					<input type="image" src="/images/btn_confirm.gif">
					<img src="/images/btn_cancel.gif" onClick="self.close()" style="cursor:hand">
				</td>
			</tr>
			<tr><td colspan=2 height=10 bgcolor=#ffffff></td></tr>
			</form>
			</table>
				
		</td>
	</tr>
	<tr><td bgcolor=#E0E0E0 height=1></td></tr>
	<tr><td height=30 align=right style="padding:0 30 0 0"><a href="javascript:self.close();"><img src="/images/id_check_close.gif" border=0></a></td></tr>
</table>

</body>
</html>