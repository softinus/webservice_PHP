<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<script language="javascript">
<!--
function openParameter(){
	var url = "connect_param.php";
	window.open(url,"orderList","height=300, width=650, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
-->
</script>

		  <table border="0" cellspacing="0" cellpadding="2">
		    <tr>
		      <td><img src="../image/ic_tit.gif"></td>
		      <td valign="bottom" class="tit">���Ӱ�κм�</td>
		      <td width="2"></td>
		      <td valign="bottom" class="tit_alt">����Ʈ ���� ��θ� �м��մϴ�.</td>
		    </tr>
		  </table>
		  <br>

      <table width="100%" border="0" cellpadding="2" cellspacing="6">
      <form name="frm" action="<?=$PHP_SELF?>" method="get">
        <tr>
          <td bgcolor="ffffff">
          <table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
          <tr>
          <td width="15%" class="t_name">&nbsp; �м����</td>
          <td width="85%" class="t_value">
          <input type="radio" name="analy_type" value="RA" onClick="this.form.search_engin.value='';this.form.submit();" <? if($analy_type == "RA" || $analy_type == "") echo "checked"; ?>>���Ӱ��
          <input type="radio" name="analy_type" value="RB" onClick="this.form.search_engin.value='';this.form.submit();" <? if($analy_type == "RB") echo "checked"; ?>>�˻�����,��ũ����Ʈ
          <input type="radio" name="analy_type" value="RC" onClick="this.form.search_engin.value='';this.form.submit();" <? if($analy_type == "RC") echo "checked"; ?>>�˻�Ű����
          <a href="javascript:openParameter();"><img src="../image/btn_searchkey.gif" align="absmiddle" border="0"></a>
          </td>
          </tr>
          <tr>
          <td class="t_name">&nbsp; �˻�����</td>
          <td class="t_value">
            <select name="search_engin">
            <option value="">:: �˻����� ���� ::
            <option value="yahoo" <? if($search_engin == "yahoo") echo "selected"; ?>>Yahoo
            <option value="naver" <? if($search_engin == "naver") echo "selected"; ?>>Naver
            <option value="empas" <? if($search_engin == "empas") echo "selected"; ?>>Empas
            <option value="daum" <? if($search_engin == "daum") echo "selected"; ?>>Daum
            <option value="msn" <? if($search_engin == "msn") echo "selected"; ?>>Msn
            <option value="google" <? if($search_engin == "google") echo "selected"; ?>>Google
            <option value="nate" <? if($search_engin == "nate") echo "selected"; ?>>Nate
            <option value="korea" <? if($search_engin == "korea") echo "selected"; ?>>Korea.com
            <option value="dreamwiz" <? if($search_engin == "dreamwiz") echo "selected"; ?>>DreamWiz
            <option value="netian" <? if($search_engin == "netian") echo "selected"; ?>>Netian
            </select>
            <input type="image" src="../image/btn_search.gif" align="absmiddle">
          </td>
          </tr>
          </table>
          </td>
        </tr>
      </form>
      </table>
      
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr><td height="10"></td></tr>
      </table> 
      <?

      if(!empty($prev_year)){
         $prev_period = $prev_year."".$prev_month."".$prev_day."00";
         $next_period = $next_year."".$next_month."".$next_day."24";
         $period_sql = " where time >= '$prev_period' and time <= '$next_period' ";
      }

		// ���ӽð���
		if($analy_type == "RA" || $analy_type == ""){

			$sql = "select sum(cnt) as total_cnt from wiz_conrefer";
			$result = mysql_query($sql) or error(mysql_error());
			$row = mysql_fetch_object($result);
			$total_cnt = $row->total_cnt;

			echo "<table width='100%' border='0' cellspacing='0' cellpadding='0' >\n";
			echo "	<tr><td class='t_rd' colspan='20'></td></tr>";
			echo "  <tr class='t_th'> \n";
			echo "    <th width='7%'>��ȣ</th>";
			echo "    <th width='73%'>�湮���</th>\n";
			echo "    <th width='10%'>�����ڼ�</th>\n";
			echo "    <th width='10%'>����</th>\n";
			echo "  </tr>\n";
			echo "	<tr><td class='t_rd' colspan='20'></td></tr>";

			$sql = "select cnt from wiz_conrefer where host like '%$search_engin%' order by cnt desc";
			$result = mysql_query($sql) or error(mysql_error());

			$lists = 5;
			$rows = 20;
			if(empty($page)) $page = 1;
			$total = mysql_num_rows($result);
			$page_count = ceil($total/$rows);
			$start = ($page-1)*$rows;
			$no = $total-$start;

			$sql = "select * from wiz_conrefer where host like '%$search_engin%' order by cnt desc limit $start, $rows";
			$result = mysql_query($sql) or error(mysql_error());

			while(($row = mysql_fetch_object($result)) && $rows){

				$percent = ceil(($row->cnt/$total_cnt)*100);

				if(empty($row->referer)) $row->referer = "���ã�⳪ �����湮";

            echo "<tr> \n";
            echo "  <td align='center' height='30'>$no</td>";
            echo "  <td style='word-break:break-all;'><a href='$row->referer' target='_blank'>$row->referer</a></td>\n";
            echo "  <td align='center'>".$row->cnt."</td>\n";
            echo "  <td align='center'>".$percent."%</td>\n";
            echo "</tr>\n";
            echo "<tr><td colspan='20' class='t_line'></td></tr>\n";

      		$no--;
            $rows--;
        }
        if($total <= 0){
    		 echo "<tr><td height='30' colspan=10 align=center>���Ӱ�� ������ �����ϴ�.</td></tr>";
    		 echo "<tr><td colspan='20' class='t_line'></td></tr>\n";
    	}
        echo "</table>\n";

      }else if($analy_type == "RB"){

      	$sql = "select sum(cnt) as total_cnt from wiz_conrefer where referer <> ''";
      	$result = mysql_query($sql) or error(mysql_error());
      	$row = mysql_fetch_object($result);
      	$total_cnt = $row->total_cnt;

				echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>\n";
				echo "	<tr><td class='t_rd' colspan='20'></td></tr>";
				echo "  <tr class='t_th'> \n";
				echo "    <th width='7%'>��ȣ</th>";
				echo "    <th width='43%'>�˻�����</th>\n";
				echo "    <th width='10%'>�����ڼ�</th>\n";
				echo "    <th width='10%'>����</th>\n";
				echo "    <th width='30%'>�׷���</th>\n";
				echo "  </tr>\n";
				echo "	<tr><td class='t_rd' colspan='20'></td></tr>";

         $sql = "select sum(cnt) as cnt from wiz_conrefer where host <> '' and host like '%$search_engin%' group by host order by cnt desc";
         $result = mysql_query($sql) or error(mysql_error());

         $lists = 5;
         $rows = 20;
         $total = mysql_num_rows($result);
         $page_count = ceil($total/$rows);
         if(!$page || $page > $page_count) $page = 1;
         $start = ($page-1)*$rows;
         $no = $total-$start;

         $sql = "select sum(cnt) as cnt, host from wiz_conrefer where host <> '' and host like '%$search_engin%' group by host order by cnt desc limit $start, $rows";
         $result = mysql_query($sql) or error(mysql_error());

       	while(($row = mysql_fetch_object($result)) && $rows){

         	if(($no%2) == 0) $bgcolor="#ffffff";
         	else $bgcolor="#F3F3F3";

         	$percent = ceil(($row->cnt/$total_cnt)*100);

            echo "<tr> \n";
            echo "  <td align='center' height='30'>$no</td>";
            echo "  <td><a href='http://$row->host' target='_blank'>$row->host</a></td>\n";
            echo "  <td align='center'>$row->cnt</td>\n";
            echo "  <td align='center'>".$percent."%</td>\n";
            echo "  <td><img src='../image/mark_bar.gif' width='".($percent*2)."' height='10'></td>\n";
            echo "</tr>\n";
            echo "<tr><td colspan='20' class='t_line'></td></tr>\n";

      		$no--;
          $rows--;
        }
        if($total <= 0){
    		 echo "<tr><td height='30' colspan=10 align=center>���Ӱ�� ������ �����ϴ�.</td></tr>";
    		 echo "<tr><td colspan='20' class='t_line'></td></tr>\n";
    	  }
        echo "</table>\n";

      }else if($analy_type == "RC"){

			// �м��� �Ķ���� ��������
       	$sql = "select con_parameter from wiz_operinfo";
       	$result = mysql_query($sql) or error(mysql_error());
	   		$row = mysql_fetch_object($result);
	   		$parameter = explode(",",$row->con_parameter);

      	$sql = "select sum(cnt) as total_cnt from wiz_conrefer where referer <> ''";
      	$result = mysql_query($sql) or error(mysql_error());
      	$row = mysql_fetch_object($result);
      	$total_cnt = $row->total_cnt;

				echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>\n";
				echo "	<tr><td class='t_rd' colspan='20'></td></tr>";
				echo "  <tr class='t_th'> \n";
				echo "    <th width='7%'>��ȣ</th>";
				echo "    <th width='53%'>Ű����</th>\n";
				echo "    <th width='10%'>�����ڼ�</th>\n";
				echo "    <th width='10%'>����</th>\n";
				echo "    <th width='20%'>�׷���</th>\n";
				echo "  </tr>\n";
				echo "	<tr><td class='t_rd' colspan='20'></td></tr>";

      	$sql = "select * from wiz_conrefer where host like '%$search_engin%' order by cnt desc";
      	$result = mysql_query($sql) or error(mysql_error());
      	$key_list_tmp = Array();
		$no = 0;
      	while($row = mysql_fetch_object($result)){

      		if($row->referer != ""){

      			for($ii=0; $ii < count($parameter) && $parameter[$ii] != ""; $ii++){

         			$key_start = strpos($row->referer, $parameter[$ii]."=");
         			if($key_start > 0){
         				$key_start = $key_start + strlen($parameter[$ii]."=");
         				$key_end =  strpos($row->referer, "&", $key_start);
         				if($key_end <= 0) $key_end = strlen($row->referer);

         				$keyword = substr($row->referer, $key_start, $key_end-$key_start);
         				$keyword = str_replace("%u", "%", $keyword);
						$keyword = urldecode($keyword);
         				$keyword = str_conv($keyword, "EUC-KR");

         				$key_list_tmp[$no][name] = $keyword;
         				$key_list_tmp[$no][cnt] = $row->cnt;

      					$no++;
         			}

      			}

      		}


      	}

      	if(count($key_list_tmp) > 1) sort($key_list_tmp);

      	$key_name_tmp = "";
      	$key_cnt_tmp = 0;
      	$no = -1;

      	for($ii=0; $ii < count($key_list_tmp); $ii++){

      		if($key_name_tmp != $key_list_tmp[$ii][name]){
      			$no++;
      			$key_name_tmp = $key_list_tmp[$ii][name];
      			$key_list[$no][cnt] = $key_list_tmp[$ii][cnt];
      			$key_list[$no][name] = $key_list_tmp[$ii][name];
      		}else{
      			$key_list[$no][cnt] += $key_list_tmp[$ii][cnt];
      		}
      	}

      	if(count($key_list) > 0) rsort($key_list);
      	$no = count($key_list);

      	$lists = 5;
         $rows = 20;
         if(empty($page)) $page = 1;
         $total = count($key_list);
         $page_count = ceil($total/$rows);
         $start = ($page-1)*$rows;
         $no = $total-$start;

         $cnt = 0;

         if($total_cnt > 0){

      	for($ii=$start; $ii < count($key_list) && $rows > 0; $ii++){

      		if(!empty($key_list[$ii][name])){

      			$percent = ceil(($key_list[$ii][cnt]/$total_cnt)*100);

      			echo "<tr> \n";
            	echo "  <td align='center'>$no</td>";
            	echo "  <td height='30'>".$key_list[$ii][name]."</td>\n";
            	echo "  <td align='center'>".$key_list[$ii][cnt]."</td>\n";
            	echo "  <td align='center'>".$percent."%</td>\n";
            	echo "  <td><img src='../image/mark_bar.gif' width='".($percent*2)."' height='10'></td>\n";
            	echo "</tr>\n";
            	echo "<tr><td colspan='20' class='t_line'></td></tr>\n";

            	$cnt++;
            }

            $rows--;
            $no--;
      	}

      	}

      	if($cnt <= 0){
    		  echo "<tr><td height='30' colspan=10 align=center>���Ӱ�� ������ �����ϴ�.</td></tr>";
    		  echo "<tr><td colspan='20' class='t_line'></td></tr>\n";
    	   }
         echo "</table>\n";

      }
   	?>
      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
      </table>
	  	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
      	<tr>
          <td width="33%"></td>
          <td width="33%"><? print_pagelist($page, $lists, $page_count, "&analy_type=$analy_type&search_engin=$search_engin"); ?></td>
          <td width="33%" align="right"></td>
        </tr>
      </table>


<? include "../footer.php"; ?>