<!DOCTYPE html>
<!--<html>
<head>
	<title>REGISTRATION FOR SATELLITE CALL</title>
	<link rel="stylesheet" href="../library/css/bootstrap.min.css">
	<script src="../library/js/jquery-3.2.1.min.js"></script>
</head>
<body>--> <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<div class="container">
		<h2 class="text-center" style="margin-top: 5px; padding-top: 0;">REGISTRATION FOR SATELLITE CALL</h2>
		<?php 
			if(isset($_POST['join'])) {
				session_start();
				require("db/users.php");
				$objUser = new users;
				$objUser->setphone($_POST['phone']);
				if(isset($_POST['name'])){
				$objUser->setName($_POST['name']);
			}
				$objUser->setLoginStatus(1);
			 	$objUser->setLastLogin(date('Y-m-d h:i:s'));
			 	$userData = $objUser->getUserByphone();
			 	if(is_array($userData) && count($userData)>0) {
			 		$objUser->setId($userData['id']);
			 		if($objUser->updateLoginStatus()) {
			 			echo "User login..";
			 			$_SESSION['user'][$userData['id']] = $userData;
			 			header("location: chatroom.php");
			 		} else {
			 			echo "Failed to login.";
			 		}
			 	} else {
				 	if($objUser->save()) {
				 		$lastId = $objUser->dbConn->lastInsertId();
				 		$objUser->setId($lastId);
						$_SESSION['user'][$lastId] = [ 
							'id' => $objUser->getId(), 
							'name' => $objUser->getName(), 
							'phone'=> $objUser->getphone(), 
							'login_status'=>$objUser->getLoginStatus(), 
							'last_login'=> $objUser->getLastLogin() 
						];

				 		echo "User Registred..";
				 	header("location: chatroom.php");
				 	} else {
				 		echo "Failed..";
				 	}
				 }
			}
		 ?>
		
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Contact Form</h3>

<div class="container">
  <form method="post">
    <label for="fname">PHONE NUMBER</label>
    <input type="text" id="fname" name="phone" placeholder="enter your number">
       <label for="name">USER NAME</label>
    <textarea id="name" name="name" placeholder="Write your name.."></textarea>

    <input type="submit" value="HIT TO REGISTER" class="btn btn-success btn-block" id="join" name="join">
  </form>
</div>

</body>
</html>
		<!--<div class="row join-room">
			<div class="col-md-6 col-md-offset-3">
				<form id="join-room-frm" role="form" method="post" action="" class="form-horizontal">
					<div class="form-group">
	                  	<div class="input-group">
	                        <div class="input-group-addon addon-diff-color">
	                            <span class="glyphicon glyphicon-user"></span>
	                        </div>
	                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Name">
	                  	</div>
	                </div>
					<div class="form-group">
	                	<div class="input-group">
	                        <div class="input-group-addon addon-diff-color">
	                            <span class="glyphicon glyphicon-envelope"></span>
	                        </div>
	                    	<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="">
	                	</div>
	                </div>
	                <div class="form-group">
	                    <input type="submit" value="JOIN CHATROOM" class="btn btn-success btn-block" id="join" name="join">
	                </div>
			    </form>
			</div>
		</div>
	</div>
</body>
</html>-->