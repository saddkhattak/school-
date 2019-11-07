<?php
      require_once("admin/inc/db.php");
      require_once("include/header.php");

if(isset($_POST['submit']))
{
  $name=$_POST['name'];  
  $email=$_POST['email'];  
  $phone=$_POST['phone'];  
  $messege=$_POST['msg'];  
   

    $insert="INSERT INTO contactus (`name`,`email`,`phone`,`messege`) VALUES('$name','$email','$phone','$messege')";
    
    $query=mysqli_query($conn,$insert);
    
    
    
    
    
    
    
    
    
}

?>

<!--<link a href="css/contact.css" rel="stylesheet">-->
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form  action ="" method="post">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Send Messege">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="msg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>

    <?php  require_once("include/footer.php");?>