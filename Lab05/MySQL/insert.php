<!DOCTYPE html>
<html>
   <head><title>Insert Result</title></head>
   <body>
      <?php
         $name = $_POST['name'];
         $weight = $_POST['weight'];
         $cost = $_POST['cost'];
         $num = $_POST['number'];
         echo $name.' '.$weight.' '.$cost.' '.$num;

         $server = 'localhost';
         $user = 'longth';
         $pass = 'htll1772000';
         $mydb = 'mvctest';
         $connect = mysqli_connect($server, $user, $pass);
         if (!$connect) {
            die ("Cannot connect to $server using $user");
         } else {
            $SQLcmd = "INSERT INTO `products`(`Product_desc`, `Cost`, `Weight`, `Numb`) VALUES ('$name', '$weight', '$cost', '$num')";
         
            mysqli_select_db($connect, $mydb);
            if (mysqli_query($connect, $SQLcmd)){
               print '<font size="4" color="blue" >Insert into table';
               print "<i>`products`</i> in database<i>$mydb</i><br></font>"; 
               print "<br>SQLcmd=$SQLcmd";
            } else {
               die ("Table Create Creation Failed SQLcmd=$SQLcmd");
            } 
            mysqli_close($connect);
         }
      ?>
   </body>
</html>