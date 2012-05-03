<!DOCTYPE html>
<html lang="en">
     <head>
          <script type="text/javascript" src="http://use.typekit.com/jek6rrs.js"></script>
          <script type="text/javascript">try{Typekit.load();}catch(e){}</script>          
          <meta charset="utf-8" />
          <title>iamdash.net | Online home of Dave Ashman, web developer, based in Greater Manchester, UK</title>
          <meta name="author" content="Dave Ashman" />
          <meta name="description" content="Web developer and occasional designer living in Greater Manchester, UK. My work focuses on the development of 
		accessible, standards-based web sites, from front- and back-end build through to custom content management systems and 
		WordPress integration and customisation" />
          <meta name="keywords" content="web developer, UK, front end (x)HTML, HTML5, CSS, JavaScript, PHP backend and CMS development" />

          <script src="/includes/js/jquery-1.4.2-min.js" charset="utf-8"></script>
          <script>$('html').addClass('js');</script>
          
          <link rel="stylesheet" href="/includes/css/src/main_style.css?v=<?php echo md5(time()); ?>" type="text/css" />
          

          <?php /* $browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
            if ($browser == true)  :
            ?>
            <link rel="stylesheet" href="/includes/css/iphone-min.css" type="text/css" media="only screen and (max-width: 480px)" />
            <?php else:?>
            <link rel="stylesheet" href="/includes/css/desktop-min.css" type="text/css" media="screen and (min-width: 481px)" />
            <?php endif; */ ?>
          <!--[if IE]>
		<link rel="stylesheet" href="/includes/css/explorer.css" type="text/css" />
	<![endif]-->
          <!--[if lt IE 9]>
                  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" href="/includes/css/ie/ie-common.css" type="text/css" />
	<![endif]-->
          <!--[if IE 6]><link rel="stylesheet" href="/includes/css/ie/ie6.css" type="text/css" /><![endif]-->
          <!--[if IE 7]><link rel="stylesheet" href="/includes/css/ie/ie7.css" type="text/css" /><![endif]-->
          <!--[if IE 8]><link rel="stylesheet" href="/includes/css/ie/ie8.css" type="text/css" /><![endif]-->
          <!--[if lt IE 7]><link rel="stylesheet" type="text/css" media="all" href="/css/ie/ie6.css"/><![endif]-->
     </head>
     <body id="<?php echo $page['slug']; ?>">

          <div id="wrapper">
               <div id="page" class="container_8">
                    <div class="grid_8 alpha omega">
                         <header id="page-header">
                              <hgroup id="logo">
                                   <h1>iamdash.net</h1>
                              </hgroup>
                               <div id="flower"></div>
                             <nav id="main">
                                   <?php include 'nav.php'; ?>
                              </nav>                               
                         </header>
