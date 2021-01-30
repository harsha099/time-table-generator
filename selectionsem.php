<?php



require('./config/db.php');


$query = "SELECT * FROM `users` ";

$result1 = mysqli_query($connect, $query);
$optionsbatch = "";
while($row2 = mysqli_fetch_array($result1))
{
    $optionsbatch = $optionsbatch."<option>$row2[0]</option>";
}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP SELECT OPTIONS FROM DATABASE </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>

    <body>
      <section class="container">
          <h1 class="text-primary">SELECT YOUR BATCH</h1>
          <h2 class="text-info">batch</h2>
          <form method="post" action="listofcourses.php">
            <div class="form-group mt-2">
                <select class="form-select" name="batch">
                    <?php echo $optionsbatch;?>
                </select>
            <!-- </div>
             <h2>Semester:</h2>
             <div class="form-group mt-2">
             <select class="form-select" name="sem">
                  <?php# echo $optionssem;?>
              </select>
            </div> -->
              <br>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
          </form>
    </section>
    </body>

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>-->
</html>
