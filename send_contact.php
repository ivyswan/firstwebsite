<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php

$header ="from: $name<$mail_from>";
$mail_from="$email";
$telephone = "$phone";
$post="$message";

// my email address
$to ='ivy_swan@hotmail.com';

$contact=mail($to,$header,$telephone,$post);

if($contact){
echo "I have received your contact information";
} else {
echo "ERROR";
}
?>
</body>
</html>