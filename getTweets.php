<?php

/****************************************************************************************************
 * getTweets.php
 * Author: Matt Nutsch
 * Date: 11-21-2016
 * Description:
 * This file contains the function getTweets().
 * uses library from: https://github.com/abraham/twitteroauth
 * based in part on: https://www.sanwebe.com/2014/07/get-latest-twitter-status-easily-with-php
 ***************************************************************************************************/
 
//Set Debugging Options
$debugging = 1; //set this to 1 to see debugging output

if($debugging)
{
   error_reporting(E_ALL);
   ini_set('display_errors', TRUE);
   ini_set('display_startup_errors', TRUE);
   echo "<strong>Debugging Enabled</strong><br/>";  
}

require_once "TwitterOAuth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

/*****************************************************************************************
 * get_tweets($user, $number_of_tweets, $offset, $exclude_replies)
 * specify the Twitter UserID, the number of Tweets to return, 
 * how far back to start from the most recent tweet, and to exclude replies. 
******************************************************************************************/
function get_tweets($user, $number_of_tweets, $offset, $exclude_replies)
{

	//DEV NOTE: Set these based on https://apps.twitter.com
	$twitter_customer_key           = 'sdfsadfsadfsadfsdafsdafsadf';
	$twitter_customer_secret        = 'asdfsdafsadfsadfsadfasdfsafd';
	$twitter_access_token           = 'asdfsadfsadfsadfsadfsadfasdfsaf';
	$twitter_access_token_secret    = 'asdfsadfadsfsadfsadfsadfsadfasdfasdf';
	
	$sumOfOffsetAndNumber = $offset + $number_of_tweets + 1;

	$connection = new TwitterOAuth($twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret);

	$my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => 'mnutsch', 'count' => $sumOfOffsetAndNumber, "exclude_replies" => $exclude_replies));
	
	for($i = $offset; $i < $number_of_tweets; $i++)
	{
		echo "<div>";
		if(isset($my_tweets->errors))
		{       
			if($debugging)
				echo 'Error :'. $my_tweets->errors[$i]->code. ' - '. $my_tweets->errors[$i]->message;
		}
		else
		{
			if(isset($my_tweets[$i]->text))
				echo makeClickableLinks($my_tweets[$i]->text);
		}
		echo "</div>";
	}
	
}

//function to convert text url into links.
function makeClickableLinks($s) 
{
  return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a target="blank" rel="nofollow" href="$1" target="_blank">$1</a>', $s);
}

//Example Usage

//get first tweet
get_tweets("mnutsch", 1, 0, TRUE);

//get second tweet
get_tweets("mnutsch", 2, 1, TRUE);

?>