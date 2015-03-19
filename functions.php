<!DOCTYPE HTML>
<?php
     //define variables
    $annIncome = $bonus = $festGift = $PR = $TR = $EPF = $ESOS = $TI = $DR = $OR = "";
    $tax = $num = $tFour = $tFive = $tFo = $tFi = "";
    $val = new SplFixedArray(10);

    //does the calculations
    function taxCalc($ci, $rate, $rm, $sum){
             $sum -= $ci;
             $tax = $rm + ($sum * $rate/100);
             return $tax;
     }
     function tax2014($num){
        if($num > 0 && $num < 5000){echo 0; }
        else if($num > 5001 && $num < 10000){return taxCalc(5000, 2, 0, $num);}
        else if($num > 10001 && $num < 20000){return taxCalc(10000, 2, 100, $num);}
        else if($num > 20001 && $num < 35000){return taxCalc(20000, 6, 300, $num);}
        else if($num > 35001 && $num < 50000){return taxCalc(35000, 11, 1200, $num);}
        else if($num > 50001 && $num < 70000){return taxCalc(50000, 19, 2850, $num);}
        else if($num > 70001 && $num < 100000){return taxCalc(70000, 24, 6650, $num);}
        else if($num > 100000){return taxCalc(100000, 26, 13850, $num);}
    }
    function tax2015($num){
        if($num > 0 && $num < 5000){echo 0; }
        else if($num > 5001 && $num < 10000){return taxCalc(5000, 1, 0, $num);}
        else if($num > 10001 && $num < 20000){return taxCalc(10000, 1, 50, $num);}
        else if($num > 20001 && $num < 35000){return taxCalc(20000, 5, 150, $num);}
        else if($num > 35001 && $num < 50000){return taxCalc(35000, 10, 900, $num);}
        else if($num > 50001 && $num < 70000){return taxCalc(50000, 16, 2400, $num);}
        else if($num > 70001 && $num < 100000){return taxCalc(70000, 21, 5600, $num);}
        else if($num > 100001 && $num < 250000){return taxCalc(100000, 24, 11900, $num);}
        else if($num > 250001 && $num < 400000){return taxCalc(250000, 24.5, 47900, $num);}
        else if($num > 400001){return taxCalc(400000, 25, 84650, $num);}
    }

    if (isset($_POST['submit1'])){
        $annIncome = test_input(filter_input(INPUT_POST, "annIncome"));
        $bonus = test_input(filter_input(INPUT_POST, "bonus"));
        $festGift = test_input(filter_input(INPUT_POST, "festGift"));
        $PR = $annIncome + $bonus + $festGift;
        $TR = test_input(filter_input(INPUT_POST, "TR"));
        $EPF = test_input(filter_input(INPUT_POST, "EPF"));
        $DR = test_input(filter_input(INPUT_POST, "DR"));
        $OR = test_input(filter_input(INPUT_POST, "OR"));
        $ESOS = test_input(filter_input(INPUT_POST, "ESOS"));
        $tFour = test_input(filter_input(INPUT_POST, "tFour"));
        $tFive = test_input(filter_input(INPUT_POST, "tFive"));
        $val[0] = test_input(filter_input(INPUT_POST, "annIncome"));
        $val[1] = test_input(filter_input(INPUT_POST, "bonus"));
        $val[2] = test_input(filter_input(INPUT_POST, "festGift"));
        $val[3] = test_input(filter_input(INPUT_POST, "TR"));
        $val[4] = test_input(filter_input(INPUT_POST, "EPF"));
        $val[5] = test_input(filter_input(INPUT_POST, "DR"));
        $val[6] = test_input(filter_input(INPUT_POST, "OR"));
        $val[7] = test_input(filter_input(INPUT_POST, "ESOS"));
        $val[8] = test_input(filter_input(INPUT_POST, "tFour"));
        $val[9] = test_input(filter_input(INPUT_POST, "tFive"));
        $TI = $PR - $TR - $EPF - $OR - $DR + $ESOS;
        $tFo = tax2014($TI);
        $tFi = tax2015($TI);
    }else{
        for($i = 0; $i < count($val); $i++){
            $val[0]="";
        }
    }
    function test_input($data) {
       return $data;
    }

    