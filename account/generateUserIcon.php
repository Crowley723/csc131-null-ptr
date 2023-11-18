<?php
function generateIdenticon($identifier, $size = 128) {
    $hash = md5($identifier);
    $hashValues = array_map('hexdec', str_split($hash, 2));


    $image = imagecreatetruecolor($size, $size);
    $whiteColor = imagecolorallocate($image, 255, 255, 255);
    imagefill($image, 0, 0, $whiteColor);

    $gridSize = 4;
    $cellSize = $size / $gridSize;
    $color = imagecolorallocate($image, $hashValues[0] % 256, $hashValues[1] % 256, $hashValues[2] % 256);


    $mask = imagecreatetruecolor($size, $size);
    $maskColor = imagecolorallocate($mask, 0, 0, 0);
    imagecolortransparent($mask, $maskColor);
    imagefilledellipse($mask, $size / 2, $size / 2, $size, $size, $maskColor);


    imagecopymerge($image, $mask, 0, 0, 0, 0, $size, $size, 100);


    for ($i = 0; $i < $gridSize; $i++) {
        for ($j = 0; $j < $gridSize; $j++) {
            $index = $i * $gridSize + $j;
            $distanceX = abs($j - $gridSize / 2 + 0.5);
            $distanceY = abs($i - $gridSize / 2 + 0.5);
            $distance = sqrt($distanceX * $distanceX + $distanceY * $distanceY);

            if ($distance < $gridSize / 2) {
                $rectangleColor = $hashValues[$index] % 2 === 0 ? $color : $whiteColor;


                imagefilledrectangle(
                    $image,
                    $j * $cellSize,
                    $i * $cellSize,
                    ($j + 1) * $cellSize,
                    ($i + 1) * $cellSize,
                    $rectangleColor
                );

                $mirrorIndex = $gridSize - $j - 1;
                imagefilledrectangle(
                    $image,
                    ($gridSize - $j - 1) * $cellSize,
                    $i * $cellSize,
                    ($gridSize - $j) * $cellSize,
                    ($i + 1) * $cellSize,
                    $rectangleColor
                );
            }
        }
    }

    ob_start();
    imagepng($image);
    imagedestroy($image);
    imagedestroy($mask);
    $imageData = ob_get_clean(); 
    $base64 = base64_encode($imageData);

    header('Content-Type: application/json');
    echo json_encode(['image' => $base64]);
}

// Get the email from the session
session_start();
$email = isset($_GET['email']) ? $_GET['email'] : 'default';

// Generate and display the identicon
generateIdenticon($email);
?>
