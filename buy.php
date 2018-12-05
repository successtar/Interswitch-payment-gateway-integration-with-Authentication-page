<?php include('server.php'); 
if (empty($_SESSION['username'])){
   header('location: login.php');
}
$user=$_SESSION['username'];
$result = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
$useresult=mysqli_fetch_array($result);



define("URL_REDIRECT","www.lab.myexampoint.com/interview/interswitch/redirect.php");
$mackey = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";


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
            

     <?php 
     $ref=filter_var($_REQUEST['ref'], FILTER_VALIDATE_INT);
    $result = mysqli_query($con, "SELECT * FROM items WHERE id='$ref'");
    $itemlist=mysqli_fetch_array($result);
    $myhash= $itemlist['trans_id']+$itemlist['id'].$itemlist['payment_id'].($itemlist['amount']*100).URL_REDIRECT.$mackey;
    //die($myhash);
    $myhash=strtoupper(hash("SHA512", "$myhash"));

             ?>
<span id="note"><div class="alert alert-danger"><ul>
    
    <li>Got stuck  here  since Monday 08/10/2018 with every effort in  getting the user to the interswitch payment page proves abortive.</li>
    <li>The interswitch payment page  keep on responding with the xml file below.</li>
    <p><strong><xmp>  
<oauth>  
    <error_description>Full authentication is required to access this resource </error_description>
        <error>unauthorized</error>
    </oauth> </xmp></strong></p>

<li>All technical outreach made yield nothing as all backened developer already moved to other easy to integrate payment option like paystack and others.</li>
<li>It is either the documentation is poorly written, outdated or there is something most developer are not understanding about the interswitch integration.</li>
</ul></div></span>

<script type="text/javascript">
    dnote=document.getElementById('note').innerHTML;
    document.getElementById('note').innerHTML='';

    function passinfo(){

        document.getElementById('note').innerHTML=dnote;

        notice="Got stuck  here  since Monday 08/10/2018 with every effort in  getting the user to the interswitch payment page proves abortive.\n\n The interswitch payment page  keep on responding with the xml file below.\n\n <oauth>\n<error_description>Full authentication is required to access this resource </error_description>\n<error>unauthorized</error>\n</oauth>\n\nAll technical outreach made yield nothing as all backened developer already moved to other easy to integrate payment option like paystack and others.\n\nIt is either the documentation is poorly written, outdated or there is something most developer are not understanding about the interswitch integration."
        alert(notice);

    }

</script>
<div class="row">
<div class="col-md-8" align="center"> 
<img src="<?php echo $itemlist['image'] ?>" height="380px" width="70%" />

</div>


<div class="col-md-2" align="center" > 
 <div>   
<p> <br/><?php echo $itemlist['name'].'<br/>('.$itemlist['category'].')'; ?> <br/> &#8358; <?php echo $itemlist['amount'] ?> 



<form method="post" action="https://sandbox.interswitchng.com/collections/w/pay" onsubmit="passinfo();" target="_blank" style="all:initial">
        <!-- REQUIRED HIDDEN FIELDS -->
        <input name="product_id" type="hidden" value="<?php echo $itemlist['id'] ?>" />
        <input name="pay_item_id" type="hidden" value="<?php echo $itemlist['payment_id'] ?>" />
        <input name="amount" type="hidden" value="<?php echo $itemlist['amount']*100; ?>" />
        <input name="currency" type="hidden" value="566" />
        <input name="site_redirect_url" type="hidden" value="<?php echo URL_REDIRECT ?>"/>
        <input name="txn_ref" type="hidden" value="<?php echo $itemlist['trans_id']; ?>" /> 
        <input name="cust_id" type="hidden" value="<?php echo $useresult['id']; ?>"/>
        <input name="site_name" type="hidden" value="TouchCore Interswitch Test"/>
        <input name="cust_name" type="hidden" value="<?php echo $useresult['username']; ?>" />
        <input name="hash" type="hidden" value="<?php echo $myhash;?>" />
        </br></br>
        <input type="submit" value="PAY NOW" class="btn"></input>
    </form>








</p>
</div>
    <div>
        <img src="image/interswitch1.png">
    </div>
</div>



</div>


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