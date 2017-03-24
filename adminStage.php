<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Admin's Stage</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/adminStageCss.css" />
		
		<link rel="stylesheet" href="assets/css/rate.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<script>	
var menuItem1 ='Add New User';
	var Item1_url ='adminStage.php#addUser';
	var Item1_html5_link = 'add-link';
	
	var menuItem2 ='Display Users';
	var Item2_url ='adminStage.php#displayUser';
	var Item2_html5_link = 'display-link';  //id
		
	var menuItem3 ='Registration Requests';
	var Item3_url ='adminStage.php#registration';
	var Item3_html5_link = 'registration-link';
	
	var menuItem4 = 'Messages';
	var Item4_url = 'adminStage.php#message';
	var Item4_html5_link = 'message-link';
	
	var menuItem5 = 'Statistics';
	var Item5_url = 'adminStage.php#statistics';
	var Item5_html5_link = 'stat-link';
	
	var menuItem5 = 'advertisment Requests';
	var Item5_url = 'adminStage.php#advertisment';
	var Item5_html5_link = 'ads-link';

</script>	
	</head>
	
	<body onload="sorter.size(5)">

		<!-- Header -->


	<div id="header">
			<div class="top">
				<!-- Back to Home -->
					<div id="bk2hm">
						<!-- back to home page -->
						<a href="index.php" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home icon2"></span></a>
						<!-- Log out -->
						<a href="logout.php" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-sign-out iconOut">Log Out</span></a>
						<br>							
					</div>

				<!-- Logo -->
					<div id="logo">
						<a href="#about">
						<div>
						<div class="image avatar48 circle_image"><img src="#" alt="" /></div>
						
						
						<h1 id="title">?</h1>
						<p style=" font-weight:bold;">Admin
						<!---
						| 
						<a href="changeInfo.php" >Edit</a>
						
						-->
						</p>
						</div>
						</a>
					</div>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li><a href="<%= Item1_url%>" id="<%=Item1_html5_link%>" class="skel-layers-ignoreHref"><span class="icon  fa-users">'.var menuItem1.'</span></a></li>

						<li><a href="<%=Item2_url%>" id="<%=Item2_html5_link%>" class="skel-layers-ignoreHref"><span class="icon fa-th">'.var menuItem2.'</span></a></li>
						
						<li><a href="<%=Item3_url%>" id="<%=Item3_html5_link%>" class="skel-layers-ignoreHref"><span class="icon fa-bell">'.var menuItem3.'</span></a></li>

						<li><a href="<%=Item4_url%>" id="<%=Item4_html5_link%>" class="skel-layers-ignoreHref"><span class="icon fa-envelope-o">'.var menuItem4.'</span></a></li>
						
						<li><a href="<%=Item5_url%>" id="<%=Item5_html5_link%>" class="skel-layers-ignoreHref"><span class="icon fa-line-chart">'.var menuItem5.'</span></a></li>';
						
			//echo'<li><a href="<%=Item5_url%>" id="<%=Item5_html5_link%>" class="skel-layers-ignoreHref"><span class="icon fa-th">'.var menuItem5.'</span></a></li>			';
			
</ul>
				</nav>
			</div>
			
			
