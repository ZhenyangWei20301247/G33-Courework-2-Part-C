<?php
function clearCookie(){
		setcookie("username"," ",time()-3600);
		setcookie("isLogin"," ",time()-3600);
	}

	clearCookie();
	header("Location:Login.html");

?>