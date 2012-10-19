<?php 
require_once './lib/utils.php';
require_once './lib/fns.php';
$image = getFlickrImage();
?>
<!DOCTYPE html>
<html>
	<head>
	<title>iamdash.com</title>
	<meta charset="UTF-8" />
	<meta name="description" content="" />
	<link href="/favicon.ico" type="image/x-icon" rel="icon" />
	<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<!--[if lte IE 8]>
	<script src="/js/html5shiv.js"></script>
	<script src="/js/css3-mediaqueries-min.js"></script>
	<![endif]-->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-318641-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>	
	</head>
<body>
	<article class="wrapper">
		<div class="maincontent row">
			<h1><span>iamdash</span></h1>
			<p><span>South African expat with my feet firmly set in the lovely British North West.<br />
			Developer at <a href="http://www.designbymusic.com">Music</a>.</span></p>
		</div>
		<div class="twitter row">
			<h2><span><a href="https://twitter.com/_iamdash">@_iamdash</a></span></h2>
			<?php #$tweet = getTweet();?>
			<p><span><?php echo $tweet['tweet'];?></span></p>
		</div>
		<footer class="footer row">
			<p><span><a href='<?php echo obfuscateEmail('sayhello@iamdash.com')?>'>Say hello</a></span> <span><a href="<?php echo $image['url']?>">The photo</a></span></p>
		</footer>
	</article>
	<script src="js/app.js"></script>
	<script type="text/javascript">
	$.backstretch('<?php echo $image['path']?>');
	</script>
</body>
</html>