<?php

class Twitter{
    
    protected $username;
    protected $tweetcount;
    var $cache_dir;
    var $expire_time=0;
  
    
    public function __construct($username,$tweetcount){
        
        $this->cache_dir    = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'cache/twitter/tweets';
        //$this->expire_time  = $time_expire = time() + 24*60*60;
        //$this->expire_time  = 15*60;
        
        make_cache_path($this->cache_dir);
        
        $this->username = $username;
        $this->tweetcount = $tweetcount;
    }
    
    /**
     * 
     * @return type
     */
    public function getTweets(){
            $twitter_feed =  curl_download('http://api.twitter.com/1/statuses/user_timeline.json?count='.$this->tweetcount.'&screen_name='.$this->username);
            $tweets = json_decode($twitter_feed,false);

            
            $tweets = $this->_cacheTweets($tweets);

            return $tweets;
            exit();
    }

    
    /**
     * 
     * @desc    Checks if tweet cache file exists. If not, we write the file, and return it's contents
     * @param type json file contents of cached file
     * @return type
     */
    private function _cacheTweets($tweets){
        $cache_file = $this->cache_dir.DIRECTORY_SEPARATOR.'tweets';
        if(file_exists($cache_file)){
            $cache_age  = time() - filemtime($cache_file);
        }else{
            $cache_age = 0;
        }
        if(file_exists($cache_file) && $cache_age <= $this->expire_time){
            return $this->_decodeTweets(file_get_contents($cache_file));
        }else{
            file_put_contents($cache_file, json_encode($tweets));
            return $this->_decodeTweets(file_get_contents($cache_file));
        }
    }
    
    private function _decodeTweets($data){
        $data = mb_convert_encoding($data,'UTF-8');
        $data = preg_replace('/\\\u([0-9a-z]{4})/', '&#x$1;', $data);
        
        return $this->_parseTweets(json_decode($data,true));
    }
    
    private function _parseTweets($tweets) {
        
        $i=0;
        foreach($tweets as $tweet){
            
            $t = $tweet;

            // link URLs
            $t['text_parsed'] = " ".preg_replace( "/(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]*)([[:alnum:]#?\/&=])/i", "<a href=\"\\1\\3\\4\" target=\"_blank\">\\1\\3\\4</a>", $t['text']);
            
            // link mailtos
            $t['text_parsed']= preg_replace( "/(([a-z0-9_]|\\-|\\.)+@([^[:space:]]*)".
                    "([[:alnum:]-]))/i", "<a href=\"mailto:\\1\">\\1</a>", $t['text_parsed']);

            //link twitter users
            $t['text_parsed'] = preg_replace( "/ +@([a-z0-9_]*) ?/i", " <a href=\"http://twitter.com/\\1\" target=\"_blank\">@\\1</a> ", $t['text_parsed']);

            //link twitter arguments
            $t['text_parsed'] = preg_replace( "/ +#([a-z0-9_]*) ?/i", " <a href=\"http://twitter.com/search?q=%23\\1\" target=\"_blank\">#\\1</a> ", $t['text_parsed']);

            // truncates long urls that can cause display problems (optional)
            $t['text_parsed'] = preg_replace("/>(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]".
                    "{30,40})([^[:space:]]*)([^[:space:]]{10,20})([[:alnum:]#?\/&=])".
                    "</", ">\\3...\\5\\6<", $t['text_parsed']);
            $parsed_tweets[$i]['count']     =   $i;
            $parsed_tweets[$i]['created']   = strtotime($t['created_at']);
            $parsed_tweets[$i]['tweet']     = preg_replace('/%u([a-fA-F0-9]{4})/', '&#x\\1;', $t['text_parsed']);
            $parsed_tweets[$i]['username']  = $this->username;
            $i++;
        }

        return $parsed_tweets;
    }    
}