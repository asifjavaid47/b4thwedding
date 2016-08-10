<?php
$cardnumber		=	$info['creditCardNumber'];
$expireMonth	=	$info['creditCardExpiremonth'];
$expireyear		=	$info['creditCardExpireyear'];
$cvv 			=	$info['cvv'];
// $cvv 			=	"012";
$fName			=	$info['fName'];
$lName			=	$info['lName'];
$amountForPay	=	$info['amount'];
$userID			=	$info['userID'];
// # CreatePaymentSample
//
// This sample code demonstrate how you can process
// a direct credit card payment. Please note that direct 
// credit card payment and related features using the 
// REST API is restricted in some countries.
// API used: /v1/payments/payment

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\CreditCard;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Transaction;

// ### CreditCard
// A resource representing a credit card that can be
// used to fund a payment.
$card = new CreditCard();
$card->setType("visa")
    ->setNumber($cardnumber)	//4417119669820331
    ->setExpireMonth($expireMonth)			//11
    ->setExpireYear($expireyear)			//2019
    ->setCvv2($cvv)				//012
    ->setFirstName($fName)			//Joe
    ->setLastName($lName);		//Shopper

// ### FundingInstrument
// A resource representing a Payer's funding instrument.
// For direct credit card payments, set the CreditCard
// field on this object.
$fi = new FundingInstrument();
$fi->setCreditCard($card);

// ### Payer
// A resource representing a Payer that funds a payment
// For direct credit card payments, set payment method
// to 'credit_card' and add an array of funding instruments.
$payer = new Payer();
$payer->setPaymentMethod("credit_card")
    ->setFundingInstruments(array($fi));

// ### Itemized information
// (Optional) Lets you specify item wise
// information
/*$item1 = new Item();
$item1->setName('Ground Coffee 40 oz')
    ->setDescription('Ground Coffee 40 oz')
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setTax('0.30')
    ->setPrice('7.50');
$item2 = new Item();
$item2->setName('Granola bars')
    ->setDescription('Granola Bars with Peanuts')
    ->setCurrency('USD')
    ->setQuantity(5)
    ->setTax('0.20')
    ->setPrice('2.00');*/

/*$itemList = new ItemList();
$itemList->setItems(array($item1, $item2));*/

// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
/*$details = new Details();
$details->setShipping('1.20')
    ->setTax('1.30')
    ->setSubtotal('17.50');*/

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
$amount = new Amount();
$amount->setCurrency("USD")
    ->setTotal($amountForPay);

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setDescription("Payment deosit");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to sale 'sale'
$payment = new Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setTransactions(array($transaction));

// ### Create Payment
// Create a payment by calling the payment->create() method
// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
// The return object contains the state.
try {
     $msg = $payment->create($apiContext);

	if($msg)
	{
		$transaction_id = $payment->getId();
		// redirect(base_url() . 'home', 'refresh');
		
	
	
			$paypal_info = array(
				'creditCardNumber' 		=> $cardnumber,	
				'amount' 				=> $amountForPay,	
				'transactionID'			=> $transaction_id,
				'userID'				=> $userID,
				'type'					=> 'paypal',
				'purpose' 				=> 'deposit',
				'transactionDate'		=> date('Y-m-d')
								
			);
		session_start();
		$_SESSION['payinfo'] = $paypal_info;
		header('Location: '.base_url().'paypal/add_paypal_payment');
		// $query = mysql_query("INSERT INTO tbl_transaction_history (transactionID, userID, creditCardNumber, creditCardExpireDate, amount, type,  transactionDate)
								// VALUES ($transaction_id , $userID, '12121212', '12', '12', 'paypal',  '2014-12-19')");
		// if($query)
		// {
			// echo"<h1>okokokokokokoko</h1>";
		// }	
		// else
		// {
					// echo"<h1>errror</h1>";
		// }
		
	}
	else 
	{
			echo"<h1>errror of paypal </h1>";
	}
	
} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}
?>
