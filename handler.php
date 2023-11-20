<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
//Get the input from the form, and sanitize it!
$num01 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
$num02 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
$operator = htmlspecialchars($_POST["operator"]); 

//Error handling!
$violation = false;

if(empty($num01) or empty($num02) or empty($operator)){
    $violation = true; 
    echo "Please fill out all fields!";
    sleep(1);
    header("Location: ../index.php");
    die(); //If it fails to redirect.
}

if(!is_numeric($num01) or !is_numeric($num02)){
    $violation = true;
    echo "Please enter ONLY numbers!";
    sleep(1);
    header("Location: ../index.php");
    die(); //If it fails to redirect.
}

//If we passed all checks, calculate!
if(!$violation){
    switch($operator){
        case "add": 
            $result = $num01 + $num02;
            echo $result;
        break;

        case "subtract": 
            $result = $num01 - $num02; 
            echo $result;
        break;

        case "multiply":
            $result = $num01 * $num02;
            echo $result;
        break;

        case "divide": 
            $result = $num01 / $num02;
            echo $result;
        break;
    }
}
}
else{
    if($_SERVER["REQUEST_METHOD"] !== "POST"){
        header("Location: ../index.php");
        die(); //If it fails to redirect.
    }
}
?>
