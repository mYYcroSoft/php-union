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
  }




if(isset($_GET['code'])) {
    $apiData = apiRequest(apiURLBase);
    print_r($user);    
 
}

  
  function apiRequest($url, $post=FALSE, $headers=array()) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  
    $response = curl_exec($ch);
  
  
    if($post)
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
  
    $headers[] = 'Accept: application/json';
  
    if($_SESSION['access_token'])
      $headers[] = 'Authorization: Bearer ' . $_SESSION['access_token'];
  
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  
    $response = curl_exec($ch);
    return json_decode($response);
  }
