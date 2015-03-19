<!DOCTYPE html>
<!--
    @author Abel Hii @abelhii
    @date 17/03/2015
-->
<html>
    <head>
        <title>Income Tax Estimator 2014</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style/style.css"> 
        <link rel="shortcut icon" href="../imgs/favicon.png">
        <script type="text/javascript" src="../JS/jscript.js"></script>
    </head>
    
    <body>
        <?PHP
            include '../functions.php';
        ?>
        <div id="container">
            <div id="header">
                <img src ="../imgs/cms.jpg" alt="logo"/>
                <h2 id="heading">Income Tax Estimator 2014</h2>
            </div>
            
            <form id="calc" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label>Total Annual Remuneration <br><i style="font-size:12px">(Please refer to Part C "Total" of the EA Form)</i></label>
                <input type="text" name="annIncome" value="<?PHP print $val[0]; ?>" onkeypress="return isNumber(event)" onkeyup="maxVal(input)" maxlength="12">
                <br><br>
                <label>Individual Tax Relief</label>
                <input type="text" name="TR" value="9000" readonly>
                <br><br>
                <label>EPF Relief <i style="font-size:12px">(Max 6000)</i></label>
                <input type="text" name="EPF" id="EPF" value="<?PHP print $val[4]; ?>" onkeypress="return isNumber(event)" onkeyup="maxVal(this, 6000)" maxlength="4">
                <br><br>
                <label>Dependent Relief</label>
                <input type="text" name="DR" value="<?PHP print $val[5]; ?>" onkeypress="return isNumber(event)" onkeyup="maxVal(input)" maxlength="12">
                <br><br>
                <label>Other Relief</label>
                <input type="text" name="OR" value="<?PHP print $val[6]; ?>" onkeypress="return isNumber(event)" onkeyup="maxVal(input)" maxlength="12">
                <br><br>
                <table>
                    <tr>
                        <td>
                            <h3>Estimated Total Income Tax for 2014:</h3>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <h3 id="brr">Tax Paid:</h3>
                            <b style="font-size:12px">(Refer to EA Form, Part D1.)</b>
                        </td>
                        <td><input id="t" type="text" name="tpFour" value="<?PHP print $val[8]; ?>" onkeypress="return isNumber(event)" onkeyup="maxVal(input)" maxlength="10"></td>
                        <br>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <h3 id="brr">Zakat Paid:</h3>
                            <b style="font-size:12px">(Refer to EA Form, Part D3. where applicable)</b>
                        </td>
                        <td><input id="t" type="text" name="zakat" value="<?PHP print $val[10]; ?>" onkeypress="return isNumber(event)" onkeyup="maxVal(input)" maxlength="10"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name="submit1" class="button">Calculate</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><h3>Estimated Additional Tax Payable to LHDN:</h3></td>
                        <td>
                            <?php 
                                $four = $tFo - $tpFour - $zakat ;
                                echo '<b style="color: #ff0000">&nbsp&nbsp'.round($four,2).'</b>';
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
