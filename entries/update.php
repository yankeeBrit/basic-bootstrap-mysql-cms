<?php
	session_start();

	if($_SESSION["login"] != "true"){
		header("Location:../index.php");
		$_SESSION["error"] = "<font color=red>You are not logged in.</font>";
		exit;
	}
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add/Update Entry</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<style>
			body {
				padding-top: 40px;
				padding-bottom: 40px;
				background-color: #eee;
			}
			h1, h4 {
				text-align: center;
			}
			.form-entry {
				max-width: 460px;
				margin: 0 auto;
			}
			table {
				width: 100%;
				margin: 20px 0;
			}
			.form-entry .txt-fld:focus {
				z-index: 2;
			}
			.form-entry input[type="text"] {
				float: right;
			  width: 370px;
				position: relative;
				height: auto;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				padding: 5px;
				margin-bottom: -1px;
			}
			.lbl{
				text-align:right;
			}
			.btn-container {
				text-align: right;
			}
			.btn {
				margin-top:10px;
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
			<form class="form-entry" method="POST" action="view-entries.php" onSubmit="return validate();">
				<input type="hidden" name="idx" value="<?php echo (isset($gresult) ? $gresult["Index"] :  ''); ?>" />
				<table>
					<tr>
						<td class="lbl"><label for="firstname">First Name: </label></td>
						<td><input type="text" name="firstname"
							value="<?php echo (isset($gresult) ? $gresult["FirstName"] :  ''); ?>"
							id="firstname" class="txt-fld"/></td>
					</tr>
					<tr>
						<td class="lbl"><label for="lastname">Last Name: </label></td>
						<td><input type="text" name="lastname"
							value="<?php echo (isset($gresult) ? $gresult["LastName"] :  ''); ?>"
							id="lastname" class="txt-fld"/></td>
					</tr>
					<tr>
						<td class="lbl"><label for="address">Address: </label></td>
						<td><input type="text" name="address"
							value="<?php echo (isset($gresult) ? $gresult["Address"] :  ''); ?>"
							id="address" class="txt-fld"/></td>
					</tr>
					<tr>
						<td class="lbl"><label for="city">City: </label></td>
						<td><input type="text" name="city"
							value="<?php echo (isset($gresult) ? $gresult["City"] :  ''); ?>"
							id="city" class="txt-fld"/></td>
					</tr>
					<tr>
						<td class="lbl"><label for="state">State: </label></td>
						<td><input type="text" name="state"
							value="<?php echo (isset($gresult) ? $gresult["State"] :  ''); ?>"
							id="state" class="txt-fld"/></td>
					</tr>
					<tr>
						<td class="lbl"><label for="zip">Zip: </label></td>
						<td><input type="text" name="zip"
							value="<?php echo (isset($gresult) ? $gresult["Zip"] :  ''); ?>"
							id="zip" class="txt-fld"/></td>
					</tr>
					<tr>
						<td class="lbl"><label for="email">Email: </label></td>
						<td><input type="text" name="email"
							value="<?php echo (isset($gresult) ? $gresult["Email"] :  ''); ?>"
							id="email" class="txt-fld"/></td>
					</tr>
					<tr>
						<td class="lbl"><label for="phone">Phone: </label></td>
						<td><input type="text" name="phone"
							value="<?php echo (isset($gresult) ? $gresult["Phone"] :  ''); ?>"
							id="phone" class="txt-fld"/></td>
					</tr>
					<tr>
						<td><input type="hidden" name="action_type" value="<?php echo (isset($gresult) ? 'edit' :  'add');?>"/></td>
						<td class="btn-container">
							<input class="btn btn-lg btn-success" type="submit" name="save" id="save" value="Save" />
							<button class="btn btn-lg btn-danger" type="button" name="cancel" id="cancel" onclick="return goToHome();">Cancel</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<!-- /container -->
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../js/ie10-viewport-bug-workaround.js"></script>
		<script type="text/javascript">
			function validate(){
				var inputs = document.getElementsByTagName('input'),
						i, len = inputs.length;

				for(i = 0; i < len; i++){
					if(inputs[i].value === '') {
						alert('All fields required.');
						return false;
					};
				};
			}

			function goToHome(){
				window.location = 'view-entries.php?';
			}
		</script>
	</body>
</html>
