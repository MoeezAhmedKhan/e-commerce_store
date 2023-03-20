<?php

    session_start();
    print_r($_SESSION["mycart"]);

    echo $_SESSION["total"];
    echo $_SESSION['user_id'];

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CheckOut Page</title>
    <link rel="stylesheet" href="./assets/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="mainscreen">
        <!-- <img src="https://image.freepik.com/free-vector/purple-background-with-neon-frame_52683-34124.jpg"  class="bgimg " alt="">-->
        <div class="card">
            <div class="leftside">
                <img src="./assets/images/check1.png" class="product" alt="Shoes" />
            </div>
            <div class="rightside">
                <form action="">
                    <h1>CheckOut</h1>
                    <h2>Payment Information</h2>

                    <div class="expcvv">
                        <p>Name</p>
                        <input type="text" class="inputbox" name="name" required />

                        <p>Email</p>
                        <input type="email" class="inputbox" name="card_number" id="card_number" required />
                    </div>
                    <div class="expcvv">
                        <p>Phone</p>
                        <input type="text" class="inputbox" name="name" required />
                        
                        <p>Payment</p>
                        <select class="inputbox" name="" id="">
                            <option disabled>Select</option>
                            <option value="xash">Cash on delivery</option>
                        </select>

                    </div>
                    <p>Address</p>
                    <textarea name="" id="" class="inputbox" cols="30" rows="1"></textarea>
                    <p></p>
                    <button type="submit" class="button">CheckOut</button>
                </form>
            </div>
        </div>
    </div>
    <!-- partial -->

</body>

</html>