<?php 
include_once('../Config_discordApi.php');

class discordUser
{
    public function __construct($system)
    {
       
        
    }
}


if(get('action') == 'login') {
    $params = array(
        'client_id' => OAUTH2_CLIENT_ID,
        'redirect_uri' => Reditect_URI,
        'response_type' => 'code',
        'scope' => 'identify guilds'
      );
    header('Location: https://discord.com/api/oauth2/authorize' . '?' . http_build_query($params));
}




function get($key, $default=NULL) {
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
  }

