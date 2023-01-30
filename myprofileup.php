<?php

require_once('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if (isset($_POST['update'])) {

  $id = mysqli_real_escape_string($conn, $_POST['id']);

  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);



  $result = mysqli_query($conn, "UPDATE `employee` SET `email`='$email',`contact`='$contact',`address`='$address' WHERE id=$id");

  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='myprofile.php?id=$id  ';
    </SCRIPT>");
}
?>




<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$sql = "SELECT * from `employee` WHERE id=$id";
$result = mysqli_query($conn, $sql);
if ($result) {
  while ($res = mysqli_fetch_assoc($result)) {
    $firstname = $res['firstName'];
    $lastname = $res['lastName'];
    $email = $res['email'];
    $contact = $res['contact'];
    $address = $res['address'];
    $gender = $res['gender'];
    $birthday = $res['birthday'];
    $nid = $res['nid'];
    $dept = $res['dept'];
    $degree = $res['degree'];
    // $salary = $res['salary'];
  }
}

?>

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

  <section class="position-relative py-4 py-xl-5">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-xl-4">
          <div class="card mb-5">
            <div class="card-body d-flex flex-column align-items-center">
              <div><img class="rounded-circle mb-3 fit-cover" src="process/<?php echo $pic; ?>" width="130" height="130" /></div>
              <form class="text-center" id="registration" action="myprofileup.php" method="POST">
                <div class="mb-3"><input class="form-control" type="email" value="<?php echo $email; ?>" name="email" placeholder="Email" required /></div>
                <div class="mb-3"><input class="form-control" type="number" value="<?php echo $contact; ?>" name="contact" placeholder="Contact" required /></div>
                <div class="mb-3"><input class="form-control" type="text" value="<?php echo $address; ?>" name="address" placeholder="Address" required /></div>
                <div class="mb-3"><input class="form-control" type="hidden" name="id" id="textField" value="<?php echo $id; ?>" required /></div>
                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="send">Update</button></div>
              </form>
              <button class="btn btn-outline-danger" onclick="window.location.href = 'changepassemp.php?id=<?php echo $id ?>';">Change Password</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <!-- <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
      <div class="card card-1">
        <div class="card-heading"></div>
        <div class="card-body">
          <h2 class="title">Update Employee Info</h2>
          <form id="registration" action="myprofileup.php" method="POST">



            <div class="input-group">
              <p>Email</p>
              <input class="input--style-1" type="email" name="email" value="<?php echo $email; ?>">
            </div>


            <div class="input-group">
              <p>Contact</p>
              <input class="input--style-1" type="number" name="contact" value="<?php echo $contact; ?>">
            </div>




            <div class="input-group">
              <p>Address</p>
              <input class="input--style-1" type="text" name="address" value="<?php echo $address; ?>">
            </div>


            <input type="hidden" name="id" id="textField" value="<?php echo $id; ?>" required="required"><br><br>
            <div class="p-t-20">
              <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
            </div>

          </form>
          <br>
          <button class="btn btn--radius btn--green" onclick="window.location.href = 'changepassemp.php?id=<?php echo $id ?>';">Change Password</button>
        </div>
      </div>
    </div>
  </div> -->


</body>

</html>