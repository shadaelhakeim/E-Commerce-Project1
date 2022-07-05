<?php 
include 'Connection.php';
if(isset($_POST['submit']))
{
  $file=$_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName= $_FILES['file']['tmp_name'];
  $fileSize= $_FILES['file']['size'];   
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];
  $fileExt = explode('.',$fileName);
  $fileActualExt=strtolower(end($fileExt));
  $fileNameNew = uniqid('', true).".".$fileActualExt;
  $fileDestination = 'images/'.$fileNameNew;
  move_uploaded_file($fileTmpName,$fileDestination);
  
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  $qu = "insert into `products` (NAME, DESCRIPTION	, PRICE, IMG) values('$name', '$desc', '$price', '$fileNameNew')";
  mysqli_query($conn, $qu);
  echo "Added Successfully";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Product</title>
<style>
  .container {
    width: 60%;
    height: 85vh;
    background:antiquewhite;
    color: white;
    padding: 40px;
    border-radius :20px;
    position: Absolute; top: 20px; right: 250px;
}
.container h1 {
    color:rgb(78, 160, 78);
    margin-bottom: 35px;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
   position: Absolute; top: 100px; left: 130px;
   font-size:xx-large;
}
.form {
    width: 300px;
    position: Absolute; top: 200px; left: 65px;
}
.form label {
    color: rgb(78, 160, 78);
    font-family: 'Times New Roman';
    width: 100%;
    font-size:medium;
    }
.form input[type=text] {
        width: 100%;
        padding: 10px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
       
      }
      
.form input[type=text]:focus {
        background-color: white;
        outline: none;
      }
.right{
    float: right;
    position: Absolute; top: 200px; right: 120px;
    width: 40%;
    height: 40vh;
}


</style>
</head>
<body>
<div class="container">
    
<h1>Add Product</h1>
<img src="image/add.jpg" alt="Cart" class="right">
 <div class="form">
 
    <form method="post" enctype="multipart/form-data">
        <label>Product Name</label> <br>
        <input type="text" name="name"><br>
        <label>Product Description</label><br>
        <input type="text" name="desc"><br>
        <label>Product Price</label><br>
         <input type="text" name="price"><br>
         
        
      
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
      </form>

 </div>
</div>

</body>
</html>
