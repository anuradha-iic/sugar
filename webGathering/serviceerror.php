<?php ob_start(); require_once 'config.php'; require_once 'CallWebServiceSugarSoap.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:addthis="http://www.addthis.com/help/api-spec" lang="en-US">
<head profile="http://gmpg.org/xfn/11"><link media="all" href="includes/widget082.css" type="text/css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>Thanks for updating Contacts and Locations | NextLevel Internet</title>  
    
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
</style>
		<link rel="icon" href="<?php echo $siteURL; ?>/images/favicon.ico" type="image/x-icon">
		<!--[if lte IE 8]>
      <style type="text/css" media="screen">
      	#footer, div.sidebar-wrap, .block-button, .featured_slider, #slider_root, #comments li.bypostauthor, #nav li ul, .pie{behavior: url(<?php echo $siteURL; ?>);}
        .featured_slider{margin-top:0 !important;}
      </style>
    <![endif]-->
    <style type="text/css">
body.custom-background { background-color: #949692; }
</style>   
    </head>
    
<body class="home page page-id-2270 page-template page-template-template-onecolumn-php custom-background one-column">
     <p>
         There is an error related to the Service Address you entered. It may be that you entered invalid wrong address or that address out of USA country. 
         <br>
         Please click on the below URL to go back and fill out the correct one.
         <br>
     </p>
       <?php $URL = $siteURL."/index.php?record=".$_REQUEST['record'];  ?>
    <a href="<?php echo $URL; ?>">
        Go back to Home Page
    </a>
</body>
    
</html>