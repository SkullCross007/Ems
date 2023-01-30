<?php

require_once('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);


$id = (isset($_GET['id']) ? $_GET['id'] : '');
$sql = "SELECT * from `employee` WHERE id=$id";
$sql2 = "SELECT total from `salary` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$salary = mysqli_fetch_array($result2);
$empS = ($salary['total']);

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
    $pic = $res['pic'];
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

  <div class="divider"></div>

  <section class="position-relative py-4 py-xl-5">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-xl-4">
          <div class="card mb-5">
            <div class="card-body d-flex flex-column align-items-center">
              <div><img class="rounded-circle mb-3 fit-cover" src="process/<?php echo $pic; ?>" width="130" height="130" /></div>
              <form class="text-center" method="POST" action="myprofileup.php?id=<?php echo $id ?>">
                <div class="d-lg-flex justify-content-center justify-content-lg-center align-items-lg-center mb-3">
                  <input class="form-control" type="text" value="<?php echo $firstname; ?>" name="firstName" placeholder="First Name" required style="margin-top: 6px;margin-bottom: 5px;margin-right: 7px;" />
                  <input class="form-control" type="text" name="lastName" value="<?php echo $lastname; ?>" placeholder="Last Name" required />
                </div>
                <div class="d-lg-flex justify-content-center justify-content-lg-center align-items-lg-center mb-3">
                  <input class="form-control" type="email" value="<?php echo $email; ?>" name="email" placeholder="Email" required />
                </div>
                <div class="d-lg-flex justify-content-center justify-content-lg-center align-items-lg-center mb-3">
                  <input class="form-control" name="birthday" value="<?php echo $birthday; ?>" placeholder="First Name" required style="margin-top: 6px;margin-bottom: 5px;margin-right: 7px;" type="date" />
                  <select class="form-select" value="<?php echo $gender; ?>" name="gender" required>
                    <option value selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="mb-3"><input class="form-control" type="number" value="<?php echo $contact; ?>" name="contact" placeholder="Contact Number" required /></div>
                <div class="mb-3"><input class="form-control" type="number" value="<?php echo $nid; ?>" name="nid" placeholder="NID" required /></div>
                <div class="mb-3"><input class="form-control" type="text" value="<?php echo $address; ?>" name="address" placeholder="Address" required /></div>
                <div class="mb-3"><input class="form-control" type="text" value="<?php echo $dept; ?>" name="dept" placeholder="Department" required /></div>
                <div class="mb-3"><input class="form-control" type="text" value="<?php echo $degree; ?>" name="degree" placeholder="Degree" required /></div>
                <div class="mb-3"><input class="form-control" type="number" value="<?php echo $empS; ?>" name="salary" placeholder="Salary" required /></div>
                <div class="mb-3"><input class="form-control" type="hidden" name="id" id="textField" value="<?php echo $id; ?>" required /></div>
                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="send">Update</button></div>
              </form>
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
                    <h2 class="title">My Info</h2>
                    <form method="POST" action="myprofileup.php?id=<?php echo $id ?>" >

                        <div class="input-group">
                          <img src="process/<?php echo $pic; ?>" height = 150px width = 150px>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>First Name</p>
                                     <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstname; ?>" readonly >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Last Name</p>
                                    <input class="input--style-1" type="text" name="lastName" value="<?php echo $lastname; ?>" readonly>
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                          <p>Email</p>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email; ?>" readonly>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Date of Birth</p>
                                    <input class="input--style-1" type="text" name="birthday" value="<?php echo $birthday; ?>" readonly>
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Gender</p>
                                  <input class="input--style-1" type="text" name="gender" value="<?php echo $gender; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                          <p>Contact Number</p>
                            <input class="input--style-1" type="number" name="contact" value="<?php echo $contact; ?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>NID</p>
                            <input class="input--style-1" type="number" name="nid" value="<?php echo $nid; ?>" readonly>
                        </div>

                        
                         <div class="input-group">
                          <p>Address</p>
                            <input class="input--style-1" type="text"  name="address" value="<?php echo $address; ?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>Department</p>
                            <input class="input--style-1" type="text" name="dept" value="<?php echo $dept; ?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>Degree</p>
                            <input class="input--style-1" type="text" name="degree" value="<?php echo $degree; ?>" readonly>
                        </div>


                        <div class="input-group">
                          <p>Total Salary</p>
                            <input class="input--style-1" type="text" name="degree" value="<?php echo $empS; ?>" readonly>
                        </div>

                        <input type="hidden" name="id" id="textField" value="<?php echo $id; ?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green"  name="send" >Update Info</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div> -->


  <!-- Jquery JS-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>

</html>