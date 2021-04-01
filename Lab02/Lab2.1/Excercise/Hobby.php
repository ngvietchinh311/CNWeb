<html>
    <head><title>Result</title></head>
    <body>
        <?php
            $name = $_POST["name"];
            $dob = $_POST["dob"];
            $addr = $_POST["address"];
            $school = $_POST["school"];
            $class = $_POST["class"];
            $arr = array(); $i = 0; 
            if($_POST["sport"] != NULL){
                $arr[$i++] = $_POST["sport"];
            } 
            if($_POST["music"] != NULL){
                $arr[$i++] = $_POST["music"];
            } 
            if($_POST["film"] != NULL){
                $arr[$i++] = $_POST["film"];
            } 
            if($_POST["hangout"] != NULL){
                $arr[$i++] = $_POST["hangout"];
            } 
            if($_POST["work"] != NULL){
                $arr[$i++] = $_POST["work"];
            } 
            if($_POST["other"] != NULL){
                $arr[$i++] = $_POST["otherHobby"];
            }
            print("Hello, $name<br>");
            print("You were born in $dob<br>");
            print("You are majoring in $class, which has a reputation in $school<br>");
            print("Your hobbies are: <br>");
            for($j = 0; $j < count($arr); $j++){
                print(" &nbsp; &nbsp; &nbsp; $arr[$j]<br>");
            }
        ?>
    </body>
</html>
