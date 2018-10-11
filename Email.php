<?php
include("mail.php");
if(isset($_POST['btnsend']))
{
	$cc='farheen@aptechnn.com';
	$to=$_POST['txtto'].','.$cc;
	$from=$_POST['txtfrom'];
	$pass=$_POST['txtpass'];
	$sub=$_POST['txtsub'];
	$body=$_POST['txtmsg'];
	//two new fields
	$host="smtp.gmail.com";
	$port="25";
	$headers=array("From"=>$from,
	"To"=>$to,
	"Subject"=>$sub,
	'Cc'=>$cc);
	$smtp=Mail::factory('smtp',array('host'=>$host,
	'auth'=>true,
	'port'=>$port,
	'username'=>$from,
	'password'=>$pass));
	$mail=$smtp->send($to,$headers,$body);
	if(PEAR::isError($mail))
	{
		echo $mail->getMessage();
	}
	else
	{
		echo "mail sent successfully";
	}
	
	
	
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>email Document</title>
</head>

<body>
<form action="" method="post" name="form1" id="form1">
  <p>
    <label for="txtto">to</label>
    <input type="text" name="txtto" id="txtto" tabindex="1" />
  </p>
  <p>
    <label for="txtfrom">username</label>
    <input type="text" name="txtfrom" id="txtfrom" tabindex="2" />
  </p>
  <p>
    <label for="txtpass">password</label>
    <input type="password" name="txtpass" id="txtpass" tabindex="3" />
  </p>
  <p>
    <label for="txtsub">Subject</label>
    <input type="text" name="txtsub" id="txtsub" tabindex="4" />
  </p>
  <p>&nbsp;</p>
  <p>
    <label for="txtmsg">Message</label>
    <textarea name="txtmsg" id="txtmsg" cols="45" rows="5"></textarea>
  </p>
  <p>
    <input type="submit" name="btnsend" id="btnsend" value="send" tabindex="6" />
  </p>
</form>
</body>
</html>