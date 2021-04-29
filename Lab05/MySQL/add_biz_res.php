<!DOCTYPE html>
<html>
   <head>
      <title>Add business</title>
      <style>
         .main {
            display: flex;
         }   
         .list_cate, form_biz {
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
      <form method="POST">
         <div class="main">
            <div class="list_cate">
               <p>Click on one, or control-click on multiple categories:</p>
               <select size="4" multiple required>  
                  <?php
                     $server = 'localhost';
                     $user = 'longth';
                     $pass = 'htll1772000';
                     $mydb = 'mvctest';
                     $cate_tb = 'categories';
                     $mysqli = new mysqli("localhost", $user, $pass, $mydb);
                           
                     $cate_selected = $_POST['cates'];

                     $query = "SELECT * FROM $cate_tb";
                     if ($result = $mysqli->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                           $cateid = $row["CategoryID"];
                           $cateTitle = $row["Title"];
                           $check = true;
                           foreach($cate_selected as $cate) {
                              if($cateid == $cate) {
                                 echo '<option value="' .$cateid.'" name="'.$cateid.'" id="'.$cateid.'" selected>'.$cateTitle.'</option>';
                                 $check = false;
                                 break;
                              } 
                           }
                           if($check) {
                              echo '<option value="'. $cateid .'" name="'.$cateid.'" id="'.$cateid.'">'.$cateTitle.'</option>';
                           }
                        }
                        $result->free();
                     }
                  ?>
               </select>
            </div>
            <div class="form_biz">
               <table>
                  <?php 
                     $server = 'localhost';
                     $user = 'longth';
                     $pass = 'htll1772000';
                     $mydb = 'mvctest';
                     $biz_tb = 'businesses';
                     $biz_cate = 'biz_categories';

                     $cnt = 1;
                        
                     $mysqli = new mysqli("localhost", $user, $pass, $mydb);

                     $query = "SELECT * FROM $biz_tb";
                     if ($result = $mysqli->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                           $cnt++;
                        }
                        $result->free();
                     }
                     $biz_id = $cnt;
                     $biz_name = $_POST['biz_name'];
                     $address = $_POST['address'];
                     $city = $_POST['city'];
                     $phone = $_POST['phone'];
                     $url = $_POST['url'];
                     $connect = mysqli_connect($server, $user, $pass);
                     if (!$connect) {
                        die("Cannot connect to $server using $user");
                     } else {
                        mysqli_select_db($connect, $mydb);
                        $query1 = "INSERT INTO $biz_tb VALUES ('$biz_id', '$biz_name', '$address', '$city', '$phone', '$url')";
                        mysqli_query($connect, $query1);
                        foreach($cate_selected as $cate) {
                           $query2 = "INSERT INTO $biz_cate VALUES ('$biz_id', '$cate')";
                           mysqli_query($connect, $query2);
                        }
                        mysqli_close($connect);
                     }

                     echo 
                        '<tr>
                           <td>Business name: </td>
                           <td>'.$biz_name.'</td>
                        </tr>
                        <tr>
                           <td>Address: </td>
                           <td>'.$address.'</td>
                        </tr>
                        <tr>
                           <td>City: </td>
                           <td>'.$city.'</td>
                        </tr>
                        <tr>
                           <td>Telephone: </td>
                           <td>'.$phone.'</td>
                        </tr>
                        <tr>
                           <td>URL: </td>
                           <td>'.$url.'</td>
                        </tr>';
               ?>
               </table>
            </div>
         </div>
      </form>
         
      <a href="./add_biz.php">Add another Business</a>
   </body>  
</html>