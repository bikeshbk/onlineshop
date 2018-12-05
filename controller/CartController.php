<?php 
	
	class CartController extends Controller
	{		
		function __construct()
		{
			$this->category=$this->loadModel('category',true);
			$this->product=$this->loadModel('product',true);
			$this->cart=$this->loadModel('cart');
			$this->order=$this->loadModel('order');
			$this->orderdetail=$this->loadModel('orderdetail');
			SessionHelper::init();
			$this->cart->session_id=session_id();
			$this->cartList=$this->cart->selectAllCartItem();
			$this->clist=$this->category->getByActiveCategory();
			$this->sclist=$this->category->getByActiveSubcategory();

		}
		function add()
		{
			if (isset($_POST['btnCart'])) {
				extract($_POST);
				@session_start();
				$this->cart->product_id=$product_id;
				$this->cart->quantity=$quantity;
				$this->cart->color=$color;
				$this->cart->size=$size;
				$this->cart->price=$price;
				$this->cart->discount=$discount;
				$this->cart->session_id=session_id();
				if (isset($_SESSION['customer_id'])) {
				$this->cart->customer_id = $_SESSION['customer_id'];
				}				
				$ci=$this->cart->selectCartItem();
				$q=$quantity+$ci[0]->quantity;
				echo $q;
				if (count($ci)==1){
					$this->cart->id=$ci[0]->id;
					$this->cart->quantity=$q;					
					$result=$this->cart->updateCartQuantity();
					if ($result) {
						SessionHelper::set('success_message','Successfully Updated Cart');
					}else{
						SessionHelper::set('error_message','Fail Update Cart ');
						}
				}else{
					$result=$this->cart->create();
					if ($result) {
						SessionHelper::set('success_message','Successfully Added Cart');
					}else{
						SessionHelper::set('error_message','Fail Add Cart ');
					}				
				}		
				
				
				$this->product->id=$product_id;
				$productList=$this->product->selectById();
				$path="dashboard/product/".$productList[0]->slug.'-'.$productList[0]->id.'.html';
				$this->redirect($path);
			}
			
		}
		function index()
		{			
			$this->title="Cart List";
			if (isset($_POST['btnDeleteCart'])) {
				$this->cart->id=$_POST['id'];
				$result=$this->cart->deleteCartById();
				if ($result) {
						SessionHelper::set('success_message','Successfully Deleted Cart');
					}else{
						SessionHelper::set('error_message','Fail Delete Cart ');
				}
				$this->redirect('cart/index');
			}
			if (isset($_POST['btnUpdateCart'])) {
				$this->cart->id=$_POST['id'];
				$this->cart->quantity=$_POST['quantity'];
				$result=$this->cart->updateCartQuantity();
				if ($result) {
						SessionHelper::set('success_message','Successfully Updated Cart');
					}else{
						SessionHelper::set('error_message','Fail Update Cart ');
				}
				$this->redirect('cart/index');
			}

			$this->loadView("cart/cart");
			
		}
		function checkout()
		{

			if (!isset($_SESSION['customer_id'])) {
				$this->redirect('customer/login');
			}
			//start session in all pages
			if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
			//if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

			$PayPalMode         = 'sandbox'; // sandbox or live
			$PayPalApiUsername  = 'kojubikesh1224-facilitator_api1.gmail.com'; //PayPal API Username
			$PayPalApiPassword  = '5SCYEAJ7K9KL8EJS'; //Paypal API password
			$PayPalApiSignature     = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AUUSrZF5gz6cstyHlobiGH6HiBik'; //Paypal API Signature
			$PayPalCurrencyCode     = 'USD'; //Paypal Currency Code
			$PayPalReturnURL    = base_url() . 'cart/checkout'; //Point to process.php page
			$PayPalCancelURL    = base_url() . 'cart/checkout'; //Cancel URL if user clicks cancel
			
			$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';
			$name = 'ItemName';
			$price = "ItemPrice";
			$num = "ItemNumber";
			$desc = "ItemDesc";
			$qty = "ItemQty";
			$totalpr = "TotalPrice";
			if (isset($_POST['btnCheckout'])) {
				$total = $_POST['numItem'] + 1;
				$ItemTotalPrice = 0;
				for($i=1; $i < $total; $i++){
		
					${$name.$i} = $_POST['itemnames'.$i]; //$ItemName2
				   ${$price.$i} = $_POST['itemprices'.$i];
				   ${$num.$i} = $_POST['itemnumbers'.$i];
				   ${$qty.$i} = $_POST['itemQtys'.$i];
				   ${$desc.$i} = $_POST['itemdescs'.$i];
				   ${$totalpr.$i} = ${$price.$i} * ${$qty.$i} ;
				   $ItemTotalPrice = $ItemTotalPrice + ${$totalpr.$i}; 	  
				}
				$TotalTaxAmount 	= 0.13;  //Sum of tax for all items in this order. 
				$HandalingCost 		= 0.07;  //Handling cost for this order.
				$InsuranceCost 		= 0.05;  //shipping insurance cost for this order.
				$ShippinDiscount 	= -0.05; //Shipping discount for this order. Specify this as negative number.
				$ShippinCost 		= 0.05; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
				$GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);

				$padata = 	'&METHOD=SetExpressCheckout'.
					'&RETURNURL='.urlencode($PayPalReturnURL ).
					'&CANCELURL='.urlencode($PayPalCancelURL).
					'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE");
					$padataRaw ="";
					for($i=0; $i < ($total-1) ; $i++){
						$j = $i+1;
						$padataRaw = $padataRaw . '&L_PAYMENTREQUEST_0_NAME'. $i .'='.urlencode(${$name.$j}).
														  '&L_PAYMENTREQUEST_0_NUMBER'. $i .'='.urlencode(${$num.$j}).
														  '&L_PAYMENTREQUEST_0_DESC'. $i .'='.urlencode(${$desc.$j}).
														  '&L_PAYMENTREQUEST_0_AMT'. $i .'='.urlencode(${$price.$j}).
														  '&L_PAYMENTREQUEST_0_QTY'. $i .'='.urlencode(${$qty.$j});
						$_SESSION[$name.$j] 			=  ${$name.$j}; //Item Name
						$_SESSION[$price.$j] 			=  ${$price.$j}; //Item price
						$_SESSION[$num.$j] 			=  ${$num.$j}; //Item number
						$_SESSION[$desc.$j] 			=  ${$desc.$j}; //Item description
						$_SESSION[$qty.$j] 			=  ${$qty.$j}; //Item quantity
						$_SESSION[$totalpr.$j] 			=  ${$totalpr.$j}; //Item totalPrice
						
					}
					$padata = $padata.$padataRaw . '&NOSHIPPING=0'. //set 1 to hide buyer's shipping address, in-case products that does not require shipping	
					'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
					'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
					'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
					'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
					'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
					'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
					'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
					'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
					'&LOCALECODE=GB'. //PayPal pages to match the language on your website.
					'&LOGOIMG=http://www.sanwebe.com/wp-content/themes/sanwebe/img/logo.png'. //site logo
					'&CARTBORDERCOLOR=FFFFFF'. //border color of cart
					'&ALLOWNOTE=1';
					
					
					############# set session variable we need later for "DoExpressCheckoutPayment" #######
					$_SESSION['ItemTotalPrice'] 	=  $ItemTotalPrice; //(Item Price x Quantity = Total) Get total amount of product; 
					$_SESSION['TotalTaxAmount'] 	=  $TotalTaxAmount;  //Sum of tax for all items in this order. 
					$_SESSION['HandalingCost'] 		=  $HandalingCost;  //Handling cost for this order.
					$_SESSION['InsuranceCost'] 		=  $InsuranceCost;  //shipping insurance cost for this order.
					$_SESSION['ShippinDiscount'] 	=  $ShippinDiscount; //Shipping discount for this order. Specify this as negative number.
					$_SESSION['ShippinCost'] 		=   $ShippinCost; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
					$_SESSION['GrandTotal'] 		=  $GrandTotal;
					$_SESSION["total_num_item"] 			=  $total;
					//$paypal= new MyPayPal();
					$httpParsedResponseAr = $this->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
					
					if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
						{

					//Redirect user to PayPal store with Token received.
				 	$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
					header('Location: '.$paypalurl);
				 
					}else{
						//Show error message
						// echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
						// echo '<pre>';
						// print_r($httpParsedResponseAr);
						// echo '</pre>';
				}
			}
			if(isset($_GET["token"]) && isset($_GET["PayerID"])) {
				//we will be using these two variables to execute the "DoExpressCheckoutPayment"
				//Note: we haven't received any payment yet.
				//print_r($_SESSION);
				$token = $_GET["token"];
				$payer_id = $_GET["PayerID"];
				$padata = "";
				$padata = 	'&TOKEN='.urlencode($token).
							'&PAYERID='.urlencode($payer_id).
							'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE");	
				$padataRaw ="";
				$total = $_SESSION["total_num_item"];
				for($i=0; $i < ($total-1) ; $i++){
					$j = $i+1;
					
					${$name.$j} = $_SESSION["ItemName".$j];
					${$price.$j} = $_SESSION["ItemPrice".$j];
					${$qty.$j} = $_SESSION["ItemQty".$j];
					${$desc.$j} = $_SESSION["ItemDesc".$j];
					${$totalpr.$j} = $_SESSION["TotalPrice".$j];
					${$num.$j} = $_SESSION["ItemNumber".$j];
					$padataRaw = $padataRaw . '&L_PAYMENTREQUEST_0_NAME'. $i .'='.urlencode(${$name.$j}).
													  '&L_PAYMENTREQUEST_0_NUMBER'. $i .'='.urlencode(${$num.$j}).
													  '&L_PAYMENTREQUEST_0_DESC'. $i .'='.urlencode(${$desc.$j}).
													  '&L_PAYMENTREQUEST_0_AMT'. $i .'='.urlencode(${$price.$j}).
													  '&L_PAYMENTREQUEST_0_QTY'. $i .'='.urlencode(${$qty.$j});
					
				}
				$ItemTotalPrice 	= $_SESSION['ItemTotalPrice']; //(Item Price x Quantity = Total) Get total amount of product; 
				$TotalTaxAmount 	= $_SESSION['TotalTaxAmount'] ;  //Sum of tax for all items in this order. 
				$HandalingCost 		= $_SESSION['HandalingCost'];  //Handling cost for this order.
				$InsuranceCost 		= $_SESSION['InsuranceCost'];  //shipping insurance cost for this order.
				$ShippinDiscount 	= $_SESSION['ShippinDiscount']; //Shipping discount for this order. Specify this as negative number.
				$ShippinCost 		= $_SESSION['ShippinCost']; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
				$GrandTotal 		= $_SESSION['GrandTotal'];
				
				$padata = $padata.$padataRaw. '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
							'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
							'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
							'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
							'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
							'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
							'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
							'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);
					
			//$paypal= new MyPayPal();
			$httpParsedResponseAr = $this->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

			#################3Start test ok ########################
			if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
			{
				$id = urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);

				echo '<h2>Success</h2>';
				$trnsid = urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
				echo 'Your Transaction ID : '.urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
				
					/*
					//Sometimes Payment are kept pending even when transaction is complete. 
					//hence we need to notify user about it and ask him manually approve the transiction
					*/
					
					if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
					{
						echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
					}
					elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
					{
						echo '<div style="color:red">Transaction Complete, but payment is still pending! '.
						'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
					}

					// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
					// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
					$padata = 	'&TOKEN='.urlencode($token);
					//$paypal= new MyPayPal();
					$httpParsedResponseAr = $this->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

					if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
					{
						//print_r($_SESSION);
						//echo '<br /><b>Stuff to store in database :</b><br />';
						$this->order->transaction_id = $trnsid;
						$this->order->custumer_id = SessionHelper::get('customer_id');
						$this->order->order_date = date('Y-m-d H:i:s');
						$this->order->status = 'Order Placed';
						$this->order->total_amount = SessionHelper::get('GrandTotal');
						$status = $this->order->saveOrder();
						if ($status) {
							$this->orderdetail->order_id = $status;
							$this->cart->session_id = session_id();
							$cartitem = $this->cart->getAllCartItem();
							foreach($cartitem as $ci){
								$this->orderdetail->product_id = $ci->product_id;
								$this->orderdetail->price = $ci->price;
								$this->orderdetail->color = $ci->color;
								$this->orderdetail->size = $ci->size;
								$this->orderdetail->quantity = $ci->quantity;
								$this->orderdetail->discount = $ci->discount;
								$st = $this->orderdetail->saveOrderDetails();
								if ($st) {
									$this->cart->id = $ci->id;
									$this->cart->deleteCartItem();
									$this->product->stock = $ci->stock-$ci->quantity;
									$this->product->id = $ci->product_id;
									$this->product->updateStock();
								}
							}
						}
						//email code
						$this->redirect('cart/index');
						
						
					} else  {
						// echo '<div style="color:red"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
						// echo '<pre>';
						// print_r($httpParsedResponseAr);
						// echo '</pre>';

					}
		
				}else{
					// echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
					// echo '<pre>';
					// print_r($httpParsedResponseAr);
					// echo '</pre>';
				}
		
			}

			$this->title = "Cart Checkout";
			$this->loadView('cart/checkout');
		}

			function PPHttpPost($methodName_, $nvpStr_, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode) 
			{
				// Set up your API credentials, PayPal end point, and API version.
				$API_UserName = urlencode($PayPalApiUsername);
				$API_Password = urlencode($PayPalApiPassword);
				$API_Signature = urlencode($PayPalApiSignature);
				
				$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';
		
				$API_Endpoint = "https://api-3t".$paypalmode.".paypal.com/nvp";
				$version = urlencode('109.0');
			
				// Set the curl parameters.
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
				curl_setopt($ch, CURLOPT_VERBOSE, 1);
			
				// Turn off the server and peer verification (TrustManager Concept).
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
			
				// Set the API operation, version, and API signature in the request.
				$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";
			
				// Set the request as a POST FIELD for curl.
				curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
			
				// Get response from the server.
				$httpResponse = curl_exec($ch);
			
				if(!$httpResponse) {
					exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
				}
			
				// Extract the response details.
				$httpResponseAr = explode("&", $httpResponse);
			
				$httpParsedResponseAr = array();
				foreach ($httpResponseAr as $i => $value) {
					$tmpAr = explode("=", $value);
					if(sizeof($tmpAr) > 1) {
						$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
					}
				}
			
				if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
					exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
				}			
				return $httpParsedResponseAr;
			}
	}
?>