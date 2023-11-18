<!DOCTYPE html>
<html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
?>

<head>
<link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" href="forum.css">
<title>forum</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</head>

<!-- Sidenav -->
<?php
require_once('partials/_sidebar.php');
?>

<!-- Main content -->
<div class="main-content">
	<!-- Top navbar -->
	<?php
	require_once('partials/_topnav.php');
	?>
	<!-- Header -->
	<div style="background-image: url(assets/img/theme/bg4.jpg); background-size: cover;" class="header pb-8 pt-5 pt-md-8">
		<span class="mask bg-gradient-dark opacity-8"></span>
		<div class="container-fluid">
			<div class="header-body">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3>Community forum</h3>
						<hr>
						<form name="frm" method="post">
							<div class="form-group">
								<label for="usr"></label>
								<input type="hidden" class="form-control" name="Rname"
									value="<?php echo $admin->admin_name;?>">
							</div>
							<input type="hidden" id="commentid" name="Pcommentid" value="0">
							<div class="form-group">
								<label for="usr">Enter topic:</label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label for="comment">Write a post:</label>
								<textarea class="form-control" rows="5" name="msg" required></textarea>
							</div>
							<input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>Recent questions</h4>
						<table class="table" id="MyTable"
							style="background-color: #edfafa; border:0px;border-radius:10px">
							<tbody id="record">
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-8" style="margin-top: -435px">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3>Topics</h3>
						<hr>
						<form name="frm" method="post">
							<input type="hidden" id="commentid" name="Pcommentid" value="0">
							<div class="form-group">
								<ul class="gradient-list" id="topics">
									<li><b>Plans</b></li>
									<li><b>Layout </b></li>
									<li><b>Products</b></li>
									<li><b>ISP</b></li>
									<li><b>Networking</b></li>
								</ul>
							</div>
							<hr>
							<input type="button" id="butsave" name="save" class="btn btn-primary" value="Add Topic">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
	</div>
</div>

</body>

</html>
