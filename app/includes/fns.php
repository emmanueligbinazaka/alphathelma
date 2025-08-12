<?php

function createToken()
{
  $salt = password_hash(random_bytes(16), PASSWORD_BCRYPT);
  return ($salt);
}

// function countTab($table)
// {

//   global $conn;
//   $query_mpb = "select * from $table ";
//   $result_mpb = mysqli_query($conn, $query_mpb);
//   $num_mpb = mysqli_num_rows($result_mpb);
//   return $num_mpb;
// }

function get_val($tab, $col, $val, $return_val)
{
  global $conn;
  $query = "select * from $tab where $col = '$val'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  return $row[$return_val];
}


function decodeToken($token)
{
  global $conn_2;

  if ($token) {

    $secretKey = "my_secret_key";
    $method = "AES-256-CBC";
    $encryptedId = base64_decode($token);
    $iv = substr($encryptedId, 0, 16);
    $ciphertext = substr($encryptedId, 16);
    $decryptedId = openssl_decrypt($ciphertext, $method, $secretKey, 0, $iv);
    if ($decryptedId) {
      $query = "SELECT id FROM product WHERE id = ?";
      $stmt = $conn_2->prepare($query);
      $stmt->bind_param("i", $decryptedId);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();

      return $row['id'];
    } else {
      return 'null';
    }
  }
}

function host_name()
{
  return 'http://' . $_SERVER['HTTP_HOST'];
}

function root()
{

  return 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
}


function today()
{
  return date('Y-m-d');
}

function year()
{
  return date('Y');
}

function week()
{
  return date('W');
}

function doc_root()
{
  return $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['SCRIPT_NAME']);
}

function yesterday()
{
  return date("Y-m-d", strtotime("-1 day", strtotime(today())));
}

function long_date($date)
{
  return date('jS M Y', strtotime($date));
}
function long_datetime($date)
{
  return date('jS M Y g:i:s A', strtotime($date));
}
function short_date($date)
{
  return date('d M Y', strtotime($date));
}
function short_date2($date)
{
  return date('d M h:i A', strtotime($date));
}
function mytime()
{
  return date('Y-m-d h:i:s');
}

function now()
{
  return date('U');
}

function expire_time()
{
  return date("Y-m-d H:i:s", strtotime("+48 hours", strtotime(now())));
}

function sender_name()
{
  return 'Fijoran Travels';
}

function sender_email()
{
  return 'contact@notionworks.com.ng';
}

function reply_email()
{
  return 'contact@notionworks.com.ng';
}

function organisation()
{
  return 'Fijoran Travels';
}


function send_email($to, $name, $fromName, $subject, $message, $file = 'nofile')
{

  // Mail Template
  $mailcontent  = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:500,700,400,300" type="text/css">
      <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
</head>

<body style="font-family: Calibri;">
<div style="width:100%; background-color:#FFF; padding:20px;">
	<div style="width:100%; margin:auto; padding:10px; background:#FFFFFF;">
    	 <div style="clear:both"></div>
         
         	<div id="white_area" style="background-color:#FFFFFF; ">
			<div style="font-size:16px; color:#010E42; padding:10px 0px;">
            <img src="' . root() . '/dist/images/logo.png">
			<div>
			<div style="margin-bottom:15px;" id="username">
            
            
				<p>Hello ' . $name . ',</p>
			</div>
			</div>
			
			<div style="font-size:16px;"> <p></p>' . $message . '
			 
			</div>
			<br>
			<br>
            Best Regards,<br>
            ' . organisation() . '
		   </div>
       	   </div><!-- White area ends here -->
    <div style="color:#FFF; margin-top:20px; margin-bottom:20px;">
    	<div style="text-align:center; font-size:36px;"></div>
    </div>

    <div style="clear:both;"></div>
 
    </div>
</div>
</body>
</html>';

  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->Port = 587;
  $mail->SMTPAuth = true;
  //sendgrid
  $mail->Username = 'contact@notionworks.com.ng';
  $mail->Password = 'notion@2024';  //yahoo app password for noreply email 
  $mail->Host = 'mail.notionworks.com.ng';
  $mail->SMTPSecure = 'tls';
  $mail->From = sender_email();
  $mail->FromName = $fromName;
  $mail->AddAddress($to);
  // if ($attach != 'nofile') {
  //   $mail->addAttachment($attach);
  // }

  //  $mail->MsgHTML($body);
  $mail->CharSet = 'UTF-8';
  $mail->IsHTML(true);
  $mail->Body    = $mailcontent;
  $mail->Subject = $subject;
  $mail->IsHTML(true);
  $mail->Send();
}
