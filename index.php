<?php 
require_once 'Utils.php';
$auth = new Authenticate();
?>
<head>
<title>Menus Index</title>
<!-- Normalize.css v4.1.1 -->
    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/frameworks-fef7fdfe41dd435c6d82f93b486dc62bc095ebd12cd24fa2a817c8bb45dc073e.css" integrity="sha256-/vf9/kHdQ1xtgvk7SG3GK8CV69Es0k+iqBfIu0XcBz4=" media="all" rel="stylesheet" />
<!-- Themes extention to Normalize.css v4.1.1 -->
    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/site-a307fa9df0197d4d4836f5c30ea37f8d03c5e612e82cd7567a2a9835df3bac08.css" integrity="sha256-owf6nfAZfU1INvXDDqN/jQPF5hLoLNdWeiqYNd87rAg=" media="all" rel="stylesheet" />
    
	<link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github-96feb85c87b37ba97441d51b3e2a735601abc3f7cb948c15beb3b91f264e1577.css" integrity="sha256-lv64XIeze6l0QdUbPipzVgGrw/fLlIwVvrO5HyZOFXc=" media="all" rel="stylesheet" />
    <link as="script" href="https://assets-cdn.github.com/assets/frameworks-6fe6a7604ec4c2601272849e1b99a3a9aa12c79b3e25be0360f8d114768e7578.js" rel="preload" />
    <link as="script" href="https://assets-cdn.github.com/assets/github-c135f7a7623e8c49bf84812bedf0c8d67e8f2deb7c4c0deca7f678774d9b95bb.js" rel="preload" />
<script type='text/javascript' src='js/MenuScripts.js'></script>
<link rel="stylesheet" href="menu.css" type="text/css">
</head>
<body>

<header>
<?php
echoRibbon( $auth);
?>
</header>

<iframe src="http://www.psych.med.umich.edu/patient-care/eating-disorders-program/" height="100%" width="100%"></iframe>

<!-- <h2><center>Menus Index</center></h2> -->
<!-- <center><a href="FoodEntry.php" data-role=button" id="AddFoodButton" class="btn btn-theme-blue">Add New Food</a></center> -->
<!-- <center><a href="FoodList.php" data-role=button" id="ListFoodButton" class="btn btn-jumbotron btn-theme-green">List All Foods</a></center> -->
</body>
</html>

