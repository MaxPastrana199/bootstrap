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

				
				<div class="col-sm-10">		<!-- Inhalt -->
					<h1>Dashboard.php</h1>
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
									
		
							
								<input class="btn btn-success btn-block" type="submit" name="Posten" value="Beitrag veröffentlichen">
							</fieldset><br/>
							
						</form>
					</div>
					<!--Form end-->

					
				</div>	<!-- Ende Inhalt -->
			