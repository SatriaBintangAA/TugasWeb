<?php
include_once("config.php");


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
    $user_data = mysqli_fetch_array($result);

    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];

 
        $result = mysqli_query($mysqli, "UPDATE users SET name='$name', email='$email' WHERE id=$id");
        header("Location: index.php"); 
    }
}
?>
 
<html>
<head>    
    <title>Edit User</title>
</head>
 
<body>
<form name="update_user" method="post" action="edit.php">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $user_data['name']; ?>"></td> 
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="<?php echo $user_data['email']; ?>"></td> 
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $user_data['id']; ?>"></td> 
            <td><input type="submit" name="update" value="Update"></td> 
        </tr>
    </table>
</form>
</body>
</html>