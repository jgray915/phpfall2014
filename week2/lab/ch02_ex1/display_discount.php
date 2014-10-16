<?php
            
    $product_description = filter_input(INPUT_POST, "product_description");
    $list_price = filter_input(INPUT_POST, "list_price");
    $discount_percent = filter_input(INPUT_POST, "discount_percent");
    $discount = $list_price*($discount_percent/100);
    $discount_price = $list_price*(1-$discount);

    $list_price_formatted = "$".$list_price;
    $discount_percent_formatted = $discount_percent."%";
    $discount_formatted = "$".$discount;
    $discount_price_formatted = "$".$discount_price;
            
    if(empty($product_description))
    {
        $errMsg = "Must enter a prouct description.";
    }
    else if (!is_numeric($list_price))
    {
        $errMsg = "Must enter a valid list price.";
    }
    else if (!is_numeric($discount_percent))
    {
        $errMsg = "Must enter a valid discount percent.";
    }
        // set error message to empty string if no invalid entries
    else {
        $errMsg = ''; }

    // if an error message exists, go to the index page
    if ($errMsg != '') {
        include('index.php');
        exit();
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div id="content">
        <h1>Product Discount Calculator</h1>
        
        <label>Product Description:</label>
        <span><?php echo $product_description ?></span><br />

        <label>List Price:</label>
        <span><?php echo $list_price_formatted; ?></span><br />

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br />

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span><br />

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span><br />

        <p>&nbsp;</p>
    </div>
</body>
</html>