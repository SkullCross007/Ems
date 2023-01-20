
<?php

require_once ('process/dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$pid = (isset($_GET['pid']) ? $_GET['pid'] : '');
$sql = "SELECT pid, project.eid, pname, duedate, subdate, mark, points, firstName, lastName, base, bonus, total FROM `project` , `rank` ,`employee`, `salary`  WHERE project.eid = $id AND pid = $pid";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

  $eid = mysqli_real_escape_string($conn, $_POST['eid']);
  $pid = mysqli_real_escape_string($conn, $_POST['pid']);
  

  $mark = mysqli_real_escape_string($conn, $_POST['mark']);
  $points = mysqli_real_escape_string($conn, $_POST['points']);
  $base = mysqli_real_escape_string($conn, $_POST['base']);
  $bonus = mysqli_real_escape_string($conn, $_POST['bonus']);
  $total = mysqli_real_escape_string($conn, $_POST['total']);

  $upPoint = $points+$mark;
  
  $upBonus = $bonus +  $mark;
  $upSalary = $base + ($upBonus*$base)/100; 
  echo "$upBonus";
  echo "string";
  echo "$upSalary";
 
 $result = mysqli_query($conn, "UPDATE `project` SET `mark`='$mark' WHERE eid=$eid and pid = $pid");

 $result = mysqli_query($conn, "UPDATE `rank` SET `points`='$upPoint' WHERE eid=$eid");
 $result = mysqli_query($conn, "UPDATE `salary` SET `bonus`='$upBonus' ,`total`='$upSalary' WHERE id=$eid");

 echo ("<SCRIPT LANGUAGE='JavaScript'>
   
    window.location.href='assignproject.php  ';
    </SCRIPT>");

  
}
?>




<?php
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $pid = (isset($_GET['pid']) ? $_GET['pid'] : '');
  $sql1 = "SELECT pid, project.eid, project.pname, project.duedate, project.subdate, project.mark, rank.points, employee.firstName, employee.lastName, salary.base, salary.bonus, salary.total FROM `project` , `rank` ,`employee`, `salary`  WHERE project.eid = $id AND project.pid = $pid AND project.eid = rank.eid AND salary.id = project.eid AND employee.id = project.eid AND employee.id = rank.eid";
  $result1 = mysqli_query($conn, $sql1);
  if($result1){
  while($res = mysqli_fetch_assoc($result1)){
  $pname = $res['pname'];
  $duedate = $res['duedate'];
  $subdate = $res['subdate'];
  $firstName = $res['firstName'];
  $lastName = $res['lastName'];
  $mark = $res['mark'];
  $points = $res['points'];
  $base = $res['base'];
  $bonus = $res['bonus'];
  $total = $res['total'];
  
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
						<li class="nav-item"><a class="nav-link active" href="assign.php">Assign Project</a></li>
						<li class="nav-item"><a class="nav-link active" href="assignproject.php">Project Status</a></li>
						<li class="nav-item"><a class="nav-link active" href="salaryemp.php">Salary Table</a></li>
						<li class="nav-item"><a class="nav-link active" href="empleave.php">Employee Leave</a></li>
					</ul><a class="btn btn-primary ms-md-2" role="button" href="alogin.html" style="padding-right: 18px;padding-left: 18px;font-size: 17px;">Logout</a>
				</div>
			</div>
		</nav>
  

  
    <section class="position-relative py-4 py-xl-5">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 col-xl-6 text-center mx-auto">
                            <h2>Assign Project</h2>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-5">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                        </svg></div>
                                    <form id="registration" action="mark.php" method="POST">
                                        <div class="mb-3">
                                          <label class="text-left" for="pname">Project Name</label>
                                          <input class="form-control" type="text"  name="pname" value="<?php echo $pname;?>" readonly />
                                        </div>
                                        <div class="mb-3">
                                          <label class="text-left" for="pname">Employee Name</label>
                                          <input class="form-control" type="text" name="firstName" value="<?php echo $firstName;?> <?php echo $lastName;?>" readonly />
                                        </div>
                                        <div class="mb-3">
                                          <label class="text-left" for="pname">Due Date</label>
                                          <input class="form-control" type="text" name="duedate" value="<?php echo $duedate;?>" readonly />
                                        </div>
                                        <div class="mb-3">
                                          <label class="text-left" for="pname">Submission Date</label>
                                          <input class="form-control" type="text"  name="subdate" value="<?php echo $subdate;?>" readonly />
                                        </div>
                                        <div class="mb-3">
                                          <label class="text-left" for="pname">Assign Mark</label>
                                          <input class="form-control" type="text"  name="mark" value="<?php echo $mark;?>" />
                                        </div>
                                        <input type="hidden" name="eid" id="textField" value="<?php echo $id;?>" required="required">
                                        <input type="hidden" name="pid" id="textField" value="<?php echo $pid;?>" required="required">
                                        <input type="hidden" name="points" id="textField" value="<?php echo $points;?>" required="required">
                                        <input type="hidden" name="base" id="textField" value="<?php echo $base;?>" required="required">
                                        <input type="hidden" name="bonus" id="textField" value="<?php echo $bonus;?>" required="required">
                                        <input type="hidden" name="total" id="textField" value="<?php echo $total;?>" required="required">
                                        <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="update">Assign Mark</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
 </body>
</html>
