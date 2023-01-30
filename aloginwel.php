<?php
require_once('process/dbh.php');
$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$result = mysqli_query($conn, $sql);
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


	<div id="divimg">
		<h2 class="mt-5" style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Empolyee Leaderboard </h2>

		<div class="container" style="width: 839px;">
			<div class="table-responsive">
				<table class="table table-hover table-sm table-bordered">
					<thead class="text-bg-primary">
						<tr>
							<th>Seq. No.</th>
							<th>Emp ID</th>
							<th>Emp Name</th>
							<th>Points</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$seq = 1;
						while ($employee = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $seq . "</td>";
							echo "<td>" . $employee['id'] . "</td>";

							echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

							echo "<td>" . $employee['points'] . "</td>";

							$seq += 1;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="text-center">
			<!-- <button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="reset.php" style="text-decoration: none; color: white"> Reset Points</button> -->
			<a class="btn btn-danger ms-md-2" role="button" href="reset.php" style="padding-right: 18px;padding-left: 18px;font-size: 17px;">Reset Points</a>
		</div>


	</div>
</body>

</html>