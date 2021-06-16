<?php
	session_start();
	include ('backend/condb.php');
	$p_id =  mysqli_real_escape_string($con,$_GET['p_id']);
	$act = mysqli_real_escape_string($con,$_GET['act']);

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['pro'][$p_id]))
		{
			$_SESSION['pro'][$p_id]++;
		}
		else
		{
			$_SESSION['pro'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['pro'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['pro'][$p_id]=$amount;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
</head>

<body>
<form id="p_id" name="tbl_product" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>MY CART</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">PRODUCT</td>
      <td align="center" bgcolor="#EAEAEA">PRICE</td>
      <td align="center" bgcolor="#EAEAEA">TOTAL</td>
      <td align="center" bgcolor="#EAEAEA">TOTAL PRICE(VNG)</td>
      <td align="center" bgcolor="#EAEAEA">REMOVE</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['pro']))
{
	foreach($_SESSION['pro'] as $p_id=>$qty)
	{
		$sql = "SELECT * FROM tbl_product WHERE p_id = $p_id ";
  	$result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
		$sum = $row['p_price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["p_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["p_price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?p_id=$p_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>
<td><a href="product_detail.php">BACK</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="EDIT" />
    <input type="button" name="Submit2" value="ORDER" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
</body>
</html>