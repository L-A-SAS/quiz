<?php
 include ('q-database.php'); 
 
?>
<?php session_start(); ?>


<?php

//check if score is set error hendler 
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0 ;
}


//check if submit
if ($_POST){
    $number = $_POST['number'];
    $selected_choise = $_POST['choises'];
    $next = $number + 1 ;


 // get total questions
$query = "SELECT * FROM `questions`";
//get results
$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$total = $results->num_rows;


//get correct choice
$query = "SELECT * FROM `choises` WHERE question_number = $number And is_corect = 1 ";

//get result
$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

//get row
$row = $result->fetch_assoc();

//set correct choice
$corect_choise = $row['id'];

//compare
if($corect_choise == $selected_choise){
    //answer is correct
    $_SESSION['score']++;
}

//check if last question
if($number == $total){
    header("Location: ../final.php");
    exit();
}
else{
header ("Location: ../question.php?n=".$next);
}

}