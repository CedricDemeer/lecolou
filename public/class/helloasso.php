<?php 
require 'env.php';
class helloasso {
    
    //helloAsso
    
    private const SRVAUTH ="https://api.helloasso.com/oauth2";
    private const SRVAPI ="https://api.helloasso.com/v5";
    private const SRVTOKEN ="https://api.helloasso.com/oauth2/token";
    private const TOKEN_FILENAME  = "montoken.txt";
    
    private $access_token;
    private $refresh_token;
    private $data;

    public function __construct()
    {
        $tokens = $this->getTokens();
    }
    public function getTokens()
    {
        $filename = self::TOKEN_FILENAME;
        if (!file_exists($filename)) {//First time use = create the file
            $this->createTokenFile();
        }
        $tokens = json_decode(file_get_contents($filename));
        if($tokens->expire_date < strtotime("+0 minutes")){
            $this->refreshToken($tokens->refresh_token);
        }else{
            $this->access_token = $tokens->access_token;
            $this->refresh_token = $tokens->refresh_token;
        }        
    }
    public function createTokenFile()
    {
        //init le token
        $data = $this->inittoken(array(
            'grant_type' => 'client_credentials',
            'client_id' => CLIENT_ID,
            'client_secret' => CLIENTSECRET
        ));
        $expiredate = strtotime("+29 minutes");
        $access_token = $data["access_token"];
        $refresh_token = $data["refresh_token"];
        $contents = '{"access_token": "' . $access_token . '", "refresh_token": "' . $refresh_token . '", "expire_date": "' . $expiredate . '"}';
        $fp = fopen(self::TOKEN_FILENAME, 'w');
        fwrite($fp, $contents);
        fclose($fp);
        $this->access_token = $access_token;
        $this->refresh_token = $refresh_token;
    }
    public function refreshToken($refresh_token)
    {
        if($refresh_token != ""){
            $data = $this->inittoken(array(
                'grant_type' => 'refresh_token',
                'client_id' => CLIENT_ID,
                'refresh_token' => $refresh_token
            ));
            $expiredate = strtotime("+29 minutes");
            $access_token = $data["access_token"];
            $refresh_token = $data["refresh_token"];
            if($access_token != "" && $refresh_token != ""){
                $contents = '{"access_token": "' . $access_token . '", "refresh_token": "' . $refresh_token . '", "expire_date": "' . $expiredate . '"}';
                $fp = fopen(SELF::TOKEN_FILENAME, 'w');
                fwrite($fp, $contents);
                fclose($fp);
                $this->access_token = $access_token;
                $this->refresh_token = $refresh_token;
            }else{
                //supprime le fichier pour regenerer un token
                unlink(SELF::TOKEN_FILENAME);
            }
            
        }
        
    }
    public function checkCallSuccess()
    {
        if (isset($this->data['http_response_code']) && $this->data['http_response_code'] == 401) {
            $this->refreshToken();//Fetches new access and refresh tokens
            return false;
        } else {
            return json_encode($this->data);
        }
    }
    public function inittoken($params){

        //données pour obtenir un token
        $postData = http_build_query($params);
        //récupération du token:
        $opts = array('http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postData,
                )
        );
        $context = stream_context_create($opts);
        //url d'authentification
        $result = file_get_contents(SELF::SRVTOKEN, false, $context);
        $tab_rep = json_decode($result, true);
        //echo"<pre> résultat "; print_r(json_decode($result));echo"<pre>";echo'<br/>';
        //$token =$tab_rep['access_token'];
        //echo "token : ".$token ;
        $this->data = $tab_rep;
        $this->access_token = $tab_rep["access_token"];
        $this->refresh_token = $tab_rep["refresh_token"];
        return $tab_rep;
        
    }

   
    
}

?>