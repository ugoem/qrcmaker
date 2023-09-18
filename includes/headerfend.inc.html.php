<?php 
         $appversion = "1.0";
		$appTitle = "QRC Maker";
        $SEOtext = "Quick Response (QR) Code Generator Application";
		$SEOtext2 = "Generate unlimited QR codes and keep track of how many people scan them, from where and on what date." ;
		$keyword = "qr code, qr codes, qr, qr generator, qr code generator, generate qr code, static qr codes, dynamic qr codes, create qr code";
        $baseurl = "https://auenetengtech.com.ng/qrcmaker/";
        $fburl = "http://www.facebook.com/sharer.php?u=";
        $twturl = "http://twitter.com/share?url=";
        $gplus = "https://plus.google.com/share?url=";
        $lknurl = "http://www.linkedin.com/shareArticle?mini=true&url=";
        //$whatsapp = "https://api.whatsapp.com/send?phone={phone_number}&text={title}%20{url}";
       $whatsapp = "whatsapp://send?";
        $reddit = "https://reddit.com/submit?url=";
        $destination = "user/download/?file=";
        //$source = $baseurl."?file=";
        $emailurl = "mailto:?Subject=";
        $qrctitle = "Generated QR Code";
?>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="<?php echo $SEOtext; ?>">
    <meta name="author" content="<?php echo $appTitle; ?> ">
   <meta name="description" content="<?php echo $SEOtext2; ?>">
      <meta name="keywords" content="<?php echo $keyword; ?>"/>
  <title>QRC | Maker</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/vaakash/socializer@2f749eb/css/socializer.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">

	<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">
	<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
<!-- Used for validation of qrc option fields -->
	    <style>

            #responseContainer {
                display: none;
            }
        </style>
<!-- Style for move to top button-->
<style>


#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #29A2BD;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>

<style>
/* Set the size of the div element that contains the map */
#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
</style>


</head>