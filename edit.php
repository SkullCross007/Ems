<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$nid = mysqli_real_escape_string($conn, $_POST['nid']);
	$dept = mysqli_real_escape_string($conn, $_POST['dept']);
	$degree = mysqli_real_escape_string($conn, $_POST['degree']);
	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);





	// $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


$result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`birthday`='$birthday',`gender`='$gender',`contact`='$contact',`nid`='$nid',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='viewemp.php';
    </SCRIPT>");


	
}
?>




<?php
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `employee` WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
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
			<div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span style="font-weight: bold;">XYZ Corporation</span></a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
				<div id="navcol-2" class="collapse navbar-collapse" style="font-size: 17px;">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item"><a class="nav-link active" href="aloginwel.php">Home</a></li>
						<li class="nav-item"><a class="nav-link active" href="addemp.php">Add Employee</a></li>
						<li class="nav-item"><a class="nav-link active" href="viewemp.php">View Employee</a></li>
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
                                <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                    </svg></div>
                                <form class="text-center" id="registration" action="edit.php" method="POST">
                                    <div class="d-lg-flex justify-content-center justify-content-lg-center align-items-lg-center mb-3">
                                        <input class="form-control" type="text" name="firstName" value="<?php echo $firstname;?>" style="margin-top: 6px;margin-bottom: 5px;margin-right: 7px;" />
                                        <input class="form-control" type="text" name="lastName" value="<?php echo $lastname;?>" />
                                    </div>
                                    <div class="d-lg-flex justify-content-center justify-content-lg-center align-items-lg-center mb-3">
                                        <input class="form-control" type="email"  name="email" value="<?php echo $email;?>" />
                                    </div>
                                    <div class="d-lg-flex justify-content-center justify-content-lg-center align-items-lg-center mb-3">
                                        <input class="form-control" type="text" name="birthday" value="<?php echo $birthday;?>" style="margin-top: 6px;margin-bottom: 5px;margin-right: 7px;" />
                                        <input class="form-control" type="text" name="gender" value="<?php echo $gender;?>" />
                                    </div>
                                    <div class="mb-3"><input class="form-control" type="number" name="contact" value="<?php echo $contact;?>"/></div>
                                    <div class="mb-3"><input class="form-control" type="number" name="nid" value="<?php echo $nid;?>"/></div>
                                    <div class="mb-3"><input class="form-control" type="text"  name="address" value="<?php echo $address;?>"/></div>
                                    <div class="mb-3"><input class="form-control" type="text" type="text" name="dept" value="<?php echo $dept;?>"/></div>
                                    <div class="mb-3"><input class="form-control" type="text" name="degree" value="<?php echo $degree;?>" /></div>
                                    <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required">
                                    <div class="mb-3"><button class="btn btn-primary d-block w-100" name="update" type="submit">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>
</html>
