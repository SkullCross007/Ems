<!DOCTYPE html>
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
<!-- <head> -->
<!-- Title Page-->
<!-- <title>Assign Project | Admin Panel</title> -->

<!-- Icons font CSS-->
<!-- <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all"> -->
<!-- <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all"> -->
<!-- Font special for pages-->
<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->

<!-- Vendor CSS-->
<!-- <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all"> -->
<!-- <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all"> -->

<!-- Main CSS-->
<!-- <link href="css/main.css" rel="stylesheet" media="all"> -->
<!-- </head> -->

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
                            <form class="text-center" action="process/assignp.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3"><input class="form-control" type="text" name="eid" placeholder="Employee ID" required /></div>
                                <div class="mb-3"><input class="form-control" type="text" name="pname" placeholder="Project Name " required /></div>
                                <div class="mb-3"><input class="form-control" name="duedate" placeholder="Project Name " required type="date" /></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Assign</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <h2 class="title">Assign Project</h2>
                        <form action="process/assignp.php" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Employee ID" name="eid" required="required">
                            </div>
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Project Name" name="pname" required="required">
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <input class="input--style-1" type="date" placeholder="date" name="duedate" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="p-t-20">
                                <button class="btn btn--radius btn--green" type="submit">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->