<?php
include('./includes/header.php');
include('./includes/navbar.php');
include('./dbCon.php');
session_start();

if ($_SESSION['is_login']) {
                  $email = $_SESSION['email'];
} else {
                  echo "<script> location.href='login.php';</script>";
}
?>

<h2>Welcome To Home</h2>
<?php echo 'Current User is ' . $email ?>
<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo cupiditate culpa itaque. Temporibus voluptatem, porro velit quisquam voluptates blanditiis officiis sit aspernatur vero accusantium, libero possimus, inventore odio vitae nostrum.</p>

<?php include('./includes/footer.php'); ?>