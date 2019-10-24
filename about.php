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
?>
<?php
	function MyForm(){
?>
<?php global $error, $error2, $error3; ?>
    <span id="message"><p>Drop me a message if you want to get in touch!</p></span>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="tableRow">
            <p><label for="name">Name</label></p>
            <p><input type="text" name="yourName" id="name" maxlength="50" value="<?php echo $_POST["yourName"];?>" placeholder="*name required" required><span class="makeRed"><?php echo $error;?></span></p>
        </div>

        <div class="tableRow">
            <p><label for="email">Email</label></p>
            <p><input type="email" name="yourEmail" id="email" value="<?php echo $_POST["yourEmail"];?>" placeholder="*email required" required><span class="makeRed"><?php echo $error2;?></span></p>
        </div>                       
    
        <div class="tableRow">
            <p><label for="phone">Telephone Number</label></p>
            <p><input type="tel" name="yourNumber" id="phone" value="<?php echo $_POST["yourNumber"];?>" placeholder="optional"></p>
        </div>    
        
        <div class="tableRow">
            <p><label for="message">Message</label></p>
            <p><textarea name="yourMessage"></textarea></p>
        </div>
        
        <div class="tableRow">
            <p></p>
            <p><input type="reset" value="Clear" class="button">&nbsp;
            <input type="submit" value="Send" name="submit" class="button"></p>
        </div>
	</form>
<?php
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>About Me</title>
<link rel="stylesheet" type="text/css" href="desktop.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width:769px)" href="pc.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width:321px) and (max-width:768px)" href="tablet.css">
<link rel="stylesheet" type="text/css" media="screen and (max-width:320px)" href="phone.css">
<link rel="stylesheet" type="text/css" media="screen and (min-device-width:320px) and (max-device-width:480px)" href="phone.css">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Special+Elite|Prata|Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>  
<link rel="stylesheet" type="text/css" href="SpryAssets/SpryTooltip.css" >
<style>
.navBox{
	top:130px;
	left:-60px;	
	font-size:1.2em;
}

#cv{
	font-size:1.1em;
	float:right;
	padding:15px 30px;
	color:#FFF;
	-webkit-box-shadow:0px 0px 25px 20px rgba(0,0,0,.3) inset;
	-moz-box-shadow:0px 0px 25px 20px rgba(0,0,0,.3) inset;
	-o-box-shadow:0px 0px 25px 20px rgba(0,0,0,.3) inset;
	-ms-box-shadow:0px 0px 25px 20px rgba(0,0,0,.3) inset;
	box-shadow:0px 0px 25px 20px rgba(0,0,0,.3) inset;
	-webkit-transition: all 1s ease; 
	-moz-transition: all 1s ease; 
	-o-transition: all 1s ease;
	-ms-transition: all 1s ease;
	transition: all 1s ease; 
}

#cv:hover{
	color:#FCF;
}
</style>
<script src="SpryAssets/SpryTooltip.js" type="text/javascript"></script>
</head>
<body>
<div class="main">
    <div class="nav">
        <a href="about.php#contact">&larr; Contact</a>
    </div>

	<div class="headerBox" id="headerAbout">    
         <h1><span class="smallerH1">All about</span> Me.</h1>
	</div>
        	<div class="greyBox">
          <div class="navBox">
              <h2>Ivy Swan</h2>
          </div>

                <img src="images/myPhoto.jpg" id="myPhoto" alt="visual of the website owner's photo">
