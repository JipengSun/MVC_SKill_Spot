<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/13
 * Time: 10:20
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require ('vendor/autoload.php');
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

class Notification{
    public function build(){
        $notifications = [
            ['subscription'=>Subscription::create([
                'endpoint'=>'https://updates.push.services.mozilla.com/push/abc...',
                'publicKey'=>'',
                'authToken'=>'',
                'contentEncoding'=>'aesgcm',
            ]),'payload'=>'hello! Jipeng'],
                [
                    'subscription'=>Subscription::create([
                        'endpoint'=>'https://example.com/other/endpoint/of/another/vendor/abcdef...',
                        'publicKey'=>'',
                        'authToken'=>'',
                        'contentEncoding'=>'aesgcm',
                    ]),
                'palyload'=>'{msg:"test"}',
            ],
        ];
        $auth = [
            'GCM' => 'MY_GCM_API_KEY', // deprecated and optional, it's here only for compatibility reasons
            'VAPID' => [
                'subject' => 'mailto:me@website.com', // can be a mailto: or your website address
                'publicKey' => 'BHUyW5V7JR96whz5lrBxpYYnDlmW2iF7EJpOw_V53DHmchbFG_Kv4xT4ZCym5U1yLnqe8tuVx5vl5vW_xbO774M
', // (recommended) uncompressed public key P-256 encoded in Base64-URL
                'privateKey' => 'HhY8NAKg39dzihfbMq96cOnU8cPpZoeTVgXSiK7biuU', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
                'pemFile' => 'path/to/pem', // if you have a PEM file and can link to it on your filesystem
                'pem' => 'pemFileContent', // if you have a PEM file and want to hardcode its content
            ],
        ];
        $webPush = new WebPush($auth);

        foreach ($notifications as $notification){
            $webPush->sendNotification(
                $notification['subscription'],
                $notification['payload']
            );
        }
        $webPush->flush();

        $webPush->sendNotification(
            $notifications[0]['subscription'],
            $notification[0]['payload'],
            true
        );

    }
}