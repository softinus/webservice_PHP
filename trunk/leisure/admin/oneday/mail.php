<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

$sql = "select * from wiz_dayproduct wp, wiz_daycprelation wd, wiz_daycategory wc where wp.prdcode = wd.prdcode and wc.catcode=wd.catcode and wp.prdcode='$prdcode'";
$result = mysql_query($sql) or die($sql);
$row = mysql_fetch_array($result);

$prdname = $row[prdname];
$catname = $row[catname];
$prddate = substr($row[selldate],0,10) . " ~ " . substr($row[selllastdate],0,10) ;
$conprice = $row[conprice];
$sellprice = $row[sellprice];
$discount_per = $row[discount_per];
$stortexp = $row[stortexp];
?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
	<title>자동작성 메일확인</title>
	<meta name="generator" content="editplus">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

<script type="text/javascript">
window.onload=function(){
	var doc = document.getElementById("mainContent").innerHTML;
	var copy = window.clipboardData.setData('Text',doc)
	if(copy){
		alert("현재 작성된 메일의 HTML코드가 복사되었습니다.\n\n Ctrl + V 로 붙여넣기 하세요!")
	}
}
</script>
<style>
html,body{margin:0px; padding:0px;}
td {font-size:12px;font-family:"굴림","돋움";color:#4a4a4a;line-height:160%} 
table {border-collapse:collapse;}
</style>
</head>
<body>
<!--div id 안에 메일내용이 들어가야함. div삭제하시면 곤란함.-->



<div id="mainContent">
<table width="699" border="0" cellpadding="5" cellspacing="2" bgcolor="3C3C3C">
	<tr>
		<td width="685" align="center" valign="top" bgcolor="#FFFFFF">
			<table  width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/main_title.gif" width="685" height="73"></td>
				</tr>
			</table> 
			<table width="685" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/main_title2.gif" width="685" height="41"></td>
				</tr>
			</table>
			<table width="90" height="26" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="643" height="205" border="0" cellpadding="0" cellspacing="0" bgcolor="EFEFEF">
				<tr>
					<td align="center">
						<table  width="633" height="195" border="0" cellpadding="0" cellspacing="1" bgcolor="D5D5D5">
							<tr>
								<td align="center" bgcolor="#FFFFFF">
									<table  width="586" height="155" border="0" cellpadding="0" cellspacing="0">
										<tr> 
											<td width="322"><img src="http://<?=$_SERVER[HTTP_HOST]?>/data/prdimg/<?=$row[prdimg_L1]?>" width="298" height="155"></td>
											<td valign="top">
												<table  width="100%" height="70" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td align="center">
															<?=$row[prdname]?> <br>
															<strong><font color="13A89E">[<?=$catname?>]</font> <?=nl2br($stortexp)?></strong>
														</td>
													</tr>
												</table>
												<table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="EBEBEB">
													<tr>
														<td></td>
													</tr>
												</table>
												<table width="100%" height="33" border="0" cellpadding="0" cellspacing="0">
													<tr> 
														<td width="50%" align="center"><strong>기존가</strong></td>
														<td width="50%" align="center"><strong><font color="#FF6600">할인가</font></strong></td>
													</tr>
												</table>
												<table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="EBEBEB">
													<tr> 
														<td></td>
													</tr>
												</table>
												<table width="100%" height="33" border="0" cellpadding="0" cellspacing="0">
													<tr> 
														<td width="48%" align="center"><strong><?=number_format($conprice)?>원</strong></td>
														<td width="4%" align="center"><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/mail_icon.gif" width="9" height="10"></td>
														<td width="48%" align="center"><strong><font color="#FF6600"><?=number_format($sellprice)?>원</font></strong></td>
													</tr>
												</table>
												<table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="EBEBEB">
													<tr> 
														<td></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="90" height="12" border="0" cellpadding="0" cellspacing="0">
				<tr> 
					<td></td>
				</tr>
			</table>
			<table width="527" height="112" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center"><a href="http://wizsns.anyhosting.kr/" target="_blank"><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/mail_button_01.gif" width="146" height="37" border="0"></a></td>
				</tr>
			</table>
			<table width="642" height="56" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/mail_text_01.gif" width="642" height="56"></td>
				</tr>
			</table>
			<table width="90" height="10" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td></td>
				</tr>
			</table> 
			<table width="643" height="92" border="0" cellpadding="0" cellspacing="0">
				<tr> 
					<td width="104"><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/mail_logo.gif" width="99" height="53"></td>
					<td width="539">
						<font color="6D6D6D">사업자등록번호 : 214-11-31302 통신판매업 신고번호 : 서초 0725호 <br>
						서울시 금천구 가산동 426-5 월드메르디앙2차 1105호 고객센터 : 02-2057-3827 FAX : 02-2025-8228 <br>
						이메일 : help@anywiz.co.kr 업무시간 : 평일 09:30-19:00 토ㆍ일ㆍ공휴일 휴무 <br>
						Copyright 2003-2009 ANYWIZ All right reserved. help@anywiz.co.kr</font>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</div>




<?/*?>







<table height="100%" cellspacing=0 cellpadding=0 width=642 align=center border=0>
	<tbody>
		<tr>
			<td valign=top>
				<table cellspacing=0 cellpadding=0 border=0>
					<tbody>
						<tr>
							<td><img src="http://u50i50.com/images/mailimg/top_06.gif"></td>
						</tr>
						<tr>
							<td background=http://u50i50.com/images/mailimg/bg_line.gif>
								<table cellspacing=0 cellpadding=0 width=642 border=0>
									<tbody>
										<tr>
											<td style="padding-right: 0px; padding-left: 30px; padding-bottom: 10px; padding-top: 10px; line-height:24px;">
												상품명 : <span id="prdname"><?=$prdname?></span><br />
												판매기간 : <span id="prddate"><?=$prddate?></span><br />
												정가 : <span id="conprice"><?=number_format($conprice)?>원</span><br />
												할인율 : <span id="discount_per"><?=$discount_per?>%</span><br />
												판매가 : <span id="sellprice"><?=number_format($sellprice)?>원</span>
											</td>
											<td valign=bottom align=right width=190><img src="http://u50i50.com/images/mailimg/img_06.gif"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td><img src="http://u50i50.com/images/mailimg/bottom.gif"></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
<?*/?>
</body>
</html>
