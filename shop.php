<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="shop.css">
            <title>PRODUCTS || EMPIRE FITNESS</title> 
    </head>
    <body>

        <!--Select List-->
        <div id="selectList">
        </div>
        
        <!--Display Products-->    
        <div class="productDisplay">
            <div class="col-md-12">
                <div id="productContainer"> 
                    <?php
                    $xml=simplexml_load_file("shoplist.xml") or die("Error: Cannot create object");
                    foreach($xml->children() as $product) 
                    {                   
                        echo'<div class="col-sm-4 col-lg-3 col-md-3">
                                <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
                                    <img src="'. $product->img .'" alt="" class="img-responsive" width="250px">
                                    <h4 style="text-align:center;" class="none" >'.$product->name .'</h4>
                                    <p align="center"><strong> TYPE: '. $product->description .'</strong></p>
                                    <h4 style="text-align:center;" class="text-danger" >Rs '. $product->price .'</h4>
                                    <form>
                                        <button type="button" class="btn btn-success" onclick="addTocart('. $product->id .')"style="margin-top:10px;position:relative;left:30%;">Add to Cart</button
                                    </form>
                                    
                                </div>
                            </div>';
                    }        
                    ?>
                </div>
            </div>
        </div>

        <div style="clear:both"></div>

        <!--Getting all the category type of the products-->
        <script type="text/javascript">
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myFunction(this);
            }
            };
            xhttp.open("GET", "shoplist.xml", true);
            xhttp.send();

            function myFunction(xml) {
                var x, i;
                var xmlDoc = xml.responseXML;
                var list='<select id="list"><option value="SELECT TYPE" disabled selected="selected">SELECT CATEGORY</option><option value="All">All</option>'
                x = xmlDoc.getElementsByTagName('product');
                for (i = 0; i < x.length; i++) 
                {
                    var attribute = ''; 
                    attribute = x[i].getAttribute('category');
                    list += '<option>' + attribute + '</option>';
                }
                list += '</select>';
                document.getElementById("selectList").innerHTML = list;
            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!--AJAX Get Products On Selection Change-->
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#list").on('change',function()
                {
                    var value=$(this).val();
                    //alert(value);
                    $.ajax(
                    {
                        url:'shoplist.php',
                        type:'POST',
                        data:'request='+value,
                        beforeSend:function()
                        {
                            $("#productContainer").html()
                        },
                        success:function(data)
                        {
                            $("#productContainer").html(data)
                        }
                    });                    
                });
                
            });
        </script>

</body>
</html>