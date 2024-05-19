<?php 

namespace App\Notifications;

use GuzzleHttp\Client;
use SendinBlue\Client\Api\TransactionalSMSApi;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendTransacSms;
use Exception;

class BrevoServices
{
    protected $apiInstance;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('BREVO_API_KEY'));
        $this->apiInstance = new TransactionalSMSApi(
            new Client(),
            $config
        );
    }

    public function sendSMS($to, $sender, $content, $webUrl = null)
    {
        $sendTransacSms = new SendTransacSms();
        $sendTransacSms['sender'] = $sender;
        $sendTransacSms['recipient'] = $to;
        $sendTransacSms['content'] = $content;
        $sendTransacSms['type'] = 'transactional';
        if ($webUrl) {
            $sendTransacSms['webUrl'] = $webUrl;
        }

        try {
            $result = $this->apiInstance->sendTransacSms($sendTransacSms);
            return $result;
        } catch (Exception $e) {
            return 'Exception when calling TransactionalSMSApi->sendTransacSms: ' . $e->getMessage();
        }
    }
}



?>