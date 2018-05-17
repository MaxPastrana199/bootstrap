<?php
	include_once("includes/db.php");
	include_once("includes/functions.php");

	if(isset($_POST["Absenden"])){
		$category=$_POST["Category"];
		$DateTime=datetime();
		if(empty($category)){
			$_SESSION["CategoryMessage"]="Bitte alle Felder ausfüllen";
			$output=error_message();
		}else{
			$_SESSION["SuccessMessage"]="Kategorie erfolgreich angelegt";
			$output=success_message();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Dashboard</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


	</head>
	<body>
		<div class="container-fluid">
			<div class="row">			
				<div class="col-sm-2">
					<h1 class="side_menue">Dashboard</h1>
					<ul id="side_menue" class="nav nav-pills nav-stacked">
						<li><a href="index.php"><i class="fas fa-th"></i> Dashboard</a></li>
						<li><a href="#"><i class="fas fa-file-alt"></i> Add New Post</a></li>
						<li class="active"><a href="categories.php"><i class="fas fa-tags"></i> Categorie</a></li>
						<li><a href="#"><i class="fas fa-user"></i> Manage Admins</a></li>
						<li><a href="#"><i class="fas fa-comment"></i> Comments</a></li>
						<li><a href="#"><i class="fas fa-desktop"></i> Live Blog</a></li>
						<li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
					</ul>
				</div>
				
				
				<div class="col-sm-10">
					<h1>Categories</h1>
					<?php 	echo "Hinzugefügt am: ".@$DateTime; ?>
					<div>
						<form action="categories.php" method="POST">
							<fieldset>
							<div class="form-group">								
								<label for="categoryname">Name:</label>
								<input class="form-control" type="text" name="Category" id="categoryname">
							</div><br/>
							<input class="btn btn-success btn-block" type="submit" name="Absenden" value="Neue Kategorie hinzufügen">
							</fieldset>
							<br/>
						</form>
						<div><?php echo @$output; ?></div>
					</div>
					
				</div>
			</div>
		</div>

<?php include("includes/footer.php"); ?>

	
	
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>