<link rel="stylesheet" href="./css/bootstrap.css">
<style>
    body{
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        top: 0;
        overflow: hidden;
        background-image: url(../img/news1.jpg);
        transition: background-image 0.5s ease;
        background-size: 100% 1080px;
        background-repeat: no-repeat;
        backdrop-filter: blur(40px);
    }
    .login{
        position: absolute;
        z-index: 999;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        animation: login 2s ease forwards;
    }
    @keyframes login {
        from{font-size: 0px;}
        to{font-size: 55px;}
    }
    .wel{
        position: absolute;
        right: 0;
        width: 0%;
        height: 100%;
        background-color: #bababa90;
        animation: wel 0.8s ease forwards;
        z-index: 998;
    }
    .come{
        position: absolute;
        left: 0;
        width: 0%;
        height: 100%;
        background-color: #bababa90;
        animation: come 0.8s ease forwards;
        z-index: 998;
    }
    @keyframes wel {
        from{width: 0%;}
        to{width: 50%;}
    }
    @keyframes come {
        from{width: 0%;}
        to{width: 50%;}
    }
    .o{
        height: 48px;
        width: 48px;
        border: 2px solid #fff;
        border-radius:50%;
        border-right-color:transparent;
        animation: o 0.5s ease-in-out infinite;
    }
    .load{
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        right: 0;
        left: 0;
        top:0;
        bottom:18%;
    }
    @keyframes o {
        from{
            transform:rotate(0deg);
        }
        to{
            transform:rotate(360deg);
        }
    }
</style>
<?php
session_start();
if($_POST['acc'] =="" || $_POST['pw']== "" || $_POST['code'] ==""){
    echo "<div>值不能為空</div>";
    exit();
}
if($_SESSION['code']!=$_POST['code']){
    header("location:../login.php?error=2");
    exit();
}
?>
<?php
if($_POST['acc']=="admin" && $_POST['pw']=="1234"){
    $_SESSION['login']="ok";
    $_SESSION['ani']="ok";
?>
<div class="wel"></div>
<div class="come"></div>
<div class="load">
            <span class="o"></span>
        </div>
        <div class="login">
            <span>正在登入中</span></div>
        </div>
<script>
    setTimeout(back,2500);
    function back(){
        location.href="../admin.php";
    }
</script>
<?php
}else{
    header("location:../login.php?error=1");
}
?>