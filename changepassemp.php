<?php

require_once('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $old = $_POST['oldpass'];
  $new = $_POST['newpass'];

  $result = mysqli_query($conn, "select employee.password from employee WHERE id = $id");
  $employee = mysqli_fetch_assoc($result);
  if ($old == $employee['password']) {
    $sql = "UPDATE `employee` SET `password`='$new' WHERE id = $id";
    mysqli_query($conn, $sql);
    echo ("<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Password Updated')
                window.location.href='myprofile.php?id=$id';</SCRIPT>");
  } else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Update Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
  }
}
?>




<!-- <?php
      $id = (isset($_GET['id']) ? $_GET['id'] : '');
      $sql = "SELECT * from `employee` WHERE id=$id";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        while ($res = mysqli_fetch_assoc($result)) {
          $old = $res['password'];
          echo "$old";
        }
      }

      ?> -->

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Custom CSS Links -->
  <!-- <link rel="stylesheet" href="random.css"> -->
  <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->
  <title>MANAGFI</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-light navbar-expand-md py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span style="font-weight: bold;">Managfi</span></a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
      <div id="navcol-2" class="collapse navbar-collapse" style="font-size: 17px;">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="eloginwel.php?id=<?php echo $id ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="myprofile.php?id=<?php echo $id ?>">My Profile</a></li>
          <li class="nav-item"><a class="nav-link active" href="empproject.php?id=<?php echo $id ?>">My Projects</a></li>
          <li class="nav-item"><a class="nav-link active" href="applyleave.php?id=<?php echo $id ?>">Apply Leave</a></li>
        </ul><a class="btn btn-primary ms-md-2" role="button" href="alogin.html" style="padding-right: 18px;padding-left: 18px;font-size: 17px;">Logout</a>
      </div>
    </div>
  </nav>

  <div class="divider"></div>


  <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
      <div class="card card-1">
        <div class="card-heading"></div>
        <div class="card-body">
          <h2 class="title">Update Password</h2>
          <form id="registration" action="changepassemp.php" method="POST">

            <div class="row row-space">
              <div class="col-2">
                <div class="input-group">
                  <p>Old Password</p>
                  <input class="input--style-1" type="Password" name="oldpass" required>
                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <p>New Password</p>
                  <input class="input--style-1" type="Password" name="newpass" required>
                </div>
              </div>
            </div>

            <input type="hidden" name="id" id="textField" value="<?php echo $id; ?>" required="required"><br><br>
            <div class="p-t-20">
              <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
            </div>

          </form>

        </div>
      </div>
    </div>


</body>

</html>