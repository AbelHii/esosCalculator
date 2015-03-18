<!DOCTYPE html>
<!--
    @author Abel Hii @abelhii
    @date 17/03/2015
-->
<html>
    <head>
        <title>ESOS Tax Calculator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <link rel="shortcut icon" href="imgs/favicon.png">
        <script>
            //only allows numbers to be input
            function isNumber(evt)
            {
               var charCode = (evt.which) ? evt.which : evt.keyCode;
               if (charCode !== 46 && charCode > 31 
                 && (charCode < 48 || charCode > 57))
                  return false;

               return true;
            }
            /*
            function swapHeading(word){
                document.getElementById('heading').innerHTML = word;
            }*/
        </script>
    </head>
    
    <body>
        <?PHP
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
                
            ?>
        <div id="container">
            <div id="header">
                <img src ="imgs/cms.jpg" alt="logo"/>
                <h2 id="heading">CMSB ESOS Tax Calculator</h2>
            </div>
            
            <form id="calc" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label>Annual Salary Income</label>
                <input type="text" name="annIncome" value="<?PHP print $val[0]; ?>" onkeypress="return isNumber(event)" maxlength="12">
                <br><br>
                <label>Annual Bonus</label>
                <input type="text" name="bonus" value="<?PHP print $val[1]; ?>" onkeypress="return isNumber(event)" maxlength="12">
                <br><br>
                <label>Festive Gift</label>
                <input type="text" name="festGift" value="<?PHP print $val[2]; ?>" onkeypress="return isNumber(event)" maxlength="12">
                <br><br>
                
                <b><label>Projected Remuneration:</label></b>
                <?php if($PR != ""){echo number_format($PR);} ?>
                <br><br>
                <label>Individual Tax Relief</label>
                <input type="text" name="TR" value="<?PHP print $val[3]; ?>" onkeypress="return isNumber(event)" maxlength="12">
                <br><br>
                <label>EPF Relief</label>
                <input type="text" name="EPF" value="<?PHP print $val[4]; ?>" onkeypress="return isNumber(event)" maxlength="12">
                <br><br>
                <label>Dependent Relief</label>
                <input type="text" name="DR" value="<?PHP print $val[5]; ?>" onkeypress="return isNumber(event)" maxlength="12">
                <br><br>
                <label>Other Relief</label>
                <input type="text" name="OR" value="<?PHP print $val[6]; ?>" onkeypress="return isNumber(event)" maxlength="12">
                <br><br>
                <label>ESOS Perquisite</label>
                <input type="text" name="ESOS" value="<?PHP print $val[7]; ?>" onkeypress="return isNumber(event)" maxlength="12">
                <br><br>
                
                <button type="submit" name="submit1" class="button">Calculate</button>
                <?php
                    echo "<h2>Taxable Income</h2>";
                    if($TI != ""){echo number_format($TI);}
                ?>
                <br>
                <table>
                    <tr>
                        <td>
                            <?php
                            echo '<h3 id="tt">Total Income Tax for 2014:</h3>';
                            echo $tFo;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo '<h3 id="tt">Total Income Tax for 2015:</h3>';
                            echo $tFi;
                            ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><h3>Tax Paid (refer to EA Form):</h3></td>
                        <td><input id="t" type="text" name="tFour" value="<?PHP print $val[8]; ?>" onkeypress="return isNumber(event)" maxlength="10"></td>
                        <td><input id="t" type="text" name="tFive" value="<?PHP print $val[9]; ?>" onkeypress="return isNumber(event)" maxlength="10"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name="submit1" class="button">Calculate</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><h3>Additional Tax Payable to LHDN:</h3></td>
                        <td>
                            <?php 
                                $four = $tFo - $tFour;
                                echo '<b style="color: #ff0000">'.$four.'</b>';
                            ?>
                        </td>
                        <td>
                            <?php
                                $five = $tFi - $tFive;
                                echo '<b style="color: #ff0000">'.$five.'</b>';
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
