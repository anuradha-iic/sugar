<?php

function sendEmail($first_name, $last_name, $recordID, $comma_separated_emails)
{
      $mail             = new PHPMailer(); 
      $bodypart = "$first_name $last_name with Record ID ".$recordID." has updated their contact details. <br> Please check the updated details.";
      $EmailTemplate = '<html>   
    <head>
 <style type="text/css">
#content, .menu-bottom-shadow{background-color:#fff;}.sidebar h3{
				background: #0F2D4D;
				background: -moz-linear-gradient( #0F2D4D, #OF2D4D );
				background: -webkit-linear-gradient(top, #0F2D4D, #OF2D4D );
				background: linear-gradient( #0F2D4D, #OF2D4D );
		}.block-button, .block-button:visited, .Button {
							background: #9595a7;
							background: -moz-linear-gradient( #9595a7, #7B7B8D );
							background: -webkit-linear-gradient(top, #9595a7, #7B7B8D );
							background: linear-gradient( #9595a7, #7B7B8D );
							border-color: #7B7B8D;
							text-shadow: 0 -1px 1px #444;
							color: #fff;
						}.block-button:hover {
							background: #9595a7;
							background: -moz-linear-gradient( #9595a7, #616173 );
							background: -webkit-linear-gradient(top, #9595a7, #616173 );
							background: linear-gradient( #9595a7, #616173 );
							color: #fff;
						}.page-title {
				-pie-background: linear-gradient(left top, #0F2D4D, #5b718f );
				background: #0F2D4D;
				background: -moz-linear-gradient(left top, #0F2D4D, #5b718f );
				background: -webkit-linear-gradient(left top, #0F2D4D, #5b718f );
				background: linear-gradient(left top, #0F2D4D, #5b718f );
		}.page-title span{color:#fff;}body{background-image:none;}.entry-content, .sidebar, .comment-entry { font-family:calibri;font-size:12pt;color:0000; }.featured_slider #slider_root{height:350px;}#header_img_link{width:960px; height:198px;}a{color:#0000ff;}a:visited{color:#0000ff;}#developer {
   display: none;
}
.entry-content img{
 border:0px
 }

.breadcrumb {
   display: none;
}

#footer {
background: #8c929b;
}

#footer {
background: /images/sprite_h_light.png;
}
#copyright {
	font: normal 14px arial;
	color: #fff;
}
h1,
h2,
h3,
h4,
h5,
h6 {
	color: #6b7f9a;
	margin: 0 0 20px 0;
	line-height: 1.5em;
	font-weight: normal;
}
body.custom-background { background-color: #949692; }
</style> 
    </head> 
<body class="home page page-id-2270 page-template page-template-template-onecolumn-php custom-background one-column"> 
    <div style="box-shadow: 0 0 10px #000000; margin: 0 auto; width: 960px;"> 
        <p style="font-size:38px; color:#355f5f; margin:0; padding:0 0 0 15px;"><em>'."Existed Contact $first_name $last_name has updated their record".'</em></p>
         <br>
        <p style="font-family:Georgia, \'Times New Roman\', Times, serif; font-size:14px; line-height:21px; color:#524e48;">'.$bodypart.'</p> 
    </div> 
</body> 
</html>';
      $body             = $EmailTemplate;
      //$body             = $bodypart;
     // $body             = eregi_replace("[\]",'',$body); 
      $mail->IsSMTP();  // telling the class to use SMTP
      $mail->Host       = "impingeonline.com"; // SMTP server
      $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                 // 1 = errors and messages
                                                 // 2 = messages only
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->Host       = "impingeonline.com"; // sets the SMTP server
	  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	  $mail->Username   = "vivek@impingeonline.com"; // SMTP account username
	  $mail->Password   = "Impinge250";        // SMTP account password 
	  $mail->SetFrom('administrator@impingeonline.com', 'Next Level Internet'); 
	  $mail->AddReplyTo("administrator@impingeonline.com","Next Level Internet"); 
	  $mail->Subject    = "Existed Contact $first_name $last_name has updated their record"; 
	  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test 
	  $mail->MsgHTML($body); 
	  $address = base64_decode($comma_separated_emails);
	  
	  $addressArray = explode(",",$address);
	  $totaladdresses = count($addressArray);
	   for($i=0; $i<$totaladdresses; $i++)
	   {
	        if($addressArray[$i] != '')
	           $mail->AddAddress($addressArray[$i], "$first_name, $last_name");  
	   } 
	  if(!$mail->Send()) {
	    //echo "Mailer Error: " . $mail->ErrorInfo;
		return "error";
	  } else {
	    //echo "Message sent!";
		return "success";
	  }
}

function sendEmail4ServiceAddress($first_name, $last_name, $recordID, $comma_separated_emails)
{
      $mail             = new PHPMailer(); 
      $bodypart = "$first_name $last_name with Record ID ".$recordID." has added/updated their service address details. <br> Please check the updated details.";
      $EmailTemplate = '<html>   
    <head>
 <style type="text/css">
#content, .menu-bottom-shadow{background-color:#fff;}.sidebar h3{
				background: #0F2D4D;
				background: -moz-linear-gradient( #0F2D4D, #OF2D4D );
				background: -webkit-linear-gradient(top, #0F2D4D, #OF2D4D );
				background: linear-gradient( #0F2D4D, #OF2D4D );
		}.block-button, .block-button:visited, .Button {
							background: #9595a7;
							background: -moz-linear-gradient( #9595a7, #7B7B8D );
							background: -webkit-linear-gradient(top, #9595a7, #7B7B8D );
							background: linear-gradient( #9595a7, #7B7B8D );
							border-color: #7B7B8D;
							text-shadow: 0 -1px 1px #444;
							color: #fff;
						}.block-button:hover {
							background: #9595a7;
							background: -moz-linear-gradient( #9595a7, #616173 );
							background: -webkit-linear-gradient(top, #9595a7, #616173 );
							background: linear-gradient( #9595a7, #616173 );
							color: #fff;
						}.page-title {
				-pie-background: linear-gradient(left top, #0F2D4D, #5b718f );
				background: #0F2D4D;
				background: -moz-linear-gradient(left top, #0F2D4D, #5b718f );
				background: -webkit-linear-gradient(left top, #0F2D4D, #5b718f );
				background: linear-gradient(left top, #0F2D4D, #5b718f );
		}.page-title span{color:#fff;}body{background-image:none;}.entry-content, .sidebar, .comment-entry { font-family:calibri;font-size:12pt;color:0000; }.featured_slider #slider_root{height:350px;}#header_img_link{width:960px; height:198px;}a{color:#0000ff;}a:visited{color:#0000ff;}#developer {
   display: none;
}
.entry-content img{
 border:0px
 }

.breadcrumb {
   display: none;
}

#footer {
background: #8c929b;
}

#footer {
background: /images/sprite_h_light.png;
}
#copyright {
	font: normal 14px arial;
	color: #fff;
}
h1,
h2,
h3,
h4,
h5,
h6 {
	color: #6b7f9a;
	margin: 0 0 20px 0;
	line-height: 1.5em;
	font-weight: normal;
}
body.custom-background { background-color: #949692; }
</style> 
    </head> 
<body class="home page page-id-2270 page-template page-template-template-onecolumn-php custom-background one-column"> 
    <div style="box-shadow: 0 0 10px #000000; margin: 0 auto; width: 960px;"> 
        <p style="font-family:Georgia, \'Times New Roman\', Times, serif; font-size:38px; color:#355f5f; margin:0; padding:0 0 0 15px;"><em>'."Existed Contact $first_name $last_name has updated their record".'</em></p>
<br>
<p style="font-family:Georgia, \'Times New Roman\', Times, serif; font-size:14px; line-height:21px; color:#524e48;">'.$bodypart.'</p> 
    </div> 
</body> 
</html>';
      $body             = $EmailTemplate;
      //$body             = $bodypart;
     // $body             = eregi_replace("[\]",'',$body); 
      $mail->IsSMTP();  // telling the class to use SMTP
      $mail->Host       = "impingeonline.com"; // SMTP server
      $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                 // 1 = errors and messages
                                                 // 2 = messages only
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->Host       = "impingeonline.com"; // sets the SMTP server
	  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	  $mail->Username   = "vivek@impingeonline.com"; // SMTP account username
	  $mail->Password   = "Impinge250";        // SMTP account password 
	  $mail->SetFrom('administrator@impingeonline.com', 'Next Level Internet'); 
	  $mail->AddReplyTo("administrator@impingeonline.com","Next Level Internet"); 
	  $mail->Subject    = "Existed Contact $first_name $last_name has updated their service locations record"; 
	  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test 
	  $mail->MsgHTML($body); 
	  $address = base64_decode($comma_separated_emails);
	  
	  $addressArray = explode(",",$address);
	  $totaladdresses = count($addressArray);
	   for($i=0; $i<$totaladdresses; $i++)
	   {
	        if($addressArray[$i] != '')
	           $mail->AddAddress($addressArray[$i], "$first_name, $last_name");  
	   } 
	  if(!$mail->Send()) {
	    //echo "Mailer Error: " . $mail->ErrorInfo;
		return "error";
	  } else {
	    //echo "Message sent!";
		return "success";
	  }
}

function sendEmail4BillingTechnicalContacts($Subject, $message, $comma_separated_emails, $emailStatus)
{
      $mail             = new PHPMailer(); 
	  $EmailTemplate = '<html>   
    <head>
 <style type="text/css">
#content, .menu-bottom-shadow{background-color:#fff;}.sidebar h3{
				background: #0F2D4D;
				background: -moz-linear-gradient( #0F2D4D, #OF2D4D );
				background: -webkit-linear-gradient(top, #0F2D4D, #OF2D4D );
				background: linear-gradient( #0F2D4D, #OF2D4D );
		}.block-button, .block-button:visited, .Button {
							background: #9595a7;
							background: -moz-linear-gradient( #9595a7, #7B7B8D );
							background: -webkit-linear-gradient(top, #9595a7, #7B7B8D );
							background: linear-gradient( #9595a7, #7B7B8D );
							border-color: #7B7B8D;
							text-shadow: 0 -1px 1px #444;
							color: #fff;
						}.block-button:hover {
							background: #9595a7;
							background: -moz-linear-gradient( #9595a7, #616173 );
							background: -webkit-linear-gradient(top, #9595a7, #616173 );
							background: linear-gradient( #9595a7, #616173 );
							color: #fff;
						}.page-title {
				-pie-background: linear-gradient(left top, #0F2D4D, #5b718f );
				background: #0F2D4D;
				background: -moz-linear-gradient(left top, #0F2D4D, #5b718f );
				background: -webkit-linear-gradient(left top, #0F2D4D, #5b718f );
				background: linear-gradient(left top, #0F2D4D, #5b718f );
		}.page-title span{color:#fff;}body{background-image:none;}.entry-content, .sidebar, .comment-entry { font-family:calibri;font-size:12pt;color:0000; }.featured_slider #slider_root{height:350px;}#header_img_link{width:960px; height:198px;}a{color:#0000ff;}a:visited{color:#0000ff;}#developer {
   display: none;
}
.entry-content img{
 border:0px
 }

.breadcrumb {
   display: none;
}

#footer {
background: #8c929b;
}

#footer {
background: /images/sprite_h_light.png;
}
#copyright {
	font: normal 14px arial;
	color: #fff;
}
h1,
h2,
h3,
h4,
h5,
h6 {
	color: #6b7f9a;
	margin: 0 0 20px 0;
	line-height: 1.5em;
	font-weight: normal;
}
body.custom-background { background-color: #949692; }
</style> 
    </head> 
<body class="home page page-id-2270 page-template page-template-template-onecolumn-php custom-background one-column"> 
    <div style="box-shadow: 0 0 10px #000000; margin: 0 auto; width: 960px;"> 
        <p style="font-family:Georgia, \'Times New Roman\', Times, serif; font-size:38px; color:#355f5f; margin:0; padding:0 0 0 15px;"><em>'.$Subject.'</em></p>
 <br>
 <p style="font-family:Georgia, \'Times New Roman\', Times, serif; font-size:14px; line-height:21px; color:#524e48;">'.$message.'</p>
    </div> 
</body> 
</html>';
      $body             = $EmailTemplate;
      //$body             = $message;
      //$body             = eregi_replace("[\]",'',$body); 
      $mail->IsSMTP();  // telling the class to use SMTP
      $mail->Host       = "impingeonline.com"; // SMTP server
      $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                 // 1 = errors and messages
                                                 // 2 = messages only
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->Host       = "impingeonline.com"; // sets the SMTP server
	  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	  $mail->Username   = "vivek@impingeonline.com"; // SMTP account username
	  $mail->Password   = "Impinge250";        // SMTP account password 
	  $mail->SetFrom('administrator@impingeonline.com', 'Next Level Internet'); 
	  $mail->AddReplyTo("administrator@impingeonline.com","Next Level Internet"); 
	  $mail->Subject    = $Subject; 
	  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test 
	  $mail->MsgHTML($body); 
	  $address = base64_decode($comma_separated_emails);
	  
	  $addressArray = explode(",",$address);
	  $totaladdresses = count($addressArray);
	   for($i=0; $i<$totaladdresses; $i++)
	   {
	        if($addressArray[$i] != '')
	           $mail->AddAddress($addressArray[$i], "New ".$emailStatus." Contacts are added");  
	   }
	    
	  if(!$mail->Send()) {
	    //echo "Mailer Error: " . $mail->ErrorInfo;
		return "error";
	  } else {
	    //echo "Message sent!";
		return "success";
	  }
}


?>