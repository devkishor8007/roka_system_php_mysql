<?php
include('./dbCon.php');
if (isset($_POST['btnRegister'])) {

                  $user_email = mysqli_real_escape_string($conn, $_POST['email']);
                  $user_pass = mysqli_real_escape_string($conn, $_POST['pass1']);
                  $user_repass =  mysqli_real_escape_string($conn, $_POST['pass2']);

                  if ($user_email == '' || $user_pass == '' || $user_repass == '') {
                                    $msgShow = '<div class = "alert alert-danger mt-2">Empty Field</div>';
                  } else {

                                    $checkEMail = "SELECT email FROM login_student WHERE email= '" . $_REQUEST['email'] . "'";
                                    // $checkEMail = "SELECT u_email FROM userlogin_tb WHERE u_email = '" . $_REQUEST['rEmail'] . "'";
                                    $result = $conn->query($checkEMail);
                                    if ($result->num_rows == 1) {
                                                      $msgShow = '<div class= "alert alert-danger mt-2" role= "alert">Account Already Created!</div>';
                                    } else {
                                                      if ($user_pass == $user_repass) {
                                                                        $hash = password_hash($user_pass, PASSWORD_BCRYPT, ['cost' => 10]);
                                                                        $query = "INSERT INTO login_student(email,password) VALUES('$user_email','$hash')";
                                                                        $query_con = mysqli_query($conn, $query);

                                                                        $msgShow = '<div class = "alert alert-danger mt-2">Successfylly Account Created!</div>';
                                                                        if (!$query_con) {
                                                                                          die("Query failed" . mysqli_error($conn));
                                                                                          $msgShow = '<div class = "alert alert-danger mt-2" role = "alert">Unable to Create Account</div>';
                                                                        } else {
                                                                                          $msgShow = '<div class= "alert alert-success mt-2" role= "alert">Account Successfully Created</div>';
                                                                        }
                                                      } else {
                                                                        $msgShow = '<div class= "alert alert-success mt-2" role= "alert">Account Successfully Created!</div>';
                                                      }
                                    }
                  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
                  <meta charset="UTF-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <!-- Bootstrap CSS -->
                  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

                  <!-- Font Awesome -->
                  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


                  <!-- Google Font -->
                  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
                  <title>Signup</title>

</head>

<body>
                  <div class="mt-5 mb-3 text-center font-weight-bold" style="font-size: 27px;">

                                    <span>
                                                      Roka System
                                    </span>
                  </div>
                  <p class="text-center" style="font-size: 18px;">

                                    Signup Form
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
                                                                                          <!-- for re-password  -->
                                                                                          <div class="form-group">
                                                                                                            <i class="fas fa-key"></i>
                                                                                                            <label for="pass2" class="font-weight-bold pl-2">Re-Password</label>
                                                                                                            <input type="password" class="form-control" placeholder="Re-Password" name="pass2">

                                                                                          </div>

                                                                                          <!-- make button as submit -->
                                                                                          <button type="submit" name="btnRegister" class="btn-block btn btn-outline-info mt-4 font-weight-bold shadow-sm">SignUp</button>
                                                                                          <?php if (isset($msgShow)) {
                                                                                                            echo $msgShow;
                                                                                          } ?>

                                                                                          <p class="mt-3 text-right">Don't have an Account? <a class="ml-1" href="./login.php">Login</a></p>
                                                                        </form>



                                                      </div>
                                    </div>
                  </div>



                  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>