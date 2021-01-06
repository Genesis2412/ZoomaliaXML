<?php

	session_start();

	$id=$_POST['id'];

    foreach($_SESSION["cart"] as $objects => $values)
    {
        if($values["item_id"]==$id)
        {            
            unset($_SESSION["cart"][$objects]); // unsetting the session for a product           
        }
    }

    $view="";

    if(!empty($_SESSION["cart"]))
	{  
        //viewing items in cart
        $total = 0;
        foreach($_SESSION["cart"] as $objects => $values)
        {
  			$view=$view."<tr>";
            $view=$view."<td><img src=".$values["item_image"]."></td>";
            $view=$view."<td>" .$values["item_name"]. "</td>";
            $view=$view."<td>" .$values["item_quantity"]. "</td>";
            $view=$view."<td>Rs" .$values["item_price"]. "</td>";
            $view=$view."<td>Rs" .number_format($values["item_quantity"] * $values["item_price"], 2). "</td>";
            $view=$view."<td><button type='button' class='btn btn-danger' onclick='deleteSession(".$values["item_id"].")'>Remove</button></td>";
            $view=$view."</tr>";
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
			$view=$view."<tr>";
            $view=$view."<td colspan='3' align='right'>Total</td>";
            $view=$view."<td align='right'>Rs" .number_format($total, 2). "</td>";
            $view=$view."<td></td>";
            $view=$view."</tr>";
        }
    }
    echo $view;    
?>