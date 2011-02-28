<style type="text/css">#productBox{position:relative; top:0px; left:0px; width:776px; height:439px; overflow:hidden;}#productBox p{position:absolute; top:20px; font-size:0px; font-weight:700; background:gray; line-height:0px;}
.emptyMent{width:200px; position:absolute; top:50%; left:50%; margin: -10px 0px 0px -100px; height:20px;  vertical-align:middle; }
</style>
<script>
</script>
<form name="prdForm" action="/oneday/order_form.php" method="get" style="display:inline;">
	<input type="hidden" name="prdcode" value="<?=$prdcode?>" />
	<input type="hidden" name="buy_date" value="<?=$yy?>-<?=$mm?>-<?=$dd?>" />
<table width="1012" height="439" border="0" align="center" cellpadding="0" cellspacing="0" onmouseover="clearSwap()">
	<tr>
		<td width="776" align="center" valign="top" id="productBox">

<?if($prd_count){	 // 상품이 없다면 이미지 감추기?>

		<?if($mainImg1){
			$imgno = 1;
			?>
			<img src="<?=$mainImg1?>" width="776" height="439" border="0" />
		<?}?>
		<?if($mainImg2){
			$imgno = 2;
			?>
			<img src="<?=$mainImg2?>" width="776" height="439" border="0" style="display:none" />
		<?}?>
		<?if($mainImg3){
			$imgno = 3;
			?>
			<img src="<?=$mainImg3?>" width="776" height="439" border="0" style="display:none" />
		<?}?>
		<?if($mainImg4){
			$imgno = 4;
			?>
			<img src="<?=$mainImg4?>" width="776" height="439" border="0" style="display:none" />
		<?}?>
		<?if($mainImg5){
			$imgno = 5;
			?>
			<img src="<?=$mainImg5?>" width="776" height="439" border="0" style="display:none" />
		<?}?>

		<?if($mainImg1){?>
			<p style="left:620px;" style="cursor:pointer" onmouseover="onSwapLayerImgs(0,this)"><img src="/image/n1.gif" border="0" name="imgbtn1" /></p>
		<?}?>
		<?if($mainImg2){?>
			<p style="left:650px;" style="cursor:pointer" onmouseover="onSwapLayerImgs(1,this)"><img src="/image/n2.gif" border="0" name="imgbtn2" /></p>
		<?}?>
		<?if($mainImg3){?>
			<p style="left:680px;" style="cursor:pointer" onmouseover="onSwapLayerImgs(2,this)"><img src="/image/n3.gif" border="0" name="imgbtn3" /></p>
		<?}?>
		<?if($mainImg4){?>
			<p style="left:710px;" style="cursor:pointer" onmouseover="onSwapLayerImgs(3,this)"><img src="/image/n4.gif" border="0" name="imgbtn4" /></p>
		<?}?>
		<?if($mainImg5){?>
			<p style="left:740px;" style="cursor:pointer" onmouseover="onSwapLayerImgs(4,this)"><img src="/image/n5.gif" border="0" name="imgbtn5" /></p>
		<?}?>
<?}else{?>
			<div class="emptyMent">등록된 상품이 없습니다.</div>
<?}?>
		</td>
<script type="text/javascript">
onSwapLayerImgs('0','productBox');
</script>
		<td valign="top">
			<table width="236" height="267" border="0" cellpadding="0" cellspacing="0" bgcolor="#333333">
				<tr>
					<td align="center" valign="top">
						<!--시간및 달력-->
						<?include "oneday_time.php"?>
						<table width="90" height="10" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td></td>
							</tr>
						</table>
						<!--구매 카운트 정보-->
						<?include "oneday_buycount.php"?>
						<!--구매 카운트 정보 끝-->
					</td>
				</tr>
			</table>
			<!--가격 및 주문정보-->
			<table width="236" height="172" border="0" cellpadding="0" cellspacing="0" bgcolor="#4D4C4C">
				<tr>
					<td align="center" valign="top" style="padding-top:13px">
						<table width="201" height="24" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="97" class="font03"><img src="/image/right_title_03.jpg" width="54" height="20"></td>
								<td width="104"><img src="/image/right_title_04.jpg" width="54" height="20"></td>
							</tr>
						</table>
						<table width="201" height="24" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="97" class="font03" style="padding-left:5px"><font color="#FFFFFF"><?=number_format($conprice)?><img src="/image/won.jpg" width="15" height="14"></font></td>
								<td width="104" class="font03" style="padding-left:5px"><font color="#FF6600"><?=number_format($discount_per)?><img src="/image/percent.jpg" width="15" height="14"></font></td>
							</tr>
						</table>
						<table width="90" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="/image/right_line.jpg" width="201" height="2"></td>
							</tr>
						</table>
						<table width="201" height="48" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="56"><img src="/image/right_title_05.jpg" width="57" height="55"></td>
								<td width="145"><span class="font06"><?=number_format($sellprice)?></span><font color="#FFFFFF"><img src="/image/won.jpg" width="15" height="14"></font></td>
							</tr>
						</table>
						<table width="90" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><a id="button_buy" style="cursor:pointer" <?=$msg?>><img src="<?=$button_img?>" border="0" /></a></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<!--가격 및 주문정보 끝-->
		</td>
	</tr>
</table>
</form>
<table width="90" height="11" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td></td>
	</tr>
</table>