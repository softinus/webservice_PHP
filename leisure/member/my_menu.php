			<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
	
            <table border="0" cellspacing="0" cellpadding="0" background="/images/member/mypage_bg03.gif">
							<tr>
								<td>
									
									
									<table width="150" border="0" cellspacing="0" cellpadding="0">
									<tr>

									<? if(strpos($PHP_SELF,"_info") !== false){ ?>
									<td width="8"><img src="/images/member/on_bg04.gif"></td>
									<td align="center" background="/images/member/on_bg03.gif"><a href="../member/my_info.php"><img src="/images/member/tab_on06.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/on_bg02.gif"></td>
									<? }else{ ?>
									<td width="8"><img src="/images/member/mypage_bg01.gif"></td>
									<td align="center"><a href="../member/my_info.php"><img src="/images/member/tab_06.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/line.gif"></td>
									<? } ?>

									</tr>
									</table>

								</td>
								<td>
									<table width="150" border="0" cellspacing="0" cellpadding="0">
									<tr>
									
									<? if(strpos($PHP_SELF,"_order") !== false){ ?>
									<td width="8"><img src="/images/member/on_bg04.gif"></td>
									<td align="center" background="/images/member/on_bg03.gif"><a href="../member/my_order.php"><img src="/images/member/tab_on02.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/on_bg02.gif"></td>
									<? }else{ ?>
									<td width="8"></td>
									<td align="center"><a href="../member/my_order.php"><img src="/images/member/tab_02.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/line.gif"></td>
									<? } ?>
									
									</tr>
									</table>			
								</td>
								<td>
									<table width="150" border="0" cellspacing="0" cellpadding="0">
									<tr>
										
									<? if(strpos($PHP_SELF,"_reserve") !== false){ ?>
									<td width="8"><img src="/images/member/on_bg04.gif"></td>
									<td align="center" background="/images/member/on_bg03.gif"><a href="../member/my_reserve.php"><img src="/images/member/tab_on03.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/on_bg02.gif"></td>
									<? }else{ ?>
									<td width="8"></td>
									<td align="center"><a href="../member/my_reserve.php"><img src="/images/member/tab_03.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/line.gif"></td>
									<? } ?>
									</tr>
									</table>
								</td>
								<td>
									<table width="150" border="0" cellspacing="0" cellpadding="0">
									<tr>
									
									<? if(strpos($PHP_SELF,"_qna") !== false){ ?>
									<td width="8"><img src="/images/member/on_bg04.gif"></td>
									<td align="center" background="/images/member/on_bg03.gif"><a href="../member/my_qna.php"><img src="/images/member/tab_on04.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/on_bg02.gif"></td>
									<? }else{ ?>
									<td width="8"></td>
									<td align="center"><a href="../member/my_qna.php"><img src="/images/member/tab_04.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/line.gif"></td>
									<? } ?>
									
									</tr>
									</table>
								</td>								
								<td>
									<table width="150" border="0" cellspacing="0" cellpadding="0">
									<tr>
									<td width="8"></td>
									
									<? if(strpos($PHP_SELF,"_out") !== false){ ?>
									<td width="8"><img src="/images/member/on_bg04.gif"></td>
									<td align="center" background="/images/member/on_bg03.gif"><a href="../member/my_out.php"><img src="/images/member/tab_on07.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/on_bg05.gif"></td>
									<? }else{ ?>
									<td align="center"><a href="../member/my_out.php"><img src="/images/member/tab_07.gif" border="0" align="absmiddle"></a></td>
									<td width="8"><img src="/images/member/mypage_bg02.gif"></td>
									<? } ?>
									
									</tr>
									</table>
                </td>
							</tr>
						</table>
	
					</td>
				</tr>
				<tr>
					<td background="/images/member/mypage_bg06.gif">
	
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
						<td width="8"><img src="/images/member/mypage_bg04.gif"></td>
						<td style="padding:0 0 0 15;"><img src="/images/myshop_icon.gif" align=absmiddle><font color=#ADFFFC><b><?=$wiz_session[name]?></b></font> <font color=#ffffff><b> ���� ���̼����Դϴ�.</b></font></td>
						<td align="right" style="padding:0 10 0 0;"><img src="/images/member/title_01.gif"></td>
						<td width="8"><img src="/images/member/mypage_bg05.gif"></td>
						</tr>
						</table>
	
					</td>
					
				</tr>
			</table>
			
		  <table><tr><td height="5"></td></tr></table>
			
			<?
			// �ѱ��ž�
			$sql = "select sum(total_price) as total_price from wiz_order where send_id = '$mem_info->id' and (status = 'DC' OR status = 'CC')";
			$result = mysql_query($sql) or error(mysql_error());
			$row = mysql_fetch_object($result);
			$total_price = $row->total_price;
			
			// ������
			$sql = "select sum(reserve) as total_reserve from wiz_reserve where memid = '$mem_info->id'";
			$result = mysql_query($sql) or error(mysql_error());
			$row = mysql_fetch_object($result);
			$total_reserve = $row->total_reserve;
			
			$level_info = level_info();
			?>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr>
					<td height=10 width=10 background="/images/round_box_01.gif"></td>
					<td background="/images/round_box_02.gif"></td>
					<td width=10 background="/images/round_box_03.gif"></td>
				</tr>
				<tr>
				<td background="/images/round_box_04.gif"></td>
					<td align=center>
						<table border=0 cellpadding=0 cellspacing=0 width=95%>
							<tr>
								<td width=25%><img src="/images/myshop_pic.gif"></td>
								<td>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									  <tr>
									    <td width=80 height=30><img src="/images/blue_icon.gif" align=absmiddle>���̵�</td>
										 <td> : <?=$mem_info->id?> <? if($wiz_session[level] != ""){ ?>[<?=$level_info[$wiz_session[level]][name]?>] <?}?></td>
									  </tr>
									  <tr><td height=1 bgcolor=#dadada colspan=2></td></tr>
									  <tr>
									    <td height=30><img src="/images/blue_icon.gif" align=absmiddle>�� ���ž�</td>
									    <td> : <?=number_format($total_price)?>�� &nbsp;<a href="../member/my_info.php"><img src="/images/but_infomodify.gif" border=0 align=absmiddle></a></td></tr>
									  <tr><td height=1 bgcolor=#dadada colspan=2></td></tr>
									  <tr>
									    <td height=30><img src="/images/blue_icon.gif" align=absmiddle>������</td>
									    <td> : <?=number_format($total_reserve)?>�� &nbsp;<a href="../member/my_reserve.php"><img src="/images/but_pointlist.gif" border=0 align=absmiddle></a></td></tr>
									  <tr><td height=1 bgcolor=#dadada colspan=2></td></tr>
									  <tr>
									    <td height=30><img src="/images/blue_icon.gif" align=absmiddle>�����湮��</td>
									    <td> : <?=$mem_info->visit_time?></td></tr>
									  <tr><td height=1 bgcolor=#dadada colspan=2></td></tr>
									  <tr>
									    <td height=30><img src="/images/blue_icon.gif" align=absmiddle>��&nbsp;&nbsp;�� : </td>
										 <td> : <?=$mem_info->post?> <?=$mem_info->address?> <?=$mem_info->address2?></td>
									  </tr>
									</table>
							</td></tr>
						</table>
					</td>
					<td background="/images/round_box_05.gif"></td>
				</tr>
				<tr>
					<td height=10 background="/images/round_box_06.gif"></td>
					<td background="/images/round_box_07.gif"></td>
					<td background="/images/round_box_08.gif"></td>
				</tr>
			</table>
			
			