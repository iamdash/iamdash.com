<?php
DEFINE('SHOW_ERRORS', 1);
error_reporting (3);
ini_set ( display_errors, SHOW_ERRORS );
include 'includes/php/functions.php';

$page = array();
$page['slug']       = getCurrentPageSlug();
$page['template']   = $page['slug'];
?>
<?php include 'includes/elements/document/head.php';?>

<?php include 'pages/'.$page['template'].'.php';?>

<?php include 'includes/elements/document/footer.php';?>