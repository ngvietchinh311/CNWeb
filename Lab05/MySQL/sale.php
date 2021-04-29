<!DOCTYPE html>
<html>
   <head>
      <title>Update Result</title>
      <body>
         <p style="color: blue; font-size: 20px;">Update Result For Table Products</p>
         <?php
            $name = $_POST['sold'];

            $server = 'localhost';
            $user = 'longth';
            $pass = 'htll1772000';
            $mydb = 'mvctest';
            $connect = mysqli_connect($server, $user, $pass);
            if (!$connect) {
               die ("Cannot connect to $server using $user");
            } else {
               $SQLcmd = "UPDATE `products` SET Numb=Numb-1 WHERE ";
               
               if (isset($name)) {
                  $cnt = count($name);
                  $SQLcmd .= "Product_desc='$name[0]' ";
                  for($i = 1; $i < $cnt; $i++) {
                     $SQLcmd .= "OR Product_desc='$name[$i]' ";
                  }
               }
               
               mysqli_select_db($connect, $mydb);
               $result = mysqli_query($connect, $SQLcmd);
               if ($result){
                  echo "The query is $SQLcmd";
                  $SQLcmd = "SELECT * FROM `products`";
                  $result = mysqli_query($connect, $SQLcmd);
                  if($result){
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
                  }else {
                     die ("Query failed SQLcmd=$SQLcmd");
                  }
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