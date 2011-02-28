			<table width="175" border="0" cellpadding="0" cellspacing="0">
				<tr><td><img src="../image/left_tit_bbs.gif"></td></tr>
				<tr> 
					<td style="padding-top:5px"><img src="../image/left_top.gif" width="175" height="10"></td>
				</tr>
				<tr> 
					<td background="../image/left_bg.gif" style="padding:0 12 3 15"> 
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							
							<? if(strpos($wiz_admin[permi], "08-01") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
							<tr> 
								<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="bbs_pro_list.php">게시판관리</a></td>
							</tr>
							<tr> 
								<td height="1" bgcolor="#DEDEDE"></td>
							</tr>
							<? } ?>

							<? if(strpos($wiz_admin[permi], "08-02") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
							<tr> 
								<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle">게시물관리</td>
							</tr>
							<?
					  	$sql = "select code,title from wiz_bbsinfo where type != 'SCH'";
							$result = mysql_query($sql) or error(mysql_error());
							while($row = mysql_fetch_object($result)){
								if($row->code == $code) $row->title = "<b>".$row->title."</b>";
							?>
							<tr> 
								<td height="20" style="padding-left:10px"><img src="../image/left_s_arrow.gif" align="absmiddle"><a href="bbs_list.php?code=<?=$row->code?>"><?=$row->title?></a></td>
							</tr>
							<? } ?>
							<? } ?>
							
							
						</table>
					</td>
				</tr>
				<tr> 
					<td><img src="../image/left_bottom.gif" width="175" height="7"></td>
				</tr>
			</table>