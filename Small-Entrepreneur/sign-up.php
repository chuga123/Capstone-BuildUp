<?php
session_start();
error_reporting(E_ALL);
date_default_timezone_set('Asia/Manila'); 
include('../Process/server.php');

require_once '../PHPMailer/PHPMailer.php';
require_once '../PHPMailer/SMTP.php';
require_once '../PHPMailer/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Sign up validation and insert to database Small Entrepreneur

if(isset($_POST['sign-up'])){

    $f_name=$_REQUEST['firstname'];
    if(empty($f_name)){
        $_SESSION['error1'] = "Firstname cannot be empty";
    } else if(!filter_var($f_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $_SESSION['error1'] = "Not a valid firstname";
    } else if(ctype_digit($f_name)){
        $_SESSION['error1'] = "Number is not valid";
    } else if(ctype_space($f_name)){
        $_SESSION['error1'] = "Firstname cannot be empty";
    } else {
        $firstname=$f_name;
    }
    
    
    $l_name=$_REQUEST['lastname'];
    if(empty($l_name)){
        $_SESSION['error2'] = "Last name cannot be empty";
    } else if(!filter_var($l_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $_SESSION['error2'] = "Not a valid lastname";
    } else if(ctype_digit($l_name)){
        $_SESSION['error2'] = "Number is not valid";
    } else if(ctype_space($l_name)){
        $_SESSION['error2'] = "Lastname cannot be empty";
    } else {
        $lastname=$l_name;
    }
    
    $c_ontact=trim($_REQUEST['contact']);
    if(empty($c_ontact)){
        $_SESSION['error3'] = "Mobile number cannot be empty";
    } else if(!ctype_digit($c_ontact)){
        $_SESSION['error3'] = "Not a valid mobile number";
    } else {
        $contact = $c_ontact;
    }
    
    $e_mail=trim($_REQUEST['email']);
    function email_validation($e_mail) { 
         return (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $e_mail)) 
            ? FALSE : TRUE; 
        }
    $query = "SELECT * FROM entrep WHERE email='$e_mail'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error4'] = "Email has already been taken";
    }elseif(empty($e_mail)){
        $_SESSION['error4'] = "Email cannot be empty";
    } else if(!email_validation($e_mail)){
        $_SESSION['error4'] = "Not a valid email";
    } else {
        $email=$e_mail;
    }
    
    $pass=$_REQUEST['password'];
    if(empty($pass)){
        $_SESSION['error5'] = "Password cannot be empty";
    } else if(strlen($pass) < 8){
        $_SESSION['error5'] = "Must be at least 8 characters";
    }else {
        $password=$pass;
    }
    
        if($firstname==""  ||$lastname=="" || $contact=="" || $email=="" || $password==""){
        }else{
            $current_time = time();  
            $date = date("d-m-Y h:i:sa");
            $unique = uniqid('', true);
            $key = substr($unique, strlen($unique) - 8, strlen($unique));
            $finalKey = "BUILD_UP_2022_u".$key;
            $sql = "INSERT INTO entrep SET firstname='$firstname', lastname='$lastname', contact='$contact', email='$email', password='$password', code='0', plan='regular', month='0',status='not veriffied', date='$date', is_verified='false', uid='$finalKey'";
            $query_insert = $conn->prepare( $sql );
		    $query_insert->execute();

                $query = "SELECT * FROM entrep WHERE email='$email'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id= $row["entrep_id"];

                        $filepath = 'Profile Pictures/default-profile.png';
            
                        $sqla = "INSERT INTO `entrep_profile_pic` SET entrep_id='$id', filepath='$filepath', status='0'";
                        if ($conn->query($sqla) === TRUE) {
                            
                             $mail = new PHPMailer();
                                $mail->isSMTP();
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure ='ssl';
                                $mail->Host = 'smtp.hostinger.com';
                                $mail->Port = '465';
                                $mail->isHTML();
                                $mail->Username = 'team@buildupph.com';
                                $mail->Password = 'BuildUpPH2022!';
                                $mail->SetFrom('team@buildupph.com');
                                $mail->FromName = "Build Up Team";
                                $mail->Subject = 'Please confirm your account.';
                                $mail->AddCustomHeader("X-MSMail-Priority: High");
                                $mail->AddCustomHeader("Importance: High");
                                $mail->Body = '
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                     <head>
                                      <meta charset="UTF-8">
                                      <meta content="width=device-width, initial-scale=1" name="viewport">
                                      <meta name="x-apple-disable-message-reformatting">
                                      <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                      <meta content="telephone=no" name="format-detection">
                                      <title>New Template 7</title><!--[if (mso 16)]>
                                        <style type="text/css">
                                        a {text-decoration: none;}
                                        </style>
                                        <![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
                                    <xml>
                                        <o:OfficeDocumentSettings>
                                        <o:AllowPNG></o:AllowPNG>
                                        <o:PixelsPerInch>96</o:PixelsPerInch>
                                        </o:OfficeDocumentSettings>
                                    </xml>
                                    <![endif]--><!--[if !mso]><!-- -->
                                      <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet"><!--<![endif]-->
                                      <style type="text/css">
                                    .rollover:hover .rollover-first {
                                    	max-height:0px!important;
                                    	display:none!important;
                                    }
                                    .rollover:hover .rollover-second {
                                    	max-height:none!important;
                                    	display:block!important;
                                    }
                                    #outlook a {
                                    	padding:0;
                                    }
                                    .es-button {
                                    	mso-style-priority:100!important;
                                    	text-decoration:none!important;
                                    }
                                    a[x-apple-data-detectors] {
                                    	color:inherit!important;
                                    	text-decoration:none!important;
                                    	font-size:inherit!important;
                                    	font-family:inherit!important;
                                    	font-weight:inherit!important;
                                    	line-height:inherit!important;
                                    }
                                    .es-desk-hidden {
                                    	display:none;
                                    	float:left;
                                    	overflow:hidden;
                                    	width:0;
                                    	max-height:0;
                                    	line-height:0;
                                    	mso-hide:all;
                                    }
                                    .es-button-border:hover {
                                    	border-style:solid solid solid solid!important;
                                    	background:#0b317e!important;
                                    	border-color:#42d159 #42d159 #42d159 #42d159!important;
                                    }
                                    .es-button-border:hover a.es-button,
                                    .es-button-border:hover button.es-button {
                                    	background:#0b317e!important;
                                    	border-color:#0b317e!important;
                                    }
                                    [data-ogsb] .es-button {
                                    	border-width:0!important;
                                    	padding:10px 20px 10px 20px!important;
                                    }
                                    [data-ogsb] .es-button.es-button-1 {
                                    	padding:10px 20px!important;
                                    }
                                    @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:30px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .st-br { padding-left:10px!important; padding-right:10px!important } h1 a { text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } h2 a { text-align:center } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } h3 a { text-align:center } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:16px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }
                                    </style>
                                     </head>
                                     <body data-new-gr-c-s-check-loaded="14.1021.0" data-gr-ext-installed style="width:100%;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
                                      <div class="es-wrapper-color" style="background-color:#F8F9FD"><!--[if gte mso 9]>
                                    			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                                    				<v:fill type="tile" color="#f8f9fd"></v:fill>
                                    			</v:background>
                                    		<![endif]-->
                                       <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#F8F9FD">
                                         <tr>
                                          <td valign="top" style="padding:0;Margin:0">
                                           <table cellpadding="0" cellspacing="0" class="es-header" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                             <tr>
                                              <td align="center" style="padding:0;Margin:0">
                                               <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                                 <tr>
                                                  <td align="left" style="Margin:0;padding-top:10px;padding-bottom:15px;padding-left:30px;padding-right:30px">
                                                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                     <tr>
                                                      <td align="center" valign="top" style="padding:0;Margin:0;width:540px">
                                                       <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                         <tr>
                                                          <td align="center" style="padding:0;Margin:0;display:none"></td>
                                                         </tr>
                                                       </table></td>
                                                     </tr>
                                                   </table></td>
                                                 </tr>
                                               </table></td>
                                             </tr>
                                           </table>
                                           <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                             <tr>
                                              <td align="center" bgcolor="#f8f9fd" style="padding:0;Margin:0;background-color:#f8f9fd">
                                               <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                                 <tr>
                                                  <td align="left" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                     <tr>
                                                      <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                                       <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                         <tr>
                                                          <td align="center" style="padding:0;Margin:0;padding-bottom:10px">
                                                           <gdiv class="ginger-module-highlighter ginger-module-highlighter-float" style="background:none 0% 0% / auto repeat scroll padding-box border-box #FFFFFF;position:absolute;height:36px;width:560px">
                                                            <gdiv class="ginger-module-highlighter-float-content" style="height:72px">
                                                             <gwmw class="ginger-module-highlighter-mistake-type-1 gwmw-16705941681828697882803 gwmwi-0 ginger-module-highlighter-mistake-anim" style="position:absolute;top:0px;width:105.333px;height:36px;left:305.333px"></gwmw> 
                                                            </gdiv> 
                                                           </gdiv><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#212121">Welcome to BuildUp!</h1></td>
                                                         </tr>
                                                         <tr>
                                                          <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
                                                           <gdiv class="ginger-module-highlighter ginger-module-highlighter-float" style="background:none 0% 0% / auto repeat scroll padding-box border-box #FFFFFF;position:absolute;height:48px;width:560px">
                                                            <gdiv class="ginger-module-highlighter-float-content" style="height:96px"></gdiv> 
                                                           </gdiv><gdiv class="ginger-module-highlighter ginger-module-highlighter-float" style="background:none 0% 0% / auto repeat scroll padding-box border-box #FFFFFF;position:absolute;height:48px;width:560px">
                                                            <gdiv class="ginger-module-highlighter-float-content" style="height:96px"></gdiv> 
                                                           </gdiv><gdiv class="ginger-module-highlighter ginger-module-highlighter-float" style="background:none 0% 0% / auto repeat scroll padding-box border-box #FFFFFF;position:absolute;height:48px;width:560px">
                                                            <gdiv class="ginger-module-highlighter-float-content" style="height:96px"></gdiv> 
                                                           </gdiv><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px">Thanks for choosing us for your reselling needs. To continue your sign in please confirm your account by following the link below. Happy browsing!</p></td>
                                                         </tr>
                                                         <tr>
                                                          <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
                                                           <gdiv class="ginger-module-highlighter ginger-module-highlighter-float" style="background:none 0% 0% / auto repeat scroll padding-box border-box #FFFFFF;position:absolute;height:19.3333px;width:560px">
                                                            <gdiv class="ginger-module-highlighter-float-content" style="height:67.3333px"></gdiv> 
                                                           </gdiv><gdiv class="ginger-module-highlighter ginger-module-highlighter-float" style="background:none 0% 0% / auto repeat scroll padding-box border-box #FFFFFF;position:absolute;height:48px;width:560px">
                                                            <gdiv class="ginger-module-highlighter-float-content" style="height:96px">
                                                             <strong><a target="_blank" href="https://buildupph.com/confirm/entrep/?uid='.$finalKey.'" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px;height:96px">https://buildupph.com/confirm/entrep/?uid='.$finalKey.'</a></strong> 
                                                            </gdiv> 
                                                           </gdiv></td>
                                                         </tr>
                                                       </table></td>
                                                     </tr>
                                                   </table></td>
                                                 </tr>
                                                 <tr>
                                                  <td class="es-m-p15t es-m-p0b es-m-p0r es-m-p0l" align="left" style="padding:0;Margin:0;padding-top:15px">
                                                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                     <tr>
                                                      <td align="center" valign="top" style="padding:0;Margin:0;width:600px">
                                                       <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                         <tr>
                                                          <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img" src="https://uifjnj.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/3991592481152831.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="600"></td>
                                                         </tr>
                                                       </table></td>
                                                     </tr>
                                                   </table></td>
                                                 </tr>
                                               </table></td>
                                             </tr>
                                           </table>
                                           <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                                             <tr>
                                              <td align="center" bgcolor="#071f4f" style="padding:0;Margin:0;background-color:#071f4f;background-image:url(https://uifjnj.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png);background-repeat:no-repeat;background-position:center top" background="https://uifjnj.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png">
                                               <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                                 <tr>
                                                  <td align="left" style="Margin:0;padding-left:30px;padding-right:30px;padding-top:40px;padding-bottom:40px">
                                                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                    
                                                         
                                                         
                                                       </table></td>
                                                     </tr>
                                                   </table></td>
                                                 </tr>
                                               </table></td>
                                             </tr>
                                           </table>
                                           <table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#0A2B6E;background-image:url(https://uifjnj.stripocdn.email/content/guids/CABINET_9bfedeeeb9eeabe76f8ff794c5e228f9/images/2191625641866113.png);background-repeat:repeat;background-position:center center" background="https://uifjnj.stripocdn.email/content/guids/CABINET_9bfedeeeb9eeabe76f8ff794c5e228f9/images/2191625641866113.png">
                                             <tr>
                                              <td align="center" style="padding:0;Margin:0">
                                               <table bgcolor="#FFFFFF" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                                 <tr>
                                                  <td class="es-m-p40t es-m-p40b es-m-p20r es-m-p20l" align="left" style="padding:0;Margin:0;padding-top:40px;padding-bottom:40px">
                                                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                     <tr>
                                                      <td align="center" valign="top" style="padding:0;Margin:0;width:600px">
                                                       <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#f0f3fe" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#f0f3fe;border-radius:20px" role="presentation">
                                                         <tr>
                                                          <td align="left" style="Margin:0;padding-bottom:10px;padding-left:20px;padding-right:20px;padding-top:25px">
                                                           <gdiv class="ginger-module-highlighter ginger-module-highlighter-float" style="background:none 0% 0% / auto repeat scroll padding-box border-box #FFFFFF;position:absolute;height:45px;width:560px">
                                                            <gdiv class="ginger-module-highlighter-float-content" style="height:90px"></gdiv> 
                                                           </gdiv><h1 style="Margin:0;line-height:45px;mso-line-height-rule:exactly;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#212121;text-align:center">Start reselling with us!</h1></td>
                                                         </tr>
                                                         <tr>
                                                          <td align="center" class="es-m-p15t es-m-p20b es-m-p20r es-m-p20l" style="Margin:0;padding-top:10px;padding-left:20px;padding-right:20px;padding-bottom:25px"><!--[if mso]><a href="https://my.stripo.email/cabinet/" target="_blank" hidden>
                                    	<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" esdevVmlButton href="www.buildupph.com" 
                                                    style="height:39px; v-text-anchor:middle; width:134px" arcsize="13%" stroke="f"  fillcolor="#071f4f">
                                    		<w:anchorlock></w:anchorlock>
                                    		<center style="color:#ffffff; font-family:roboto, "helvetica neue", helvetica, arial, sans-serif; font-size:14px; font-weight:400; line-height:14px;  mso-text-raise:1px">www.buildupph.com</center>
                                    	</v:roundrect></a>
                                    <![endif]--><!--[if !mso]><!-- --><span class="es-button-border msohide" style="border-style:solid;border-color:#2CB543;background:#071F4F;border-width:0px;display:inline-block;border-radius:5px;width:auto;mso-hide:all"><a href="www.buildupph.com" class="es-button es-button-1625643206454" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:16px;border-style:solid;border-color:#071F4F;border-width:10px 20px;display:inline-block;background:#071F4F;border-radius:5px;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center">www.buildupph.com<img src="https://uifjnj.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/32371592816290258.png" alt="icon" width="16" align="absmiddle" style="display:inline-block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;vertical-align:middle;margin-left:10px"></a></span><!--<![endif]--></td>
                                                         </tr>
                                                       </table></td>
                                                     </tr>
                                                   </table></td>
                                                 </tr>
                                               </table></td>
                                             </tr>
                                           </table></td>
                                         </tr>
                                       </table>
                                      </div>
                                     </body>
                                    </html>
                                
                                ';
                                
                                $mail->addAddress($email);
                                $mail->Send(); 
                            
                            
                            
                            header("Location: sign-up.php?success=true");
                        }else{
                            echo "Error: .$sqla." ; 
                        }
                    }
                
                }else{
                    echo "Error: .$sql." ; 
                }
            }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e0ee1df878.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/index.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../Images/buildup.png">
    <title>BuildUp - Sign in or Sign up</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
    <!--SIGN-IN&UP-SMALL ENTREPRENEUR-->
