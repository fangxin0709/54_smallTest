<?php include_once "./api/db.php";
session_start();
if(!isset($_SESSION['login'])){
?>
<script>
    alert("請先登入!");
    location.href="./login.php";
</script>
<?php
}
?>
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
    .a{
        font-size:20px ;
    }
    .a:hover{
        text-decoration: none;
    }
    form{
        background-color: #ffffff99;
        padding: 20px;
        margin-top: 50px;
        border-radius:10px;
        border:3px solid #888;
    }
    .loginblue {
        height: 600px;
        width: 300px;
        background-color: #5a99cd;
        right: 0;
        z-index: 998;
        position: absolute;
        display: none;
        top: 0;
        padding: 20px;
    }
    .login{
        position: absolute;
        z-index: 999;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 55px;
        animation: login 3s ease forwards;
    }
    @keyframes login {
        from{font-size: 55px;}
        to{font-size: 20px;}
    }
     .wel{
        position: absolute;
        right: 0;
        width: 50%;
        height: 100%;
        background-color: #bababa90;
        animation: wel 2s ease forwards;
        z-index: 999;
        /* backdrop-filter: blur(20px); */
    }
    .come{
        position: absolute;
        left: 0;
        width: 50%;
        height: 100%;
        background-color: #bababa90;
        /* backdrop-filter: blur(20px); */
        animation: come 2s ease forwards;
        z-index: 999;
    }
    @keyframes wel {
        0%{width: 50%;}
        75%{width: 50%;}
        100%{width: 0%;}
    }
    @keyframes come {
        0%{width: 50%;}
        75%{width: 50%;}
        100%{width: 0%;}
    }
    .mask{
      position: absolute;
      right: 0;
      bottom: 0;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: #00000058;
      z-index: -1;
      /* backdrop-filter: blur(5px); */
    }
    .modal{
      z-index: 999;
      display: none;
    }
</style>
<body>
    <?php
    if(isset($_SESSION['ani'])){
        ?>
        <div class="wel"></div>
        <div class="come"></div>
        <div class="login">登入成功!</div>
        <?php
        unset($_SESSION['ani']);
    }
    ?>
<nav style="font-size: 30px;display: flex;justify-content: space-between;"
        class="navbar navbar-expand-lg navbar-light">
        <div class="d-flex" style="align-items: center;">
        <img style="height: 70px;width: 75px;" src="./img/fibex最終.png" alt="">
        <?php
         if(isset($_SESSION['login'])){
            ?>
            <img style="width:40px;height:40px;" class="m-3" src="./img/admin.png" alt="">
            <div style="font-family: sans-serif;">
                admin 您好 !
           </div>
            <a class="ml-3 a" href="./api/logout.php">登出</a>
            <?php
         }
         ?>
        </div>
        <ul class="navbar-nav">
            <li style="margin:10px;" class="nav-item">
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
    <div class="loginblue">
        <h3>管理員操作</h3>
        <a href="./admin.php">查看購票資料</a>
    </div>
    <div class="modal m1">
    <div class="mask" onclick="closemodal(1)"></div>
    <div id="edit" class="mt-5">
        <form action="./api/edit.php" method="post" class="container" style="margin-top:100px;">
            <img style="position: relative;left: 450px;width: 170px;height: 35px;" src="./img/fibex最終2.png" alt="">
    <h1 style="position: relative;text-align: center;"class="p-4 container">修改資料</h1>
    <input type="hidden" id="editId" name="id">
    <label class="form-group col-3" for="first_name">First name（名字）</label>
    <input type="text" name="first_name" class="form-group form-control " id="first_name" required placeholder="First name（名字）">
    <label class="form-group col-3" for="last_name">Last name（姓氏）</label>
    <input type="text" name="last_name" class="form-group form-control " id="last_name" required placeholder="Last name（姓氏）">
    <label class="form-group col-3" for="phone">Phone（手機號碼）</label>  
    <input type="number" name="phone" class="form-group form-control " id="phone" required placeholder="Phone（手機號碼）">
    <label class="form-group col-3" for="password">Password（會員密碼）</label>
    <input type="password" name="password" class="form-group form-control " id="password"required placeholder="Password（會員密碼）">
    <input type="submit" style="width: 1110px;" class="btn btn-success" value="Edit(修改)"></input>
    <button class="btn btn-secondary mt-2"style="width: 1110px;" onclick="closemodal(1)">回上頁(Go back)</button>
        </form>
    </div>
  </div>
    <main class="container" id="look">
        <h1 class="text-center p-3" style="border:1px #888 solid;">購票資料  <a class="btn btn-success" href="./tickets.html">新增</a></h1>
        <div style="height:400px;overflow:scroll;overflow-x:hidden;">
            <table class="table table-bordered text-center table-striped" style="background:#ffffff80;">
                <tr style="background-color:#999;color:#fff;">
                    <td style="width:17%">First name（名字）</td>
                    <td style="width:17%">Last name（姓氏）</td>
                    <td style="width:17%">Phone（手機號碼）</td>
                    <td style="width:17%">Password（會員密碼）</td>
                    <td style="width:17%">Ordertime（時間）</td>
                    <td style="width:15%">操作</td>
                </tr>
                <?php
                $rows=$conn->query("select * from `tickets`")->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
                    ?>
                <tr>
                    <td><?=$row['first_name'];?></td>
                    <td><?=$row['last_name'];?></td>
                    <td><?=$row['phone'];?></td>
                    <td><?=$row['password'];?></td>
                    <td><?=$row['ordertime'];?></td>
                    <td>
                        <button class="btn btn-secondary" onclick="edit('tickets',<?=$row['id']?>),openmodal(1),$('#look').hide();">修改</button>
                        <button class="btn btn-danger" onclick="del('tickets',<?=$row['id']?>)">刪除</button>
                    </td>
                </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div id="timer">0秒前刷新</div>
    </main>
    <div style="display: flex;justify-content: center;position: absolute;bottom: 0px;" class="fixed-bottom">
        <img style="height: 50px;width: 50px;" src="./img/fb_icon_325x325.png" alt="">
        <img style="height: 50px;width: 50px;" src="./img/1200x600wa.png" alt="">
    </div>
    <footer class="bg-primary fixed-bottom p-2 text-center w-100">Copyright © 2023 YODEX All Rights Reserved</footer>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script>
        //login框
        $("#loginbtn").click(() => {
            $(".loginblue").toggle("slide:left");
        })
        $(".blue").load("./blue.php");
        // 定時刷新
        // var getTime = 0;
        // var findid = document.getElementById("timer"); 
        // setInterval(time,1000); //每1秒執行time()
        // function time(){
        //     getTime += 1;
        //     findid.innerText = getTime + "秒前刷新";
        //     if(getTime==5){
        //         location.reload();
        //     }
        // }
        function del(table,id){
            $.post("./api/del.php",{table,id},()=>{
                location.reload();
            })
        }
        function edit(table,id){
    $.getJSON("./api/get.php",{table,id},(data)=>{
        $("#first_name").val(data.first_name);
        $("#last_name").val(data.last_name);
        $("#phone").val(data.phone);
        $("#password").val(data.password);
        $("#editId").val(data.id);
    })
}
function openmodal(num){
    $(".modal.m"+num).fadeIn();
}
function closemodal(num){
    $(".modal.m"+num).fadeIn();
    $("#look").show();
}
    setTimeout(close,1500);
    function close(){
        $(".login").css('display','none');
    }
        </script>
</html>