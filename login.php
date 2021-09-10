<?php
include('./dbCon.php');
session_start();

if (isset($_POST['btn'])) {

                  $user_email = mysqli_real_escape_string($conn, $_POST['email']);
                  $user_pass = mysqli_real_escape_string($conn, $_POST['pass1']);

                  $query = "SELECT * FROM login_student WHERE email = '$user_email' AND is_active = 0";
                  $query_con = mysqli_query($conn, $query);
                  if (!$query_con) {
                                    die("Query Failed" . mysqli_error($conn));
                  }

                  $result = mysqli_fetch_assoc($query_con);
                  if ($result == '' || $result == '') {
                                    echo "<div class='text-danger text-center'>Invalid username or email or password</div>";
                  } else {
                                    //verify password
                                    if (password_verify($user_pass, $result['password'])) {
                                                      if ($result['is_active'] == 0) {
                                                                        echo "<div class='text-info text-center'>Log In Successfull</div>";
                                                                        $_SESSION['is_login'] = true;
                                                                        $_SESSION['email'] = $user_email;
                                                                        echo "<script> location.href='home.php';</script>";
                                                      } else {
                                                                        echo "<div class='text-danger text-center'>You not verified user</div>";
                                                      }
                                    } else {
                                                      echo "<div class='text-danger text-center'>Invalid username or email or password</div>";
                                    }
                  }
}
?>

<?php require('./includes/header.php'); ?>
<div class="mt-5 mb-3 text-center font-weight-bold" style="font-size: 27px;">

                  <span>
                                    Roka System
                  </span>
</div>
<p class="text-center" style="font-size: 18px;">

                  Login Form
</p>
<div class="container-fluid">
                  <div class="row justify-content-center">
                                    <div class="col-sm-6 col-md-4">
                                                      <form action="#" method="POST" class="shadow-lg p-4">

                                                                        <!-- for email  -->
                                                                        <div class="form-group">
                                                                                          <i class="fas fa-user"></i>
                                                                                          <label for="email" class="font-weight-bold pl-2">Email</label>
                                                                                          <input type="email" class="form-control" placeholder="Email" name="email">
                                                                                          <small class="form-text">We'll never share your email!</small>
                                                                        </div>
                                                                        <!-- for password  -->
                                                                        <div class="form-group">
                                                                                          <i class="fas fa-key"></i>
                                                                                          <label for="pass1" class="font-weight-bold pl-2">Password</label>
                                                                                          <input type="password" class="form-control" placeholder="Password" name="pass1">

                                                                        </div>

                                                                        <!-- make button as submit -->
                                                                        <button type="submit" name="btn" class="btn-block btn btn-outline-info mt-4 font-weight-bold shadow-sm">Login</button>
                                                                        <?php if (isset($regmsg)) {
                                                                                          echo $regmsg;
                                                                        } ?>

                                                                        <p class="mt-3 text-right">Don't have an Account? <a class="ml-1" href="./register.php">SignUp</a></p>
                                                      </form>



                                    </div>
                  </div>
</div>

<?php include_once('./includes/footer.php'); ?>