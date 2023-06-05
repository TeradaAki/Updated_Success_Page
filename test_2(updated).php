<?php
require_once 'shared.php';

// Retrieve the payment intent from the query parameter
$paymentIntentId = $_GET['payment_intent'];
$paymentIntent = $stripe->paymentIntents->retrieve($paymentIntentId);

// Get the JSON data from the payment intent
$jsonData = json_encode($paymentIntent, JSON_PRETTY_PRINT);

// Empty the cart after successful checkout or clicking the "Back" button
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

	.modal-confirm {		
		color: #636363;
		width: 325px;
		margin: 30px auto;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h3 {
		text-align: center;
		font-size: 23px;
		margin: 30px 0 -15px;
	}
	.modal-confirm .form-control, .modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	/* .modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	 */
	/* .modal-confirm .modal-footer {
		border: none;
		text-align: center;
		border-radius: 5px;
		font-size: 13px;
	}	 */
	.modal-confirm .icon-box {
		color: #fff;		
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #82ce34;
		padding: 15px;
		text-align: center;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-confirm .icon-box i {
		font-size: 58px;
		position: relative;
		top: 3px;
	}
	.modal-confirm.modal-dialog {
		margin-top: 100px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #82ce34;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	/* .modal-confirm .btn:hover, .modal-confirm .btn:focus {
		background: #6fb32b;
		outline: none;
	} */
	/* .trigger-btn {
		display: inline-block;
		margin: 100px auto;
	} */

button {
  width: 125px;
  position: static;
}
</style>
</head>
<body>
<!-- Modal HTML -->
<div id="myModal" class="card">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h3 class="modal-title">Transaction Succeeded</h3>	
			</div>
			<div class="modal-body">
				<p class="text-center">Thank you for shopping with Chandelier. We appreciate your purchase. Your order receipt will be sent to your registered email address.</p>
			</div>
			<div class="modal-footer">
				<a href="https://gmail.com/"><button class="btn btn-success" type="button">View Email</button></a>
				<a href="/chandelier_sia-main/cart_view.php"><button class="btn btn-success" id="col">Back</button></a>
			</div>
		</div>
	</div>
</div>     
</body>
</html>                            