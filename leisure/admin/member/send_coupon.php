<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<html>
<head>
<title>:: 이벤트쿠폰발송 ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
// 주문상세내역 보기
function inputCheck(frm){
	if(frm.seluser.value == ""){
		alert("쿠폰수신회원을 입력하세요");
		frm.seluser.focus();
		return false;
	}
}

function allcheck(obj){

	var formObj = document.frm;

	for(var i=0; i<formObj.elements.length; i++){

		if(formObj.elements[i].name == "idx[]"){
			if(obj.checked == true){
				formObj.elements[i].checked=true
			}else{
				formObj.elements[i].checked=false
			}
		}
	}

}

//-->
</script>
</head>
<body>
<table width="100%" border="0" cellpadding=6 cellspacing=0>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td class="tit_sub"><img src="../image/ics_tit.gif"> 이벤트  할인쿠폰 발송</td>
				</tr>
			</table>

			<table width="100%" border="0" cellpadding=2 cellspacing=1 class="t_style">
			<form name="frm" action="coupon_post.php" method="post" onSubmit="return inputCheck(this);">
				<input type="hidden" name="mode" value="sendsms">
				<input type="hidden" name="se_name" value="<?=$shop_info->shop_name?>">
				<input type="hidden" name="se_tel" value="<?=$shop_info->shop_hand?>">
				<tr>
					<td height="30" align=center class="t_name">수신회원</td>
					<td class="t_value">
						<textarea name="seluser" rows="2" cols="20" class="textarea" style="width:100%"><?=$seluser?></textarea>
						<table>
							<tr>
								<td>형식) test1,test2,test3... (ID)</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br />

			<table width="100%" border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td class="tit_sub"><img src="../image/ics_tit.gif"> 이벤트쿠폰 목록</td>
					<td align="right"></td>
				</tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td class="t_rd" colspan=20></td></tr>
				<tr class="t_th">
					<th width="8%"></th>
					<th>쿠폰명</th>
					<th>기간</th>
					<th>할인</th>
					<th>수량</th>
					<th>기능</th>
				</tr>
				<tr><td class="t_rd" colspan=20></td></tr>
			<?
			$sql = "select * from wiz_coupon order by idx desc";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			$no = $total;
			while($row = mysql_fetch_array($result)){
			if($row[coupon_limit] == "N") $row[coupon_amount] = "수량제한없음";
			?>
				<tr> 
					<td height="30" align="center"><input type="radio" name="idx" value="<?=$row[idx]?>" /></td>
					<td><?=$row[coupon_name]?></td>
					<td align="center"><?=$row[coupon_sdate]?> ~ <?=$row[coupon_edate]?></td>
					<td align="center"><?=$row[coupon_dis]?><?=$row[coupon_type]?></td>
					<td align="center"><?=$row[coupon_amount]?></td>
					<td align="center">
						<img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='shop_coupon_input.php?sub_mode=update&idx=<?=$row[idx]?>'">
						<img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="delCoupon('<?=$row[idx]?>');">
					</td>
				</tr>
				<tr><td colspan="20" class="t_line"></td></tr>
			<?
			$no--;
			}
			if($total <= 0){
			?>
				<tr align="center"><td height="30" colspan="10" align="center">등록된 쿠폰이 없습니다.</td></tr>
				<tr><td colspan="20" class="t_line"></td></tr>
			<?
			}
			?>
			</table>

			<table align="center" border="0" cellpadding=0 cellspacing=0>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td><input type="image" src="../image/btn_send_l.gif"> &nbsp; <img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();"></td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>