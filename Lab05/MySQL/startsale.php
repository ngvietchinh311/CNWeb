<!DOCTYPE html>
<html>
   <head>
      <title>Start sale</title>
      <body>
         <p style="color: blue; font-size: 20px;">Select Product We Just Sold:</p>
         <form action="sale.php" method="POST">
            <input type="checkbox" id="K" name="sold[]" value="Khang">
            <label for="K">Khang</label>
            <input type="checkbox" id="D" name="sold[]" value="Dang">
            <label for="D">Dang</label>
            <input type="checkbox" id="C" name="sold[]" value="Chinh">
            <label for="C">Chinh</label><br>
            <input type="submit" value="Click to submit">
            <input type="reset" value="Reset">
         </form>
         <?php
            $server = 'localhost';
            $user = 'longth';
            $pass = 'htll1772000';
            $mydb = 'mvctest';
            $connect = mysqli_connect($server, $user, $pass);
            if (!$connect) {
               die ("Cannot connect to $server using $user");
            } else {
               $SQLcmd = "SELECT * FROM `products`";
            
               mysqli_select_db($connect, $mydb);
               $result = mysqli_query($connect, $SQLcmd);
               if ($result){
                  echo "The query is $SQLcmd";

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