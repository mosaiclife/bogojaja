<!DOCTYPE HTML>

<html lang="ko">

<head>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width,initial-scale=1">-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        
        <link rel="stylesheet" type="text/css" href="inc/style.css" />
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="inc/script.js"></script>
        <script type="text/javascript" src="inc/kakao.link.js"></script>
        <title>:::보고자자::: 삼신할배의 아들, 딸 점지 사이트!</title>
        
        <script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			ga('create', 'UA-49160627-1', 'bogojaja.com');
			ga('send', 'pageview');
		
		</script>
</head>

<body onload="prevent();" onpageshow="if (event.persisted) prevent();" onunload="">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/ko_KR/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Twitter -->
	<!-- <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> -->

    <nav>
        <?php $url=basename($_SERVER['PHP_SELF']); ?>
        <a id="nav_index" href="javascript:void(0)" class="info" >Home</a>
        <a id="nav_check" href="javascript:void(0)" class="info">Check!</a>
        <!-- <a id="nav_faq" href="javascript:void(0)" class="info">FAQ</a> -->
    </nav>
    <header>
    	<?php
    		require_once 'inc/mobile_detect/Mobile_Detect.php';
			$detect = new Mobile_Detect;
			
			if ( $detect->isMobile() )
			{
				//echo "<a href='javascript:void(0)' id='beta_btn'><span id='beta'>Beta</span></a><a href='javascript:void(0)' id='header_btn'><h1>BoGoJaJa</h1>";
				echo "<a href='javascript:void(0)' id='header_btn'><img src='inc/title_eng.png' width='250' id='title'/></a>";
				echo "<h2>find your <span id='sex_mark'>♂ ♀</span></h2>";
			}
			else
			{
				echo "<a href='javascript:void(0)' id='beta_btn'><img src='inc/title_moon.png' id='beta'/></a><a href='javascript:void(0)' id='header_btn'><img src='inc/title.png' id='title'/></a>";
				echo "<div style='padding: 10px 0 0 60px;'><img src='inc/title_eng.png' width='180'/></div>";
			}
    	?>
        <!-- <a href="javascript:void(0)" id="beta_btn"><span id="beta">Beta</span></a><a href="javascript:void(0)" id="header_btn"><h1>BoGoJaJa</h1></a> -->
        
    </header>
    