<?php
	if(isset($_GET['pagename']) && $_GET['pagename'] != '')
		$page = $_GET['pagename'];
	else
		$page = 'dashboard';
	
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
					<?php include("includes/nav.php"); ?>
				</div>								
				<?php if(file_exists('./content/' . $page . '.php')) {
                            include('./content/' . $page . '.php');
                        } elseif(file_exists('./content/' . $page . '.html')) {
                            include('./content/' . $page . '.html');
                        } else {
                            include('./content/404.php');
                        } ?>
			</div>
		</div>
		

		
		
		
		<!-- Footer -->
		<?php include("includes/footer.php");?>
	</body>
	
	
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>