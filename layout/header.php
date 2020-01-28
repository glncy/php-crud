<!DOCTYPE html>
<html>
<head>
	<!-- REQUIRED META -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="<?= baseURL(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= baseURL(); ?>css/styles.css">
	<script type="text/javascript" src="<?= baseURL(); ?>js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?= baseURL(); ?>js/sweetalert2@8.js"></script>
	<title>My Online Diary</title>

</head>
<body style="background: #23074d;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #cc5333, #23074d);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #cc5333, #23074d); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
	<div class="container-fluid">
		<div class="container">
			<div class="row justify-content-center text-center text-white py-4">
				<div class="col-sm-6">
					<h2><strong>My Online Diary</strong></h2>
				</div>
			</div>
			<?php
			if (isset($_SESSION['user'])) {
			?>
			<div class="row justify-content-center text-center text-white pb-4 no-gutters align-items-center">
				<div class="col-sm-6">
					<input type="text"id="search_entry" class="form-control" placeholder="Search Title..." onkeyup="search_entry();">
				</div>
				<div class="col-sm-1">
					<a href="logout.php" class="badge badge-pill badge-danger p-3">Logout</a>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
	<div class="container-fluid">
		<div class="container">