<?php
    $width = 200;
    $height = 50;
    
    // 創建一個空的圖片
    $image = imagecreatetruecolor($width, $height);
    
    // 設定背景顏色
    $bg_color = imagecolorallocate($image, 255, 255, 240);
    imagefill($image, 0, 0, $bg_color);
    
    // 產生隨機的圖形背景
    for ($i = 0; $i < 10; $i++) {
        $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
        $x1 = rand(0, $width);
        $y1 = rand(0, $height);
        $x2 = rand(0, $width);
        $y2 = rand(0, $height);
        imageline($image, $x1, $y1, $x2, $y2, $color);
    }
    
    // 輸出圖片
    header('Content-type: image/png');
    imagepng($image);
    
    // 釋放資源
     imagedestroy($image);
?>
    