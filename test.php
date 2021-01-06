<?php
    include('test.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="MusclePharm Mauritian products">
        <meta name="keyword" content="MusclePharm, supplements, protein, mass gainer">
        <meta charset="UTF-8">
        <script src="jquery-3.5.1.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>
    <body>

        <select id="list">
            <option value="Hello">Hello</option>
            <option value="Dress">Namaste</option>
            <option value="House">Bonjour</option>
        </select>

        <div id="productContainer"></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!--AJAX Get Products-->
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#list").on('change',function()
                {
                    var value=$(this).val();
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