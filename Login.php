<?php 
	require "ConnectDB.php";
	$key=0;
	$count=0;
	@$name=$_POST["uname"];
	@$pwd=$_POST["upwd"];

	function clearCookie(){
		setcookie("username","#",time()-3600);
		setcookie("isLogin","0",time()-3600);
	}

	$sql="SELECT STAFF_ID, PASSWORDS from staff";
	$res=$conn->query($sql);

	if($res->num_rows > 0){
		while($row=$res->fetch_assoc()){
			if($name==$row["STAFF_ID"] && $pwd==$row["PASSWORDS"]){
				clearCookie();
				setcookie("username",$name,time()+24*3600);//Active for 24 hours
				setcookie("isLogin","1");
				header("Location:Administer.php");
				$key=1;
				
				break;
			}
			$count++;
		}
	}else{
		echo "0 result";
	}

	

	if($key==0){
		echo "<p style=\"color:red;\">Username or Password is Wrong!!</p>";
		//exit();
	}

	echo "<button onclick=\"JavaScript:window.location.href='Login.html'\">Back</button>";


	?>