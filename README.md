EasyCurl
============
EasyCurl a very easy cURL class.
# Settings
Referer and User agent option. The default values included.
```php
require "easycurl.class.php";
$curl = new EasyCurl;
$curl->referer = "http://google.com";
$curl->user_agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; tr; rv:1.9.0.6) Gecko/2009011913 Firefox/3.0.6";
```
# Get
```php
$val = $curl->get("http://google.com");
echo $val;
```

# Post
```php
$arrayName = array(
	"author" => "ufuk",
 	"url" => "ufukk.com",
 	"comment" => "I'm bot....",
 	"submit" => "Send",
 	"comment_post_ID" => "193",
 	"comment_parent" => "0",
 	"akismet_comment_nonce" =>"faed9d1dcd",
 	"ak_js" => "218");
$curl->post("http://site.com/wp-comments-post.php", $arrayName);
```

# Download
```php
$curl->download("http://site.com/image.jpeg", "images/image.jpeg");
```

# Preg
```php
$val = $curl->get("http://site.com/");
//Example Value: <p>Content</p>
echo $curl->preg("<p>", "</p>", $val);
//Content
```
