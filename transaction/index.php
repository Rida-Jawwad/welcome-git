<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $Balance = 25000;
        if(isset($_POST['submit'])){ 

            $funcBalance = $_POST['hiddenAmount'];
            $funcUserValue = $_POST['userValue'];

            if($_POST['choose'] == "Check_Balance"){
               
                CheckBalance($funcBalance);

            }
            elseif($_POST['choose'] == "Deposit"){
                
                Deposit($funcBalance,$funcUserValue);

            }
            elseif($_POST['choose'] == "Withdraw"){

                withdrawal($funcBalance,$funcUserValue);

            }
            
        }
        function CheckBalance($funcBalance){
            global $Balance;
            $Balance = $funcBalance;
            echo "Your current balance is " . $Balance;
        } 
       
        function Deposit($funcBalance,$funcUserValue){
            global $Balance ;
            if(empty(trim($funcUserValue))){
                echo "Please enter an amount";
            }
            elseif($funcUserValue > 0){
                $Balance = $funcBalance + $funcUserValue;
                echo "Transaction Completed, Your current balance is " . $Balance . '.';
            }
            else{
                echo "Enter a proper amount";
            }
        }
    
        function withdrawal($funcBalance,$funcUserValue){
            global $Balance ;
            if(empty(trim($funcUserValue))){
                echo "Please enter an amount";
            }
            elseif($funcUserValue > 0 && $funcUserValue <= $funcBalance && ($funcUserValue % 500)==0){
                $Balance = $funcBalance - $funcUserValue;
                echo "Transaction Completed, Your current balance is " . $Balance . '.<br>';
                $fiveThousand = floor($funcUserValue / 5000);
                $remainder = $funcUserValue % 5000;
                $thousand =  floor($remainder / 1000);
                $remainder = $remainder % 1000;
                $fiveHundred =  floor($remainder / 500);
                $totalAmount = '5000' . 'x' . $fiveThousand . '+' . '1000' . 'x' . $thousand . '+' . '500' . 'x' . $fiveHundred;
                echo $totalAmount;
            }
            elseif($funcUserValue > $funcBalance){
                echo 'Insufficient balance to continue this transaction';
            }
            elseif($funcUserValue < 500 && $funcUserValue > 0){
                echo "Error!";
            }
            else{
                echo "Enter a proper amount";
            }    
        } 
    ?>
    <form method="post">
        <label>Enter your amount:</label>
        <input type="number" name="userValue"><br>
        <select name="choose">
            <option value="">Select one</option>
            <option value="Deposit">Deposit</option>
            <option value="Withdraw">Withdraw</option>
            <option value="Check_Balance">Check Balance</option>
        </select><br>
        <input type="hidden" name="hiddenAmount" value="<?php echo $Balance ?>">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>