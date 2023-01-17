<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `project` where eid = '$id'";
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
						<li class="nav-item"><a class="nav-link active" href="eloginwel.php?id=<?php echo $id?>">Home</a></li>
						<li class="nav-item"><a class="nav-link active" href="myprofile.php?id=<?php echo $id?>">My Profile</a></li>
						<li class="nav-item"><a class="nav-link active" href="empproject.php?id=<?php echo $id?>">My Projects</a></li>
						<li class="nav-item"><a class="nav-link active" href="applyleave.php?id=<?php echo $id?>">Apply Leave</a></li>
					</ul><a class="btn btn-primary ms-md-2" role="button" href="alogin.html" style="padding-right: 18px;padding-left: 18px;font-size: 17px;">Logout</a>
				</div>
			</div>
		</nav>
		
		<h1 class="text-center mt-4 mb-4">My Projects</h1>
		<div id="divimg">

		<div class="container">
			<div class="table-responsive">
				<table class="table table-hover table-sm table-bordered">
					<thead class="text-bg-primary">
						<tr>
							<th>Project ID</th>
							<th>Project Name</th>
							<th>Due Date</th>
							<th>Sub Date</th>
							<th>Mark</th>
							<th>Status</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while ($employee = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>".$employee['pid']."</td>";
								echo "<td>".$employee['pname']."</td>";
								echo "<td>".$employee['duedate']."</td>";
								echo "<td>".$employee['subdate']."</td>";
								echo "<td>".$employee['mark']."</td>";
								echo "<td>".$employee['status']."</td>";
								echo "<td><a href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\">Submit</a>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>