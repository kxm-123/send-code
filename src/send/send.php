<?php
namespace yuan\src\Send;
class Send
{
public static function index(){
    echo "hello world!";
}



public static function send($phone, $user,$pass,$content){
    $smsapi = "https://api.smsbao.com/";
    $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sendurl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //不验证证书
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;

}
}