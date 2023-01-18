<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid";

//echo "$sql";
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

		<h1 class="text-center mb-4 mt-5">View Employee</h1>
	
		<div class="container">
			<div class="table-responsive">
				<table class="table table-hover table-sm table-bordered">
					<thead class="text-bg-primary">
						<tr>
							<th>Emp. ID</th>
							<th>Picture</th>
							<th>Name</th>
							<th>Email</th>
							<th>Birthday</th>
							<th>Gender</th>
							<th>Contact</th>
							<th>NID</th>
							<th>Address</th>
							<th>Department</th>
							<th>Degree</th>
							<th>Point</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while ($employee = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>".$employee['id']."</td>";
								echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
								echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
								echo "<td>".$employee['email']."</td>";
								echo "<td>".$employee['birthday']."</td>";
								echo "<td>".$employee['gender']."</td>";
								echo "<td>".$employee['contact']."</td>";
								echo "<td>".$employee['nid']."</td>";
								echo "<td>".$employee['address']."</td>";
								echo "<td>".$employee['dept']."</td>";
								echo "<td>".$employee['degree']."</td>";
								echo "<td>".$employee['points']."</td>";
								echo "<td><a href=\"edit.php?id=$employee[id]\">Edit</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	
</body>
</html>