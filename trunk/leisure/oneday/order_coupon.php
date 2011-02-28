<?
include "../inc/common.inc"; 			// DB컨넥션, 접속자 파악
include "../inc/util.inc"; 		   // 유틸 라이브러리

$page_type = "ordercom";
include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/oper_info.inc"; 		// 운영 정보

// 주문정보
$sql = "select * from wiz_dayorder where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_array($result);

$sql = "select * from wiz_basket where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$basket_info = mysql_fetch_array($result);


$sql = "select * from wiz_dayproduct where prdcode = '$basket_info[prdcode]'";
$result = mysql_query($sql) or error(mysql_error());
$prd_info = mysql_fetch_array($result);

$sql = "select * from wiz_company where idx = '$prd_info[company_idx]'";
$result = mysql_query($sql) or error(mysql_error());
$com_info = mysql_fetch_array($result);

$arrMehtod = array("PB"=>"무통장입금","PC"=>"신용카드결제");

include "./prd_ordinfo.inc";			// 주문정보

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
<title>::: 애니쿠폰 ::: 한루 한가지 반가운소식! any Coupon</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" onload="window.print();">
<table width="700" height="590" border="0" cellpadding="5" cellspacing="2" bgcolor="3C3C3C">
	<tr>
		<td width="685" align="center" valign="top" bgcolor="#FFFFFF">
			<table  width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr> 
					<td width="29%"><img src="image/cupon_logo.gif" width="200" height="73"></td>
					<td width="71%" valign="bottom">
						<table  width="376" height="48" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><strong><font color="#FF6600">“<?=$order_info[send_name]?>” (<?=$order_info[send_id]?>)</font>님의 쿠폰내역입니다.</strong></td>
							</tr>
						</table>
					</td>
				</tr>
			</table> 
			<table width="685" height="41" border="0" cellpadding="0" cellspacing="0" background="image/cupon_bg.gif">
				<tr>
					<td class="font02" style="padding-left:15px;"><font color="FFC56A"><?=$prd_info[prdname]?></font></td>
				</tr>
			</table>
			<table width="90" height="26" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="640" height="392" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top">
						<table width="639" height="156" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td width="251">
									<table  width="222" height="134" border="0" cellpadding="0" cellspacing="1" bgcolor="C7C7C7">
										<tr>
										<?if($prd_info[img_coupon] != "Array" && $prd_info[img_coupon]){?>
											<td bgcolor="#FFFFFF"><img src="<?=$_SERVER["HTTP_HOST"]?>/data/prdimg/<?=$prd_info[img_coupon]?>" width="222" height="134" title="쿠폰이미지" /></td>
										<?}else{?>
											<td bgcolor="#FFFFFF" align="center" valign="middle">쿠폰이미지가 등록되어있지 않습니다.</td>
										<?}?>
										</tr>
									</table>
								</td>
								<td width="388">
									<table  width="374" height="23" border="0" cellpadding="0" cellspacing="0">
										<tr> 
											<td height="23"><strong>총결제금액 :<font color="ED207B"> <?=number_format($order_info[total_price])?>원 </font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>이름 : <font color="666666"><?=$order_info[rece_name]?></font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>총수량 :<font color="666666"> <?=$order_info[amount]?>개 </font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>주문시간 : <font color="666666"><?=$order_info[order_date]?></font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>티켓번호 : <font color="666666"><?=$orderid?> </font></strong></td>
										</tr>
										<tr> 
											<td height="23"><strong>결제방법 : <font color="666666"><?=$arrMehtod[$order_info[pay_method]]?></font></strong></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<table width="90" height="26" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td></td>
							</tr>
						</table>
						<table width="111" height="21" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><img src="image/cupon_s_t_01.gif" width="60" height="20"></td>
							</tr>
						</table>
						<table width="639" height="72" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td>
									<?=nl2br($prd_info[shopinfo])?>
								</td>
							</tr>
						</table>
						<table width="111" height="21" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td><img src="image/cupon_s_t_02.gif" width="60" height="20"></td>
							</tr>
						</table>
						<table width="639" height="72" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td>
									<?=nl2br($prd_info[attention])?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="D1D1D1">
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="100%" height="38" border="0" cellspacing="0">
				<tr>
					<td align="right" style="padding-right:30px;">고객센터 : <?=$shop_info->shop_tel?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
