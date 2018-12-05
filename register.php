<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>User registration  </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="header">
            <h2>Register</h2>        
        </div>
        <form method="post" action="register.php">
        	<!--display validation errors here -->
        	<?php include('errors.php'); ?>
        	<div class="input-group">
        		<label>Username</label>
        		<input type="text" name="username" value="<?php echo $username; ?>">
        	</div>
        	<div class="input-group">
        		<label>Email</label>
        		<input type="email" name="email" value="<?php echo $email; ?>">
        	</div>
        	<div class="input-group">
        		<label>Password</label>
        		<input type="password" name="password_1">
        	</div>
			<div class="input-group">
				<label>Confirm Password</label>
				<input type="password" name="password_2">
			</div>
			<div class="input-group">
				<button type="submit" name="register" class="btn">Register</button>
			</div>
			<p>
				Already a member? <a href="login.php">Sign in</a> 
			</p>
        </form>

        <footer>
            <div  align="center"><br/><br/>
               <strong> 
                Developed by Hammed Olalekan Osanyinpeju  <a href="mail:osanyinpejuhammed35@gmail.com">osanyinpejuhammed35@gmail.com</a> <a href="tel:+2347061855688" style="color: black"> 07061855688</a>
                </strong>
            </div>

        </footer> 
    </body>
</html>