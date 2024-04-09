<?php
$upload_dir = "uploads/";
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
$max_size = 5 * 1024 * 1024; // 5MB

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $file_size = $_FILES["file"]["size"];
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (in_array($file_type, $allowed_types) && $file_size <= $max_size) {
        $new_file_name = uniqid('file_') . '.' . $file_type;
        if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
            echo "File uploaded successfully: $new_file_name";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file.";
    } 
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept=".jpg, .jpeg, .png, .gif">
    <input type="submit" value="Upload">
</form>
