<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

		  <table border="0" cellspacing="0" cellpadding="2">
		    <tr>
		      <td><img src="../image/ic_tit.gif"></td>
		      <td valign="bottom" class="tit">�������м�</td>
		      <td width="2"></td>
		      <td valign="bottom" class="tit_alt">�������ܺ�, ���ں� ���м�</td>
		    </tr>
		  </table>			
		  <br>	  
      
       <table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
       <form name="frm" action="<?=$PHP_SELF?>" method="get">
       <tr>
       <td width="15%" class="t_name">&nbsp; �м����</td>
       <td width="85%" class="t_value">
       <input type="radio" name="analy_type" value="OP" onClick="this.form.submit();" <? if($analy_type == "OP" || $analy_type == "") echo "checked"; ?>>�������ܺ�
       <input type="radio" name="analy_type" value="OY" onClick="this.form.submit();" <? if($analy_type == "OY") echo "checked"; ?>>�⺰
       <input type="radio" name="analy_type" value="OM" onClick="this.form.submit();" <? if($analy_type == "OM") echo "checked"; ?>>����
       <input type="radio" name="analy_type" value="OD" onClick="this.form.submit();" <? if($analy_type == "OD") echo "checked"; ?>>�Ϻ�
       <input type="radio" name="analy_type" value="OW" onClick="this.form.submit();" <? if($analy_type == "OW") echo "checked"; ?>>���Ϻ�
       </td>
       </tr>
       <tr>
       <td class="t_name">&nbsp; �Ⱓ</td>
       <td class="t_value">
       
       <select name="prev_year" class="select2">
      <?                     
         if(empty($next_year)) $next_year = date("Y");
         if(empty($next_month)) $next_month = date("m");
         if(empty($next_day)) $next_day = date("d");

         for($ii=2004; $ii <= 2020; $ii++){
           if($ii == $prev_year) echo "<option value=$ii selected>$ii";
           else echo "<option value=$ii>$ii";
         }
      ?>
        </select>
        �� 
        <select name="prev_month" class="select2">
          <?
         for($ii=1; $ii <= 12; $ii++){
           if($ii<10) $ii = "0".$ii;
           if($ii == $prev_month) echo "<option value=$ii selected>$ii";
           else echo "<option value=$ii>$ii";
         }
      ?>
        </select>
        �� 
        <select name="prev_day" class="select2">
          <?
         for($ii=1; $ii <= 31; $ii++){
           if($ii<10) $ii = "0".$ii;
           if($ii == $prev_day) echo "<option value=$ii selected>$ii";
           else echo "<option value=$ii>$ii";
         }
      ?>
        </select>
        �� ~ 
        <select name="next_year" class="select2">
          <?
         for($ii=2004; $ii <= 2020; $ii++){
           if($ii == $next_year) echo "<option value=$ii selected>$ii";
           else echo "<option value=$ii>$ii";
         }
      ?>
        </select>
        �� 
        <select name="next_month" class="select2">
          <?
         for($ii=1; $ii <= 12; $ii++){
           if($ii<10) $ii = "0".$ii;
           if($ii == $next_month) echo "<option value=$ii selected>$ii";
           else echo "<option value=$ii>$ii";
         }
      ?>
        </select>
        �� 
        <select name="next_day" class="select2">
          <?
         for($ii=1; $ii <= 31; $ii++){
           if($ii<10) $ii = "0".$ii;
           if($ii == $next_day) echo "<option value=$ii selected>$ii";
           else echo "<option value=$ii>$ii";
         }
      ?>
        </select>
        ��&nbsp; 
       <input type="image" src="../image/btn_search.gif" align="absmiddle">
       </td>
       </form>
       </table>


      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr><td height="10"></td></tr>
      </table> 
      
      <?
      
      if(!empty($prev_year)){
         $prev_period = $prev_year."-".$prev_month."-".$prev_day." 00:00:00";
         $next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
         $period_sql = " and order_date >= '$prev_period' and order_date <= '$next_period'";
      }
      
      // �� �����
      
      $sql = "select sum(total_price) as total_price from wiz_dayorder where (status = 'DC' or status = 'CC') $period_sql";
      $result = mysql_query($sql) or error(mysql_error());
      $row = mysql_fetch_object($result);
      $total_perprice = $row->total_price;

      
      // �������ܺ�
		if($analy_type == "OP" || $analy_type == ""){

			echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>\n";
			echo "	<tr><td class='t_rd' colspan='20'></td></tr>\n";
			echo "  <tr class='t_th'> \n";
			echo "    <th width='15%'>�������</th>\n";
			echo "    <th width='15%'>�����</th>\n";
			echo "    <th width='15%'>�ֹ��Ǽ�</th>\n";
			echo "    <th width='15%'>����</th>\n";
			echo "    <th width='40%'>�׷���</th>\n";
			echo "  </tr>\n";
			echo "	<tr><td class='t_rd' colspan='20'></td></tr>\n";

			$sql = "select pay_method from wiz_dayorder where (status = 'DC' or status = 'CC') $period_sql group by pay_method";
			$result = mysql_query($sql) or error(mysql_error());
			
			$lists = 10;
			$rows = 24;
			$total = mysql_num_rows($result);
			$page_count = ceil($total/$rows);
			if(!$page || $page > $page_count) $page = 1;
			$start = ($page-1)*$rows;
			$no = 0;
			
			$sql = "select pay_method , count(*) as count, sum(total_price) as total_price from wiz_dayorder where (status = 'DC' or status = 'CC') $period_sql group by pay_method limit $start, $rows";
			$result = mysql_query($sql) or error(mysql_error());
			
			while(($row = mysql_fetch_object($result)) && $rows){
			
				$percent = ceil(($row->total_price/$total_perprice)*100);
				
				echo "<tr> \n";
				echo "  <td height='30' align='center'>".pay_method($row->pay_method)."</td>\n";
				echo "  <td align='center'>".number_format($row->total_price)."��</td>\n";
				echo "  <td align='center'>".$row->count."</td>\n";
				echo "  <td align='center'>".$percent."%</td>\n";
				echo "  <td><img src='../image/mark_bar.gif' width='".($percent*2)."' height='10'></td>\n";
				echo "</tr>\n";
				echo "<tr><td colspan='20' class='t_line'></td></tr>\n";
				
				$no--;
				$rows--;
			
			}
			
			if($total <= 0){
				echo "<tr><td height='30' colspan=9 align=center>��ϵ� ������ �����ϴ�.</td></tr>";
				echo "<tr><td colspan='20' class='t_line'></td></tr>\n";
			}
			echo "</table>\n";
      
      
      // �⺰���
		}else{

			function getPeriod($priod){
			
				global $analy_type;
			
				if($analy_type == "OW"){
				
			     if($priod == 2) return "��";
			     if($priod == 3) return "ȭ";
			     if($priod == 4) return "��";
			     if($priod == 5) return "��";
			     if($priod == 6) return "��";
			     if($priod == 7) return "��";
			     if($priod == 1) return "��";
			     
			  }else{
			  
			  	return $priod;
			  	
			  }
			}

			$sql = "select sum(total_price) as sum_total from wiz_dayorder where status = 'CC' or status = 'DC'";
			$result = mysql_query($sql) or error(mysql_error());
			$row = mysql_fetch_object($result);
			$sum_total = $row->sum_total;

			if($analy_type == "OY"){
				
				$sql = "select count(orderid) as ordercnt, substring(order_date,1,4) as priod, sum(total_price) as total_price from wiz_dayorder where (status = 'CC' or status = 'DC') $period_sql group by substring(order_date,1,4)";
				$period = "��";
				
			}else if($analy_type == "OM"){
				
				$sql = "select count(orderid) as ordercnt, substring(order_date,6,2) as priod, sum(total_price) as total_price from wiz_dayorder where (status = 'CC' or status = 'DC') $period_sql group by substring(order_date,6,2)";
				$period = "��";
				
			}else if($analy_type == "OD"){

				$sql = "select count(orderid) as ordercnt, substring(order_date,9,2) as priod, sum(total_price) as total_price from wiz_dayorder where (status = 'CC' or status = 'DC') $period_sql group by substring(order_date,9,2)";
				$period = "��";
				
			}else if($analy_type == "OW"){
				
				$sql = "select count(orderid) as ordercnt, DAYOFWEEK(order_date) as priod, sum(total_price) as total_price from wiz_dayorder where (status = 'CC' or status = 'DC') $period_sql group by DAYOFWEEK(order_date)";
				$period = "����";
			}

			echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>\n";
			echo "	<tr><td class='t_rd' colspan='20'></td></tr>\n";
			echo " <tr class='t_th'> \n";
			echo "    <th width='10%'>$period</th>\n";
			echo "    <th width='15%'>�ֹ��Ǽ�</th>\n";
			echo "    <th width='15%'>�����</th>\n";
			echo "    <th width='10%'>����</th>\n";
			echo "    <th width='20%'>�׷���</th>\n";
			echo "  </tr>\n";
			echo "	<tr><td class='t_rd' colspan='20'></td></tr>\n";
			
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			
			while($row = mysql_fetch_object($result)){
			
				$percent = ($row->total_price/$sum_total)*100;
				$percent = substr($percent,0,strpos($percent,'.')+3);
				
				echo "<tr> \n";
				echo "  <td height='30' align='center'>".getPeriod($row->priod)."</td>\n";
				echo "  <td align='center'>".$row->ordercnt."</td>\n";
				echo "  <td align='center'>".number_format($row->total_price)."��</td>\n";
				echo "  <td align='center'>".$percent."%</td>\n";
				echo "  <td><img src='../image/mark_bar.gif' width='".($percent*2)."' height='10'></td>\n";
				echo "</tr>\n";
				echo "<tr><td colspan='20' class='t_line'></td></tr>\n";
				
			
			}
			
			if($total <= 0){
				echo "<tr><td height=30 colspan=10 align=center>��ϵ� ������ �����ϴ�.</td></tr>";
				echo "<tr><td colspan='20' class='t_line'></td></tr>\n";
			}
			echo "</table>\n";
		}
		
?>


<? include "../footer.php"; ?>