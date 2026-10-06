<?php
include "db.php";

$books = mysqli_query($conn, "SELECT * FROM books");
$total_books = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as c FROM books"))['c'];

$tab = "container border border-3 border-secondary rounded-3 p-1 mx-auto bg-light";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body class="container">
    <div class="d-flex justify-content-between">
        <section class="justify-content-start <?php echo $tab?> mt-5" style="min-height: 520px;  max-width: 1000px;">
            <div class="table-responsive" sttyle=" max-width: 500px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Publisher</th>
                            <th>ISBN</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($books)) {?>
                        <tr>
                            <td><?php echo $row['book_id'] ?></td>
                            <th><?php echo $row['book_title'] ?></th>
                            <th><?php echo $row['book_author'] ?></th>
                            <th><?php echo $row['book_category'] ?></th>
                            <th><?php echo $row['book_publisher'] ?></th>
                            <th><?php echo $row['book_isbn'] ?></th>
                            <th class="d-flex justify-content-evenly">
                                <a class="btn btn-warning m-1" href="book_edit.php?id=<?php echo $row['book_id']?>">Edit</a>
                                <a class="btn btn-danger m-1" href="book_delete.php?id=<?php echo $row['book_id']?>">Delete</a>
                            </th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="mt-5">
            <div class="<?php echo $tab;?> row" style="min-width: 400px;">
                <div class="col-md-6">
                    <h2>Books</h2>
                    <em>The current count for books in the database</em>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <h2><?php echo $total_books ?></h2>
                </div>
            </div>
            <div class="<?php echo $tab;?> p-3" style="min-height: 410px;">
                <a class="btn btn-primary" href="book_add.php" style="max-width: 200px;">Add Book</a>
            </div>
        </section>
    </div>
</body>
</html>