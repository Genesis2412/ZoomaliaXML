<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/dogCat.css">
    </head>
    <body>
        <?php
            //connection to database
            include('connection.php');

            //selecting cat where adopted is NO
            $query="SELECT * FROM cat WHERE Status LIKE '%No%'";
            $result=mysqli_query($connection,$query);
            $count=1;

            //getting data from database
            if(mysqli_num_rows($result)>0)
            {
                //display in a table
                echo '<table align="center" cellspacing="15"><tr>';
                while($row=mysqli_fetch_assoc($result))
                    {   
                        //to display only 3 column on one row
                        if($count<=3)
                        {
                            echo '<td>';
                            echo '<div class="container">';
                            echo '<img src="'.$row['Image'].'" class="image">';
                            echo '<div class="overlay">';
                            echo '<div class="text">Name: '.$row['Name'].'<br>'.'Breed: '.$row['Breed'].'<br>'.'ID: '.$row['CatId'].'</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<a href="adopt_form.php" target="blank"><button class="button">ADOPT</button></a>';
                            echo '</td>';
                            $count++;
                        }
                        else
                        {   
                            //changing row
                            $count=2;
                            echo '</tr><tr>';
                            echo '<td>';
                            echo '<div class="container">';
                            echo '<img src="'.$row['Image'].'" class="image">';
                            echo '<div class="overlay">';
                            echo '<div class="text">Name: '.$row['Name'].'<br>'.'Breed: '.$row['Breed'].'<br>'.'ID: '.$row['CatId'].'</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<a href="adopt_form.php" target="blank"><button class="button">ADOPT</button></a>';
                            echo '</td>';                      
                        }
                    }
                    echo "</table>";
                }
        ?>
    </body>
</html>
