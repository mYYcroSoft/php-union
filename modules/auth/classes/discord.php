<?php 
include_once('../Config_discordApi.php');
session_start();
class discordUser
{
    public function __construct($system)
    {
       
        
    }
}


  if(isset($_GET['action']) == 'login') {
    $params = array(
        'client_id' => OAUTH2_CLIENT_ID,
        'redirect_uri' => Reditect_URI,
        'response_type' => 'code',
        'scope' => 'identify guilds'
      );
    header('Location: https://discord.com/api/oauth2/authorize' . '?' . http_build_query($params));
    error_log("User [x24782o789l] requests access");
    error_log("Access allowed");
    error_log("Encryption key: n9r@]NcAQi)Ghvl9g;)S^SvJ-%@W(R.'eHOX=");
  }




if(isset($_GET['code'])) {
  $token = apiRequest(tokenURL, array(
    "grant_type" => "authorization_code",
    'client_id' => OAUTH2_CLIENT_ID,
    'client_secret' => OAUTH2_CLIENT_SECRET,
    'redirect_uri' => Reditect_URI,
    'code' => $_GET['code'],
  ));
  $logout_token = $token->access_token;
  $_SESSION['access_token'] = $token->access_token;

    $apiData = apiRequest(apiURLBase);
    print_r($apiData);    
  
  error_log("The user has been redirected to the session.");
  error_log("Instance encrypted.  [x24782o789l]");
 
}

  
  function apiRequest($url, $post=FALSE, $headers=array()) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  
    $response = curl_exec($ch);
  
  
    if($post)
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
  
    $headers[] = 'Accept: application/json';
  
    if(isset($_SESSION['access_token']))
      $headers[] = 'Authorization: Bearer ' . $_SESSION['access_token'];
  
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  
    $response = curl_exec($ch);
    return json_decode($response);
  }
