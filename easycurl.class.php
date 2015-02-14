<?php
/**
* EasyCurl Class v1.0.0
*/
class EasyCurl
{
	public $user_agent 	= "Mozilla/5.0 (Windows; U; Windows NT 5.1; tr; rv:1.9.0.6) Gecko/2009011913 Firefox/3.0.6";
	public $referer 	= "http://google.com";

	public function curl($url, $post=false)
	{
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch , CURLOPT_FOLLOWLOCATION , 1 );
	    curl_setopt($ch, CURLOPT_POST, $post ? true : false);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $post ? $post : false);
	    curl_setopt($ch,CURLOPT_REFERER, isset($this->referer) ? $this->referer : false);  
	    curl_setopt($ch, CURLOPT_USERAGENT, isset($this->user_agent) ? $this->user_agent : false);
	    $val = curl_exec($ch);
	    curl_close($ch);
	    $val = trim(preg_replace('/\s+/', ' ', $val));
	    return str_replace(array("\n", "\t", "\r"), null, $val);
	}

	public function get($url)
	{
		return $this->curl($url);
	}

	public function post($url, $arraypost)
	{
		return $this->curl($url, http_build_query($arraypost));
	}

	public function download($url, $path)
	{
		return 	file_put_contents($path, file_get_contents($url));
	}

	public function preg($first, $finish, $value)
	{
	    @preg_match_all('/' . preg_quote($first, '/') .
	    '(.*?)'. preg_quote($finish, '/').'/i', $value, $m);
	    return @$m[1];
	}
}
