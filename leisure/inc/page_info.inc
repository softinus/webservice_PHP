<?php

  $sql = "SELECT * FROM wiz_page WHERE type = '$page_type'";
  $result = mysql_query($sql) or error(mysql_error());

  $page_info = mysql_fetch_object($result);

  if(is_file("$DOCUMENT_ROOT/data/subimg/$page_info->subimg"))
    $subimg = "<img src='/data/subimg/$page_info->subimg'>";

  else
    $subimg = "";

?>