<?php
require('./config/db.php');
$selectedcourses = $_POST;
$timetable=array();
foreach($selectedcourses as $key => $value){
  $query = "select * from timetable where Faculty_Name='$value' and Course_Code='$key'";
  $result = mysqli_query($connect,$query);
  while($row = mysqli_fetch_array($result)){
  $students=$row['no_of_students'];
  $students++;
  $query1="update timetable set no_of_students=$students where Faculty_Name='$value' and Course_Code='$key'";
  mysqli_query($connect,$query1);
  $query = "select * from timetable where Faculty_Name='$value' and Course_Code='$key'";
  $result = mysqli_query($connect,$query);
  while($row = mysqli_fetch_array($result)){
    array_push($timetable,$row);
   }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css"/>
    <title>List Of Courses</title>
  </head>
  <body>
    <section class="container mt-2">
      <h2>Generated Time Table:</h2>
      <table class="table">
        <thead>
            <tr>
              <th>S.NO</th>
              <th>Course_Code</th>
              <th>Course_TiTle</th>
              <th>Section</th>
              <th>Faculty_Name</th>
              <th>Days</th>
              <th>Hours</th>
              <th>no_of_students</th>
            </tr>
        </thead>
        <tbody>
              <?php for($i=0;$i<count($timetable);$i++):?>
                <tr>
                  <td><?php echo $i+1; ?>
                  <td><?php echo $timetable[$i]['Course_Code'];?></td>
                  <td><?php echo $timetable[$i]['Course_Title'];?></td>
                  <td><?php echo $timetable[$i]["Section"] ?></td>
                  <td><?php echo $timetable[$i]["Faculty_Name"] ?></td>
                  <td><?php echo $timetable[$i]["Days"] ?></td>
                  <td><?php echo $timetable[$i]["Hour"] ?></td>
                  <td><?php echo $timetable[$i]["no_of_students"] ?></td>
                </tr>
              <?php endfor; ?>
        </tbody>
      </table>
    </section>
  </body>

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>-->
</html>
