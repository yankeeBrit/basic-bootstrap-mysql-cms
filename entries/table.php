<?php
	session_start();

	if($_SESSION["login"] != "true"){
		header("Location:../index.php");
		$_SESSION["error"] = "<font color=red>You are not logged in.</font>";
		exit;
	}
	include_once 'view-entries.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>View Entries</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<style>
			body {
				padding-top: 40px;
				padding-bottom: 40px;
				background-color: #eee;
			}
			h1 {
				text-align: center;
			}
			table {
				background: #fff;
			}
			.content {
				overflow: auto;
				margin-bottom: 20px;
			}
		</style>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<?php include '../header.php'; ?>
			<br/>
			<div class="content">
				<table id="entries" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>City</th>
							<th>State</th>
							<th>Zip</th>
							<th>Email</th>
							<th>Phone</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$i = 0;
							foreach($entry_list as $entry) :
								$i++;
								if($i%2==0) $class = 'even'; else $class = 'odd';
						?>
						<tr class="<?php echo $class; ?>">
							<td><?php echo $entry["FirstName"]; ?></td>
							<td><?php echo $entry["LastName"]; ?></td>
							<td><?php echo $entry["Address"]; ?></td>
							<td><?php echo $entry["City"]; ?></td>
							<td><?php echo $entry["State"]; ?></td>
							<td><?php echo $entry["Zip"]; ?></td>
							<td><?php echo $entry["Email"]; ?></td>
							<td><?php echo $entry["Phone"]; ?></td>
							<td>
								<form method="POST" action="view-entries.php">
									<input type="hidden" name="idx" value="<?php echo $entry["Index"]; ?>" />
									<input type="hidden" name="action" value="edit" />
									<input class="btn btn-sm btn-primary" type="submit" value="Edit" />
								</form>
							</td>
							<td>
								<form method="POST" action="view-entries.php" onSubmit="return confirmDelete();">
									<input type="hidden" name="idx" value="<?php echo $entry["Index"]; ?>" />
									<input type="hidden" name="action" value="delete" />
									<input class="btn btn-sm btn-danger" type="submit" value="Delete" />
								</form>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<a href="update.php" class="btn btn-lg btn-primary">Add Entry</a>
			<button class="btn btn-lg btn-success btn-excel" type="button" onclick="$('#entries').tableExport({type:'xls',fileName:'Entries'});">Export to Excel</button>
		</div>
		<!-- /container -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../js/ie10-viewport-bug-workaround.js"></script>
		<script type="text/javascript" src="../js/FileSaver/FileSaver.min.js"></script>
		<script type="text/javascript" src="../js/tableExport.min.js"></script>
		<script type="text/javascript" src="../js/jquery.base64.js"></script>
		<script>
			function confirmDelete(){
				var d = confirm('Do you really want to delete this entry?');
				if(d == false) return false;
			}
		</script>
	</body>
</html>
