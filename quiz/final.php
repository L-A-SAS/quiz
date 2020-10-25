<?php
session_start();


    include("classes/connect.php");
    include("classes/signin.php");
    include("classes/user.php");
    
   
    $signin = new Signin();
    $user_data = $signin->check_signin($_SESSION['doorban_userid']);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8"/>
        <meta name="viewport" content="initial-scale=1.0">
        <title> </title>
        <link rel="stylesheet" href="css/qindex.css" type="text/css"/>
    </head>
    <body>
      
          <!--top bar-->
        <div>
            <?php include("header.php");?>

        </div>
 
        
        <main>
            <div class="container">
                <h2> You're Great !</h2>
                    <p>Congrats! You have completed this point</p>
                    <p>Final Score : <?php echo $_SESSION['score'];?></p>
                    <a href="question.php?n=1" class="start"> Take Again</a>
            </div>
        </main>





<?php
include_once 'footer.php';

?>