<body class="bg-sign-in">

    <!-- NAVIGATION BAR -->
    <div class="navigation">
        <div class="sticky-signinup">
            <div class="logos">
                <a href="../"><img src="../Images/buildup.png" alt="BuildUp Logo" width="40px" height="40px"><b>&nbspBuildUp</b></a>
            </div>
        </div>
    </div>
    <!--FORM-->
    <div class="signbody">
        <div class="sign-container">
            <div class="signup-right">
                <div class="signup-pad">
                    <form action="sign-up.php" method="post" onkeydown="return event.key != 'Enter';">
                        <h2>Create Account</h2>
                            <div class="signup-input">
                                <input type="text" name="firstname" value="<?php echo $firstname; ?>" id="firstname"required>
                                <label for="firstname">Firstname</label>
                                <div>
                                    <?php
                                        if(isset($_SESSION['error1']))
                                        {
                                            ?>
                                                <div class="failed">
                                                    <b><?php echo $_SESSION['error1']; ?></b>
                                                </div>
                                            <?php
                                        unset($_SESSION['error1']);
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="signup-input">
                                <input type="text" name="lastname" value="<?php echo $lastname; ?>" id="lastname"required>
                                <label for="lastname">Lastname</label>
                                <div>
                                    <?php
                                        if(isset($_SESSION['error2']))
                                        {
                                            ?>
                                                <div class="failed">
                                                    <b><?php echo $_SESSION['error2']; ?></b>
                                                </div>
                                            <?php
                                        unset($_SESSION['error2']);
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="signup-input">
                                <input type="text" name="contact" value="<?php echo $contact; ?>" id="contact"required>
                                <label for="contact">Mobile no.</label>
                                <div>
                                    <?php
                                        if(isset($_SESSION['error3']))
                                        {
                                            ?>
                                                <div class="failed">
                                                    <b><?php echo $_SESSION['error3']; ?></b>
                                                </div>
                                            <?php
                                        unset($_SESSION['error3']);
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="signup-input">
                                <input type="text" name="email" value="<?php echo $email; ?>" id="email"required>
                                <label for="email">Email</label>
                                <div>
                                    <?php
                                        if(isset($_SESSION['error4']))
                                        {
                                            ?>
                                                <div class="failed">
                                                    <b><?php echo $_SESSION['error4']; ?></b>
                                                </div>
                                            <?php
                                        unset($_SESSION['error4']);
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="signup-input">
                                <input type="password" name="password" value="<?php echo $password; ?>" id="Pass"required>
                                <label for="Pass">Password</label>
                                <span>
                                    <i class="fa fa-eye" id="eye" onclick="toggle()"></i>
                                </span>
                                <div>
                                    <?php
                                        if(isset($_SESSION['error5']))
                                        {
                                            ?>
                                                <div class="failed">
                                                    <b><?php echo $_SESSION['error5']; ?></b>
                                                </div>
                                            <?php
                                        unset($_SESSION['error5']);
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LfxDWojAAAAANjl_UPSCxehigqkHZdbQGbOsR3p" id="captcha" style="-webkit-transform:scale(0.80)"></div>
                             <script>
                    
                                 setInterval(function(){ 
                                    var response = grecaptcha.getResponse();
                                     if(response.length == 0){
                                         document.getElementById('captcha_message').style.display = 'block';
                                         return false;
                                     }else{
                                         document.getElementById('captcha_message').style.display = 'none';
                                         document.getElementById('captcha').style.display = 'none';
                                         
                                         document.getElementById('terms').style.display = 'inline';
                                         document.getElementById('signupBtn').style.display = 'inline';
                                     }
                                }, 1000);
                             </script>
                             <p id="captcha_message" style="display:none">Please verify you are not a robot.</p>
                            <p id="terms" style="display:none;overflow-wrap: normal;font-size:7px">By clicking Sign Up, you agree to our <span onclick="myadmin();" class="admin-btn" id="profile-btn" style="overflow-wrap: normal;font-size:7px">Terms and Conditions</span></p>
                            <div id='myadmindiv' class='terms-infos'>
                                <div class="terms-cont">
                                    <h2 style="text-align: center;"><b>TERMS AND CONDITIONS</b></h2>
                                    <p>1. <b>Introduction</b></p>
                                    <p>Welcome to <b>BuildUp</b>!</p>
                                    <p>These Terms of Service govern your use of our website located at <b>www.buildupph.com</b> operated by <b>BuildUp</b>.</p>
                                    <p>Our Privacy Policy also governs your use of our Service and explains how we collect, safeguard and disclose information that results from your use of our web pages.</p>
                                    <p>Your agreement with us includes these Terms and our Privacy Policy Agreements. You acknowledge that you have read and understood Agreements, and agree to be bound of them.</p>
                                    <p>If you do not agree with Agreements, then you may not use the Service, but please let us know by emailing at <b>buildup-support.official@gmail.com</b> so we can try to find a solution. These Terms apply to all visitors, users and others who wish to access or use Service.</p>
                                    <br><p>2. <b>Communications</b></p>
                                    <p>By using our Service, you agree to subscribe to newsletters, marketing or promotional materials and other information we may send. However, you may opt out of receiving any, or all, of these communications from us by following the unsubscribe link or by emailing at buildup-support.official@gmail.com.</p>
                                    <br><p>3. <b>Contests, Sweepstakes and Promotions</b></p>
                                    <p>Any contests, sweepstakes or other promotions made available through Service may be governed by rules that are separate from these Terms of Service. If you participate in any Promotions, please review the applicable rules as well as our Privacy Policy. If the rules for a Promotion conflict with these Terms of Service, Promotion rules will apply.</p>
                                    <br><p>4. <b>Content</b></p><p>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material. You are responsible for Content that you post on or through Service, including its legality, reliability, and appropriateness.</p><p>By posting Content on or through Service, You represent and warrant that: (i) Content is yours (you own it) and/or you have the right to use it and the right to grant us the rights and license as provided in these Terms, and (ii) that the posting of your Content on or through Service does not violate the privacy rights, publicity rights, copyrights, contract rights or any other rights of any person or entity. We reserve the right to terminate the account of anyone found to be infringing on a copyright.</p><p>You retain any and all of your rights to any Content you submit, post or display on or through Service and you are responsible for protecting those rights. We take no responsibility and assume no liability for Content you or any third party posts on or through Service. However, by posting Content using Service you grant us the right and license to use, modify, publicly perform, publicly display, reproduce, and distribute such Content on and through Service. You agree that this license includes the right for us to make your Content available to other users of Service, who may also use your Content subject to these Terms.</p><p>BuildUp has the right but not the obligation to monitor and edit all Content provided by users.</p><p>In addition, Content found on or through this Service are the property of BuildUp or used with permission. You may not distribute, modify, transmit, reuse, download, repost, copy, or use said Content, whether in whole or in part, for commercial purposes or for personal gain, without express advance written permission from us.</p>
                                    <br><p>5. <b>Prohibited Uses</b></p>
                                    <p>You may use Service only for lawful purposes and in accordance with Terms. You agree not to use Service:</p>
                                    <p>0.1. In any way that violates any applicable national or international law or regulation.</p>
                                    <p>0.2. For the purpose of exploiting, harming, or attempting to exploit or harm minors in any way by exposing them to inappropriate content or otherwise.</p>
                                    <p>0.3. To transmit, or procure the sending of, any advertising or promotional material, including any “junk mail”, “chain letter,” “spam,” or any other similar solicitation.</p>
                                    <p>0.4. To impersonate or attempt to impersonate Company, a Company employee, another user, or any other person or entity.</p>
                                    <p>0.5. In any way that infringes upon the rights of others, or in any way is illegal, threatening, fraudulent, or harmful, or in connection with any unlawful, illegal, fraudulent, or harmful purpose or activity.</p>
                                    <p>0.6. To engage in any other conduct that restricts or inhibits anyone’s use or enjoyment of Service, or which, as determined by us, may harm or offend Company or users of Service or expose them to liability.</p>
                                    <p>Additionally, you agree not to:</p>
                                    <p>0.1. Use Service in any manner that could disable, overburden, damage, or impair Service or interfere with any other party’s use of Service, including their ability to engage in real time activities through Service.</p>
                                    <p>0.2. Use any robot, spider, or other automatic device, process, or means to access Service for any purpose, including monitoring or copying any of the material on Service.</p>
                                    <p>0.3. Use any manual process to monitor or copy any of the material on Service or for any other unauthorized purpose without our prior written consent.</p>
                                    <p>0.4. Use any device, software, or routine that interferes with the proper working of Service.</p>
                                    <p>0.5. Introduce any viruses, trojan horses, worms, logic bombs, or other material which is malicious or technologically harmful.</p>
                                    <p>0.6. Attempt to gain unauthorized access to, interfere with, damage, or disrupt any parts of Service, the server on which Service is stored, or any server, computer, or database connected to Service.</p>
                                    <p>0.7. Attack Service via a denial-of-service attack or a distributed denial-of-service attack.</p>
                                    <p>0.8. Take any action that may damage or falsify Company rating.</p>
                                    <p>0.9. Otherwise attempt to interfere with the proper working of Service.</p>
                                    <br><p>6. <b>Analytics</b></p>
                                    <p>We may use third-party Service Providers to monitor and analyze the use of our Service.</p>
                                    <br><p>7. <b>No Use By Minors</b></p>
                                    <p>Service is intended only for access and use by individuals at least eighteen (18) years old. By accessing or using Service, you warrant and represent that you are at least eighteen (18) years of age and with the full authority, right, and capacity to enter into this agreement and abide by all of the terms and conditions of Terms. If you are not at least eighteen (18) years old, you are prohibited from both the access and usage of Service.</p>
                                    <br><p>8. <b>Accounts</b></p><p>When you create an account with us, you guarantee that you are above the age of 18, and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on Service.</p><p>You are responsible for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. You agree to accept responsibility for any and all activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p><p>You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.</p><p>We reserve the right to refuse service, terminate accounts, remove or edit content, or cancel orders in our sole discretion.</p>
                                    <br><p>9. <b>Intellectual Property</b></p>
                                    <p>Service and its original content, features and functionality are and will remain the exclusive property of BuildUp and its licensors. Service is protected by copyright, trademark, and other laws of  and foreign countries. Our trademarks may not be used in connection with any product or service without the prior written consent of BuildUp.</p>
                                    <br><p>10. <b>Copyright Policy</b></p>
                                    <p>We respect the intellectual property rights of others. It is our policy to respond to any claim that Content posted on Service infringes on the copyright or other intellectual property rights of any person or entity.</p>
                                    <p>If you are a copyright owner, or authorized on behalf of one, and you believe that the copyrighted work has been copied in a way that constitutes copyright infringement, please submit your claim via email to buildup-support.official@gmail.com, with the subject line: “Copyright Infringement” and include in your claim a detailed description of the alleged Infringement as detailed below, under “DMCA Notice and Procedure for Copyright Infringement Claims”</p>
                                    <p>You may be held accountable for damages for misrepresentation or bad-faith claims on the infringement of any Content found on and/or through Service on your copyright.</p>
                                    <br><p>11. <b>DMCA Notice and Procedure for Copyright Infringement Claims</b></p>
                                    <p>You may submit a notification pursuant to the Digital Millennium Copyright Act (DMCA) by providing our Copyright Agent with the following information in writing (see 17 U.S.C 512(c)(3) for further detail):</p>
                                    <p>0.1. an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright’s interest;</p>
                                    <p>0.2. a description of the copyrighted work that you claim has been infringed, including the URL (i.e., web page address) of the location where the copyrighted work exists or a copy of the copyrighted work;</p>
                                    <p>0.3. identification of the URL or other specific location on Service where the material that you claim is infringing is located;</p>
                                    <p>0.4. your address, telephone number, and email address;</p>
                                    <p>0.5. a statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law;</p>
                                    <p>0.6. a statement by you, made under penalty of perjury, that the above information in your notice is accurate and that you are the copyright owner or authorized to act on the copyright owner’s behalf.</p>
                                    <p>You can contact our Copyright Agent via email at buildup-support.official@gmail.com.</p>
                                    <br><p>12. <b>Error Reporting and Feedback</b></p>
                                    <p>You may provide us either directly at buildup-support.official@gmail.com or via third party sites and tools with information and feedback concerning errors, suggestions for improvements, ideas, problems, complaints, and other matters related to our Service. You acknowledge and agree that: (i) you shall not retain, acquire or assert any intellectual property right or other right, title or interest in or to the Feedback; (ii) Company may have development ideas similar to the Feedback; (iii) Feedback does not contain confidential information or proprietary information from you or any third party; and (iv) Company is not under any obligation of confidentiality with respect to the Feedback. In the event the transfer of the ownership to the Feedback is not possible due to applicable mandatory laws, you grant Company and its affiliates an exclusive, transferable, irrevocable, free-of-charge, sub-licensable, unlimited and perpetual right to use Feedback in any manner and for any purpose.</p>
                                    <br><p>13. <b>Links To Other Web Sites</b></p>
                                    <p>Our Service may contain links to third party web sites or services that are not owned or controlled by BuildUp.</p>
                                    <p>BuildUp has no control over, and assumes no responsibility for the content, privacy policies, or practices of any third party web sites or services. We do not warrant the offerings of any of these entities/individuals or their websites.</p>
                                    <p>YOU ACKNOWLEDGE AND AGREE THAT COMPANY SHALL NOT BE RESPONSIBLE OR LIABLE, DIRECTLY OR INDIRECTLY, FOR ANY DAMAGE OR LOSS CAUSED OR ALLEGED TO BE CAUSED BY OR IN CONNECTION WITH USE OF OR RELIANCE ON ANY SUCH CONTENT, GOODS OR SERVICES AVAILABLE ON OR THROUGH ANY SUCH THIRD PARTY WEB SITES OR SERVICES.</p>
                                    <p>WE STRONGLY ADVISE YOU TO READ THE TERMS OF SERVICE AND PRIVACY POLICIES OF ANY THIRD PARTY WEB SITES OR SERVICES THAT YOU VISIT.</p>
                                    <br><p>14. <b>Disclaimer Of Warranty</b></p>
                                    <p>THESE SERVICES ARE PROVIDED BY COMPANY ON AN “AS IS” AND “AS AVAILABLE” BASIS. COMPANY MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, AS TO THE OPERATION OF THEIR SERVICES, OR THE INFORMATION, CONTENT OR MATERIALS INCLUDED THEREIN. YOU EXPRESSLY AGREE THAT YOUR USE OF THESE SERVICES, THEIR CONTENT, AND ANY SERVICES OR ITEMS OBTAINED FROM US IS AT YOUR SOLE RISK.</p>
                                    <p>NEITHER COMPANY NOR ANY PERSON ASSOCIATED WITH COMPANY MAKES ANY WARRANTY OR REPRESENTATION WITH RESPECT TO THE COMPLETENESS, SECURITY, RELIABILITY, QUALITY, ACCURACY, OR AVAILABILITY OF THE SERVICES. WITHOUT LIMITING THE FOREGOING, NEITHER COMPANY NOR ANYONE ASSOCIATED WITH COMPANY REPRESENTS OR WARRANTS THAT THE SERVICES, THEIR CONTENT, OR ANY SERVICES OR ITEMS OBTAINED THROUGH THE SERVICES WILL BE ACCURATE, RELIABLE, ERROR-FREE, OR UNINTERRUPTED, THAT DEFECTS WILL BE CORRECTED, THAT THE SERVICES OR THE SERVER THAT MAKES IT AVAILABLE ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS OR THAT THE SERVICES OR ANY SERVICES OR ITEMS OBTAINED THROUGH THE SERVICES WILL OTHERWISE MEET YOUR NEEDS OR EXPECTATIONS.</p>
                                    <p>COMPANY HEREBY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, STATUTORY, OR OTHERWISE, INCLUDING BUT NOT LIMITED TO ANY WARRANTIES OF MERCHANTABILITY, NON-INFRINGEMENT, AND FITNESS FOR PARTICULAR PURPOSE.</p>
                                    <p>THE FOREGOING DOES NOT AFFECT ANY WARRANTIES WHICH CANNOT BE EXCLUDED OR LIMITED UNDER APPLICABLE LAW.</p>
                                    <br><p>15. <b>Limitation Of Liability</b></p>
                                    <p>EXCEPT AS PROHIBITED BY LAW, YOU WILL HOLD US AND OUR OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS HARMLESS FOR ANY INDIRECT, PUNITIVE, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGE, HOWEVER IT ARISES, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE, OR OTHER TORTIOUS ACTION, OR ARISING OUT OF OR IN CONNECTION WITH THIS AGREEMENT, INCLUDING WITHOUT LIMITATION ANY CLAIM FOR PERSONAL INJURY OR PROPERTY DAMAGE, ARISING FROM THIS AGREEMENT AND ANY VIOLATION BY YOU OF ANY FEDERAL, STATE, OR LOCAL LAWS, STATUTES, RULES, OR REGULATIONS, EVEN IF COMPANY HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. EXCEPT AS PROHIBITED BY LAW, IF THERE IS LIABILITY FOUND ON THE PART OF COMPANY, IT WILL BE LIMITED TO THE AMOUNT PAID FOR THE PRODUCTS AND/OR SERVICES, AND UNDER NO CIRCUMSTANCES WILL THERE BE CONSEQUENTIAL OR PUNITIVE DAMAGES. SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF PUNITIVE, INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THE PRIOR LIMITATION OR EXCLUSION MAY NOT APPLY TO YOU.</p>
                                    <br><p>16. <b>Termination</b></p>
                                    <p>We may terminate or suspend your account and bar access to Service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of Terms.</p>
                                    <p>If you wish to terminate your account, you may simply discontinue using Service.</p>
                                    <p>All provisions of Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
                                    <br><p>17. <b>Governing Law</b></p>
                                    <p>These Terms shall be governed and construed in accordance with the laws of Philippines, which governing law applies to agreement without regard to its conflict of law provisions.</p>
                                    <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service and supersede and replace any prior agreements we might have had between us regarding Service.</p>
                                    <br><p>18. <b>Changes To Service</b></p>
                                    <p>We reserve the right to withdraw or amend our Service, and any service or material we provide via Service, in our sole discretion without notice. We will not be liable if for any reason all or any part of Service is unavailable at any time or for any period. From time to time, we may restrict access to some parts of Service, or the entire Service, to users, including registered users.</p>
                                    <br><p>19. <b>Amendments To Terms</b></p>
                                    <p>We may amend Terms at any time by posting the amended terms on this site. It is your responsibility to review these Terms periodically.</p>
                                    <p>Your continued use of the Platform following the posting of revised Terms means that you accept and agree to the changes. You are expected to check this page frequently so you are aware of any changes, as they are binding on you.</p>
                                    <p>By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use Service.</p>
                                    <br><p>20. <b>Waiver And Severability</b></p>
                                    <p>No waiver by Company of any term or condition set forth in Terms shall be deemed a further or continuing waiver of such term or condition or a waiver of any other term or condition, and any failure of Company to assert a right or provision under Terms shall not constitute a waiver of such right or provision.</p>
                                    <p>If any provision of Terms is held by a court or other tribunal of competent jurisdiction to be invalid, illegal or unenforceable for any reason, such provision shall be eliminated or limited to the minimum extent such that the remaining provisions of Terms will continue in full force and effect.</p>
                                    <br><p>21. <b>Acknowledgement</b></p>
                                    <p>BY USING SERVICE OR OTHER SERVICES PROVIDED BY US, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF SERVICE AND AGREE TO BE BOUND BY THEM.</p>
                                    <br><p>22. <b>Contact Us</b></p>
                                    <p>Please send your feedback, comments, requests for technical support by email: <b>buildup-support.official@gmail.com</b>.</p>
                                    <br>
                                    <span>Click anywhere to close Terms and Conditions</span>
                                    <br>
                                </div>
                            </div>
                            <button type="submit" name="sign-up" id="signupBtn" style="display:none">Sign Up</button>
                    </form>
                </div>
            </div>
            
            <div class="signup-left">
                <?php
                if(isset($_GET['success'])){
                echo "<br><br>";
                echo "<img src='src/success.gif' width='230px'height='170px' style='position:relative;  display: block;margin: 0 auto;'>";
                echo "<h2 id='signup_header' position>Success!</h2>";
                echo "<p id='signup_message'>Please help us verify your account by confirming your email.</p>";
                echo "<a href='sign-in.php' class='sign-pads'><button >Sign In</button></a>";
                
                
                            
                    }else{
                        echo "<div class='sign-pads'>";
                        echo "<h2 id='signup_header'>Welcome Back!</h2>";
                        echo "<p id='signup_message'>To keep connected with us please login your account</p>";
                        echo "<a href='sign-in.php'><button>Sign In</button></a>";
                    }
                    
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
    const checkSum = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    if (checkSum) {
        document.getElementById('captcha_message').innerHTML = '';
        document.getElementById('success_gif').style.display = 'none';
    }else{
        document.getElementById('captcha_message').innerHTML = 'Please verify you are not a robot.';
        document.getElementById('success_gif').style.display = 'block';
    }
</script>
<script>
    var state= false;
    function toggle(){
        if(state){
        document.getElementById("Pass").setAttribute("type","password");
        document.getElementById("eye").style.color='#999999';
        state = false;
        }
        else{
        document.getElementById("Pass").setAttribute("type","text");
        document.getElementById("eye").style.color='#2c66e4';
        state = true;
        }
    }
    
        function myadmin() {
    document.getElementById("myadmindiv").classList.toggle("show");
    }

    window.addEventListener("click", function(event) {
    if (!event.target.matches('.admin-btn')) {
        var updgrades = document.getElementsByClassName("terms-infos");
        var i;
        for (i = 0; i < updgrades.length; i++) {
        var openupgrade = updgrades[i];
        if (openupgrade.classList.contains('show')) {
            openupgrade.classList.remove('show');
        }
        }
    }
    });
    
    
</script>

</body>
</html>