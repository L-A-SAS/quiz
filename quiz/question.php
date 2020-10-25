<?php
session_start();


    include("classes/connect.php");
    include("classes/signin.php");
    include("classes/user.php");
    include("classes/q-database.php");
    
   
    //check if signed in
    $signin = new Signin();
    $user_data = $signin->check_signin($_SESSION['doorban_userid']);

    //set question number
    $number = (int)$_GET['n'];

    //get question
    $query = "SELECT * FROM `questions` where question_number = $number";


    //get result
    $result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

    $question = $result->fetch_assoc();

     //get choice
     $query = "SELECT * FROM `choises` where question_number = $number";


     //get results
     $choises = $mysqli->query($query) or die ($mysqli->error.__LINE__);
    
     // get total questions
    $query = "SELECT * FROM `questions`";
    //get results
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
            <div class="current"> Question <?php echo $question['question_number'];?> of <?php echo $total;?></div>
            <p class="question">
                <?php echo $question['text'];?>
            </p>
            <form method="post" action="classes/process.php">
                <ul class="choises">
                <?php while($row = $choises->fetch_assoc()): ?>
                    <li><input name="choises" type="radio" value="<?php echo $row['id'];?>"/><?php echo $row['text'];?></li> 
                <?php endwhile;?>
              
                </ul>
                <input type="submit" value="Submit"/>
                <input type="hidden" name="number" value="<?php echo $number; ?>"/>
            </form>
            </div>
        </main>





<?php
include_once 'footer.php';

?>