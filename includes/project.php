<?php
DEFINE('SHOW_ERRORS', 1);
error_reporting (3);
ini_set ( display_errors, SHOW_ERRORS );
$iphone_browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
include 'includes/php/functions.php';
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
<script type="text/javascript" src="http://use.typekit.com/jek6rrs.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>  
  <meta name="description" content="">
  
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/includes/css/src/styles.css" />
  <?php 
    if ($iphone_browser == true):
    ?>
  <link rel="stylesheet" href="/includes/css/src/iphone.css" />
  <?php
    else:
?>
  <link rel="stylesheet" href="/includes/css/src/960.css" />
  <?php endif;?>

  <script src="/includes/js/libs/modernizr-2.5.2.min.js"></script>
</head>
<body>
 <div class="container_3">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

  <div role="main">

      <article id="work"class="row">
          <section class="page-section">
              <header>
                  <h2><span class="grid_1 alpha omega">Project name</span></h2>
              </header>
              <section class="prefix_1">
                  <?php include('includes/content/work.php');?>
              </section>
              <section id="project-thumbs" class="alpha omega">
                <header>
                    <h3><span class="grid_1 alpha">Recent work</span></h2>
                </header>                  
                  <?php include('includes/content/project-thumbs.php');?>
              </section>              
          </section>
      </article>      
  </div>
  <footer>

  </footer>
 </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <script src="js/src/plugins.js"></script>
  <script src="/includes/js/src/core.js"></script>
  <script src="/includes/js/src/init.js"></script>

  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>