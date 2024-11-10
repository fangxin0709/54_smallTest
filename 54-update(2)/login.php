<?php include_once "./api/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2024法國國際商務展(FIBEX)</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<style>
    body {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        top: 0;
        /* overflow: hidden; */
        background-image: url(./img/news1.jpg);
        transition: background-image 0.5s ease;
        background-size: 100% 1080px;
        background-repeat: no-repeat;
        backdrop-filter: blur(20px);
    }
    form{
        margin: 0;
        height: 350px;
        width: 490px;
        padding: 15px;
        position: relative;
        left:725px;
    }
    input,.form-control {
      height: 45px;
      border-radius: 5px;
      transition: all 0.3s ease;
      width: 450px;
    }
    .form-control::placeholder {
      font-size: 20px;
      color: #aaa;
      transition: all 0.3s ease;
      
    }
    .form-control:focus::placeholder {
      font-size: 18px;
      color: #007bff;
    }
    .error{
        position: absolute;
        right: -610px;
        margin: 20px;
        width:200px;
        height: 30px;
        background-color: #ff000099;
        color: #fff;
        border-radius:5px;
        display:flex;
        padding: 2px;
        align-items: center;
        /* border:inset; */
        /* border-color:#888; */
        animation: errord 1s ease forwards;
    }
    .x{
        color: #fff;
    }
    .fa{
        animation: fast 0.4s;
        border-radius:5px;
        position: relative;
        border: 5px solid #ff00005e;
    }
    @keyframes fast {
        0% {left:725px}
        25% {left:733px}
        50% {left:725px}
        75% {left:717px}
        100% {left:725px}
    }
    @keyframes errord {
        from{top:350px}
        to{top:-135px}
    }
    .m{
        right: 10px;
        position: relative;
    }
    .form-control {
      width: 450px;
      height: 50px;
      border-radius: 0px;
      border: none;
      background: #ffffffd3;
      border-bottom: 2px solid #333;
      transition: all 0.3s ease;
    }
    .form-control::placeholder {
      font-size: 20px;
      color: #aaa;
      transition: all 0.3s ease;
      
    }
    .form-control:focus::placeholder {
      font-size: 18px;
      color: #007bff;
    }
    .code{
       font-family: 'Courier New', Courier, monospace;
       font-size: xx-large;
       display: flex;
       align-items: center;
       margin: 0 0 0 30px;
       font-style: italic;
       user-select: none;
     }
</style>
<body>
<nav style="font-size: 30px;display: flex;justify-content: space-between;"
        class="navbar navbar-expand-lg navbar-light">
        <img style="height: 70px;width: 75px;" src="./img/fibex最終.png" alt="">
        <!--快速指法 ul.navbar-nav>li.nav-item*4>a.nav-link -->
        <ul class="navbar-nav">
            <li style="margin:10px;"class="nav-item">
                <a href="home.html" class="nav-link">Home</a>
            </li>
            <li style="margin:10px;" class="nav-item">
                <a href="news.html" class="nav-link">News</a>
            </li>
            <li style="margin:10px;" class="nav-item">
                <a href="business.html" class="nav-link">Business</a>
            </li>
            <li style="margin:10px;" class="nav-item">
                <a href="tickets.html" class="nav-link">Tickets</a>
            </li>
            <img id="loginbtn"
                style="height: 30px;position: relative;z-index:999;top: 27px;margin: 0 10px;cursor: pointer;"
                src="./img/login.png" alt="">
        </ul>
    </nav>
        <div class="blue">
        </div>
    <h1 style="text-align: center;" class="mt-5">管理員登入</h1>
    <?php
    if(isset($_GET['error'])){
        ?>
    <form action="./api/login.php" method="post" class="fa">
        <?php
            switch($_GET['error']){
                case 1:
                    ?>
                    <div class='error'><div> &#9888; 帳號密碼錯誤</div><div class='btn x' onclick='ec()'>&times;</div></div>
                    <?php
                    break;
                case 2:
                    ?>
                    <div class='error'><div> &#9888; 驗證碼錯誤</div><div class='btn x' onclick='ec()'>&times;</div></div>
                    <?php
                    break;
            }
        }else{
        ?>
        <form action="./api/login.php" method="post">
        <?php
        }
        ?>
        <input type="text" class="form-group form-control  mt-3" name="acc" id="acc" placeholder="帳號" required>
        <input type="password" class="form-group form-control " name="pw" id="pw" placeholder="密碼" required>
        <input type="text" class="form-group form-control " name="code" id="code" placeholder="驗證碼" required>
        <div style="width:450px ;display: flex;flex-direction: row-reverse;align-items: center;">
          <img style="height: 50px;width: 100px;position: absolute;z-index: -999;" src="Ok.php" alt="">
          <div style="position: relative;left: -14px;" class="code" id="code">0000</div>
            <div class="btn btn-success" onclick="rc()">重新產生驗證碼</div>
        </div>
        <input type="submit" class="btn btn-dark mt-2" value="送出">
    </form>
    <div style="display: flex;justify-content: center;position: absolute;bottom: 50px;" class="fixed-bottom">
        <img style="height: 50px;width: 50px;" src="./img/fb_icon_325x325.png" alt="">
        <img style="height: 50px;width: 50px;" src="./img/1200x600wa.png" alt="">
    </div>
    <footer class="bg-primary fixed-bottom p-2 text-center w-100">Copyright © 2023 YODEX All Rights Reserved</footer>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>
    <script>
        $("#loginbtn").click(() => {
            $(".loginblue").toggle("slide:left")
        })
        $(".blue").load("./blue.php");
        //重整驗證碼
        // rc();
        // function rc(){
        //    $.get("./api/code.php",(num)=>{
        //    $(".code").text(num);
        //  })
        // }
        $(".code").load("./api/code.php");
  function rc(){
        location.reload();
    // $(".veri").load("./veri.php");
  }
        function ec(){
            $(".error").hide();
        }
        if (window.performance) {
            if (performance.navigation.type === 1) {
                window.location.href = 'login.php';
            }
        }
        </script>
</html>