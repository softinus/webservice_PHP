<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
if($sub_mode == "update"){
	$sql = "select * from wiz_coupon where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$coupon_info = mysql_fetch_array($result);
}
?>
<script language="JavaScript" type="text/javascript">
<!--
function inputCheck(frm){
   
   if(frm.name.value == ""){
      alert("�������� �Է��ϼ���");
      frm.name.focus();
      return false;
   }
   if(frm.coupon_sdate.value == ""){
      alert("�Ⱓ�� �Է��ϼ���");
      frm.coupon_sdate.focus();
      return false;
   }
   if(frm.coupon_edate.value == ""){
      alert("�Ⱓ�� �Է��ϼ���");
      frm.coupon_edate.focus();
      return false;
   }
   if(frm.coupon_dis.value == ""){
      alert("�������� �Է��ϼ���");
      frm.coupon_dis.focus();
      return false;
   }
   
}
//-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">��������</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">������ ���,�����մϴ�.</td>
        </tr>
      </table>

			<br>
      <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
      <form name="frm" action="shop_save.php" method="post" onSubmit="return inputCheck(this);" enctype="multipart/form-data">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="shop_coupon">
      <input type="hidden" name="sub_mode" value="<?=$sub_mode?>">
      <input type="hidden" name="idx" value="<?=$idx?>">
        <tr> 
          <td width="15%" class="t_name">������</td>
          <td width="85%" class="t_value">
            <input name="coupon_name" value="<?=$coupon_info[coupon_name]?>" type="text" size="60" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">�Ⱓ</td>
          <td class="t_value">
            <input name="coupon_sdate" value="<?=$coupon_info[coupon_sdate]?>" type="text" size="12" class="input" onClick="Calendar1('document.frm','coupon_sdate');"> ~
            <input name="coupon_edate" value="<?=$coupon_info[coupon_edate]?>" type="text" size="12" class="input" onClick="Calendar1('document.frm','coupon_edate');">
          </td>
        </tr>
        <tr> 
          <td class="t_name">�����ݾ�/������</td>
          <td class="t_value">
            <input name="coupon_dis" value="<?=$coupon_info[coupon_dis]?>" type="text" class="input">&nbsp; 
            <input type="radio" name="coupon_type" value="%" <? if($coupon_info[coupon_type] == "" || $coupon_info[coupon_type] == "%") echo "checked"; ?>>% �ۼ�Ʈ 
            <input type="radio" name="coupon_type" value="��" <? if($coupon_info[coupon_type] == "��") echo "checked"; ?>>��
          </td>
        </tr>
        <tr> 
          <td class="t_name">��������</td>
          <td class="t_value">
            <input name="coupon_amount" value="<?=$coupon_info[coupon_amount]?>" type="text" class="input">&nbsp; 
            <input type="checkbox" name="coupon_limit" value="N" <? if($coupon_info[coupon_limit] == "N") echo "checked"; ?>  onClick="if(this.checked==true) this.form.coupon_amount.disabled = true; else this.form.coupon_amount.disabled = false;">�������Ѿ���
          </td>
        </tr>
        <!--tr> 
          <td class="t_name">�����̹���</td>
          <td class="t_value">
          	<?
          	$couponimg_path = "../../images/coupon";
          	if( @file($couponimg_path."/".$coupon_info[coupon_img]) ){
          	?>
          	<img src="/images/coupon/<?=$coupon_info[coupon_img]?>"><br>
          	<?
          	}
          	?>
            <input name="coupon_img" value="<?=$coupon_info[coupon_img]?>" type="file" class="input">&nbsp; 
            
          </td>
        </tr-->
        <? if($sub_mode == "update"){ ?>
        <tr> 
          <td height="25" class="t_name">������ũ</td>
          <td class="t_value">&lt;a href="/shop/coupon_down.php?eventidx=<?=$idx?>"&gt;��ũ��&lt;/a&gt;</td>
        </tr>
        <tr> 
          <td height="25" class="t_name">�����߱�ȸ��</td>
          <td class="t_value">
          	<table width="100%" border="0" cellspacing="2" cellpadding="1">
          		<tr>
          			<td height="20" align="center" class="t_name">��ȣ</td>
          			<td align="center" class="t_name">ȸ���̸�</td>
          			<td align="center" class="t_name">ȸ�����̵�</td>
          			<td align="center" class="t_name">�߱޽ð�</td>
          			<td align="center" class="t_name">��뿩��</td>
          	  </tr>
		          <?
		          $sql = "select wc.wdate, wc.coupon_use, wm.id, wm.name from wiz_mycoupon wc, wiz_member wm where wc.eventidx='$idx' and wc.memid = wm.id";
		          $result = mysql_query($sql) or error(mysql_error());
		          $total = mysql_num_rows($result);
		          while($row = mysql_fetch_object($result)){
		          ?>
              <tr>
          			<td align="center"><?=$total?></td>
          			<td align="center"><?=$row->name?></td>
          			<td align="center"><?=$row->id?></td>
          			<td align="center"><?=$row->wdate?></td>
          			<td align="center"><?=$row->coupon_use?></td>
          	  </tr>
		          <?
		          	$total--;
		          }
		          ?>
            </table>
          </td>
        </tr>
      	<? } ?>
      </table>
      
      <br>
      <table align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_list_l.gif" style="cursor:hand"  onClick="document.location='shop_coupon.php';">
          </td>
        </tr>
      </form>
      </table>
      <br><br>
      

			<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="9d9d9d">
        <tr>
          <td width="5" height="5"><img src="../image/check_left_top.gif"></td>
          <td width="100%"></td>
          <td width="5" height="5"><img src="../image/check_right_top.gif"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
              <td><img src="../image/check_tit.gif" width="75" height="19" /></td>
            </tr>
            <tr>
              <td class="chk_alt">
            	<font color="#000000">�����ٿ�ε� ������ �������</font><br>
              ������ ������ �ٿ�ε� ���� �������� �������Ͽ� �����մϴ�.<br>
          		������ �������� ������ ��ġ�� "������ũ" �ױ׸� �̿��Ͽ� �����ٿ�ε带 ��ũ�� �����մϴ�.<br>
          		��ũ�� Ŭ���ϸ� ������ �ٿ�ε� �˴ϴ�.<br><br>
          	
          		"������ũ" �ױ׷� ��ũ�� �ɸ� ���θ� �����ġ������ �����ٿ�ε� ����� ����� �ֽ��ϴ�.<br>
              </td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="5" height="5"><img src="../image/check_left_bottom.gif" width="5" height="5" /></td>
          <td></td>
          <td width="5" height="5"><img src="../image/check_right_bottom.gif" width="5" height="5" /></td>
        </tr>
      </table>

<? include "../footer.php"; ?>