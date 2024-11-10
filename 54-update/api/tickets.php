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
<body>
<?php
session_start();
if($_SESSION['veri']==$_POST['veri']){
    include_once "db.php";
    $conn->query("INSERT INTO tickets(first_name,last_name,phone,password)VALUES
    ('{$_POST['first_name']}','{$_POST['last_name']}','{$_POST['phone']}','{$_POST['password']}')");
    $_SESSION['ani']="Ok";
?>
        <div class="wel"></div>
        <div class="come"></div>
        <div class="load">
            <span class="o"></span>
        </div>
        <div class="login">
            <span>資料送出中 請稍後...</span></div>
        </div>
        
<script>
    setTimeout(back,2500);
    function back(){
        location.href="../home.html";
    }
</script>
<?php
}else{
?>
    <script>
        alert("驗證碼不正確!");
        location.href="../tickets.html";
    </script>
<?php
}
?>  
</body>