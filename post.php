
<table>
<tr>
<th style="text-align:left;"><strong>ID</strong></th>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Quantity</strong></th>
</tr>	
<?php 
session_start();

//print_r($_SESSION);


if(!empty($_SESSION['shopping_cart'])) {
    $total = 0;
    foreach ($_SESSION['shopping_cart'] as $item){
		?>
          <tr><td><?php echo $item["item_id"]; ?></strong></td>
				<td><?php echo $item["item_name"]; ?></td>
				<td><?php echo $item["item_price"]; ?></td>
				<td><?php echo "$".$item["item_quantity"]; ?></td>
				</tr>
				<?php
				  $total += ($item["item_price"]*$item["item_quantity"]);
		}
	 date_default_timezone_set("Africa/Nairobi");
$e=date("h:i:sa:d:m:y");
		 $conn = mysqli_connect('localhost','root','','cart');
		 
		 foreach($_SESSION["shopping_cart"]  as $item){
			 
$query =mysqli_query($conn,"INSERT INTO sales (itemid,name,price,quantity,cost,date) 
VALUES('$item[item_id]','$item[item_name]','$item[item_price]','$item[item_quantity]','$total','$e')"); 
    
	}
	
} else {  echo '<script>function Redirect(){  window.location="index.php"; } document.write("No item selected.");
setTimeout("Redirect()", 1000); </script>';   }
 unset($_SESSION["shopping_cart"]);
 echo '<script>function Redirect(){  window.location="index.php"; } document.write("Your order submitted.");
setTimeout("Redirect()", 1000); </script>';   
		?>

</table>
		 

		 
		 