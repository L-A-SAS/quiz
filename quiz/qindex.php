<?php
session_start();

    include("classes/connect.php");
    include("classes/signin.php");
    include("classes/user.php");
    include("classes/q-database.php");
   
    $signin = new Signin();
    $user_data = $signin->check_signin($_SESSION['doorban_userid']);

    //get total questions *** change to get total q for this city 
    $query = "SELECT * FROM questions";
    //get result
    $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
    $total = $results->num_rows;

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
                <h2>City name :</h2> <?php echo $city?>
                <p>  discription </p>
                <ul>
                    <li> <strong>Number of Questions:</strong><?php echo $total;?></li>
                    <li> <strong>Type:</strong>Multiple choice</li>
                    <li> <strong>Estimated Time:</strong><?php echo $total * .5 ?> Minutes</li>
                </ul>
                <a href="question.php?n=1" class="start">Start</a>
            </div>
        </main>





<?php
include_once 'footer.php';

?>