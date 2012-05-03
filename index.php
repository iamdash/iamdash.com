<?php
DEFINE('SHOW_ERRORS', 1);
error_reporting (3);
ini_set ( display_errors, SHOW_ERRORS );
include 'includes/php/functions.php';
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
  <title>iamdash.com</title>
  <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
  <?php /*
    <script type="text/javascript" src="http://use.typekit.com/jek6rrs.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>  */?>
    <meta name="description" content="">

    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/includes/css/src/main_style.css" />
    <script src="/includes/js/libs/modernizr-2.5.2.min.js"></script>
</head>
<body>
 <div class="container_3 clearfix" id="wrapper">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
     <div class="row">
     <header id="logo" class="grid_1 alpha page-header">
        <h1>iamdash.net</h1>
        <h2>Freelance web developer.</h2>
    </header>
    <nav id="page-nav" class="grid_2 omega page-header">
        <ul>
            <li class="active"><a href="#home">Home</a></li>
            <li><a href="#work">Things i have done</a></li>
            <li><a href="#skillset">Things I can do</a></li>
            <li><a href="#more">A little bit more</a></li>
            <li><a href="#get-in-touch">Get in touch</a></li>
        </ul>
    </nav>
     </div>
  <div role="main" class="clearfix">
      <article id="intro" class="row">
        <section>
            <img src="/images/common/flower.png" alt="Flower" class="section-header" id="flower" />
            <section class="section-content">
                <header>
                    <h2>I am Dave Ashman. I have been building websites since 2003 and am still going strong.</h2>
                </header>
                <section>
                    <?php include('includes/content/intro.php');?>
                </section>
            </section>
        </section>
      </article>
      <article id="work" class="row">
          <section>
              <div class="up-down">    
                <a href="#skillset" class="next">Things I can do</a>
                <a href="#wrapper" class="previous">Top of the page</a>
              </div>
              <header class="section-header">
                  <h2>Things I have done</h2>
              </header>
              <div class="section-nav">
                    <nav id="project-type" class="section-nav grid_2 omega">
                        <ul>
                            <li><a href="#" rel="cms">CMS</a></li>
                            <li><a href="#" rel="ecommerce">E-commerce</a></li>
                            <li><a href="#" rel="exhibition">Exhibition</a></li>
                            <li><a href="#" rel="frontend">Front end</a></li>
                            <li><a href="#" rel="joomla">Joomla</a></li>
                            <li><a href="#" rel="php-framework">PHP Framework</a></li>
                            <li><a href="#" rel="wordpress">Wordpress</a></li>
                        </ul>
                    </nav>                  
              </div>
              
              <section id="project-thumbs" class="row">                 
                  <?php include('includes/content/project-thumbs.php');?>
              </section>              
          </section>
      </article> 
      <article id="skillset" class="row">
          <section class="page-section">
              <div class="up-down">    
                <a href="#more" class="next">A little bit more</a>
                <a href="#work" class="previous">Things I have done</a>
              </div>              
                <header class="section-header">
                  <h2>Things I can do</h2>
              </header>

              <section class="row">
                 <header class="section-header">
                     <h3>Front-end ...</h3>
                 </header>                  
                  <div class="section-content">
                     <?php include('includes/content/skillset-front.php');?>
                  </div>
              </section>
              <section class="row">        
                    <header class="section-header">
                        <h3>CMS, e-commerce and back-end ...</h3>
                    </header>    
                    <div class="section-content">
                        <?php include('includes/content/skillset-back.php');?>
                    </div>  
                </section>                    
          </section>
      </article>
      <article id="more" class="row">
          <section class="page-section">
              <div class="up-down">    
                <a href="#get-in-touch" class="next">Get in touch</a>
                <a href="#skillset" class="previous">Things I can do</a>
              </div>              
              <header class="section-header">
                  <h2>A little bit more</h2>
              </header>          
              <section class="row">
                 <header class="section-header">
                     <h3>About me ...</h3>
                 </header>                  
                  <div class="section-content">
                     <?php include('includes/content/more-about-me.php');?>
                  </div>
              </section> 
              <section class="row">
                 <header class="section-header">
                     <h3>About the site ...</h3>
                 </header>                  
                  <div class="section-content">
                     <?php include('includes/content/more-about-the-site.php');?>
                  </div>
              </section>               
          </section>
      </article> 
      <article id="get-in-touch" class="row">
          <section class="page-section">
              <div class="up-down">    
                <a href="#more" class="previous">A little bit more</a>
              </div>               
              <header class="section-header">
                  <h2>Get in touch</h2>
              </header> 
              <section class="row"> 
                 <header class="section-header">
                     <h3>How to contact me</h3>
                 </header>   
                  <div class="section-content">
                     <?php include('includes/content/contact.php');?>
                  </div>             
                </section>
            </section>
      </article>       
      <footer id="page-footer" class="row">
            <div class="up-down">    
                <a href="#wrapper" class="previous">To the top of the page</a>
            </div>            
          <section class="alpha grid_1">
              
                <ul class="social-links">
			<li class="flickr"><a href="http://www.flickr.com/photos/iamdashnet/" title="View my flickr photo stream">flickr</a></li>
			<li class="last-fm"><a href="http://www.last.fm/user/daveashman" title="My Last.fm profile">Last.fm</a></li>
			<li class="linked-in"><a href="http://uk.linkedin.com/in/iamdash" title="My Linked In profile">Linked in</a></li>
		</ul>
          </section>        
      </footer>       
  </div>
  <footer>

  </footer>
 </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  
  <script src="/includes/js/src/core.js"></script>
  <script src="/includes/js/src/init.js"></script>
</body>
</html>