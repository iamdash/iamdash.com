<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
require_once './lib/image_cacher.php';
require_once './lib/phpflickr/phpFlickr.php';
require_once './lib/utils.php';
//require_once './lib/fns.php';
function getFlickrImage(){
	
	$api_key 	= '8e04f641eb2354aa4de3333bf1ece363';
	$secret 	= '49f92ed2cd7a9a93';
	
	$f = new phpFlickr($api_key,$secret);
	$f->enableCache("db", "mysql://iamdash_db:CuDhb9xJ3o48@127.0.0.1/iamdash_main");

	$photos = $f->people_getPublicPhotos ('53572347@N02',null,'url_o','original_format');
	//d($photos['photos']['photo'][0]);exit();
	$photo['raw_url']= $photos['photos']['photo'][0]['url_o'];

	$cacher = new ImageCacher($photo['raw_url'], 'images/backgrounds');

	$photo['path'] = $cacher->getImage();

	$photo['url'] = 'http://www.flickr.com/photos/iamdashnet/'.$photos['photos']['photo'][0]['id'];

	return $photo;
}
$image = getFlickrImage();
d($image);
?>