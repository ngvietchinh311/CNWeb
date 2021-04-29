<!DOCTYPE html>
<html>

<head>
   <style>
      .main {
         display: flex;
      }
      .list_cate, .form_biz {
         margin: 10px 20px 10px 30px;
      }
      .list_cate p {
         margin: 0;
         margin-bottom: 10px;
      }
      .list_cate select {
         width: 300px;
         text-align: center;
      }
      .submit {
         margin-left: 20px;
         margin-top: 20px;
      }
      h1 {
         color: blue;
      }
   </style>
</head>

<body>
   <h1>Business Registration</h1>
   <form action="add_biz_res.php" method="POST">
      <div class="main">
         <div class="list_cate">
            <p>Click on one, or control-click on multiple categories:</p>
            <select name="cates[]" size="4" multiple required>  
               <?php
                  $server = 'localhost';
                  $user = 'longth';
                  $pass = 'htll1772000';
                  $mydb = 'mvctest';
                  $cate_tb = 'categories';

                  $mysqli = new mysqli("localhost", $user, $pass, $mydb);

                  $query = "SELECT * FROM $cate_tb";
                  if ($result = $mysqli->query($query)) {

                     /* fetch associative array */
                     while ($row = $result->fetch_assoc()) {
                        $cateid = $row["Category_ID"];
                        $cateTitle = $row["Title"];
                        echo
                           '<option value="'. $cateid .'" name="'.$cateid.'" id="'.$cateid.'">'.$cateTitle.'</option>';
                     }

                     $result->free();
                  }
               ?>
            </select>
         </div>
         <div class="form_biz">
            <table>
               <tr>
                  <td>Business name: </td>
                  <td><input type="text" name="biz_name" id="biz_name" required></td>
               </tr>
               <tr>
                  <td>Address: </td>
                  <td><input type="text" name="address" id="address" required pattern="[A-Za-z0-9'\.\-\s\,]"></td>
               </tr>
               <tr>
                  <td>City: </td>
                  <td><input type="text" name="city" id="city" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$"></td>
               </tr>
               <tr>
                  <td>Telephone: </td>
                  <td><input type="text" name="phone" id="phone" required pattern="[0]{1}[1-9]{1}[0-9]{4}[0-9]{4}"></td>
               </tr>
               <tr>
                  <td>URL: </td>
                  <td><input type="text" name="url" id="url" required></td>
               </tr>
            </table>
         </div>
      </div>
        
      <input type="submit" value="Click to Submit">
   </form>
</body>

</html>