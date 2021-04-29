<!DOCTYPE html>
<html>
   <p>Category Administration</p>
   <table border = 1 class='table'>
      <thead><tr><th>ID</th><th>Title</th><th>Description</th></tr></thead>
      <tbody>
         <?php

            $server = 'localhost';
            $user = 'longth';
            $pass = 'htll1772000';
            $mydb = 'mvctest';
            $table = 'categories';
            $connect = mysqli_connect($server, $user, $pass);
            if (!$connect) {
               die ("Cannot connect to $server using $user");
            } else {
               $SQLcmd = "SELECT * FROM `$table`";
            
               mysqli_select_db($connect, $mydb);
               $result = mysqli_query($connect, $SQLcmd);
               if ($result){
                  while($row = mysqli_fetch_assoc($result)){
                     echo "<tr><td>{$row['CategoryID']}</td><td>{$row['Title']}</td><td>{$row['Description']}</td></tr>";
                  }
                  mysqli_free_result($result);
               } else {
                  die ("Query failed SQLcmd=$SQLcmd");
               } 
            }
         ?>
         <form method="POST">
            <tr>
               <td><input type="text" name="cateID"></td>
               <td><input type="text" name="title"></td>
               <td><input type="text" name="desc"></td>
            </tr>
            <tr>
               <td><input type="submit" value="Add to category"></td>
            </tr>
         </form>
      </tbody>
   </table>
   <?php
      if(isset($_POST['cateID'])){
         $id = $_POST['cateID'];
         $title = $_POST['title'];
         $desc = $_POST['desc'];
         $SQLcmd = "INSERT INTO `categories` VALUES ('$id', '$title', '$desc')";
         $result = mysqli_query($connect, $SQLcmd);
         if($result){
            //echo '<script type="text/javascript">alert("Insert Successfully ")</script>';
            echo header("refresh: 0.1");
         }
      }
      mysqli_close($connect);
   ?>
</html>