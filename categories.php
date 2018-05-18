<?php
	include_once("includes/db.php");
	include_once("includes/functions.php");

	if(isset($_POST["Absenden"])){
		$category=$_POST["Category"];
		$DateTime=datetime();
		$admin="Max Schenke";
		if(empty($category)){
			$_SESSION["CategoryMessage"]="Bitte alle Felder ausfüllen";
			$output=error_message();
		}elseif(strlen($category)>199){
			$_SESSION["CategoryMessage"]="Kategoriename darf nicht länger als 200 Zeichen sein. Aktuelle Länge: ".strlen($category)." Zeichen";
			$output=error_message();		
		}else{
			global $connection;
			$query="INSERT INTO category(datetime,name,creatorname) VALUES ('$DateTime','$category','$admin')";
			$execute=mysqli_query($connection,$query);
			if($execute){
				$_SESSION["SuccessMessage"]="Kategorie erfolgreich angelegt";
				$output=success_message();
			}else{
				$_SESSION["CategoryMessage"]="Something went wrong";
			$output=error_message();
			}
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
					<?php 	if(isset($_POST["Absenden"])){
						echo "Hinzugefügt am: ".@$DateTime;
					}
					?>
						
					<div>
						<form action="categories.php" method="POST">
							<fieldset>
							<div class="form-group">								

								<input class="form-control" type="text" name="Category" placeholder="Kategorie Name" id="categoryname">
							</div><br/>
							<input class="btn btn-success btn-block" type="submit" name="Absenden" value="Neue Kategorie hinzufügen">
							</fieldset>
							<br/>
						</form>
						<div><?php echo @$output; ?></div>
					</div>
					<div class="table-responsive">
						<table class="table table-striped">
							<tr>
								<th>ID</th>
								<th>Date & Time</th>
								<th>Category Name</th>
								<th>Creator Name</th>
							</tr>
							<?php
								global $connection;
								$query="SELECT * FROM category ORDER BY datetime desc";
								$execute=mysqli_query($connection,$query);
								$number=0;
								while($data=mysqli_fetch_array($execute)){
									$id=$data["id"];
									$datetime=$data["datetime"];
									$name=$data["name"];
									$creator=$data["creatorname"];		
									$number++;							
							?>
							<tr>
								<td><?php echo $number; ?></td>
								<td><?php echo $datetime; ?></td>
								<td><?php echo $name; ?></td>
								<td><?php echo $creator; ?></td>
							</tr>
							
							<?php } ?> <!--end of while-loop-->
							
						</table>
					</div>
					
				</div>
			</div>
		</div>

<?php include("includes/footer.php"); ?>

	
	
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>