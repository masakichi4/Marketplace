<!DOCTYPE html>
<?php
$product_name = "other";
$product_val = 1;

if (isset($_COOKIE[$product_name])) {
	$product_val = ((int)$_COOKIE[$product_name]) + 1;
}

setcookie($product_name, (string)$product_val, time() + (86400 * 30), "/");
$conn = mysqli_connect('54.193.22.204','tester','password','project_281');
$query = "INSERT INTO petothermv(rating) VALUES ('1')";
$result = mysqli_query($conn,$query);
$db2 = mysqli_connect("54.193.22.204","tester","password","project_281");
$sql = "INSERT INTO tracking VALUES(0,'Petcake','Pet Other Desserts')";
$db2->query($sql);
?>
<html>
<head>
    <h1 style="color: white; margin-left: 40%; top: 5px; position: relative;">Other Desserts</h1>

<meta name="viewport" content="width=device-width"> 
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    <!-- font awesome -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- rating star css -->
    <link rel="stylesheet" href="/petother/js/ratingstar.css">
<style>
body {
    background-color: #e9c092;
}
.container {
  width: 25%;
  top: 5%;
}
.image{
    float: left;
    width: 100%;
}
.text {
    width: 100%;
    color: white;
    font-size: 18px;
    padding: 18px 18px;
    text-decoration: none;
    text-align: center;

}
.text a {
  border: 2px #FFBA05;
  background-color: white;
  color: #FFBA05;
  padding: 15px 20px;
  font-size: 16px;
  cursor: pointer;
}
.text a:hover {
    color: white;
    background-color: #FFBA05;
    text-decoration: none
}

</style>
<body>
<div class="container">
<img class="alignnone size-medium wp-image-169" src="http://hejiang10937.ipage.com/wp-content/uploads/2018/11/other-200x300.jpg" alt="" width="90%" /></div>
<div class = "text">Every day we offer one type of baked desserts that is not displayed on our site for a limited amount ONLY.
<br>
Drop in or check our social media to see what's good for today!
<br>
$10 deposit required when you order online.
<br><br>
<a href="/products.html">Back to Products</a> 
<a href="/bestproduct.php/">Mostly Viewed</a>
<a href="/beststar.php/">Top Star Rated</a>
<a href="/bestnum.php/">Top Number Rated</a>
<a href="http://madhukalluraya.com/final.php" style="color: #581845">Back to Marketplace</a>
</div>
<br>
<div style="border-style: dotted solid double dashed;">
        <label for="email" style="font-size: 20px; margin-left: 10px;">Please Rate this product :</label>     
            <div class='starrr' id='rating-student'></div>
<div class="numberRating" style="font-size: 20px; position: relative; left: 700px;">
            <p style="margin-top: -34px; margin-left: 60px;"><strong>Give a Number Rating: </strong></p>
            <div style="margin-top: -40px; margin-left: 280px;">
                <?php foreach (range(1,5) as $rating): ?>
                    <a href="/petother/rate.php?rating=<?php echo $rating; ?>"><?php echo $rating."&nbsp"; ?></a>
                <?php endforeach ?>
            </div>
    </div>
<div style="border-style: dotted; border-color: #f38067; margin-top: 0px; height: 140px; width: 500px; margin-left: 900px;">
        <h3 style="color: black; margin-left: 320px; text-shadow: 1px 1px;">Price: $10</h3><br>
        <form method="POST" style="margin-left: 30px;">
            <img src="/cart.jpeg" width="45" style="margin-top: -10px;">
            <input type="submit" name="cart" value="Add to Cart" style="background: white;color: #e9c092; width: 150px;height: 30px; font-size: 20px; cursor: url(img/handcursor.jpg),pointer; font-weight: bold;">
        </form>
        <form method="POST" style="margin-left: 235px; margin-top: -35px;" action="http://madhukalluraya.com/shoppingcart copy/buy2.php">
            <input type="submit" name="buy" value="Buy Now" style="background: white;color: #e9c092; width: 150px;height: 30px; font-size: 20px; cursor: url(img/handcursor.jpg),pointer; font-weight: bold; margin-left: 30px;">
            <img src="/buy.jpeg" width="50" style="margin-top: -10px;">
        </form>
        <?php
            if(isset($_POST['cart'])){
                $conn = mysqli_connect("54.193.22.204","tester","password","project_281");
                $query = "INSERT INTO shopping_cart (name, price, image) VALUES ('Pet Other Desserts', 10, 'petother.jpg')";
                $result = mysqli_query($conn,$query);
            }
        ?>
    </div>
<div class="row">
<div class="col-md-12">
   <div style="border-style: dotted; margin-top: 20px; padding-left: 20px; width: 70%; margin-left: 200px;">
    <div class="form-group">
        <div class="form-group has-success has-feedback">
            <h1>Please submit a Feedback</h1>
            <label for="name">Name :</label>
            <input type="text" class="form-control" id="name" style="width: 600px;">          
        </div>
        <div class="form-group has-success has-feedback">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" style="width: 600px;">            
        </div>   
        <h5 style="margin-left:0px">Feedback: </h5><textarea style="margin-left:0px" rows="10" cols="100"></textarea>  <br><br>
        <input type="button" id="submit" class="btn btn-success" value="Submit" style="margin-left: 300px; width: 100px; background-color: black; color: green; font-weight: bold; ">
        <div class="msg"></div>
</div>
<script src="/petother/js/ratingstar.js"></script>
<!-- ajax -->
<script>
// rating
var rate;
jQuery('#rating-student').starrr({
  change: function(e, value){ 
    rate = value;          
    if (value) {
      jQuery('.your-choice-was').show();      
    } else {
      jQuery('.your-choice-was').hide();
    }
  }
});
// ajax submit
jQuery("#submit").click(function(){  
    var name = jQuery('#name').val();
    var email = jQuery('#email').val();  
    jQuery.ajax({        
        url: "/petother/rating.php",
        type: 'post',
        data: {v1 : name, v2 : email, v3 : rate},
        success: function (status) {
            if(status == 1){
                jQuery('.msg').html('<b>Record Inserted !</b>');
            }else{
                jQuery('.msg').html('<b>Server side error !</b>');               
            }
        }
    });

});
</script>
</head>
</body>
</html>