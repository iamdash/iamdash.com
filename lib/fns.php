<?php
require_once 'phpflickr/phpFlickr.php';
require_once 'image_cacher.php';

function getFlickrImage(){
	
	$api_key 	= '8e04f641eb2354aa4de3333bf1ece363';
	$secret 	= '49f92ed2cd7a9a93';
	
	$f = new phpFlickr($api_key,$secret);
	//$f->enableCache("db", "mysql://iamdash_db:@87.239.18.178/iamdash_main");

	$photos = $f->people_getPublicPhotos ('53572347@N02',null,'url_o','original_format');
	//d($photos['photos']['photo'][0]);exit();
	$photo['raw_url']= $photos['photos']['photo'][0]['url_o'];

	$cacher = new ImageCacher($photo['raw_url'], 'images/backgrounds');

	$photo['path'] = $cacher->getImage();

	$photo['url'] = 'http://www.flickr.com/photos/iamdashnet/'.$photos['photos']['photo'][0]['id'];

	return $photo;
}



function getTweet(){
	$twitter_feed =  curl_download('http://api.twitter.com/1/statuses/user_timeline.json?screen_name=_iamdash');
	$tweets = json_decode($twitter_feed,false);
	$tweet['tweet']=parse_twitter($tweets[0]->text);
	return $tweet;
	exit();
}

function parse_twitter($t) {
	// link URLs
	$t = " ".preg_replace( "/(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]*)".
		"([[:alnum:]#?\/&=])/i", "<a href=\"\\1\\3\\4\" target=\"_blank\">".
		"\\1\\3\\4</a>", $t);

	// link mailtos
	$t = preg_replace( "/(([a-z0-9_]|\\-|\\.)+@([^[:space:]]*)".
		"([[:alnum:]-]))/i", "<a href=\"mailto:\\1\">\\1</a>", $t);

	//link twitter users
	$t = preg_replace( "/ +@([a-z0-9_]*) ?/i", " <a href=\"http://twitter.com/\\1\" target=\"_blank\">@\\1</a> ", $t);

	//link twitter arguments
	$t = preg_replace( "/ +#([a-z0-9_]*) ?/i", " <a href=\"http://twitter.com/search?q=%23\\1\" target=\"_blank\">#\\1</a> ", $t);

	// truncates long urls that can cause display problems (optional)
	$t = preg_replace("/>(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]".
		"{30,40})([^[:space:]]*)([^[:space:]]{10,20})([[:alnum:]#?\/&=])".
		"</", ">\\3...\\5\\6<", $t);
	return trim($t);
}