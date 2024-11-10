<style>
    .login{
        position: absolute;
        z-index: 999;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 55px;
        animation: login 2s ease forwards;
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
        backdrop-filter: blur(20px);
    }
    .come{
        position: absolute;
        left: 0;
        width: 50%;
        height: 100%;
        background-color: #bababa90;
        backdrop-filter: blur(20px);
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
</style>
<?php
session_start();
    if(isset($_SESSION['ani'])){
        ?>
        <div class="wel"></div>
        <div class="come"></div>
        <div class="login">資料已送出!</div>
        <?php
        unset($_SESSION['ani']);
    }
    ?>
<script>
    setTimeout(close,1500);
    function close(){
        $(".login").css('display','none');
    }
</script>