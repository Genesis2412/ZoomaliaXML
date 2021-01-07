<?php 
    session_start();

    $id=$_POST["id"];
    $quantity=1;

    $xml=simplexml_load_file("products.xml");
    $products= $xml->xpath('/products/catProducts[id="'. $id .'"]');
    foreach($products as $product) 
    { 
        if($product != '')
        {
            $idnum = (string)$product->id;
            $name = (string)$product->Name;
            $img = (string)$product->img;
            $price = (string)$product->Price;

            if(isset($_SESSION["cart"])) //checking session
            {
                $item_array_id = array_column($_SESSION["cart"], "item_id");
                if(!in_array($idnum, $item_array_id))
                {
                    //counting number of sessions
                    $count = count($_SESSION["cart"]);
                    $item_array = array('item_id'=>$idnum,'item_image'=>$img,'item_name'=>$name,'item_price'=>$price,'item_quantity'=>$quantity);

                    $_SESSION["cart"][$count] = $item_array;
                }
                else
                {  
                    $item_array_id = array_column($_SESSION["cart"], "item_id");
                    $count = array_search($id,$item_array_id);

                    $carts=$_SESSION["cart"];
                    $sum=$carts[$count]['item_quantity'];

                    $sum++;

                    $item_array = array('item_id'=>$idnum,'item_image'=>$img,'item_name'=>$name,'item_price'=>$price,'item_quantity'=>$sum);
                    $_SESSION["cart"][$count] = $item_array;                   
                }
            }
            else
            {
                //initialising data in array
                $item_array = array('item_id'=>$idnum,'item_image'=>$img,'item_name'=>$name,'item_price'=>$price,'item_quantity'=>$quantity);

                //creating a session of array
                $_SESSION["cart"][0]=$item_array;

                $item_array_quantity = array_column($_SESSION["cart"], "item_quantity");
                $sum = array_search($id,$item_array_quantity);                 
            }
        }
        
    } 
   
?>