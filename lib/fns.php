<?php
require_once 'lib/phpflickr/phpFlickr.php';


function d($a){
	echo '<pre>'.print_r($a, true).'</pre>';
}
function obfuscateEmail($address){
	$link = 'mailto:' . $address;
     $obfuscatedLink = "";
     for ($i=0; $i<strlen($link); $i++){
         $obfuscatedLink .= "&#" . ord($link[$i]) . ";";
     }
     return  $obfuscatedLink;
}
function getFlickrImage(){
	$api_key 	= '8e04f641eb2354aa4de3333bf1ece363';
	$secret 	= '49f92ed2cd7a9a93';
	$f = new phpFlickr($api_key,$secret);

	$photos = $f->people_getPublicPhotos ('53572347@N02',null,'url_o','original_format');
	//d($photos['photos']['photo'][0]);exit();
	$photo['raw_url']= $photos['photos']['photo'][0]['url_o'];
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
function curl_download($Url){
 
    // is cURL installed yet?
    if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }
 
    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();
 
    // Now set some options (most are optional)
 
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, $Url);
 
    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
 
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
 
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
 
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 
    // Download the given URL, and return output
    $output = curl_exec($ch);
 
    // Close the cURL resource, and free system resources
    curl_close($ch);
 
    return $output;
}