			<table width="765"  border="0" cellpadding="0" cellspacing="0" bgcolor="#F9F9F7" id="talkTable">
				<tr>
					<td valign="top" style="padding-left:50px">
						<table width="200" height="70" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td style="padding-top:20px"><img src="/image/anyto_title.jpg" width="92" height="24"></td>
							</tr>
						</table>
<?
if($wiz_session[id]==""){
	$readonly = "readonly='readonly'";
	$content = "로그인 하셔야 작성 가능 합니다.";
}else{
	$readonly = "";
	$content = "";
}
?>
<form name="deleteForm" method="post" action="/bbs/save.php">
	<input type="hidden" name="mode" value="delete" />
	<input type="hidden" name="code" value="talk" />
	<input type="hidden" name="idx" value="" />
	<input type="hidden" name="memid" value="<?=$wiz_session[id]?>" />
	<input type="hidden" name="name" value="<?=$wiz_session[name]?>" />
	<input type="hidden" name="prdcode" value="<?=$prdcode?>" />
	<input type="hidden" name="writemode" value="action" />
	<!--
	<input type="hidden" name="return" value="<?=$PHP_SELF."?".$param?>" />
	-->
</form>
				<form name="bbs" method="post" action="/bbs/save.php" onsubmit="return commentWrite(this)">
					<input type="hidden" name="code" value="talk" />
					<input type="hidden" name="prdcode" value="<?=$prdcode?>" />
					<input type="hidden" name="mode" value="write" />
					<input type="hidden" name="memid" value="<?=$wiz_session[id]?>" />
					<input type="hidden" name="name" value="<?=$wiz_session[name]?>" />

						<table width="670" height="84" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td height="36" valign="middle">
									<input type="radio" name="star" value="5" checked /> ★★★★★
									<input type="radio" name="star" value="4" /> ★★★★☆
									<input type="radio" name="star" value="3" /> ★★★☆☆
									<input type="radio" name="star" value="2" /> ★★☆☆☆
									<input type="radio" name="star" value="1" /> ★☆☆☆☆
								</td>
							</tr>
							<tr>
								<td><textarea name="content" class="form01" style="width: 580px;height:84px;" <?=$readonly?>><?=$content?></textarea></td>
								<td width="82"><input type="image" src="/image/anyto_button.jpg" width="82" height="84"></td>
							</tr>
						</table>
				</form>

						<table width="90" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td></td>
							</tr>
						</table>
			
					<div id="talkBox">
					<?
					$sql = "select * from wiz_bbs where prdcode='$prdcode' and depno='0' and code='talk' order by wdate desc limit 0,5";
					$result = mysql_query($sql)or die($sql);
					while($row = mysql_fetch_array($result)){
						$star = $row[star];
						$starTal = 5 - $star;
					?>
						<table width="670" border="0" cellspacing="0" cellpadding="8">
							<tr>
								<td width="70" align="center"><strong><font color="#F97200"><?=$row[name]?></font></strong></td>
								<td width="70" align="center">
								<?
								for($i=1; $i<=$star; $i++){
									echo "★";
								}
								for($i=1; $i<=$starTal; $i++){
									echo "☆";
								}
								?>
								</td>
								<td width="530"><?=$row[content]?> (<?=date("Y.m.d H:i:s",$row[wdate])?>) <img src="/image/anyto_button_02.jpg" width="48" height="16" onclick="onShowCmt('tbl<?=$row[idx]?>')" style="cursor:pointer;"> <img src="/image/btn_del.gif" width="10" height="11" style="cursor:pointer" onclick="onDelete('<?=$row[idx]?>')" /></td>
							</tr>
						</table>
						
						<?
						$sql = "select * from wiz_bbs where prdcode='$prdcode' and depno='1' and code='talk' and grpno='$row[idx]'  order by wdate desc";
						$stm = mysql_query($sql)or die($sql);
						while($rs = mysql_fetch_array($stm)){
						?>
						<table width="670" border="0" cellspacing="0" cellpadding="8">
							<tr>
								<td width="140" align="center"></td>
								<td>┗▶ [<?=$rs[name]?>] <?=$rs[content]?> (<?=date("Y.m.d H:i:s",$rs["wdate"])?>) <img src="/image/btn_del.gif" width="10" height="11" style="cursor:pointer" onclick="onDelete('<?=$rs[idx]?>')" /></td>
							</tr>
						</table>
						<?
						}
						?>

						<table width="670" border="1" cellspacing="0" cellpadding="8" style="display:none" id="tbl<?=$row[idx]?>">
							<tr>
								<form name="reply" action="/bbs/save.php" method="post" onsubmit="return commentWrite(this)">
									<input type="hidden" name="code" value="talk" />
									<input type="hidden" name="prdcode" value="<?=$prdcode?>" />
									<input type="hidden" name="mode" value="reply" />
									<input type="hidden" name="memid" value="<?=$wiz_session[id]?>" />
									<input type="hidden" name="name" value="<?=$wiz_session[name]?>" />
									<input type="hidden" name="idx" value="<?=$row[idx]?>" />
								<td width="106" align="center"></td>
								<td width="400">
									<textarea name="content" style="width:400px; height:40px;" <?=$readonly?>><?=$content?></textarea>
								</td>
								<td><input type="image" src="/image/talk_btn_submit.gif" /></td>
								</form>
							</tr>
						</table>
						<table width="670" height="1" border="0" cellpadding="0" cellspacing="0" background="image/anyto_line_bg.jpg">
							<tr>
								<td></td>
							</tr>
						</table>
					<?
					}	
					?>
					</div>
						<table width="670" height="80" border="0" align="left" cellpadding="0" cellspacing="0">
							<tr>
								<td height="80" valign="middle" align="center"><img src="/image/talk_more.gif" border="0" onclick="onMoreComment('<?=$prdcode?>')" style="cursor:pointer" /></td>
							</tr>
						</table>



						<table width="90" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td></td>
							</tr>
						</table>



					</td>
				</tr>
			</table>
