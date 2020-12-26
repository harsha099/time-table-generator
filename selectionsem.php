<?php

// php select option value from database

require('./config/db.php');

// mysql select query
$query = "SELECT * FROM `users` order by Sem ASC";

// for method 1

$result1 = mysqli_query($connect, $query);
$optionssem = "";
$optionsyear = "";

while($row2 = mysqli_fetch_array($result1))
{
    $optionsyear = $optionsyear."<option>$row2[0]</option>";
    $optionssem = $optionssem."<option>$row2[1]</option>";
}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP SELECT OPTIONS FROM DATABASE </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>

    <body>
      <section class="container">
          <h1>select your year and semester</h1>
          <h2>Year</h2>
          <form method="post" action="listofcourses.php">
            <div class="form-group mt-2">
                <select class="form-select" name="year">
                    <?php echo $optionsyear;?>
                </select>
            </div>
            <h2>Semester:</h2>
            <div class="form-group mt-2">
            	<select class="form-select" name="sem">
                  <?php echo $optionssem;?>
              </select>
            </div>
              <br>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
          </form>
    </section>
    </body>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>
