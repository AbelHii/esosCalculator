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
            include 'functions.php';
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
                            echo $tFo.'&nbsp';
                            ?>
                        </td>
                        <td>
                            <?php
                            echo '<h3 id="tt">Total Income Tax for 2015:</h3>';
                            echo $tFi.'&nbsp';
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
