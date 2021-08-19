
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "tintuc";      // Khai báo database

// Kết nối database tintuc
$connect = new mysqli($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối :" . $connect->connect_error);
    exit();
}

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$id = "";
$price = "";
$name = "";
$thumbnail = "";



//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["id"])) { $id = $_POST['id']; }
    if(isset($_POST["price"])) { $price = $_POST['price']; }
    if(isset($_POST["name"])) { $name = $_POST['name']; }
    if(isset($_POST["thumbnail"])) { $thumbnail = $_POST['thumbnail']; }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO products (id, name, price, thumbnail)
    VALUES ('$id', '$name', '$price', '$thumbnail')";

    if ($connect->query($sql) === TRUE) {
        echo "<div class='container'><h2>Thêm dữ liệu thành công</h2></div>";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//Đóng database
$connect->close();
?>
<div class="container">
    <h2>Create products</h2>
    <form action="" method="post">
        <div class="form-group">
            <label">Id:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter id" name="id">
        </div>
        <div class="form-group">
            <label">Name:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
            <label">Price:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter price" name="price">
        </div>
        <div class="form-group">
            <label">Thumbnail:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter id" name="thumbnail">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>

