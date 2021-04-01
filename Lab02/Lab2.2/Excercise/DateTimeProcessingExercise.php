<!<!doctype html>
<html>
    <head><title>Datetime Processing</title></head>
    <body><font size="5" color="blue">Enter your name and select the date and time for the appointment</font>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <?php
                if(array_key_exists("name", $_GET)){
                    $name = $_GET["name"];
                    $date = $_GET["date"];
                    $month = $_GET["month"];
                    $year = $_GET["year"];
                    $hour = $_GET["hour"];
                    $minute = $_GET["minute"];
                    $second = $_GET["second"];
                }
                else{
                    $name = 0;
                    $date = 0;
                    $month = 0;
                    $year = 0;
                    $hour = 0;
                    $minute = 0;
                    $second = 0;
                }
            ?>
            <table>
                <tr>
                    <td rowspan="1">Your name:</td>
                    <td rowspan="1">
                        <input type="text" maxlength="20" name="name">
                    </td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><select name="date" style="width: 30%;height: 80%">
                        <?php
                            for($i = 1; $i <= 31; $i++){
                                if($date == $i){
                                    print("<option selected>$i</option>");
                                }
                                print("<option>$i</option>");
                            }
                        ?>
                        </select>
                        <select name="month" style="width: 30%;height: 80%">
                        <?php
                            for($i = 1; $i <= 12; $i++){
                                if($month == $i){
                                    print("<option selected>$i</option>");
                                }
                                print("<option>$i</option>");
                            }
                        ?>
                        </select>
                        <select name="year" style="width: 35%;height: 80%">
                        <?php
                            for($i = 1900; $i <= 2045; $i++){
                                if($year == $i){
                                    print("<option selected>$i</option>");
                                }
                                print("<option>$i</option>");
                            }
                        ?>
                        </select>
            
                    </td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td><select name="hour" style="width: 30%;height: 80%">
                        <?php
                            for($i = 0; $i <= 23; $i++){
                                if($hour == $i){
                                    print("<option selected>$i</option>");
                                }
                                print("<option>$i</option>");
                            }
                        ?>
                        </select>
                        <select name="minute" style="width: 30%;height: 80%">
                        <?php
                            for($i = 0; $i <= 59; $i++){
                                if($minute == $i){
                                    print("<option selected>$i</option>");
                                }
                                print("<option>$i</option>");
                            }
                        ?>
                        </select>
                        <select name="second" style="width: 35%;height: 80%">
                        <?php
                            for($i = 0; $i <= 59; $i++){
                                if($second == $i){
                                    print("<option selected>$i</option>");
                                }
                                print("<option>$i</option>");
                            }
                        ?>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td align="right"> <input type="SUBMIT" value="SUBMIT"></td>
                    <td align="left"> <input type="RESET" value="RESET"></td>
                </tr>
            </table>
            <?php
                print("Hi $name, <br>");
                print("You have chosen to have an appointment at $hour:$minute:$second, $date/$month/$year<br>");
                $check = false;
                if(($year % 4 == 0 && $year % 100 != 0) || ($year % 100 == 0 && $year % 400 == 0)){
                    if($month == 2){
                        $check = true;
                    }
                }
                if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12){
                    print("This month has 31 days.<br>");
                }
                elseif($month != 2){
                    print("This month has 30 days.<br>");
                }
                else{
                    if($check == true){
                        print("This month has 29 days.<br>");
                    }
                    else{
                        print("This month has 28 days.<br>");
                    }
                }
            ?>
        </form>
    </body>
</html>