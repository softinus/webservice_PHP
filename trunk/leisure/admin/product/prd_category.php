<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
if($mode == "update"){
   $sql = "select * from wiz_category where catcode = '$catcode'";
   $result = mysql_query($sql) or error(mysql_error());
   $cat_info = mysql_fetch_object($result);
}
?>

			<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">��ǰ�з�����</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">��ǰ�з��� �����մϴ�.</td>
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
                <? include "category_list.php"; ?>
                </td></tr>
                </table>

             </td>
             <td width="5"></td>
             <td>
               <br><br><br>
               <a href="category_save.php?mode=updateprior&posi=up&catcode=<?=$catcode?>&depthno=<?=$depthno?>"><img src="../image/cat_up.gif" border="0"></a><br><br><br><br>
               <a href="category_save.php?mode=updateprior&posi=down&catcode=<?=$catcode?>&depthno=<?=$depthno?>"><img src="../image/cat_down.gif" border="0"></a>
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
                    if(frm.catname.value == ""){
                      alert("�з����� �Է��ϼ���");
                      frm.catname.focus();
                      return false;
                    }
                  }
                  
                  function showCatsub(gubun){

                  	cat_sub.style.display = 'none';
                  	cat_sub2.style.display = 'none';
                  	
                  	if(gubun == "NON") cat_sub.style.display = 'none';
                  	else if(gubun == "FIL") cat_sub.style.display = '';
                  	else if(gubun == "HTM") cat_sub2.style.display = '';

						     }
								 function delConfirm(){
								   if(confirm("ī�װ��� ���� �Ͻðڽ��ϱ�?")){
								      document.location='category_save.php?mode=delete&catcode=<?=$catcode?>&depthno=<?=$depthno?>';
								   }
								 }
                 -->
                </script>
                <?
                if($mode == "") $mode = "insert";
                ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0"  valign="top">
                <form action="category_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this);">
                <input type="hidden" name="tmp">
                <input type="hidden" name="mode" value="<?=$mode?>">
                <input type="hidden" name="catcode" value="<?=$catcode?>">
                <input type="hidden" name="depthno" value="<?=$depthno?>">
                 <tr>
                   <td bgcolor="D5D3D3">
                     <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
                       <tr> 
                         <td width="20%" class="t_name">��ġ</td>
                         <td width="80%" class="t_value">
                         <?
                         $catname = "�ֻ���";
                         if($catcode != ""){
                       		$catcode1 = substr($catcode,0,2);
												   $catcode2 = substr($catcode,0,4);
												   $sql = "select * from wiz_category where (catcode like '$catcode1%' and depthno = 1)
												                                                or (catcode like '$catcode2%' and depthno = 2)
												                                                or (catcode = '$catcode')";
												   $result = mysql_query($sql) or error(mysql_error());
												   
												   while($prow = mysql_fetch_object($result)){
												      $catname .= " &gt; <a href=prd_category.php?mode=update&catcode=$prow->catcode>$prow->catname</a>";
												   }
													}
                         	echo $catname;
                         ?>
                         </td>
                       </tr>
                       <?
                       if($catcode != ""){
                       ?>
                       <tr> 
                         <td class="t_name">��ũ�ּ�</td>
                         <td class="t_value">/shop/prd_list.php?catcode=<?=$catcode?></td>
                       </tr>
                       <?
                       }
                       ?>
                       <tr> 
                         <td class="t_name">�з���</td>
                         <td class="t_value">
                         <input name="catname" value="<?=$cat_info->catname?>" size="30" type="text" class="input">&nbsp; 
                         <input type="checkbox" name="catuse" value="N" <? if($cat_info->catuse == "N") echo "checked"; ?>>�з�����
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">�޴��̹���</td>
                         <td class="t_value">
                         <?
                         if(is_file("../../data/catimg/$cat_info->catimg")) echo "<img src='/data/catimg/$cat_info->catimg'> <a href=category_save.php?mode=delcatimg&catcode=$catcode&depthno=$depthno><font color=red>[����]</font></a><br>";
                         ?>
                         <input name="catimg" type="file" class="input">
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">�ѿ����̹���</td>
                         <td class="t_value">
                         <?
                         if(is_file("../../data/catimg/$cat_info->catimg_over")) echo "<img src='/data/catimg/$cat_info->catimg_over'> <a href=category_save.php?mode=delcatimg_over&catcode=$catcode&depthno=$depthno><font color=red>[����]</font></a><br>";
                         ?>
                         <input name="catimg_over" type="file" class="input">
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">������</td>
                         <td class="t_value">
                         <input type="radio" name="subimg_type" onClick="showCatsub('NON');" value="NON" <? if($cat_info->subimg_type == "NON" || $cat_info->subimg_type == "") echo "checked"; ?>>����
                         <input type="radio" name="subimg_type" onClick="showCatsub('FIL');" value="FIL" <? if($cat_info->subimg_type == "FIL") echo "checked"; ?>>�̹���
                         <input type="radio" name="subimg_type" onClick="showCatsub('HTM');" value="HTM" <? if($cat_info->subimg_type == "HTM") echo "checked"; ?>>HTML

                          <div id='cat_sub' style="display:<? if($cat_info->subimg_type == "FIL") echo "show"; else echo "none"; ?>">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td class="t_value">
                            <?
                            if(is_file("../../data/subimg/$cat_info->subimg")){
                            	$img_ext = substr($cat_info->subimg,-3);
                           	echo "<img src='/data/subimg/$cat_info->subimg' width='290' height='50'>";
                            }
                            ?>
                            <input name="subimg" type="file" class="input">
                            </td>
                          </tr>
                          </table>
                          </div>
                          
                          <div id='cat_sub2' style="display:<? if($cat_info->subimg_type == "HTM") echo "show"; else echo "none"; ?>">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td class="t_value">
                            <textarea name="subimg02" cols="45" rows="5" class="textarea"><?=$cat_info->subimg?></textarea>
                            </td>
                          </tr>
                          </table>
                          </div>
                       
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">��ǰũ��</td>
                         <td class="t_value">
                         ���� <input type="text" name="prd_width" value="<?=$cat_info->prd_width?>" size="5" class="input"> px&nbsp; 
                         ���� <input type="text" name="prd_height" value="<?=$cat_info->prd_height?>" size="5" class="input"> px 
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">��ǰ������</td>
                         <td class="t_value">
                         <input type="text" name="prd_num" value="<? if($cat_info->prd_num=="") echo "20"; else echo $cat_info->prd_num; ?>" size="5" class="input"> ��&nbsp; 
                         </td>
                       </tr>
                       <tr> 
                         <td class="t_name">��õ��ǰ ����</td>
                         <td class="t_value">
                         <input type="radio" name="recom_use" value="Y" <? if($cat_info->recom_use == "Y") echo "checked";?>>���
                         <input type="radio" name="recom_use" value="N" <? if($cat_info->recom_use == "N" || $cat_info->recom_use == "" ) echo "checked";?>>������<br>
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
               <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
               <?
               if($mode == "insert"){
               ?>
                 <tr>
                   <td align="center"><input type="image" src="../image/btn_insert_l.gif"></td>
                 </tr>
               <?
               }else if($mode == "update"){
               ?>
                 <tr>
                   <td width="33%">
                   <?
                   if($depthno != 3){
                   ?>
                   <img src="../image/btn_catadd_l.gif" style="cursor:hand" onClick="document.location='prd_category.php?mode=insert&catcode=<?=$catcode?>&depthno=<?=$depthno?>';">
                   <?
                   }
                   ?>
                   </td>
                   <td width="33%" align="center">
                   	<input type="image" src="../image/btn_edit_l.gif"> &nbsp; 
                   	<img src="../image/btn_delete_l.gif" style="cursor:hand" onClick="delConfirm();">
                   </td>
                   <td width="33%"></td>
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
				            	- ī�װ� ���� ������ ī�װ� Ŭ���� �����ʿ��� �����մϴ�.<br>
				            	- ī�װ� ���� ����� Ŭ���� ���Ʒ� ȭ��ǥ�� �̿��մϴ�.<br>
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