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
			//$query="INSERT INTO category(datetime,name,creatorname) VALUES ('$DateTime','$category','$admin')";
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
		<div class="container-fluid">		<!-- Container über gesamte Seite -->
			<div class="row">			
				<div class="col-sm-2">		<!-- Navigation -->
					<?php include("includes/nav.php"); ?>
				</div>						
				
				
				<div class="col-sm-10">		<!-- Inhalt -->
					<h1>Add New Post</h1>
					<?php 	if(isset($_POST["Absenden"])){
						echo "Hinzugefügt am: ".@$DateTime;
					}
					?>
					
					<!--Form start-->	
					<div>
						<form action="add-new-post.php" method="POST">
							<fieldset>
								
							<div class="form-group">		<!-- Titel -->
								<label for="title">Titel:</label>
								<input class="form-control" type="text" name="Titel" placeholder="Titel" id="title">											
							</div>
							
							<div class="form-group">		<!-- Kategorie -->
								<label for="categoryselect">Kategorie:</label><br/>
								<select class="form-control" id="categoryselect" name="Category">
								<?php
								global $connection;
								$query="SELECT * FROM category ORDER BY name asc";
								$execute=mysqli_query($connection,$query);
								while($data=mysqli_fetch_array($execute)){
									$id=$data["id"];
									$name=$data["name"];								
								?>
								<option><?php  echo $name; ?></option>
								<?php } ?>
								</select>
							</div>
									
							<div class="form-group">		<!-- Image -->
								<label for="imageselect">Image:</label>
								<input type="file" class="form-control" name="Image" id="imageselecet">
							</div>
							
							<div class="form-group">		<!-- Beitrag -->
								<label for="postarea">Beitrag</label>
								<textarea class="form-control" name="Post" id="postarea"></textarea>
							</div>
							
								<input class="btn btn-success btn-block" type="submit" name="Posten" value="Beitrag veröffentlichen">
							</fieldset><br/>
							
						</form>
					</div>
					<!--Form end-->

					
				</div>	<!-- Ende Inhalt -->
			</div>		<!-- End row -->
		</div>			<!-- End Container Fluid -->
		<!-- Footer -->
		<?php include("includes/footer.php"); ?>
	</body>
	
	
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>