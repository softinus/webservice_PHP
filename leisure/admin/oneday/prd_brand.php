<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
if(empty($mode)) $mode = "insert";

if($mode == "update"){
   $sql = "select * from wiz_brand where idx = '$idx'";
   $result = mysql_query($sql) or error(mysql_error());
   $brd_info = mysql_fetch_array($result);
}
?>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">�귣�����</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">�귣�带 �����մϴ�.</td>
			  </tr>
			</table>
			
			<br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td width="40%" valign="top">
         <table width="100%" border="0" cellspacing="1" cellpadding="0">
           <tr>
             <td valign="top">

                <table width="100%" height="400" border="0" cellspacing="6" cellpadding="6" bgcolor="B7AEAB">
                <tr><td valign="top" bgcolor="#ffffff">
                <? include "brand_list.php"; ?>
                </td></tr>
                </table>

             </td>
             <td width="5"></td>
             <td>
               <br><br><br>
               <a href="brand_save.php?mode=updateprior&posi=up&idx=<?=$idx?>"><img src="../image/cat_up.gif" border="0"></a><br><br><br><br>
               <a href="brand_save.php?mode=updateprior&posi=down&idx=<?=$idx?>"><img src="../image/cat_down.gif" border="0"></a>
             </td>
             <td width="10"></td>
           </tr>
         </table>
      </td>
      <td width="60%" height="400" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td>
                <script language="JavaScript" type="text/javascript">
                <!--
                
                  function inputCheck(frm){
                    if(frm.brdname.value == ""){
                      alert("�з����� �Է��ϼ���");
                      frm.brdname.focus();
                      return false;
                    }
                  }
                  
                  function showBrdsub(gubun){

                  	brd_sub.style.display = 'none';
                  	brd_sub2.style.display = 'none';
                  	
                  	if(gubun == "NON") brd_sub.style.display = 'none';
                  	else if(gubun == "FIL") brd_sub.style.display = '';
                  	else if(gubun == "HTM") brd_sub2.style.display = '';

						     }
								 function delConfirm(){
								   if(confirm("�귣�带 ���� �Ͻðڽ��ϱ�?")){
								      document.location='brand_save.php?mode=delete&idx=<?=$idx?>';
								   }
								 }
                 -->
                </script>
                <?
                if($mode == "") $mode = "insert";
                ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0"  valign="top">
                <form action="brand_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this);">
                <input type="hidden" name="tmp">
                <input type="hidden" name="mode" value="<?=$mode?>">
                <input type="hidden" name="idx" value="<?=$idx?>">
                 <tr>
                   <td bgcolor="D5D3D3">
                     <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
                       <tr> 
                         <td width="20%" class="t_name">��ġ</td>
                         <td width="80%" class="t_value">
                         <?
                         $brdname = "�ֻ���";
                         if($idx != ""){
												   $sql = "select * from wiz_brand where idx = '$idx'";
												   $result = mysql_query($sql) or error(mysql_error());
												   
												   while($prow = mysql_fetch_object($result)){
												      $catname .= " &gt; <a href=prd_brand.php?mode=update&idx=$prow->idx>$prow->brdname</a>";
												   }
													}
                         	echo $brdname;
                         ?>
                         </td>
                       </tr>
                       <?
                       if($idx != ""){
                       ?>
                       <tr> 
                         <td class="t_name">��ũ�ּ�</td>
                         <td class="t_value">/shop/prd_list.php?brand=<?=$idx?></td>
                       </tr>
                       <?
                       }
                       ?>
                       <tr> 
                         <td class="t_name">�귣���</td>
                         <td class="t_value">
                         <input name="brdname" value="<?=$brd_info[brdname]?>" size="30" type="text" class="input">&nbsp; 
                         <input type="checkbox" name="brduse" value="N" <? if($brd_info[brduse] == "N") echo "checked"; ?>>�귣�����
                         </td>
                       </tr>
                       <!--tr> 
                         <td class="t_name">�޴��̹���</td>
                         <td class="t_value">
                         <?
                         if(is_file("../../data/brdimg/$brd_info[brdimg]")) echo "<img src='/data/brdimg/$brd_info[brdimg]'> <a href=brand_save.php?mode=delbrdimg&idx=$idx><font color=red>[����]</font></a>";
                         ?>
                         <input name="brdimg" type="file" class="input">
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">�ѿ����̹���</td>
                         <td class="t_value">
                         <?
                         if(is_file("../../data/brdimg/$brd_info[brdimg_over]")) echo "<img src='/data/brdimg/$brd_info[brdimg_over]'> <a href=brand_save.php?mode=delbrdimg_over&idx=$idx><font color=red>[����]</font></a>";
                         ?>
                         <input name="brdimg_over" type="file" class="input">
                         </td>
                       </tr//-->
                       <tr> 
                         <td class="t_name">������</td>
                         <td class="t_value">
                         <input type="radio" name="subimg_type" onClick="showBrdsub('NON');" value="NON" <? if($brd_info[subimg_type] == "NON" || $brd_info[subimg_type] == "") echo "checked"; ?>>����
                         <input type="radio" name="subimg_type" onClick="showBrdsub('FIL');" value="FIL" <? if($brd_info[subimg_type] == "FIL") echo "checked"; ?>>�̹���
                         <input type="radio" name="subimg_type" onClick="showBrdsub('HTM');" value="HTM" <? if($brd_info[subimg_type] == "HTM") echo "checked"; ?>>HTML

                          <div id='brd_sub' style="display:<? if($brd_info[subimg_type] == "FIL") echo "show"; else echo "none"; ?>">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td class="t_value">
                            <?
                            if(is_file("../../data/subimg/$brd_info[subimg]")){
                            	$img_ext = substr($brd_info[subimg],-3);
                           	echo "<img src='/data/subimg/$brd_info[subimg]' width='290' height='50'>";
                            }
                            ?>
                            <input name="subimg" type="file" class="input">
                            </td>
                          </tr>
                          </table>
                          </div>
                          
                          <div id='brd_sub2' style="display:<? if($brd_info[subimg_type] == "HTM") echo "show"; else echo "none"; ?>">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td class="t_value">
                            <textarea name="subimg02" cols="45" rows="5" class="textarea"><?=$brd_info[subimg]?></textarea>
                            </td>
                          </tr>
                          </table>
                          </div>
                       
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">��ǰũ��</td>
                         <td class="t_value">
                         ���� <input type="text" name="prd_width" value="<?=$brd_info[prd_width]?>" size="5" class="input"> px&nbsp; 
                         ���� <input type="text" name="prd_height" value="<?=$brd_info[prd_height]?>" size="5" class="input"> px 
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">��ǰ������</td>
                         <td class="t_value">
                         <input type="text" name="prd_num" value="<? if($brd_info[prd_num]=="") echo "20"; else echo $brd_info[prd_num]; ?>" size="5" class="input"> ��&nbsp; 
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">��õ��ǰ ����</td>
                         <td class="t_value">
                         <input type="radio" name="recom_use" value="Y" <? if($brd_info[recom_use] == "Y") echo "checked";?>>���
                         <input type="radio" name="recom_use" value="N" <? if($brd_info[recom_use] == "N" || $brd_info[recom_use] == "" ) echo "checked";?>>������<br>
                         ��ǰ��� ������ ��ܿ� ��õ��ǰ ����
                         </td>
                       </tr>
                     </table>
                   </td>
                 </tr>
               </table>
               <table width="10" height="10" border="0" cellpadding="0" cellspacing="0">
                 <tr> 
                   <td></td>
                 </tr>
               </table>
               <table border="0" cellspacing="0" cellpadding="0" align="center">
               <?
               if($mode == "insert"){
               ?>
                 <tr>
                   <td align="center"><input type="image" src="../image/btn_confirm_l.gif"></td>
                 </tr>
               <?
               }else if($mode == "update"){
               ?>
                 <tr>
                   <td width="60">
                   </td>
                   <td width="100">&nbsp;</td>
                   <td><input type="image" src="../image/btn_edit_l.gif"></td>
                   <td width="10">&nbsp;</td>
                   <td><img src="../image/btn_delete_l.gif" style="cursor:hand" onClick="delConfirm();"></td>
                   <td width="100">&nbsp;</td>
                 </tr>
               <?
               }
               ?>
               </form>
               </table>
               
               <br>
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
				            	- �귣�� ���� ������ �귣�� Ŭ���� �����ʿ��� �����մϴ�.<br>
				            	- �귣�� ���� ����� Ŭ���� ���Ʒ� ȭ��ǥ�� �̿��մϴ�.<br>
				            	- ��ǰ ����, ���� ����� �Է��ϸ� ���Ƿ� ������ ������ �����մϴ�.<br>&nbsp; &nbsp;���� ����� �̹����� ���� �� �ֽ��ϴ�.
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
				      
             </td>
           </tr>
         </table>
      </td>
      </tr>
      </table>

<? include "../footer.php"; ?>