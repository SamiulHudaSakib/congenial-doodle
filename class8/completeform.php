<?php
session_start();
require_once 'header.php';
?>
   <body style="background-image: url('https://www.solidbackgrounds.com/images/website/950x534/950x534-blue-abstract-noise-free-website-background-image.jpg')";>
<div class="container">
  <div class="row">
    <div class="col-12">

      <div class="card">

        <div class="card-header bg-info text-center">
         Registration
          </div>
         <div class="card-body">
         <form method="post" action="connect.php">
              <div class="form-group">
                <label>Customer Name</label>
                 <input type="text" class="form-control" placeholder="Enter your name"  name="customer_name">

               </div>
               <div class="form-group">
                 <label>Phone Number</label>
                  <input type="number" class="form-control" placeholder="Enter your Phone Number"  name="phone_number">
                  <?php
                  if(isset($_SESSION['err_mesg_phone_number'])){
                    ?>
                    <div class="alert alert-danger" role="alert">
                      <?php
                      echo $_SESSION['err_mesg_phone_number'];
                      unset($_SESSION['err_mesg_phone_number']);
                       ?>
                     </div>
                     <?php
                     }
                      ?>
                </div>
                <div class="form-group">
                  <label>Email</label>
                   <input type="email" class="form-control" placeholder="Enter your Email"  name="email">
                   <?php
                   if(isset($_SESSION['err_mesg_mail'])){
                     ?>
                     <div class="alert alert-danger" role="alert">
                       <?php
                       echo $_SESSION['err_mesg_mail'];
                       unset($_SESSION['err_mesg_mail']);

                        ?>
                      </div>
                      <?php
                      }
                       ?>
                       <?php
                       if(isset($_SESSION['err_mesg_duplicate_mail'])){
                         ?>
                         <div class="alert alert-danger" role="alert">
                           <?php

                           echo $_SESSION['err_mesg_duplicate_mail'];
                           unset($_SESSION['err_mesg_duplicate_mail']);
                            ?>
                          </div>
                          <?php
                          }
                           ?>
                 </div>
                 <div class="form-group">
                   <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter your Password"  name="password">
                    <?php
                    if(isset($_SESSION['err_mesg_pass'])){
                      ?>
                      <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['err_mesg_pass'];
                        unset($_SESSION['err_mesg_pass']);
                         ?>
                       </div>
                       <?php
                       }
                        ?>
                  </div>
                  <div class="form-group">
                    <label>Retype Password</label>
                     <input type="password" class="form-control" placeholder="Enter Your Password Again"  name="retype_password">
                   </div>


                     <button type="submit" class="btn btn-info">Done</button>
                     <div class="form-group">
                       <br>
                       <label>Already have an account?</label>
                       <a href="login.php">Log in now.</a>
                     </div>




         </form>
        </div>
      </div>


    </div>
  </div>
</div>
</body>
<?php
require_once 'footer.php';
?>
