<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<? include "../header.php"; ?>

<? if($dsn_file == "") $dsn_file = "dsn_header.inc"; ?>

<script language="javascript">
<!--
function changeDesign(dsn_file){
	document.location = "<?=$PHP_SELF?>?dsn_file=" + dsn_file;
}

function changeDefault(dsn_file){
   if(confirm("기본값으로 복원하시겠습니까?")){
      document.location = "dsn_save.php?mode=default_layout&dsn_file=" + dsn_file;
   }
}
-->
</script>
</head>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">레이아웃구성</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">사이트 레이아웃을 구성합니다.</td>
			  </tr>
			</table>
			
      <br>         
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
      <form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="layout">
        <tr> 
          <td width="15%" class="t_name">디자인영역</td>
          <td width="85%" class="t_value">
            <input type="radio" name="dsn_file" value="dsn_header.inc" onClick="changeDesign(this.value);" <? if($dsn_file == "dsn_header.inc") echo "checked"; ?>>상단부분 
            <input type="radio" name="dsn_file" value="dsn_mainleft.inc" onClick="changeDesign(this.value);" <? if($dsn_file == "dsn_mainleft.inc") echo "checked"; ?>>메인좌측 
            <input type="radio" name="dsn_file" value="dsn_subleft.inc" onClick="changeDesign(this.value);" <? if($dsn_file == "dsn_subleft.inc") echo "checked"; ?>>서브좌측 
            <input type="radio" name="dsn_file" value="dsn_main.inc" onClick="changeDesign(this.value);" <? if($dsn_file == "dsn_main.inc") echo "checked"; ?>>메인(중앙) 
            <input type="radio" name="dsn_file" value="dsn_right.inc" onClick="changeDesign(this.value);" <? if($dsn_file == "dsn_right.inc") echo "checked"; ?>>우측
            <input type="radio" name="dsn_file" value="dsn_footer.inc" onClick="changeDesign(this.value);" <? if($dsn_file == "dsn_footer.inc") echo "checked"; ?>>하단부분
          </td>
        </tr>
        <tr> 
          <td class="t_name">파일위치</td>
          <td class="t_value"> &nbsp;/data/design/<?=$dsn_file?> <span class="alert">[해당파일을 에디터로 직접수정하셔도 됩니다.]</span></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="2">
        <tr>
          <td colspan="2" bgcolor="FFFFFF">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr><td height="5"></td></tr>
              <tr>
                <td width="55%" bgcolor="FFFFFF">
                  <table width="300">
                    <tr><td><img src="../image/dsn_layout.gif" border="0" usemap="#Map01"></td></tr>
                    <tr><td height="10"></td></tr>
                  </table>
                  
                  <table width="440" border="0" class="t_name" cellspacing="5"><tr><td>
                  <table width="100%" cellspacing="3" class="t_name">
                    <tr><td><img src="../image/design_title.gif"></td></tr>
                    <tr><td height="3"></td></tr>
                    <tr><td>1. 상단,좌측,메인,우측,하단 레이아웃을 잡고 모듈코드를 삽입합니다.</td></tr>
                    <tr><td>2. 모듈을 사용하지 않고 모두 html로 작성해도 됩니다.</td></tr>
                    <tr><td>3. 모듈코드는 영역에 상관없이 작동됩니다.</td></tr>
                    <tr><td>4. 디자인 상세설정에서 모듈 디자인을 설정합니다.</td></tr>
                   </table>
                   </td></tr></table>
                   
                   <map name="Map01">
                    <area shape="rect" coords="37,20,272,66" href="dsn_layout.php?dsn_file=dsn_header.inc">
                    <area shape="rect" coords="35,75,97,258" href="dsn_layout.php?dsn_file=dsn_mainleft.inc">
                    <area shape="rect" coords="106,74,272,260" href="dsn_layout.php?dsn_file=dsn_main.inc">
                    <area shape="rect" coords="280,73,343,258" href="dsn_layout.php?dsn_file=dsn_right.inc">
                    <area shape="rect" coords="35,267,273,314" href="dsn_layout.php?dsn_file=dsn_footer.inc">
                   </map>

                </td>
                <td width="45%" bgcolor="FFFFFF" valign="top">
                
                  <table border="0" class="t_name" cellspacing="5" width="100%"><tr><td>
                  <table border="0" class="t_name" cellspacing="4" width="100%">
                    <tr><td colspan="2"><img src="../image/design_title02.gif"></td></tr>
                    <tr><td height="5"></td></tr>
                    <tr><td colspan="2"><b>상단부분</b></td></tr>
                    <tr>
                      <td>로고</td><td>: &lt;?=$logo?&gt; </td>
                    </tr>
                    <tr>
                      <td>로그인</td><td>: &lt;?=$top_navi?&gt; </td>
                    </tr>
                    <tr>
                      <td>상품검색</td><td>: &lt;?=$prd_search?&gt; </td>
                    </tr>
                    <tr>
                      <td>상단메뉴</td><td>: &lt;?=$top_menu?&gt; </td>
                    </tr>
                    <tr><td height="5"></td></tr>
                    <tr><td colspan="2"><b>메인좌측</b></td></tr>
                    <tr>
                      <td>상품 카테고리</td><td>: &lt;?=$category?&gt; </td>
                    </tr>
                     <tr><td height="5"></td></tr>
                    <tr><td colspan="2"><b>메인(중앙)</b></td></tr>
                    <tr>
                      <td>메인이미지</td><td>: &lt;?=$main_img?&gt; </td>
                    </tr>
                    <tr>
                      <td>공지사항</td><td>: &lt;?=$notice?&gt;</td>
                    </tr>
                    <tr>
                      <td>신상품</td><td>: &lt;?=$prd_new?&gt; </td>
                    </tr>
                    <tr>
                      <td>인기상품</td><td>: &lt;?=$prd_popular?&gt; </td>
                    </tr>
                    <tr>
                      <td>추천상품</td><td>: &lt;?=$prd_recom?&gt; </td>
                    </tr>
                    <tr>
                      <td>세일상품</td><td>: &lt;?=$prd_sale?&gt; </td>
                    </tr>
                    <tr><td height="5"></td></tr>
                    <tr><td colspan="2"><b>하단부분</b></td></tr>
                    <tr>
                      <td>하단 카피라잇</td><td>: &lt;?=$copyright?&gt; </td>
                    </tr>
                    <tr>
                      <td>오늘본상품</td><td>: &lt;?=$prd_view?&gt; </td>
                    </tr>
                    <tr><td height="5"></td></tr>
                    <tr><td colspan="2"><b>배너</b></td></tr>
                    <tr>
                      <td>배너 1</td><td>: &lt;?=$banner_01?&gt; </td>
                    </tr>
                    <tr>
                      <td>배너 2</td><td>: &lt;?=$banner_02?&gt; </td>
                    </tr>
                    <tr>
                      <td>배너 3</td><td>: &lt;?=$banner_03?&gt; </td>
                    </tr>
                    <tr>
                      <td>배너 4</td><td>: &lt;?=$banner_04?&gt; </td>
                    </tr>
                    <tr>
                      <td>배너 5</td><td>: &lt;?=$banner_05?&gt; </td>
                    </tr>
                    <tr><td height="5"></td></tr>
                    <tr><td colspan="2"><b>일정관리</b></td></tr>
                    <tr>
                      <td>일정관리</td><td>: &lt;?=$schedule?&gt; </td>
                    </tr>
                    <tr><td height="5"></td></tr>
                    <tr><td colspan="2"><b>설문조사</b></td></tr>
                    <tr>
                      <td>설문조사</td><td>: &lt;?=$poll?&gt; </td>
                    </tr>
                  </table>
                  </td></tr></table>
                  
                </td>
              </tr>
              <tr><td height="5"></td></tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>
           <table border="0" class="t_name" cellspacing="6" width="100%">
             <tr><td><img src="../image/design_title03.gif"></td></tr>
						<?
						echo "<tr> <td colspan=\"2\" align=center>";
						echo "<textarea name=\"dsn_content\" rows=\"20\" cols=\"112\" class=\"textarea\" style=\"width:100%\">";
						$f_line = file("../../data/design/$dsn_file");
						for($ii=0; $ii<count($f_line);$ii++){
						echo $f_line[$ii];
						}
						echo "</textarea>";
						echo "</td>";
						echo "</tr>";
						?>
			   </table>
			 </td>
		  </tr>
      </table>
                                          
      <br>
      <table align="center" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_reset.gif" style="cursor:hand" onClick="changeDefault('<?=$dsn_file?>');">
          </td>
        </tr>
      </form>
      </table>
      </td>
      </tr>
      </table>

<? include "../footer.php"; ?>