<style>
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
</style>
<div class="loginblue">
            <h3>管理員操作</h3>
            <a href="./admin.php">查看購票資料</a>
</div>
<script src="./js/jquery-3.6.3.min.js"></script>
<script>
     $("#loginbtn").click(() => {
            $(".loginblue").toggle("slide:left")
        })
</script>