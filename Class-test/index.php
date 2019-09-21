<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require_once('constant.php') ?>
    <?php
    $Balance = 25000;
    if(isset($_POST['submit'])){ 
        if($_POST['choose'] == "Check Balance"){
            CheckBalance();
        }
        elseif($_POST['choose'] == "Deposit"){
            Deposit($_POST['userValue']);
        }
        elseif($_POST['choose'] == "Withdraw"){
            withdrawal($_POST['userValue']);
        }
        
    }
    function CheckBalance(){
        global  $Balance ;
        echo "Your current balance is " . $Balance;
    } 
   
    function Deposit(){
        global $Balance ;
        if(empty(trim($_POST['userValue']))){
            echo "Please enter an amount";
        }
        else{
            $Balance += ($_POST['userValue']);
            echo $Balance;
        }
    }

    function withdrawal($userAmount){
        global $Balance;
        
        if(empty(trim($userAmount))){
            echo "Please enter an amount";
        }
        else{
            $Balance -= ($userAmount);
            echo $Balance;
            $remainderFiveThousand = $Balance % 5000;
            $remainderThousand = $Balance % 1000;
            $remainderFiveHundred = $Balance % 500;
            $totalAmount = '5000' . 'x' . $remainderFiveThousand . '+' . '1000' . 'x' . $remainderThousand . '+' . '500' . 'x' . $remainderFiveHundred;
            echo $totalAmount;
        }

    } 

    ?>
    <form method="post">
        <select name="choose">
            <option value="">Select one</option>
            <option value="Deposit">Deposit</option>
            <option value="Withdraw">Withdraw</option>
            <option value="Check_Balance">Check Balance</option>
        </select><br>
        <label>Enter your value</label>
        <input type="number" name="userValue"><br>
        <input type="hidden" name="amount" value="<?php echo $Balance ?>"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>