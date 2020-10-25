<?php
session_start();

include("classes/connect.php");
include("classes/signin.php");
include("classes/user.php");
include("classes/qadd.php"); ?>
<?php 

   
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
                <h2>Add a question</h2>
             <?php
             if(isset($msg)){
                 echo'<p>'.$msg.'</p>';
             }
             ?>
                <form method="post" action="qadd.php">
                    <p>
                        <label>Question Number :</label>
                        <input type="number"  name="question_number" value="<?php echo $next ;?>"/>
                    </p>
                                  
                    <p>
                        <label>Question text :</label>
                        <input type="text" name="question_text"/>
                    </p>
                    <p>
                        <label>choice #1 :</label>
                        <input type="text" name="choice1"/>
                    </p>
                    <p>
                        <label>choice #2 :</label>
                        <input type="text" name="choice2"/>
                    </p>
                    <p>
                        <label>choice #3 :</label>
                        <input type="text" name="choice3"/>
                    </p>
                    <p>
                        <label>choice #4 :</label>
                        <input type="text" name="choice4"/>
                    </p>
                    <p>
                        <label>choice #5 :</label>
                        <input type="text" name="choice5"/>
                    </p>
                    <p>
                        <label>correct choice number :</label>
                        <input type="number" name="correct_choice"/>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Submit"/>
                    </p>
                </form>
            </div>
        </main>





<?php
include_once 'footer.php';

?>