<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="MusclePharm Mauritian products">
        <meta name="keyword" content="MusclePharm, supplements, protein, mass gainer">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>
    <body>
        
    <div id="demo">
    </div>

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
                    list += '<option>' + x[i].getAttribute('category') + '</option>';
                }
                list += '</select>'
                document.getElementById("demo").innerHTML = list;
            }
        </script>
    </body>
</html>