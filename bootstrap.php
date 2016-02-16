<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Bootstrap</title>
		
		<!--Bootstrap-->
		<link rel="stylesheet" 
			href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
			integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
			crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">IS 218</a>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Another one</a></li>
					<li><a href="#">Another one</a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container">
			<div class="row">
				<div class="col-md-8" style="background-color: red">Testing</div>
				<div class="col-md-4" style="background-color: blue">Testing</div>
				<div class="col-md-12">
					<table class="table table-striped">
						<tr>
							<th>First name</th>
							<th>Last name</th>
							<th>Date of birth</th>
							<th>City</th>
						</tr>
						<tr>
							<td>John</td>
							<td>Smith</td>
							<td>05/07/1991</td>
							<td>Newark</td>
						</tr>
						<tr>
							<td>John</td>
							<td>Smith</td>
							<td>05/07/1991</td>
							<td>Newark</td>
						</tr>
						<tr>
							<td>John</td>
							<td>Smith</td>
							<td>05/07/1991</td>
							<td>Newark</td>
						</tr>
					</table>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="exampleInputEmail1">Email Address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox">Check me out
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
							Option one is this and that&mdash;be sure to include why it's great
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
							Option two can be something else and selecting it will deselect option one
						</label>
					</div>
				</div>
			</div> <!-- end row -->
		</div> <!-- end container -->
		
		
		<!--jQuery-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!--Bootstrap-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
			integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" 
			crossorigin="anonymous"></script>
	</body>
<html>
