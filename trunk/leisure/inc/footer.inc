			    </td>
			    <td valign="top">
					<?

					if($design_info->right_scroll == "Y"){
						if($design_info->site_align == "CENTER"){
							$site_width = ceil($design_info->site_width/2);
							echo "<div id='scrollingBanner' style='Z-INDEX:1;POSITION:absolute;LEFT:expression(document.body.clientWidth/2+".$site_width.");TOP:".$design_info->right_starty."'>";
						}else{
							echo "<div id='scrollingBanner' style='Z-INDEX:1;POSITION:absolute;LEFT:".$design_info->site_width.";TOP:".$design_info->right_starty."'>";
						}
					}else{
						echo "<div>";
					}

					include "$DOCUMENT_ROOT/data/design/dsn_right.inc";
					echo "</div>";

					?>
			    </td>
			  </tr>
			  <tr>
			    <td colspan="2">

			    <? include "$DOCUMENT_ROOT/data/design/dsn_footer.inc"; ?>

			    </td>
			  </tr>
			</table>

	  </td>
  </tr>
</table>

<script language="JavaScript" type="text/javascript">
<!--
   self.onError=null;
	currentX = 0;
	currentY = 0;
	whichIt = null;
	lastScrollX = 0; lastScrollY = 0;
	NS = (document.layers) ? 1 : 0;
	IE = (document.all) ? 1: 0;

	function heartBeat() {
	
		if(document.all.scrollingBanner != null){
			if(IE) {
				diffY = document.body.scrollTop;
				diffX = 0;
			}
			if(NS) { diffY = self.pageYOffset; diffX = self.pageXOffset; }
			if(diffY != lastScrollY) {
				percent = .05 * (diffY - lastScrollY);
				if(percent > 0) percent = Math.ceil(percent);
				else percent = Math.floor(percent);
				if(IE) document.all.scrollingBanner.style.pixelTop += percent;
				if(NS) document.scrollingBanner.top += percent;
				lastScrollY = lastScrollY + percent;
			}
			if(diffX != lastScrollX) {
				percent = .05 * (diffX - lastScrollX);
				if(percent > 0) percent = Math.ceil(percent);
				else percent = Math.floor(percent);
				if(IE) document.all.scrollingBanner.style.pixelLeft += percent;
				if(NS) document.scrollingBanner.top += percent;
				lastScrollY = lastScrollY + percent;
			}
		}
	}
	if(NS || IE) action = window.setInterval("heartBeat()",1);

//-->
</script>

</body>
</html>