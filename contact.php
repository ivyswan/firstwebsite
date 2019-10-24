
<?php
if(!isset($_POST["submit"])){
	$_POST["submit"] = "";
}
if(!isset($_POST["yourName"])){
	$_POST["yourName"] = "";
}
if(!isset($_POST["yourNumber"])){
	$_POST["yourNumber"] = "";
}
if(!isset($_POST["yourEmail"])){
	$_POST["yourEmail"] = "";
}
	$error ="";
	$error2 ="";
	$error3 ="";
?>
<?php
	function MyForm(){
?>
<?php global $error, $error2, $error3; ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<p>Enter your name<br/> <input type="text" size="25" name="yourName" value="<?php echo $_POST["yourName"];?>" /><span class="makeRed"><?php echo $error;?></span></p>
	<p>Enter your tel number<br/> <input type="tel" size="3" name="yourNumber" value="<?php echo $_POST["yourNumber"];?>" /><span class="makeRed"><?php echo $error2;?></span></p>
	<p>Enter your email<br/> <input type="text" size="25" name="yourEmail" value="<?php echo $_POST["yourEmail"];?>" /><span class="makeRed"><?php echo $error3;?></span></p>
	<p>Enter your comments<br/> <input type="text" size="25" name="yourComments" /></p>
	<p><input type="submit" value="send" name="submit"/></p>
	</form>
<?php
	}
?>
<!doctype html>
<html>
<head>
<title>Contact</title>
<link rel="stylesheet" type="text/css" href="css/ministyle.css"/>
</head>
<body>
<div id="wrapper">
<header>
<?php
	echo ivy;
?>
</header>
<nav>
<?php
	echo home;
?>	
</nav>
<article>
	<h1>Contact Us</h1>
<?php
if(!$_POST["submit"]){
	MyForm();
} elseif(!$_POST["yourName"]) {
	$error = "Please provide a valid name";
	MyForm();
} elseif(!is_numeric($_POST["yourNumber"])) {
	$error2 = "Please provide a valid staff number";
	MyForm();
} elseif(!filter_var($_POST["yourEmail"], FILTER_VALIDATE_EMAIL)) {
	$error3 = "Please provide a valid email";
	MyForm();
} else {
	$message = $_POST["yourName"] . "\n" . $_POST["yourNumber"] . "\n" . $_POST["yourComments"];
    $headers = "From:" . $_POST["yourName"] . "\r\n";
    $headers .= "Reply-To:" . $_POST["yourEmail"] . "\r\n";
    $headers .= "Content-Type: text/plain;\r\n charset=iso-8859-1\r\n";
	mail("ivy_swan@yahoo.com", "PHP Course Email", $message, $headers);
?>
<h2>Thank you <?php echo $_POST["yourName"];?></h2>
<p>Your staff number <strong><?php echo $_POST["yourNumber"];?></strong> has been noted and we will email you at <strong><?php echo $_POST["yourEmail"];?></strong>.</p>
<p>Your comments were as follows <br/><strong><?php echo $_POST["yourComments"];?></strong></p>
<?php } ?>
</article>
<footer>
<?php
	echo copyright;
?>		
</footer>
</div>
</body>
</html>