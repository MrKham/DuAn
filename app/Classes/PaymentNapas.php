<?php
namespace App\Classes;

use Uuid;
use Cache;
use Carbon\Carbon;
use GuzzleHttp\Client;


class PaymentNapas 
{
	private $url_gateway = 'https://payment.napas.com.vn/gateway/'; //https://sandbox.napas.com.vn/gateway/
	private $time_cache_expires = 15; //phút

	public function urlRedirectGateway($data) 
	{
		
		$secure_hash = config('services.napas.secure_hash');



		// $data = [
		// 	'vpc_Version' => '2.0', //
		// 	'vpc_Command' => 'pay',
		// 	'vpc_AccessCode' => 'ECAFAB', //
		// 	'vpc_MerchTxnRef' => $orderUuid,
		// 	'vpc_Merchant' => 'SMLTEST', //
		// 	'vpc_OrderInfo' => 'orderInfo', //
		// 	'vpc_Amount' => '5000000', //
		// 	'vpc_ReturnURL' => 'http://www.fundstart.vn', //
		// 	// 'vpc_BackURL' => 'http://www.fundstart.vn',
		// 	'vpc_Locale' => 'vn', //
		// 	'vpc_CurrencyCode' => 'VND',
		// 	// 'vpc_SecureHash' => 'D884F1353178B8A5B81D744C92B84773',
		// ];

		$data = [
			'vpc_AccessCode' => config('services.napas.access_code'),
			'vpc_Amount' => $data['vpc_Amount'],
			'vpc_BackURL' => $data['vpc_BackURL'],
			'vpc_Command' => 'pay',
			'vpc_CurrencyCode' => 'VND',
			'vpc_Locale' => 'vn',
			'vpc_MerchTxnRef' => $data['vpc_MerchTxnRef'],
			'vpc_Merchant' => config('services.napas.merchant'),
			'vpc_OrderInfo' => $data['vpc_OrderInfo'],
			'vpc_ReturnURL' => $data['vpc_ReturnURL'],
			'vpc_Version' => '2.0',
		];

		// ksort($data);
		// dd($data);

		$md5_input = $secure_hash . $data['vpc_AccessCode'] . $data['vpc_Amount'] . $data['vpc_BackURL'] . $data['vpc_Command'] . $data['vpc_CurrencyCode'] . $data['vpc_Locale'] . $data['vpc_MerchTxnRef'] . $data['vpc_Merchant'] . $data['vpc_OrderInfo'] . $data['vpc_ReturnURL'] . $data['vpc_Version'];

		$vpc_SecureHash = md5($md5_input);

		$data['vpc_SecureHash'] = strtoupper($vpc_SecureHash);

		// dd($data);







		$query_string = http_build_query($data);

		return $this->url_gateway . 'vpcpay.do?' . $query_string;

	}

	public function checkSecureHash($data) 
	{
		// dd($data);
		if ($data['vpc_SecureHash']) 
		{
			$secure_hash = config('services.napas.secure_hash');
			$vpc_SecureHash_in_response = $data['vpc_SecureHash'];
			unset($data['vpc_SecureHash']);

			$md5_input = $secure_hash;
			// dd($data);

			foreach ($data as $key => $value) 
			{
				$md5_input .= $value;
			}

			// $md5_input = $secure_hash . $data['vpc_AdditionalData'] . $data['vpc_Amount'] . $data['vpc_BatchNo'] . $data['vpc_CardType'] . $data['vpc_Command'] . $data['vpc_CurrencyCode'] . $data['vpc_Locale'] . $data['vpc_MerchTxnRef'] . $data['vpc_Merchant'] . $data['vpc_OrderInfo'] . $data['vpc_ResponseCode'] . $data['vpc_TransactionNo'] . $data['vpc_Version'];

			$vpc_SecureHash = strtoupper(md5($md5_input));

			if ($vpc_SecureHash == $vpc_SecureHash_in_response) 
			{
				return true;	
			}
			return false;
		}
		return false;
	}

	public function checkResponseCode($data) 
	{
		if (isset($data['vpc_ResponseCode']) && $data['vpc_ResponseCode'] === '0')
		{
			return true;
		}
		return false;
	}

	public function generateUUIDAndCache($data) 
	{
		$orderUuid = str_replace('-', '', Uuid::generate()->string);

		//put cache
		$expiresAt = Carbon::now()->addMinutes($this->time_cache_expires);
		Cache::put($orderUuid, $data, $expiresAt);

		return $orderUuid;
	}

	public function checkOrderValid($key) 
	{
		if (Cache::has($key)) 
		{
            return true;
        }
        return false;
	}

	public function paymentSuccess($key) 
	{
		if (Cache::has($key)) 
		{
            Cache::forget($key);
        }
	}

	public function refund($info) 
	{
		$secure_hash = config('services.napas.secure_hash');

		$data = [
			'vpc_AccessCode' => config('services.napas.access_code'),
			'vpc_Amount' => $this->tinhTongHoanTienTheoLoaiThe($info['vpc_CardType'], $info['vpc_Amount']),
			'vpc_Command' => 'refund',
			'vpc_CurrencyCode' => 'VND',
			'vpc_MerchTxnRef' => $info['vpc_MerchTxnRef'],
			'vpc_Merchant' => config('services.napas.merchant'),
			'vpc_Password' => config('services.napas.password'),
			'vpc_TransactionNo' => $info['vpc_TransactionNo'],
			'vpc_User' => config('services.napas.user'),
			'vpc_Version' => '2.0',
		];

		// ksort($data);
		// dd($data);

		$md5_input = $secure_hash . $data['vpc_AccessCode'] . $data['vpc_Amount'] . $data['vpc_Command'] . $data['vpc_CurrencyCode'] . $data['vpc_MerchTxnRef'] . $data['vpc_Merchant'] . $data['vpc_Password'] . $data['vpc_TransactionNo'] . $data['vpc_User'] . $data['vpc_Version'];

		$vpc_SecureHash = md5($md5_input);

		$data['vpc_SecureHash'] = strtoupper($vpc_SecureHash);

		$query_string = http_build_query($data);
		$url_request = $this->url_gateway . 'vpcdps?' . $query_string;

		// dd($url_request);

		$client = new Client();
        $response = $client->request('GET', $url_request, [
        	'http_errors' => false
        ]);
        // usleep(100000);

	}

	public function tinhTongHoanTienTheoLoaiThe($vpc_CardType, $vpc_Amount) 
	{
		if ($vpc_CardType == 'Visa' || $vpc_CardType == 'Mastercard' || $vpc_CardType == 'Amex' || $vpc_CardType == 'JCB')
		{
			return ($vpc_Amount - 14000) * 100;
		}
		else 
		{
			return ($vpc_Amount - 4000) * 100;
		}
	}
}