# getTweets
This is a PHP function to get tweets from a specified account.

***********************************************************************************************************

Instructions:

Step 1. Download and unzip getTweets.zip to the web server. If you change the directory structure then update the require_once and use lines.

Step 2. Register a Twitter account for the app if you don’t already have one. Be sure to enter a mobile phone number, as Twitter requires this for apps.

Step 3. Create a Twitter “App” at https://apps.twitter.com. Read the following values from the twitter API site and insert them into the PHP code where appropriate. 
  $twitter_customer_key
	$twitter_customer_secret
	$twitter_access_token
	$twitter_access_token_secret

***********************************************************************************************************

//Example Usage in PHP


get_tweets("mnutsch", 1, 0, TRUE); //get first tweet


get_tweets("mnutsch", 2, 1, TRUE); //get second tweet
