<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Table to display product details-->
		<div class="tableDisplay">
            <h2 style="margin-bottom: 40px;text-align: center;">Order Details</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                    </tr>
                    <?php
                    if(!empty($_SESSION["cart"]))
                    {
                        $total = 0;
                        foreach($_SESSION["cart"] as $objects => $values)
                        {
                    ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td>Rs <?php echo $values["item_price"]; ?></td>
                        <td>Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                    </tr>
                    <?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                        }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right">Rs <?php echo number_format($total, 2); ?></td>
                    </tr>
                    <?php
                    }
                    ?>                            
                </table>
            </div>
    
</body>
</html>