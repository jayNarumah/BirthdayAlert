<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;
use AWS;
use Exception;
        /** Aliasing the classes */




class SmsController extends Controller
{
    function aws()
     {
        $phone_number = "+2348036343085";
        $sms = AWS::createClient('sns');

        $sms->publish([
            'Message' => 'Hello, This is just a test Message from Century test BirthdayNotification Site',
            'PhoneNumber' => $phone_number,
            'MessageAttributes' => [
                'AWS.SNS.SMS.SMSType'  => [
                    'DataType'    => 'String',
                    'StringValue' => 'Transactional',
                 ]
           ],
        ]);
        Log::alert($sms->publish());
     }

    function awsSms()
    {

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL | E_STRICT);

        /** Make sure to add autoload.php */
        require __DIR__.'/vendor/autoload.php';
        /** Error Debugging */


        /** AWS SNS Access Key ID */
        $access_key_id    = 'XXX';

        /** AWS SNS Secret Access Key */
        $secret = 'XXX';

        /** Create SNS Client By Passing Credentials */
        $SnSclient = new SnsClient([
            'region' => 'ap-south-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => 'AKIAX4WUFPBA7QEGUFV5',
                'secret' => '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',
            ],
        ]);

        /** Message data & Phone number that we want to send */
        $message = 'Testing AWS SNS Messaging';

        /** NOTE: Make sure to put the country code properly else SMS wont get delivered */
        $phone = '+2347035460599';

        try {
            /** Few setting that you should not forget */
            $result = $SnSclient->publish([
                'MessageAttributes' => array(
                    /** Pass the SENDERID here */
                    'AWS.SNS.SMS.SenderID' => array(
                        'DataType' => 'String',
                        'StringValue' => 'StackCoder'
                    ),
                    /** What kind of SMS you would like to deliver */
                    'AWS.SNS.SMS.SMSType' => array(
                        'DataType' => 'String',
                        'StringValue' => 'Transactional'
                    )
                ),
                /** Message and phone number you would like to deliver */
                'Message' => $message,
                'PhoneNumber' => $phone,
            ]);
            /** Dump the output for debugging */
            echo '<pre>';
            print_r($result);
            echo '<br>--------------------------------<br>';
        } catch (AwsException $e) {
            // output error message if fails
            echo $e->getMessage() . "<br>";
        }

    }
}
