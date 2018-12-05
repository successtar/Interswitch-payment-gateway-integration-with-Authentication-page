<?php include('server.php'); 


if (empty($_SESSION['username'])){
   header('location: login.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>TouchCore Interswitch Test</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="header col-md-10" style="margin-top:2px">
            <h2 align="left">TouchCore Interswitch Test</h2>   
            <div>
                <p align="right"><a href="index.php" style="color: white">Home</a> | <strong> <?php echo $_SESSION['username']; ?></strong> | <a href="login.php?logout='1'" style="color: white;">Logout</a></p>
            </div>     
        </div>
        <div class="content col-md-10">
            <?php if (!isset($_SESSION['success'])): ?>
        <div class="error success">
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>

            </h3>
        </div>

        
            <?php endif ?>

            <?php if(isset($_SESSION['username'])): ?>
           <!-- <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>  -->
<div class="row">

 <?php
 
$result = mysqli_query($con, "SELECT * FROM items");
while ($itemlist=mysqli_fetch_array($result)) {

 ?>   
<div class="col-md-4" align="center"> 
<img src="<?php echo $itemlist['image'] ?>" height="280px" width="70%" />
<p> <?php echo $itemlist['name'] ?> <br/> &#8358; <?php echo $itemlist['amount'] ?> <br/> <a href="buy.php?ref=<?php echo $itemlist['id'] ?>" class="btn" title="Buy Now"> Buy </a></p>
</div>

<?php   };  ?>

</div>
         <?php endif ?>

<footer>
            <div class="col-md-12" align="center"><br/><br/>
               <strong> 
                Developed by Hammed Olalekan Osanyinpeju  <a href="mail:osanyinpejuhammed35@gmail.com">osanyinpejuhammed35@gmail.com</a> <a href="tel:+2347061855688" style="color: black"> 07061855688</a>
                </strong>
            </div>

        </footer> 
        </div>  

            
    </body>
</html>