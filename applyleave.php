<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `employee` where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$employee = mysqli_fetch_array($result);
	$empName = ($employee['firstName']);
	//echo "$id";
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
						<li class="nav-item"><a class="nav-link active" href="eloginwel.php?id=<?php echo $id?>">Home</a></li>
						<li class="nav-item"><a class="nav-link active" href="myprofile.php?id=<?php echo $id?>">My Profile</a></li>
						<li class="nav-item"><a class="nav-link active" href="empproject.php?id=<?php echo $id?>">My Projects</a></li>
						<li class="nav-item"><a class="nav-link active" href="applyleave.php?id=<?php echo $id?>">Apply Leave</a></li>
					</ul><a class="btn btn-primary ms-md-2" role="button" href="alogin.html" style="padding-right: 18px;padding-left: 18px;font-size: 17px;">Logout</a>
				</div>
			</div>
		</nav>
	 

	<h1 class="mt-4 mb-4 text-center">Apply Leave</h1>

	<section class="position-relative py-4 py-xl-5">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 col-xl-4">
					<div class="card mb-5">
						<div class="card-body d-flex flex-column align-items-center">
							<form class="text-center" action="process/applyleaveprocess.php?id=<?php echo $id?>" method="POST">
								<div class="d-lg-flex justify-content-center justify-content-lg-center align-items-lg-center mb-3">
									<div class="text-start"><label class="form-label text-start" style="margin-bottom: 0px;">From</label><input class="form-control" name="start" placeholder="First Name" required style="margin-top: 6px;margin-bottom: 5px;margin-right: 7px;" type="date" /></div>
									<div class="text-start"><label class="form-label text-start" style="margin-bottom: 0px;">To</label><input class="form-control" name="end" placeholder="First Name" required style="margin-top: 6px;margin-bottom: 5px;margin-right: 7px;" type="date" /></div>
								</div>
								<div class="mb-3"><input class="form-control" type="text" name="reason" placeholder="Reason" required /></div>
								<div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Submit</button></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

		<div class="container">
			<div class="table-responsive">
				<table class="table table-hover table-sm table-bordered">
					<thead class="text-bg-primary">
						<tr>
							<th>Emp. ID</th>
							<th>Name</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Total Days</th>
							<th>Reason</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";
							$result = mysqli_query($conn, $sql);
							while ($employee = mysqli_fetch_assoc($result)) {
								$date1 = new DateTime($employee['start']);
								$date2 = new DateTime($employee['end']);
								$interval = $date1->diff($date2);
								$interval = $date1->diff($date2);
								echo "<tr>";
								echo "<td>".$employee['id']."</td>";
								echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
								echo "<td>".$employee['start']."</td>";
								echo "<td>".$employee['end']."</td>";
								echo "<td>".$interval->days."</td>";
								echo "<td>".$employee['reason']."</td>";
								echo "<td>".$employee['status']."</td>";	
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
</body>
</html>