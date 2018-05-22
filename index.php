<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<!DOCTYPE html>
<html>

<head>
    <title>SPACE</title>
	<script src="index.js"></script>
    <link rel="stylesheet" href="index.css"> </head>

<body>
	<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
    <header>
        <img class="logo" src="images/spacelogo.png" width="140px" height="33px">
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="index.php?page=planet">PLANET</a></li>
                <li><a href="index.php?page=stars">STARS</a></li>
				<li><a><strong><?php echo $_SESSION['username']; ?></strong></a></li>
				<li><a href="index.php?logout='1'">LOGOUT</a></li>
            </ul>
        </nav>
    </header> 

	<?php 
		if(!empty($_GET['page'])){
			if($_GET['page'] == "planet")
			{
				include("planet.html");
			} 
			if($_GET['page'] == "stars")
			{
				include("stars.html");
			}
		}
		else{
			include("home.html");
		};
	
	?>
    <footer>
        <p>COPYRIGHT CONTENT</p>
        <p>POWERED BY SURAJ</p>
		<img src="images/email.png"href="#" style="margin-left :600px ; width:40px; height:40px;" >
    </footer>
</body>

</html>
