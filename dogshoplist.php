    <?php

       //getting products
        if($_POST['request'])
        {
            $request=$_POST['request'];
            if($request=="All")
            {
                $xml=simplexml_load_file("products.xml") or die("Error: Cannot create object");
                $products = $xml->xpath('/products/dogProducts');
                foreach($products as $product) 
                {                   
                    echo'<div class="col-sm-4 col-lg-3 col-md-3">
                            <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
                                <img src="'. $product->img .'" alt="" class="img-responsive" width="250px">
                                <h4 style="text-align:center;" class="none" >'.$product->Name .'</h4>
                                <p align="center"><strong> DETAILS: '. $product->Description .'</strong></p>
                                <h4 style="text-align:center;" class="text-danger" >Rs '. $product->Price .'</h4>
                                <form>
                                    <button type="button" class="btn btn-success" onclick="addTocart('. $product->id .')"style="margin-top:10px;position:relative;left:30%;">Add to Cart</button
                                </form>
                                
                            </div>
                        </div>';
                }
            }
            else
            {
                $xml = simplexml_load_file("products.xml");
                $products = $xml->xpath('/products/dogProducts[@category="'.$request.'"]');
                foreach($products as $product) 
                {                   
                    echo'<div class="col-sm-4 col-lg-3 col-md-3">
                            <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
                                <img src="'. $product->img .'" alt="" class="img-responsive" width="250px">
                                <h4 style="text-align:center;" class="none" >'. $product->Name .'</h4>
                                <p align="center"><strong> DETAILS: '. $product->Description .'</strong></p>
                                <h4 style="text-align:center;" class="text-danger" >Rs '. $product->Price .'</h4>
                                <form>
                                    <button type="button" class="btn btn-success" onclick="addTocart('. $product->id .')"style="margin-top:10px;position:relative;left:30%;">Add to Cart</button
                                </form>
                                
                            </div>
                        </div>';
                }
            }
        }   
    ?>