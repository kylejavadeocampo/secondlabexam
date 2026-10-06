<?php
include "db.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM books WHERE book_id = $id");
$get = mysqli_fetch_assoc($query);

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $category = $_POST['category'];
    $isbn = $_POST['isbn'];

    if ($title == "" ||
        $author == "" ||
        $publisher == "" ||
        $category == "" ||
        $isbn == "") {
        echo "<script>alert('Please input on all fields')</script>";
    }
    else {
        $sql = "UPDATE books
                SET book_title='$title', book_author='$author', book_publisher='$publisher', book_category='$category', book_isbn='$isbn'
                WHERE book_id='$id';
        ";
        mysqli_query($conn, $sql);
        header("location: index.php");
        exit();
    }
}

$tab = "container border border-3 border-secondary rounded-3 p-4 mx-auto bg-light";
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
<body>
    <div class="<?php echo $tab?> mt-5" style="max-width: 500px;">
        <form method="POST">
            <h2>Edit book (Book #<?php echo $id?>)</h2>
            <br>

            <label>Book Title</lable> <br>
            <input type="text" name="title" class="form-control border-secondary" value="<?php echo $get['book_title']?>"><br>
            
            <label>Author</lable> <br>
            <input type="text" name="author" class="form-control border-secondary" value="<?php echo $get['book_author']?>"> <br>

            <label>Publisher</lable> <br>
            <input type="text" name="publisher" class="form-control border-secondary" value="<?php echo $get['book_publisher']?>"> <br>

            <label>Category</lable> <br>
            <input type="text" name="category" class="form-control border-secondary" value="<?php echo $get['book_category']?>"> <br>

            <label>ISBN</lable> <br>
            <input type="text" name="isbn" class="form-control border-secondary" value="<?php echo $get['book_isbn']?>"> <br>

            <button type="submit" class="btn btn-primary" name="add">Add</button>
            <a class="btn btn-danger" href="index.php">Cancel</a>
        </form>
    </div>
</body>
</html>