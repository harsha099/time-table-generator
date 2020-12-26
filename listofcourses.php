<?php
require('./config/db.php');
$year = $_POST['year'];
$sem = $_POST['sem'];
$query = "select * from timetable where Year=$year and Sem = $sem";
$courses = [];
$result = mysqli_query($connect,$query);
while($row = mysqli_fetch_array($result)){
  array_push($courses,$row);
}
$istrue = false;
if(count($courses) == 0)
  $istrue = true;
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
    <section class="container">
      <h2>List Of Courses:</h2>
      <form method="post" action="generatedtimetable.php">
      <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>S.NO</th>
              <th>Course_Code</th>
              <th>Course_TiTle</th>
              <th>Section</th>
              <th>Faculty_Name</th>
              <th>Days</th>
              <th>Hours</th>
            </tr>
        </thead>
        <tbody>
          <?php if(count($courses) == 0):?>
              <h2 class="text-danger">There are No Courses For The Selected Year and semester</h2>
          <?php endif;?>
              <?php for($i=0;$i<count($courses);$i++):?>
                  <tr>
                    <td>
                      <input type="checkbox" value="<?php echo $courses[$i]["Faculty_Name"]?>"
                      name="<?php echo $courses[$i]["Course_Code"] ?>"/>
                    </td>
                    <td><?php echo $i+1 ?></td>
                    <td><?php echo $courses[$i]["Course_Code"] ?></td>
                    <td><?php echo $courses[$i]["Course_Title"] ?></td>
                    <td><?php echo $courses[$i]["Section"] ?></td>
                    <td><?php echo $courses[$i]["Faculty_Name"] ?></td>
                    <td><?php echo $courses[$i]["Days"] ?></td>
                    <td><?php echo $courses[$i]["Hour"] ?></td>
                  </tr>
              <?php endfor;?>
        </tbody>
      </table>
      <button type="submit" class="btn btn-primary" <?php if($istrue) echo "disabled"?>>Submit</button>
    </form>
    </section>
  </body>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>
