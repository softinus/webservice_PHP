<?

session_start();

if(!empty($view_list)){

   session_unregister("view_list"); 

}

Header("Location: $HTTP_REFERER");

?>