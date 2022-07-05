  <?php 
  include 'connection.php';
  $myquery= "select * from `products`  ";
  $result= mysqli_query($conn,$myquery);
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <div id="search"> 
  <form method="post" class="searchbar" > <input type="text" name="src" placeholder="search" size="60" required>
  <button name="btnSearch"> Go </button>
  </form>
  <?php
  if(isset($_POST['btnSearch'])){
    $sch=$_POST['src'];
    $myquery="select * from `products` where Name like '%$sch%'"; 
    $result=mysqli_query($conn,$myquery);
  }
  ?>
  </div>
  <!--start style-->
  <style>
  body{
      background: antiquewhite;
  
  }
  .btngan{
    height:40%;
    width:50%;
  }


  .searchbar {
    width: 100%;
    max-width: 700px;
    display: flex;
    padding: 10px 20px ;
    margin-bottom : 12px;
    border-radius : 60px;
    position: absolute;  top: 50px; left: 50px;
    border: 1px solid darkseagreen;
  }
  .searchbar input {
      background: transparent;
      flex: 1;
      border: 0px;
      outline: none;
      padding: 15px 15px;
      font-size: 20px;
      color: darkseagreen;
  }
  ::placeholder {
      color: darkseagreen;
  }
  .searchbar button {
  border: 0;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  cursor: pointer;
  background: darkseagreen ;
  color: white;
  position: absolute;  top: 18px; right: 20px;
  } 
  .sortby {
      width: 100%;
    max-width: 700px;
    display: flex;
    padding: 10px 20px ;
    margin-bottom : 12px;
    position: absolute;  top: 130px; left: 60px;
    color:rgb(80,160,80);
    font-size:medium;
    font-weight: bold;
    display: block;
  }
  .sortby select {
      background: transparent;
      flex: 0.5;
      outline: none;
      padding: 1px 1px;
      font-size: medium;
      color: rgb(80,160,80);
      border: 1px solid darkseagreen;
  }
  .sortby input{
      background:darkseagreen ;
      cursor: pointer;
      font-size: medium;
      color:white;
      width:170px;
      height: 20px;
      border: 1px solid darkseagreen;
  }

  .btnmain{
      height: 200px;
      box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
      max-width: 217px;
      
      top: 260px;
      left: 100px;
      align-items: center;
      position: sticky;
  }
    .box{
    margin: 78px;
}
    

    .buy {
     display: grid;
    width: 225px;
    height: 35px;
    background: darkseagreen;
    position: absolute;
    top: 600px;
    left: -89px;
    margin: 179px;
    place-items: center;
    color: white;
    font-weight: 500;
    letter-spacing: 3px;
    font-size: 20px;
    border-radius: 10px;
}
  
  .buy:hover {
      opacity: 0.7;
    }
    

    
  </style>
  </head>




      <form id="right" method="post" class="sortby"> <label> Sort By:</label>
          <select name="sort" required>
            <option> --Select Option-- </option>
            <option value="low"> Price: Low to High </option>
            <option value="high"> Price: High to Low </option>
          </select>
          <input type="submit" id="input2" Value="Sort_Your_Products" name="btn2">
          </form> <br><br><br><br>

          <?php
          if(isset($_POST['btn2'])){
              $sch= $_POST['sort'];
              if($sch == "high")
              {
              $myquery = "SELECT * FROM `products` order by price desc";
              $result = mysqli_query($conn, $myquery); 
          }
          else if($sch == "low")
          {
              $myquery = "SELECT * FROM `products` order by price Asc";
              $result = mysqli_query($conn, $myquery); 
          }

          }
          
              

          ?>

    <?php
    while ($row=mysqli_fetch_array($result)){
  ?>
  <div class="btngan">
  <div class="box">
    <h4 class="shirt text"><?php echo $row['NAME'] ;?> </h4>
    <p class="pricetext	"><?php echo $row['PRICE'];?>   </p>
  
    <img src=" images/<?php echo $row['IMG'];?>"

    
  
    <div class="btnmain">
      <div class="buy"><a href="#">buynow</a> </div>
      <div class="seemore"><a href="#"></a></div>
    </div>
  </div>
  </div>
  <?php
    }
    ?>


  </div>






  </body>
  </html>