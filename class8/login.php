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
      Login
       </div>
      <div class="card-body">
      <form method="post" action="submit.php">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter your email"  name="email">
            </div>

        <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Enter your password"  name="password">
        </div>
        <?php
        if(isset($_SESSION['login_error'])){
          ?>
          <span class="text-danger">
            <?php
            echo $_SESSION['login_error'];
            unset($_SESSION['login_error']);
             ?>
           </span>
           <?php
           }
            ?>
      </div>



</div>
<button type="submit" class="btn btn-info">Login</button>
</form>





</div>
</div>
</div>
