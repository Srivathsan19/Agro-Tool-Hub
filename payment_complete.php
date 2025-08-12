<?php
ini_set('display_errors', 1);
include './header.php';

echo '<b>Transaction In Process, Please do not reload</b>';

$payment_mode=$_POST['mode'];
$pay_id=$_POST['mihpayid'];
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$MERCHANT_KEY = "oZ7oo9"; 
$SALT = "UkojH5TS";
$udf5='';
$keyString 	= $MERCHANT_KEY .'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
$keyArray 	= explode("|",$keyString);
$reverseKeyArray = array_reverse($keyArray);
$reverseKeyString =	implode("|",$reverseKeyArray);
$saltString     = $SALT.'|'.$status.'|'.$reverseKeyString;
$sentHashString = strtolower(hash('sha512', $saltString));

print_r($sentHashString);
print_r($posted_hash);

if($sentHashString != $posted_hash){
    mysqli_query($db,"update `order` set payment_status='$status', mihpayid='$pay_id' where txnid='$txnid'");	
    ?>
    <script>
        window.location.href='./success.php';
    </script>
    <?php	
}else{
    mysqli_query($db,"update `order` set payment_status='$status', mihpayid='$pay_id' where txnid='$txnid'");
    ?>
    <script>
        window.location.href='./success.php';
    </script>
    <?php	
}
?>