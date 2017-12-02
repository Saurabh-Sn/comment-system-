<!DOCTYPE html>
<html>
<head>
<title> Login And SignUp Page</title>
	<link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
	<link rel="styelsheet" type="text/css" href="styel.css">
	<script src="js/jquery-1.9.1.min.js"></script>
	<?php include('dbconn.php'); ?>

</head>

<body>
<div class="row">
<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
	   <form id="login_form"  method="post">
        <h3> Login Here</h3>
		<div class="form-group">
		<label> UserName: </label>
        <input type="text"  id="username" name="username" placeholder="Username" required><br><br>
        </div>
		<div class="form-group">
		<label> Password:  </label>
		<input type="password" id="password" name="password" placeholder="Password" required><br><br>
		</div>
		<div class="form-group">
	   <button name="login" type="submit" class="btn btn-primary btn-block btn-lg">Sign in</button>
		</div>
		      </form>
			  </div>
			  </div>
				<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Welcome Back!", { header: 'Access Granted' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'home.php'  }, delay);  
						}
						else
						{
						$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
						}
						}
						
					});
					return false;
				});
			});
			</script>  

  
  
		
		<!--form-->
		
		<br><br>
		
	<div class="row">
<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
		
        <h3>Register here</h3>

			<form method="POST" action="signup.php" id="signup">
			<div class="form-group">
			<label> UserName: </label>
				<input type="text" name="username" Placeholder="Username here.." required><br /><br />
				</div>
				<div class="form-group">
				<label> Password: </label>
				<input type="password" name="password" Placeholder="Password here.." required><br /><br />
				</div>
				<div class="form-group">
				<label> FirstName: </label>
				<input type="text" name="firstname" Placeholder="First Name here.." required><br /><br />
				</div>
				<div class="form-group">
			<label> LastName: </label>
				<input type="text" name="lastname" Placeholder="Last Name here.." required><br /><br><br />
				</div>
				<div class="form-group">
				<button type="submit" name="signup" 
				class="btn btn-primary btn-block btn-lg">Sign Up</button>
				</div>
			</form>
</div>
</div>
			
<br>
</center>
<?php include('scripts.php');?>

</body>
<?php require_once('footer.php');?>
</html>