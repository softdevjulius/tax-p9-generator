<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//include_once('OAuth.php');
class TestController extends Controller
{
    public function pesapal()
    {
        include_once('OAuth.php');

//pesapal params
        $token = $params = NULL;

        /*
        PesaPal Sandbox is at https://demo.pesapal.com. Use this to test your developement and
        when you are ready to go live change to https://www.pesapal.com.
        */
        $consumer_key = env("PESAPAL_KEY");//Register a merchant account on
        //demo.pesapal.com and use the merchant key for testing.
        //When you are ready to go live make sure you change the key to the live account
        //registered on www.pesapal.com!
        $consumer_secret = env("PESAPAL_SECRET");// Use the secret from your test
        //account on demo.pesapal.com. When you are ready to go live make sure you
        //change the secret to the live account registered on www.pesapal.com!
        $signature_method = new \OAuthSignatureMethod_HMAC_SHA1();
        $iframelink = 'http://www.pesapal.com/API/PostPesapalDirectOrderV4';//change to
//        $iframelink = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4';//change to
        //https://www.pesapal.com/API/PostPesapalDirectOrderV4 when you are ready to go live!

//get form details
        $amount = $_POST['amount']??10;
        $amount = number_format($amount, 2);//format amount to 2 decimal places

        $desc = $_POST['description']??"";
        $type = $_POST['type']??"MERCHANT"; //default value = MERCHANT
        $reference = $_POST['reference']??time();//unique order id of the transaction, generated by merchant
        $first_name = $_POST['first_name']??"";
        $last_name = $_POST['last_name']??"";
        $email = $_POST['email']??"kimsonjulius1@gmail.com";
        $phonenumber = '0712782887';//ONE of email or phonenumber is required

        $callback_url = 'https://siniam.com'; //redirect url, the page that will handle the response from pesapal.

        $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"https://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"https://www.w3.org/2001/XMLSchema\" Amount=\"".$amount."\" Description=\"".$desc."\" Type=\"".$type."\" Reference=\"".$reference."\" FirstName=\"".$first_name."\" LastName=\"".$last_name."\" Email=\"".$email."\" PhoneNumber=\"".$phonenumber."\" xmlns=\"https://www.pesapal.com\" />";
        $post_xml = htmlentities($post_xml);

        $consumer = new \OAuthConsumer($consumer_key, $consumer_secret);


//post transaction to pesapal
        $iframe_src = \OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
        $iframe_src->set_parameter("oauth_callback", $callback_url);
        $iframe_src->set_parameter("pesapal_request_data", $post_xml);
        $iframe_src->sign_request($signature_method, $consumer, $token);


//display pesapal - iframe and pass iframe_src

return '<iframe src="'.$iframe_src.'" width="100%" height="700px"  scrolling="no" frameBorder="0">
            <p>Browser unable to load iFrame</p>
        </iframe>';
    }
    public function pesapal_old(Request $request)
    {
        $token = $params = NULL;
        $consumer_key = env("PESAPAL_KEY"); //Register a merchant account on
//demo.pesapal.com and use the merchant key for testing.
//When you are ready to go live make sure you change the key to the live
         //registered on www.pesapal.com!
$consumer_secret = env("PESAPAL_SECRET"); // Use the secret from your
// test account on demo.pesapal.com. When you are ready to go live make sure
 //change the secret to the live account registered on www.pesapal.com!
$signature_method = new \OAuthSignatureMethod_HMAC_SHA1();
$iframelink = 'http://pesapal.com/api/PostPesapalDirectOrderV4';


        $amount = $_POST['amount']??100;
        $amount = number_format($amount, 2);//format amount to 2 decimal places
        $desc = $_POST['description']??"";
        $type = $_POST['type']??"MERCHANT"; //default value = MERCHANT
        $reference = $_POST['reference']??uniqid();//unique order id of the transaction, generated
        $first_name = $_POST['first_name']??"Julius"; //[optional]
        $last_name = $_POST['last_name']??"Karanja"; //[optional]
        $email = $_POST['email']??"kimsonjulius1@gmail.com";
        $phonenumber = '';
        $callback_url = 'http://www.test.com/redirect.php';


        $post_xml = "<?xml version=\"1.0\" encoding=\"utf8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchemainstance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\"
Amount=\"".$amount."\" Description=\"".$desc."\" Type=\"".$type."\"
Reference=\"".$reference."\" FirstName=\"".$first_name."\"
LastName=\"".$last_name."\" Email=\"".$email."\"
PhoneNumber=\"".$phonenumber."\" xmlns=\"http://www.pesapal.com\" />";
        $post_xml = htmlentities($post_xml);

$consumer = new \OAuthConsumer($consumer_key, $consumer_secret);
//post transaction to pesapal
$iframe_src = \OAuthRequest::from_consumer_and_token($consumer, $token,
    "GET", $iframelink, $params);
$iframe_src->set_parameter("oauth_callback", $callback_url);
$iframe_src->set_parameter("pesapal_request_data", $post_xml);
$iframe_src->sign_request($signature_method, $consumer,
    $token);

echo '<iframe src="'.$iframe_src.'" width="100%"
height="620px" scrolling="auto" frameBorder="0">
<p>Unable to load the payment
page</p> </iframe>';
    }
}