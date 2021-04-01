<html>
    <head><title>Conditional Test</title></head>
    <body>
        <?php
            $first = $_GET["firstName"];
            $middle = $_GET["middleName"];
            $last = $_GET["lastName"];
            print("Hi $first. Your full name is $first $last $middle. <br><br>");
            if($first == $last){
                print("$first and $last are equal");
            }
            elseif($first > $last){
                print("$first is greater than $last");
            }
            else{
                print("$first is smaller than $last");
            }
            print("<br><br>");
            
            $grade1 = $_GET["grade1"]; $grade2 = $_GET["grade2"];
            $final = (2*$grade1 + 3*$grade2)/5;
            if($final > 89){
                print("Your final score is $final. You got an A. Congrats");
                $rate = "A";
            }
            elseif($final > 79){
                print("Your final score is $final. You got a B");
                $rate = "B";
            }
            elseif($final > 69){
                print("Your final score is $final. You got a C");
                $rate = "C";
            }
            elseif($final > 59){
                print("Your final score is $final. You got a D");
                $rate = "D";
            }
            elseif($final >= 0){
                print("Your final score is $final. You got a F");
                $rate = "F";
            }
            else{
                print("Illegal score less than 0. Final grade = $final");
            }
            print("<br></br>");
            switch ($rate){
                case "A": print("Excellent!"); break;
                case "B": print("Good!"); break;
                case "C": print("Not Bad!"); break;
                case "D": print("Normal!"); break;
                case "F": print("You have to take the course again!"); break;
                default: print("Illegal grade!"); break;
            }
        ?>
    </body>
</html>
