<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php
session_start();
if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
header ("Location: login.php");
}
include 'function.php';
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
					$user_icon = $row["icon"];
					$user_cover = $row["cover"];
					$user_regDay = $row["registrationDate"];

				}
?>
	<head>
		<title><?php echo $user_name ?>'s Portfolio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main_o_cm.css" />
		<link rel="stylesheet" href="assets/css/main_teacher.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body  style="background-color: #CAE8FF;">
		<?php get_tutor_menu($user_id);?>

		<?php
			$classid = $_POST["cid"];
		?>
		<!-- Main -->
		<div id="main" >
							
			<section id="top" class="one dark ">
				<div class="container">
					<h2>Edit Class Participants</h2>
					
					<div class="showparti" >
						<h3>
						<span style="color: white;">Class: <?php echo $_POST["cname"]; ?></span>
						
						<?php
					echo'
					<div class="showpartibtn">
					
					<a href="TutMan/addStudent.php?cid='.$classid.'"   >Add Student</a>
					
					</div>
					';
					?>
						</h3>

						<ul>
						<?php get_studentID($classid); ?>
						</ul>
					</div>
					
					<!--
					<div>					
					<form class="showpartibtn" method="" action="TutMan/addStudent.php?cid=<?php echo $classid ;?>">
							<input type="button" name="addStudent" value="Add Student"/>
					</form>
					
					</div>-->
					
				</div>
			</section>
		<!-- Session timeout -->
		<div id="dialog" title="Session Expiration Warning!"></div>				
		</div>

		<!-- Scripts -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
			<script src="assets/js/jquery.idletimer.js"></script>
			<script>
				jQuery.noConflict();
				(function( $ ) {
					var initialSessionTimeoutMsg = 'You will be logged off in <span id="dialog-countdown"></span> seconds. Do you want to continue your session?';
				
					$("#dialog").html(initialSessionTimeoutMsg);
					$("#dialog").dialog({
						autoOpen: false,
						modal: true,
						minWidth: 500,
						minHeight: 150,
						closeOnEscape: false,
						draggable: false,
						resizable: false,
						open: function() {
							$('body').css('overflow','hidden');
						},
						close: function() { 
							$('body').css('overflow','auto');
						},
						buttons: {
							'Stay Connected': function(){
								$(this).dialog('close');
							},
							'Logout Now': function(){
								window.location = "logout.php";
							}
						}
					});

					var $countdown = $("#dialog-countdown");

					$.idleTimeout('#dialog', 'div.ui-dialog-buttonpane button:first', {
						idleAfter: 1800, //30 minutes
						pollingInterval: 2,
						serverResponseEquals: 'OK',
						onTimeout: function(){
							window.alert("Your session was timed 	out.");
							window.location = "logout.php";
						},
						onIdle: function(){
							$(this).dialog("open");
						},
						onCountdown: function(counter){
							$countdown.html(counter);
						}
					});
				})(jQuery);
			</script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollzer.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>