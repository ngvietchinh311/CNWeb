<!DOCTYPE html>
<html>
   <head>
      <title>Serch Result</title>
      <body>
         <?php
            $search_name = $_POST['name'];

            $server = 'localhost';
            $user = 'longth';
            $pass = 'htll1772000';
            $mydb = 'mvctest';
            $connect = mysqli_connect($server, $user, $pass);
            if (!$connect) {
               die ("Cannot connect to $server using $user");
            } else {
               $SQLcmd = "SELECT * FROM `products` WHERE Product_desc='$search_name'";
            
               mysqli_select_db($connect, $mydb);
               $result = mysqli_query($connect, $SQLcmd);
               if ($result){
                  print '<font size="4" color="blue" >Search Table';
                  print "<i>`products`</i> in database<i>$mydb</i><br></font>"; 
                  print "<br>SQLcmd=$SQLcmd";

                  echo "<table border = 1 class='table'>";
                  echo "<thead><tr><th>No.</th><th>Product_desc</th><th>Cost</th><th>Weight</th><th>Count</th></tr></thead>";
                  echo "<tbody>";
                  $i = 1;
                  while($row = mysqli_fetch_assoc($result)){
                     echo "<tr><td>$i</td><td>{$row['Product_desc']}</td><td>{$row['Cost']}</td><td>{$row['Weight']}</td><td>{$row['Numb']}</td></tr>";
                     $i ++;
                  }
                  echo "</tbody>";
                  echo "</table>";
                  mysqli_free_result($result);
               } else {
                  die ("Query failed SQLcmd=$SQLcmd");
               } 
               mysqli_close($connect);
            }
         ?>
      </body>
   </head>
</html>