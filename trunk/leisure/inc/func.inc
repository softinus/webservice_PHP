<?
function PrintNav($T_NUM, $page, $rows, $LINK) {
        $T_PAGE = ceil($T_NUM / $rows);
        $c_block = ceil($page/10);
        if(!$c_block) $c_block = 1;

        echo "<table border=0 cellpadding=3 cellspacing=2><tr>";        
        if($page > 1) {        
				echo "<td align=center><img src=\"/images/arrow_prew2.gif\" border=0 align=absmiddle  style=\"cursor:pointer;\" onclick=\"document.location.href='".$LINK."1'\">&nbsp;";
                echo "<img src=\"/images/arrow_prew.gif\" border=0 align=absmiddle style=\"cursor:pointer;\" onclick=\"document.location.href='".$LINK.($page-1)."'\"> ";
        } else {
				echo "<td align=center><img src=\"/images/arrow_prew2.gif\" border=0 align=absmiddle>&nbsp;";
                echo "<img src=\"/images/arrow_prew.gif\" border=0 align=absmiddle> ";
        }
        echo "</td>";
        $p_NO = (($c_block-1)*10) + 1;
        for($i=$p_NO; $i < $p_NO+10 && $i <= $T_PAGE; $i++) {
                if($i == $page) {
                        echo "<td align=center class=nav style='padding:0 5px'><b>$i</b></td>";
                } else {
                        echo "<td align=center onmouseover=\"this.style.backgroundColor='#4272fb'; this.style.color='white'\" onmouseout=\"this.style.background=''; this.style.color='';\" onclick=\"document.location.href='".$LINK.$i."'\" style=\"cursor:pointer;padding:0 5px\" class=nav>$i</td>";
                }       
        }               
        if($T_PAGE < 1) echo "<td align=center class=nav>1</td>";
        if( ($page+1) > $T_PAGE) {				
                echo "<td align=center><img src=\"/images/arrow_next.gif\" border=0 align=absmiddle>";
				echo "&nbsp;<img src=\"/images/arrow_next2.gif\" border=0 align=absmiddle></td>";
        } else {				
                echo "<td align=center><img src=\"/images/arrow_next.gif\" border=0 align=absmiddle style=\"cursor:pointer;\" onclick=\"document.location.href='".$LINK.($page+1)."'\">";
				echo "&nbsp;<img src=\"/images/arrow_next2.gif\" border=0 align=absmiddle style=\"cursor:pointer;\" onclick=\"document.location.href='".$LINK.$T_PAGE."'\"></td>";
        }        
        echo "</tr></table>";
}

function PrintNavAjax($T_NUM, $page, $rows, $LINK, $lyr) {
        $T_PAGE = ceil($T_NUM / $rows);
        $c_block = ceil($page/10);
        if(!$c_block) $c_block = 1;

        echo "<table border=0 cellpadding=3 cellspacing=2 align='center'><tr>";        
        if($page > 1) {        
				echo "<td align=center><img src=\"/images/arrow_prew2.gif\" border=0 align=absmiddle  style=\"cursor:pointer;\" onclick=\"divupdate('".$lyr."','".$LINK."1')\">&nbsp;";
                echo "<img src=\"/images/arrow_prew.gif\" border=0 align=absmiddle style=\"cursor:pointer;\" onclick=\"divupdate('".$lyr."','".$LINK.($page-1)."')\"> ";
        } else {
				echo "<td align=center><img src=\"/images/arrow_prew2.gif\" border=0 align=absmiddle>&nbsp;";
                echo "<img src=\"/images/arrow_prew.gif\" border=0 align=absmiddle> ";
        }
        echo "</td>";
        $p_NO = (($c_block-1)*10) + 1;
        for($i=$p_NO; $i < $p_NO+10 && $i <= $T_PAGE; $i++) {
                if($i == $page) {
                        echo "<td align=center class=nav style='padding:0 5px'><b>$i</b></td>";
                } else {
                        echo "<td align=center onmouseover=\"this.style.backgroundColor='#4272fb'; this.style.color='white'\" onmouseout=\"this.style.background=''; this.style.color='';\" onclick=\"divupdate('".$lyr."','".$LINK.$i."')\" style=\"cursor:pointer;padding:0 5px\" class=nav>$i</td>";
                }       
        }               
        if($T_PAGE < 1) echo "<td align=center class=nav>1</td>";
        if( ($page+1) > $T_PAGE) {				
                echo "<td align=center><img src=\"/images/arrow_next.gif\" border=0 align=absmiddle>";
				echo "&nbsp;<img src=\"/images/arrow_next2.gif\" border=0 align=absmiddle></td>";
        } else {				
                echo "<td align=center><img src=\"/images/arrow_next.gif\" border=0 align=absmiddle style=\"cursor:pointer;\" onclick=\"divupdate('".$lyr."','".$LINK.($page+1)."')\">";
				echo "&nbsp;<img src=\"/images/arrow_next2.gif\" border=0 align=absmiddle style=\"cursor:pointer;\" onclick=\"divupdate('".$lyr."','".$LINK.$T_PAGE."')\"></td>";
        }        
        echo "</tr></table>";
}

function leftNav($yy,$mm,$dd) {
	//$next_timestamp  = mktime(00,00,00,$mm,$dd,$yy);			// 다음날 타임스탬프정보
	$after3		= date("Y-m-d",strtotime("-3 day",strtotime($next_yy."-".$next_mm."-".$next_dd)));
	$currentTime = time();
	$param = $PHP_SELF."?yy=".$yy."&mm=".$mm."&dd=".$dd;
	if($next_timestamp > $currentTime){
		$param = "javascript:alert('좋은 상품으로 다음날 찾아뵙겠습니다.')";
	}
	return $param;
}

function query( $txt ) {
	$rs = mysql_query($txt) or die($txt."\n<br>".mysql_error());
	return $rs;
}    



?>