<p>Welcome and thanks for dropping by to visit my website. It is my first attempt at building a site from scratch using <span id="sprytrigger1" class="webF"><a href="http://www.whatwg.org/" target="_blank">&lt;HTML&gt;</a></span> , <span id="sprytrigger2" class="webF"><a href="http://www.css3.info/" target="_blank">&lt;CSS&gt;</a></span> and <span id="sprytrigger3" class="webF"><a href="https://developer.mozilla.org/en-US/" target="_blank">&lt;JavaScript&gt;</a></span> / <span id="sprytrigger4" class="webF"><a href="http://jquery.com/" target="_blank">&lt;jQuery&gt;</a></span>. It is also my test bed for new experiments, the coding kind, not the Frankenstein kind.</p>
<p>Coding websites is my newly found passion but I leave the artsy stuff to people with graphic design creativity, but that's not to say that I can't draw great stick figures!</p>
<p>This site is all about the stuff I love - music, keeping fit and website coding. I guess if those were my super powers, I'd be a pretty surreal superhero.</p>

                <div id="contact">
					<?php
                    if(!$_POST["submit"]){
                        MyForm();
                    } elseif(!$_POST["yourName"]) {
                        $error = "Please provide a valid name";
                        MyForm();
                    } elseif(!filter_var($_POST["yourEmail"], FILTER_VALIDATE_EMAIL)) {
                        $error2 = "Please provide a valid email";
                        MyForm();
                    } else {
                        $message = $_POST["yourName"] . "\n" . $_POST["yourNumber"] . "\n" . $_POST["yourMessage"];
                        $headers = "From:" . $_POST["yourName"] . "\r\n";
                        $headers .= "Reply-To:" . $_POST["yourEmail"] . "\r\n";
                        $headers .= "Content-Type: text/plain;\r\n charset=iso-8859-1\r\n";
                        mail("ivy_swan@yahoo.com", "Message from ivyswan.com", $message, $headers);
                    ?>
                    <span id="message"><p>Message Sent!</p></span>
                    <div id="sentMessage">
                    <p>Thank you <span class="formMessage"><?php echo $_POST["yourName"];?></span>!</p>
                    <p>Your message <span class="formMessage"><?php echo $_POST["yourMessage"];?></span> has been sent and I will email you at <span class="formMessage"><?php echo $_POST["yourEmail"];?></span> 
                    as soon as possible.</p>
                    </div>
                    <?php } ?>
                </div>
            </div>
    <div id="tooltip">
        <div class="tooltipContent" id="sprytooltip1"><b>HTML (HyperText Markup Language)</b> is the structure and content of a website.</div>
        <div class="tooltipContent" id="sprytooltip2"><b>CSS (Cascading Style Sheets)</b> is the visuals, layout and the look and feel of a website.</div>
        <div class="tooltipContent" id="sprytooltip3"><b>JavaScript</b> is the behavior and the interactivity of a website.</div>
        <div class="tooltipContent" id="sprytooltip4"><b>jQuery</b> is a JavaScript library.</div>
    </div>
	<a id="cv" href="http://www.ivyswan.com/cv/" target="_blank">Wanna view my CV? Click here.</a>

</div>

<div class="navContainer">
        <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="music.html">Music</a></li>
        <li><a href="fitness.html">Fitness</a></li>
        <li><a href="codes.html">Codes</a></li>
        <li><a href="about.php#contact">Contact</a></li>
        <li><a href="http://ivyswan.wordpress.com/">Blog</a></li>
        </ul>
    <div class="menu">
        <p>Menu</p>
    </div>
</div>

<div class="bottomNav">
    <a href="index.html">Home</a>&nbsp;|
    <a href="about.php">About</a>&nbsp;|
    <a href="music.html">Music</a>&nbsp;|
    <a href="fitness.html">Fitness</a>&nbsp;|
    <a href="codes.html">Codes</a>&nbsp;|
    <a href="about.php#contact">Contact</a>&nbsp;|
    <a href="http://ivyswan.wordpress.com/">Blog</a>
    <span class="footer"><p>IVY SWAN 2013</p></span>
</div>
<script type="text/javascript">
var sprytooltip1 = new Spry.Widget.Tooltip("sprytooltip1", "#sprytrigger1");
var sprytooltip2 = new Spry.Widget.Tooltip("sprytooltip2", "#sprytrigger2");
var sprytooltip3 = new Spry.Widget.Tooltip("sprytooltip3", "#sprytrigger3");
var sprytooltip4 = new Spry.Widget.Tooltip("sprytooltip4", "#sprytrigger4");
</script>
</body>
</html>
