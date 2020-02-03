<!DOCTYPE html>
<html>
<head>
	<title> PHP CRM | HUBSPOT API TEST </title>
	<meta charset="utf-8" name="hubspot">
	<meta charset="utf-8" name="crm">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
	<link rel="stylesheet" href="/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-dark  fixed-top bg-dark flex-md-nowrap p-1 shadow" style="color: #fdf5d9;">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
			<h1>
				<i class="fab fa-hubspot" style="color: rgb(247, 118, 31);"> </i> 
				HUBSPOT <strong> CRM </strong>
			</h1>
		</a>
	</nav>
	<div class="container-fluid">
  		<div class="row">
    		<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    			<ul class="nav flex-column mt-5">
					<li class="border-bottom text-center">
						<h6 class="text-muted"> APIs </h6>
					</li>
		          	<li class="nav-item text-center">
			            <a class="nav-link active text-center" href="/contact/index.php">
							<span class="d-block"> <i class="fas fa-address-book"></i> </span>   	
							  	Contact API 
			            </a>
		          	</li>

		          	<li class="nav-item">
			            <a class="nav-link text-center" href="/timeline/index.php">
							<span class="d-block"> <i class="far fa-clock"></i> </span> 
								Timeline API
			            </a>
		          	</li>

		          	<li class="nav-item">
			            <a class="nav-link text-center" href="/hubdb/index.php">
							<span class="d-block"> <i class="fas fa-database"></i>  </span> 
								HubDB API
			            </a>
		          	</li>

		          	<li class="nav-item text-center">
			            <a class="nav-link" href="/calendar/index.php">
							<span class="d-block"> <i class="far fa-calendar-alt"></i> </span>
								Calendar API
			            </a>
		          	</li>
					<li class="mt-5 border-bottom text-center">
						<h6 class="text-muted"> Coming APIs to test </h6>
					</li>
					<li class="nav-item text-center">
			            <a class="nav-link text-muted" href="#">
							<span class="d-block"> <i class="fas fa-building"></i> </span>
								Companies API
			            </a>
		          	</li>
					<li class="nav-item text-center">
			            <a class="nav-link text-muted" href="#">
							<span class="d-block"> <i class="fas fa-dice-five"></i> </span>
								Deals API
			            </a>
		          	</li>
					
					<li class="nav-item text-center">
			            <a class="nav-link text-muted" href="#">
							<span class="d-block"> <i class="far fa-bookmark"></i> </span>
								Webhooks API
			            </a>
		          	</li>
    			</ul>
    		</nav>
    		<div class="container col-md-10 page-content">
    			<!-- Begin Body Container -->

    		