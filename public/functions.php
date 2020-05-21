<?php 
    use \Firebase\JWT\JWT;

    require 'vendor\firebase\php-jwt\src\JWT.php';

    session_start();
    
    function setCredentials($keyData, $sharedData){
        
        $curl = curl_init();
        $key = array (
            'key' => $keyData,
            'shared' => $sharedData
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:3000/credential",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "Content-Type:application/json"
            ),
            CURLOPT_POSTFIELDS => json_encode($key),
        ));

        $response = curl_exec($curl);
        $result = false;
        if (!curl_errno($curl)) {
            if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 204) {
            $result = true;
            }
        }

        curl_close($curl);
        $_SESSION['tokens'] = array();
        return $result;
    }

    function keys_set(){
        $keysSet = false;
        if(array_key_exists("key", $_SESSION) AND $_SESSION['key']){
            $keysSet = true;
        }

        return $keysSet;
    }

    function logout(){
        $_SESSION = array();
        session_destroy();
    }

    function saveMessage($url, $bodyParams, $urlParams){
        
        $key = $_SESSION['shared'];
        
        $payload=$url.";".$bodyParams.";".$urlParams;
        $jwt = JWT::encode($payload, $key);

        $curl = curl_init();
        

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:3000/message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "Content-Type:application/json",
                "X-Key: ".$_SESSION['key'],
                "X-Route: ".$url,
                "X-Signature: ".$jwt
            ),
            CURLOPT_POSTFIELDS => $bodyParams,
        ));

        $response = curl_exec($curl);
        
        $result = false;
        if (!curl_errno($curl)) {
            if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200) {
                array_push($_SESSION['tokens'], $response);
                $result = true;
            }
        }
        
        curl_close($curl);

        return $result;
        
    }

    function getMessage($url, $bodyParams, $urlParams, $id){
        
        $key = $_SESSION['shared'];
        
        $payload=$url.";".$bodyParams.";".$urlParams;
        $jwt = JWT::encode($payload, $key);

        $curl = curl_init();
        

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:3000/message/".$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "Content-Type:application/json",
                "X-Key: ".$_SESSION['key'],
                "X-Route: ".$url,
                "X-Signature: ".$jwt
            ),
            CURLOPT_POSTFIELDS => $bodyParams,
        ));

        $response = curl_exec($curl);
                
        curl_close($curl);

        return $response;
        
    }
    
    function getMessagesByTag($url, $bodyParams, $urlParams, $tag){
        
        $key = $_SESSION['shared'];
        
        $payload=$url.";".$bodyParams.";".$urlParams;
        $jwt = JWT::encode($payload, $key);

        $curl = curl_init();
        

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:3000/messages/".$tag,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "Content-Type:application/json",
                "X-Key: ".$_SESSION['key'],
                "X-Route: ".$url,
                "X-Signature: ".$jwt
            ),
            CURLOPT_POSTFIELDS => $bodyParams,
        ));

        $response = curl_exec($curl);
                
        curl_close($curl);

        return $response;
        
    }
?>