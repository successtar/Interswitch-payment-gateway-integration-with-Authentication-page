<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>User registration</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="header">
            <h2>Login</h2>        
        </div>
        <form method="post" action="login.php">
            <!--display validation errors here -->
            <?php include('errors.php'); ?>

        	<div class="input-group">
        		<label>Username</label>
        		<input type="text" name="username">
        	</div>
        	
        	<div class="input-group">
        		<label>Password</label>
        		<input type="password" name="password">
        	</div>
			
			<div class="input-group">
				<button type="submit" name="login" class="btn">Login</button>
			</div>
			<p>
				Not yet a member? <a href="register.php">Sign up</a> 
			</p>
        </form>

        <footer>
            <div  align="center"><br/><br/><br/><br/>
               <strong> 
                Developed by Hammed Olalekan Osanyinpeju  <a href="mail:osanyinpejuhammed35@gmail.com">osanyinpejuhammed35@gmail.com</a> <a href="tel:+2347061855688" style="color: black"> 07061855688</a>
                </strong>
            </div>

        </footer> 
    </body>
</html>