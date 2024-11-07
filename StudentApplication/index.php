<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "dbcrud");


$results_per_page = 4;

// Find out the number of results stored in the database
$sql = "SELECT * FROM student";
$result = mysqli_query($connection, $sql);
$number_of_results = mysqli_num_rows($result);

// Determine the number of pages needed
$number_of_pages = ceil($number_of_results / $results_per_page);

// Determine the current page number
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Determine the starting limit number for the results on the current page
$this_page_first_result = ($page - 1) * $results_per_page;

// Modify the SQL query to get only the results for the current page
$sql = "SELECT * FROM student LIMIT $this_page_first_result, $results_per_page";
$run = mysqli_query($connection, $sql);

$id = $this_page_first_result + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>APPRENTICE MANAGEMENT</h1>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-start mb-3">
                            <button class="btn btn-success"><a href="add.php" class="text-light" style="text-decoration: none;">Create</a></button>
                        </div>
                        <div class="table-responsive mx-auto">
                            <table class="table table-bordered mx-auto">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">ADDRESS</th>
                                        <th scope="col">MOBILE</th>
                                        <th scope="col">OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($run)) { ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                                            <td>
                                                <button class="btn btn-primary"><a href='edit.php?edit=<?php echo $row['id']; ?>' class="text-light" style="text-decoration: none;">Update</a></button>
                                                <button class="btn btn-danger"><a href='delete.php?del=<?php echo $row['id']; ?>' class="text-light" style="text-decoration: none;">Delete</a></button>
                                            </td>
                                        </tr>
                                        <?php $id++; } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Start -->
                        <div class="pagination">
                            <?php for ($page = 1; $page <= $number_of_pages; $page++) { ?>
                                <a href="index.php?page=<?php echo $page; ?>" class="btn btn-secondary m-1">
                                    <?php echo $page; ?>
                                </a>
                            <?php } ?>
                        </div>
                        <!-- Pagination End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
