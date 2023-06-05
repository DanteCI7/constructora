<?php 
include_once('controllers/sistema.php');
$productName = "Cotización promedio";
$currency = "MXN";
$productPrice = 8;
$productId = 587965;
$orderNumber = 567;
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
 
<title>Ejemplo de paypal</title>
</head>

<body>
<div class="container">
    <h2>Cotización ejemplo paypal</h2>  
    <br>
    <table class="table">
        <tr>
          <td style="width:150px"><img src="images/logo_constructora.png" style="width:50px" /></td>
          <td style="width:150px"><?php echo $productPrice; ?> MXN</td>
          <td style="width:150px">
          <?php include 'paypalCheckout.php'; ?>
          </td>
        </tr>
    </table>    
</div>
</body>