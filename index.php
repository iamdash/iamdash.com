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
  <title>iamdash.com | Online home of Dave Ashman, web developer, based in Greater Manchester, UK</title>
  <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
	
	<meta name="author" content="Dave Ashman" />
	<meta name="description" content="Dave Ashman, freelance web developer based in Greater Manchester, UK. My work focuses on the development of 
		accessible, standards-based web sites, from front- and back-end build through to custom content management systems and 
		WordPress integration and customisation" />
	<meta name="keywords" content="Dave Ashman, dave ashman, iamdash,web developer, Manchester, Greater Machester, Bury, Bolton, UK, front end (x)HTML, HTML5, CSS, JavaScript, PHP backend and CMS development" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="user-scalable = no">
        <link rel="stylesheet" href="/includes/css/src/main_style.css" />
        <script src="/includes/js/libs/modernizr-2.5.2.min.js"></script>
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
<body id="site">
 <div class="container_3 clearfix" id="wrapper">

     
	<div id="page-header" class="row">
            <header id="logo" class="page-header">
            <h1>iamdash.com</h1>
            <h2>Freelance web developer.</h2>
        </header>
        <nav id="page-nav" class="section-nav">
        <ul>
            <li><a href="#site" class="active">Home</a></li>
            <li><a href="#work">Things i have done</a></li>
            <li><a href="#skillset">The things I do</a></li>
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
                    <h2 class="tk-league-gothic">I am Dave Ashman, web developer, based in Greater Manchester, UK. <span>Building web things since 2003 and still going strong.</span></h2>
                </header>
                <section>
                    <?php include('includes/content/intro.php');?>
		              <div class="up-down">    
		                <a href="#work" class="next">Things I have done</a>
		              </div>
                </section>
            </section>
        </section>
  		<!--[if lte IE 7]><p class=chromeframe>I have noticed that you are using a very outdated browser which I do not fully support as far as testing and bug-fixes goes. Please <a href="http://browsehappy.com/">upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site bug-free and in full.</p><![endif]-->
      </article>
      <article id="work" class="row">
          <section>
              <div class="up-down">   
				<a href="#site" class="previous">Top of the page</a> 
                <a href="#skillset" class="next">Things I can do</a>
                
              </div>
              <header class="section-header">
                  <h2>Things I have done</h2>
              </header>
              <div class="section-nav">
                    <nav id="project-type" class="section-nav">
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
				<a href="#work" class="previous">Things I have done</a>
                <a href="#more" class="next">A little bit more</a>
                
              </div>              
                <header class="section-header">
                  <h2>The things I do</h2>
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
	<a href="#skillset" class="previous">Things I can do</a>
                <a href="#get-in-touch" class="next">Get in touch</a>
                
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
					<div id="contact-links">
 
		                <ul class="social-links">
							<li class="flickr"><a href="http://www.flickr.com/photos/iamdashnet/" title="View my flickr photo stream">flickr</a></li>
							<li class="last-fm"><a href="http://www.last.fm/user/daveashman" title="My Last.fm profile">Last.fm</a></li>
							<li class="linked-in"><a href="http://uk.linkedin.com/in/iamdash" title="My Linked In profile">Linked in</a></li>
						</ul>
					</div>
                 </header>   
                  <div class="section-content">
                     <?php include('includes/content/contact.php');?>
                  </div>             
                </section>
            </section>
      </article>       
      <footer id="page-footer" class="row">
          <div class="up-down">    
              <a href="#site" class="previous">To the top of the page</a>
          </div>
      </footer>       
  </div>
  <footer>

  </footer>
 </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="/includes/js/libs/jquery.tipsy.js" charset="utf-8"></script>
  <script src="/includes/js/libs/jquery.jqmodal.js" charset="utf-8"></script>
  <script src="/includes/js/src/core.js"></script>
  <script src="/includes/js/src/init.js"></script>
</body>
</html>