<?

include "../inc/common.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util.inc"; 		   // 유틸 라이브러리

$page_type = "ordercom";
include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/oper_info.inc"; 		// 운영 정보

// 주문정보
$sql = "select * from wiz_dayorder where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_object($result);

// 주문취소 버튼
get_cancel_btn2();

// 에스크로 버튼
get_escrow_btn();

// 세금계산서 버튼
get_tax_btn();

include "./prd_ordinfo.php";			// 주문정보

if(!empty($HTTP_REFERER)) {
	$pos = strpos($HTTP_REFERER, $HTTP_HOST);
	if($pos === false) {
?>
<script Language="Javascript">
<!--
		alert("잘못된 경로 입니다.");
		self.close();
//-->
</script>
<?php
	}
}

?>
<html>
<head>
<title>:: 주문내역 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
</head>
<body <? if($print == "ok"){ ?>onLoad="window.print();" <? } ?>>
<table width="100%" cellpadding=6 cellspacing=0>
  <tr>
    <td>

      <table width="100%">
        <tr><td height="10"></td></tr>
        <tr><td><?=$ordinfo?></td></tr>
	      <tr><td height="10"></td></tr>
	      <? if($print != "ok"){ ?>
	      <tr>
		      <td align="center">
		      	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		      		<tr>
		      			<td width="30%"><a href="javascript:window.print()"><b><font color=000000>[프린트]</font></b></a></td>
		      			<td align="center"><?=$cancel_btn?>&nbsp;<?=$escrow_btn?></td>
		      			<td width="30%" align="right"><?=$tax_btn?></td>
		      		</tr>
		      	</table>
		      </td>
	      </tr>
	    	<? } ?>
      </table>

    </td>
  </tr>
</table>
</body>
</html>