<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	 $sql1 = "SELECT * FROM `employee` where id = '$id'";
	 $result1 = mysqli_query($conn, $sql1);
	 $employeen = mysqli_fetch_array($result1);
	 $empName = ($employeen['firstName']);

	$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
	$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

	$sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

	$sql3 = "SELECT * FROM `salary` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
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
	 
	<div id="divimg">
		<div>
			<h2 class="text-center mb-5">Welcome <?php echo "$empName"; ?> </h2>

			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Empolyee Leaderboard </h2>
			
			<div class="container">
				<div class="table-responsive">
					<table class="table table-hover table-sm table-bordered">
						<thead class="text-bg-primary">
							<tr>
								<th>Seq.</th>
								<th>Emp. ID</th>
								<th>Name</th>
								<th>Points</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$seq = 1;
							while ($employee = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>".$seq."</td>";
								echo "<td>".$employee['id']."</td>";
								echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";	
								echo "<td>".$employee['points']."</td>";
								$seq+=1;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			
			
			<h2 class="mt-5" style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Due Projects</h2>
			<div class="container">
				<div class="table-responsive">
					<table class="table table-hover table-sm table-bordered">
						<thead class="text-bg-primary">
							<tr>
								<th>Project Name</th>
								<th>Due Date</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while ($employee1 = mysqli_fetch_assoc($result1)) {
									echo "<tr>";
									echo "<td>".$employee1['pname']."</td>";
									echo "<td>".$employee1['duedate']."</td>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		

			<h2 class="mt-5" style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Salary Status</h2>
			<div class="container">
				<div class="table-responsive">
					<table class="table table-hover table-sm table-bordered">
						<thead class="text-bg-primary">
							<tr>
								<th>Base Salary</th>
								<th>Bonus</th>
								<th>Total Salary</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while ($employee = mysqli_fetch_assoc($result3)) {
									echo "<tr>";
									echo "<td>".$employee['base']."</td>";
									echo "<td>".$employee['bonus']." %</td>";
									echo "<td>".$employee['total']."</td>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>


			<h2 class="mt-5" style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Leave Satus</h2>
			<div class="container">
				<div class="table-responsive">
					<table class="table table-hover table-sm table-bordered">
						<thead class="text-bg-primary">
							<tr>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Total Days</th>
								<th>Reason</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while ($employee = mysqli_fetch_assoc($result2)) {
									$date1 = new DateTime($employee['start']);
									$date2 = new DateTime($employee['end']);
									$interval = $date1->diff($date2);
									$interval = $date1->diff($date2);
									echo "<tr>";
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
		</div>		
	</div>
</body>
</html>