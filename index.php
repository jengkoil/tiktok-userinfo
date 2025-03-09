<?php
/*=============================
  DEVELOPER: JENGKOIL SOLUTIONS
  DATE: 08/03/2025
===============================*/
header('content-type:text/plain');

$username = $_GET['username'];
$url = "https://www.tiktok.com/@" . $username;
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, $url);
$html_content = curl_exec($ch);
curl_close($ch);

#Regular expressions to extract information
$user_info_pattern = '/"webapp.user-detail":{"userInfo":{"user":{"id":"(\d+)"/';
$unique_id_pattern = '/"uniqueId":"(.*?)"/';
$nickname_pattern = '/"nickname":"(.*?)"/';
$followers_pattern = '/"followerCount":(\d+)/';
$following_pattern = '/"followingCount":(\d+)/';
$likes_pattern = '/"heartCount":(\d+)/';
$videos_pattern = '/"videoCount":(\d+)/';
$signature_pattern = '/"signature":"(.*?)"/';
$verified_pattern = '/"verified":(true|false)/';
$secUid_pattern = '/"secUid":"(.*?)"/';
$commentSetting_pattern = '/"commentSetting":(\d+)/';
$privateAccount_pattern = '/"privateAccount":(true|false)/';
$region_pattern = '/"region":"(.*?)"/';
$heart_pattern = '/"heart":(\d+)/';
$diggCount_pattern = '/"diggCount":(\d+)/';
$friendCount_pattern = '/"friendCount":(\d+)/';
$profile_pic_pattern = '/"avatarLarger":"(.*?)"/';

#Extract information
$user_id_match = preg_match($user_info_pattern, $html_content, $user_id_matches);
$user_id = $user_id_match ? $user_id_matches[1] : "No ID found";

$unique_id_match = preg_match($unique_id_pattern, $html_content, $unique_id_matches);
$unique_id = $unique_id_match ? $unique_id_matches[1] : "No unique ID found";

$nickname_match = preg_match($nickname_pattern, $html_content, $nickname_matches);
$nickname = $nickname_match ? $nickname_matches[1] : "No nickname found";
$nickname = str_replace("'","\\'",$nickname);

$followers_match = preg_match($followers_pattern, $html_content, $followers_matches);
$followers = $followers_match ? $followers_matches[1] : "No followers count found";

$following_match = preg_match($following_pattern, $html_content, $following_matches);
$following = $following_match ? $following_matches[1] : "No following count found";

$likes_match = preg_match($likes_pattern, $html_content, $likes_matches);
$likes = $likes_match ? $likes_matches[1] : "No likes count found";

$videos_match = preg_match($videos_pattern, $html_content, $videos_matches);
$videos = $videos_match ? $videos_matches[1] : "No videos count found";

$signature_match = preg_match($signature_pattern, $html_content, $signature_matches);
$signature = $signature_match ? $signature_matches[1] : "No signature found";

$verified_match = preg_match($verified_pattern, $html_content, $verified_matches);
$verified = $verified_match ? $verified_matches[1] : "No verified status found";

$secUid_match = preg_match($secUid_pattern, $html_content, $secUid_matches);
$secUid = $secUid_match ? $secUid_matches[1] : "No secUid found";

$commentSetting_match = preg_match($commentSetting_pattern, $html_content, $commentSetting_matches);
$commentSetting = $commentSetting_match ? $commentSetting_matches[1] : "No comment setting found";

$privateAccount_match = preg_match($privateAccount_pattern, $html_content, $privateAccount_matches);
$privateAccount = $privateAccount_match ? $privateAccount_matches[1] : "No private account status found";

$region_match = preg_match($region_pattern, $html_content, $region_matches);
$region = $region_match ? $region_matches[1] : "No region found";

$heart_match = preg_match($heart_pattern, $html_content, $heart_matches);
$heart = $heart_match ? $heart_matches[1] : "No heart count found";

$diggCount_match = preg_match($diggCount_pattern, $html_content, $diggCount_matches);
$diggCount = $diggCount_match ? $diggCount_matches[1] : "No digg count found";

$friendCount_match = preg_match($friendCount_pattern, $html_content, $friendCount_matches);
$friendCount = $friendCount_match ? $friendCount_matches[1] : "No friend count found";

$profile_pic_match = preg_match($profile_pic_pattern, $html_content, $matches);
$profile_pic = isset($matches[1]) ? str_replace('\u002F', '/', $matches[1]) : "No profile picture found";

#Print User Info
echo "User Information:\n";
echo "User ID: $user_id\n";
echo "Username: $unique_id\n";
echo "Nickname: $nickname\n";
echo "Followers: $followers\n";
echo "Following: $following\n";
echo "Likes: $likes\n";
echo "Videos: $videos\n";
echo "Biography: $signature\n";
echo "Verified: $verified\n";
echo "SecUid: $secUid\n";
echo "Comment Setting: $commentSetting\n";
echo "Private Account: $privateAccount\n";
echo "Region: $region\n";
echo "Heart: $heart\n";
echo "Digg Count: $diggCount\n";
echo "Friend Count: $friendCount\n";
echo "Profile Picture URL: $profile_pic\n";
?>