</div>

		<!-- Main -->
			<div id="main">
				
				<!-- Add New Users --> 				
				<section id="addUser" class="one dark">
					<div class="container">
						<header>
							<h2>Add New User </h2>
						</header>

													
						<form action="adminReg.php" method="post" enctype="multipart/form-data">
							<label>User type :</label>
							<select id="user_type" name="user_type">
								<option value="t0">Select...</option>
								<option value="s">Student</option>
								<option value="t">Tutor</option>
								<option value="a">Admin</option> 
							</select>
							
							<label>User Gender :</label>
							<select id="user_gender" name="user_gender">
								<option value="g0">Select...</option>
								<option value="female">Female</option>
								<option value="male">Male</option>
								
							</select>
							
							<label>UserName :</label>
							<input id="user_name" name="user_name" placeholder="" type="text">
							<label>Password :</label>
							<input id="user_password" name="user_password" placeholder="" type="password">
							
							<label>Comfirm Password :</label>                                
							<input id="com_password" name="com_password" placeholder="" type="password">
							<label>User Email :</label>
							<input id="user_email" name="user_email" type="text">
							<label>Phone Number :</label>
							<input id="phone_number" name="phone_number" type="text">
														
															
							</br>
							
							<input name="submit" value="Submit" type="submit" >
							</br>
							
							<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
							
						</form>
					
					</div>
				</section>
					

				<!-- Display All Users --> 
					<section id="displayUser" class="two">
						<div class="container">

						<h2 >Display Users' Information</h2>
							
						<script>
							function showUser() {
								var str = document.getElementById('search').value;

								if(document.getElementById('t').checked)
									var type = document.getElementById('t').value;

								if(document.getElementById('s').checked)
									var type = document.getElementById('s').value;

								if(document.getElementById('a').checked)
									var type = document.getElementById('a').value;

								$.ajax({
									type: 'GET',
									url: 'showUser.php',		
									data: 'str=' +str+ '&type=' +type,
									cache: false,
	
									success:function(response){
										$('#searchResult').html(response);
									},
									error:function(){
										$('#searchResult').html = ('Error');
									}
								});
							};
						</script>
						
						<div class="searchbox">
							<form id="searchUser" method='GET'>
								<input type='radio' value='t' id='t' name='stype' onchange='showUser()'>Tutor
								
								<input type='radio' value='s' id='s' name='stype' onchange='showUser()'>Student

								<input type='radio' value='a' id='a' name='stype' onchange='showUser()'>Admin

								<input autocomplete='off' class='search' type='search' id='search' name='search' placeholder='SEARCH HERE' data-col='all' oninput='showUser()'/>
							</form>
						</div>
														
						<div id='searchResult' class="sortable">
							<p>User info will be listed here...</p>
							
							<table class="" id="t02" width="40" >
								<thead><tr>
									<th>ID</th>
									<th>Name</th>
									<th>Type</th>
									<th>Gender</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Education Background</th>
									<th>RegDate</th>
									<th>User Access</th>
									<th>Status</th>
								</tr></thead>
								
								<tbody>

						</tbody>
						</table>
						
						</div>
							
						<!-- pager -->							
						<div id="controls">
							<div id="perpage">
								<select onchange="sorter.size(this.value)">
									<option value="5">5</option>
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								<span>Entries Per Page</span>
							</div>
							<div id="navigation">
								<img src="images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
								<img src="images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
								<img src="images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
								<img src="images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
							</div>
							<div id="text">Displaying Page <span id="currentpage"></span> of <span id="pagelimit"></span></div>
						</div>
						</div>

					</section>


				<!-- Registration Requests --> 
					<section id="registration" class="three" >
						<div class="container">

							<header>
								<h2>Registration Requests </h2>
							</header>

							<table id="t01" >
								  <tr>
									<th>user name</th>
									<th>telephone</th>		
									<th>email</th>
									<th>education Background</th>
									<th> </th>
								  </tr>
								  <tr>
					
							</table>
							
						</div>
					</section>
					
				<!-- Advertisement Requests --
				<section id="advertisement" class="two" style="padding-bottom: 200px;">
					<div class="container">

							<header>
								<h2 style="color:white;">Advertisement Requests </h2>
							</header>

							
						</div>
				</section>-->

				<!-- Message -->
					<section id="message" class="four" >
						<div class="container">

							<header>
								<h2>Messages</h2>
							</header>
							

							<table id="t01" >
								  <tr>
									<th>From (user)</th>
									<th>Content</th>
									<th>Send reply</th>
								  </tr>

							</table>							
						</div>
					</section>

				<!-- Statistics -->
					<section id="statistics" class="five" >
						<div class="container">

							<header>
								<h2 style="color:white;">Statistics</h2>
							</header>	
								
						</div>
					</section>			
					
			</div>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollzer.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/jquery.tablesorter.js"></script>
			<script>
			var sorter = new TINY.table.sorter("sorter");
			sorter.head = "head";
			sorter.asc = "asc";
			sorter.desc = "desc";
			sorter.even = "evenrow";
			sorter.odd = "oddrow";
			sorter.evensel = "evenselected";
			sorter.oddsel = "oddselected";
			sorter.paginate = true;
			sorter.currentid = "currentpage";
			sorter.limitid = "pagelimit";
			sorter.init("t02",1);
			</script>
			

	</body>
</html>
