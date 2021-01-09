<?php
    session_start();
    //if(isset($_SESSION['adminName']))
    //{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/adminLoginRegister.css">
        <title>Register</title>   

        <script type="text/javascript">
                //validate whether email is taken or not
                function ajax() {
                    
                    var hr=new XMLHttpRequest();
                    var url="adminRegisterCheck.php";
                    var umail=document.getElementById("uemail").value;
                    var vars="email="+umail;

                    hr.open("POST",url,true);
                    hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    hr.onreadystatechange=function(){
                        if(hr.readyState==4 && hr.status==200){
                            document.getElementById("errorRegister").innerHTML=hr.responseText;
                        }
                    }

                    hr.send(vars);
                    document.getElementById("errorRegister").innerHTML="processing.....";
                } 
        </script>
    </head>
    <body>
        <div class="hero">
            <div class="close">
                <a href="adminPage.php" id="close-btn"><img src="./img/cross-button.png"></a>
            </div>
            <div class="form-box">

                <div id="title">
                    <h2>Add Admin</h2>
                </div>           

                <!--Display message-->
                <div id="errorRegister">                
                </div>

                <form id="register" class="inputRegister" method="POST" action="adminRegisterCheck.php">
                        <input type="text" class="input-field" name="fName" placeholder="Enter Firstname" required>
                        <input type="text" class="input-field" name="lName" placeholder="Enter Lastname" required>
                        <input type="email" class="input-field" name="email" placeholder="Enter Email" id="uemail" onblur="ajax()" required>
                        <input type="password" class="input-field" name="pwd1" placeholder="Enter Password" required>
                        <button type="submit" id="submitReg" name="submitBtn">Add</button>
                </form>

                <div id="logo">
                    <img src="./img/logo.svg" alt="Zoomalia Logo">
                </div>
            </div>        
        </div>
    </body>
</html>
<?php
//}
?>