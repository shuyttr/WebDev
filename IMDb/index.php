<!DOCTYPE html>
<html lang="en-US"><!-- COM3780 Homework 5 (Kevin Bacon) -->
    <head>
		<title>My Movie Database (MyMDb)</title>
		<meta charset="utf-8">
		
		<!-- Links to provided files.  Do not edit or remove these links -->
		<link href="http://162.243.171.11/COM3780/homework/5/images/favicon.png" type="image/png" rel="shortcut icon">

		<!-- Link to your CSS file that you should edit -->
		<link href="bacon.css" type="text/css" rel="stylesheet">
	</head>

	<body><div id="i4c-draggable-container" style="position: fixed; z-index: 1499; width: 0px; height: 0px;"><div data-reactroot="" class="resolved" style="all: initial;"></div></div>
		<div id="frame">
			<div id="banner">
				<a href="index.php"><img src="http://162.243.171.11/COM3780/homework/5/resources/mymdb.png" alt="banner logo"></a>
				My Movie Database
			</div>

			<div id="main">
				<!-- your HTML output follows -->

            <h1>The One Degree of Kevin Bacon</h1>
            <p>Type in an actor's name to see if he/she was ever in a movie with Kevin Bacon!</p>
            <p><img src="http://162.243.171.11/COM3780/homework/5/resources/kevin_bacon.jpg" alt="Kevin Bacon"></p>
			
				<!-- form to search for every movie by a given actor -->
				<form action="search-all.php" method="get">
					<fieldset>
						<legend>All movies</legend>
						<div>
							<input name="firstname" type="text" size="12" placeholder="first name" autofocus="autofocus"> 
							<input name="lastname" type="text" size="12" placeholder="last name"> 
							<input type="submit" value="go">
						</div>
					</fieldset>
				</form>

				<!-- form to search for movies where a given actor was with Kevin Bacon -->
				<form action="search-kevin.php" method="get">
					<fieldset>
						<legend>Movies with Kevin Bacon</legend>
						<div>
							<input name="firstname" type="text" size="12" placeholder="first name"> 
							<input name="lastname" type="text" size="12" placeholder="last name"> 
							<input type="submit" value="go">
						</div>
					</fieldset>
				</form>
			</div> <!-- end of #main div -->
		
			<div id="w3c">
				<a href="http://validator.w3.org/check/referer">
				    <img src="http://162.243.171.11/COM3780/icons/w3c-html.png" alt="Valid HTML5">
			    </a>
				<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">
				    <img src="http://162.243.171.11/COM3780/icons/w3c-css.png" alt="Valid CSS">
				</a>
			</div>
		</div> <!-- end of #frame div -->
	

<div id="i4c-dialogs-container"></div>
</body>
</html>