<!DOCTYPE HTML>
<html>

<?php
include 'function.php';
	session_start();
	if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
		header ("Location: login.php");
	}
	
	$conn = connect_to_database();
	$sql = "SELECT * FROM techer_users WHERE user_id ='" . $_SESSION['user_id'] . "'";
	$con = mysql_connect("localhost", "seadmin", "19931113") or  
		die("Could not connect: " . mysql_error());  
	mysql_select_db("seproject");
	$retval =  mysql_query( $sql);
	if(! $retval ){
		die('Could not get data: ' . mysql_error());
	}	
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){				
		$user_id = $row["user_id"];
		$user_name = $row["user_name"];
		$user_type = $row["user_type"];
		$user_gender = $row["user_gender"];
		$user_email = $row["user_email"];
		$user_phone = $row["user_phone"];
		$user_educationBackground = $row["user_educationBackground"];
		$user_regDay = $row["registrationDate"];
	}
?>
	<head>
		<title>Send Request</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class=""><img src="images/banne.jpg" alt="" /></span>
<?php
//echo $_POST['date'];
//echo $_POST['time'];
$count = 0;
$message = '<h1>Please enter the information</h1>';

	if(isset($_POST['type']) && $_POST['type'] != "Se"){
		$type = $_POST['type'];
		$count++;}
	if(isset($_POST['date']) && isset($_POST['time'])){
		$dt = $_POST['date'] . ' ' . $_POST['time'] .':00';
		$count++;}
	if(isset($_POST['group']) && $_POST['group'] != "Se"){
		$group = $_POST['group'];
		$count++;}
	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$count++;}
	if(isset($_POST['msg'])){
		$msg = $_POST['msg'];
		$count++;}	
	
	if($count > 3){	
		$tid = $_POST['tid'];
		$sql = 'INSERT INTO `request` (`sID`, `tID`, `Time`, `ClassType`, `GroupType`, `message`) VALUES ("'.$user_id.'","'.$tid.'","'.$dt.'","'.$type.'","'.$group.'","'.$msg.'")';
	$retval = $conn->query($sql);
		if(! $retval ){
			die('Could not enter data: ' . mysql_error());
		} else
			$message = '<h1>Request sent</h1>';
	}
	
echo $message;
?>
<body>
</header>
						<!--<footer>
							<ul class="icons">
								<li><a href="#" class="fa-twitter">Twitter</a></li>
								<li><a href="#" class="fa-instagram">Instagram</a></li>
								<li><a href="#" class="fa-facebook">Facebook</a></li>
							</ul>
						</footer>-->
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li><a href="student_portfolio.php">Back to My portfolio</a></li>
						</ul>
					</footer>

			</div>
		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>
	</body>
</html>