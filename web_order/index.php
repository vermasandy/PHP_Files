<?php 
	include_once("../config.php");
	require_once(CLASSES . 'FwConnection.php');
	require_once(FUNCTIONS . 'function.php');
	$DbConnection = new FwConnection(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$_SESSION['error'] = "";
	
	if($_SESSION['userX'] != '')
	{
		header("location:home.php");
	}

	if(isset($_POST['submit']))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$userpass = mysql_real_escape_string($_POST['upassword']);
		
		if($username=="Phone Number" && $userpass=="Password")
		{
			$_SESSION['error']="Please enter phone/password!";
		}
		else
		{
			$DbConnection->Select("*","taxi_users","first_name = '$username' and password = '$userpass'","","");
			$adminData = $DbConnection->GetRows();
                        if($adminData[0]['status']==0) { echo "Account Suspended, Please contact support"; exit; }
                        
			if(count($adminData)>0)
			{
				$_SESSION['userX']=time()."_".$adminData[0]['first_name'];
				$_SESSION['userXId']=$adminData[0]['id'];
				$_SESSION['userXname']=$adminData[0]['first_name'];
                                $_SESSION['userXaddress']=$adminData[0]['physical_address'];
                                $_SESSION['userXphone']=$adminData[0]['phone'];
                                $_SESSION['userXlat']=$adminData[0]['lat'];
                                $_SESSION['userXlng']=$adminData[0]['lng'];
                                $_SESSION['userXisTest']=$adminData[0]['is_test_user'];
                                // log "last_login" info here
                                $last_login = date("m-d-Y h:i:s A");
                                $q=array ( 'last_login'=>$last_login );
                                $DbConnection->UpdatebyID("taxi_users",$q,"id ='".$adminData[0]['id']."'",1);
				header("location:home.php");
				exit;
			}
			else { $_SESSION['error']="Invalid Login"; }
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Taxi App: Web Order Login</title>
		<link href="style/css/admin-style.css" rel="stylesheet" type="text/css" media="screen" />
	</head>

	<body>
		<div class="main">
		<div class="main-container"><!--// main-container-start // -->
		
		<div class="page">
			<div class="main-body"><!--// main-body-start // -->
				<div class="main-login"><!--main-login-start-->
					<div class="inner-login"><!--inner-login-start-->
						<div class="main-top">TAXIASAP Web Order Login</div>
						<div class="main-user">
							<div class="user-img"><img src="style/img/lock.png" /></div>

							<div class="user-content">
								<div class="user-01" style="margin-top:10px;">
									<?php if(isset($_SESSION['error'])){ ?>
										<font color="#FF0000"><b><?php echo $_SESSION['error']; ?></b></font>
									<?php } else { ?>
										<font color="#FF0000">&nbsp;</font>
									<?php } ?>
								</div>
								
								<form name="frm" action="" method="post">
									<input type="text" value="User Name" name="username" onfocus="if (this.value == 'User Name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'User Name';}"  /><br /><br />
									<input type="password" value="Password" name="upassword" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}" /><br /><br />
									<input type="submit" value="Submit" name="submit"/>
								</form>
							</div>
						</div>
					</div><!--// inner-login-close // -->
				</div><!--// main-login-close // -->
			</div><!--// main-body-close // -->
		</div>

		</div><!-- // main-container-close // -->
		</div>
	</body>
</html>
