<?php

function checkUser()
{
	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['ac_accom_admin'])) {
		header('Location: login.php');
		exit;
	}
}

function doLogout()
{
	session_destroy();
	header('Location: index.php?e');
	exit;
}

function createThumbnail($srcFile, $destFile, $width, $quality = 100)
{
    $thumbnail = '';

    if (file_exists($srcFile)  && isset($destFile))
    {
        $size        = getimagesize($srcFile);
        $w           = number_format($width, 0, ',', '');
        $h           = number_format(($size[1] / $size[0]) * $width, 0, ',', '');

        $thumbnail =  copyImage($srcFile, $destFile, $w, $h, $quality);
    }

    // return the thumbnail file name on sucess or blank on fail
    return basename($thumbnail);
}

/*
    Copy an image to a destination file. The destination
    image size will be $w X $h pixels
*/
function copyImage($srcFile, $destFile, $w, $h, $quality = 100)
{
    $tmpSrc     = pathinfo(strtolower($srcFile));
    $tmpDest    = pathinfo(strtolower($destFile));
    $size       = getimagesize($srcFile);

    if ($tmpDest['extension'] == "gif" || $tmpDest['extension'] == "jpg")
    {
       $destFile  = substr_replace($destFile, 'jpg', -3);
       $dest      = imagecreatetruecolor($w, $h);
       imageantialias($dest, TRUE);
    } elseif ($tmpDest['extension'] == "png") {
       $dest = imagecreatetruecolor($w, $h);
       imageantialias($dest, TRUE);
    } else {
      return false;
    }

    switch($size[2])
    {
       case 1:       //GIF
           $src = imagecreatefromgif($srcFile);
           break;
       case 2:       //JPEG
           $src = imagecreatefromjpeg($srcFile);
           break;
       case 3:       //PNG
           $src = imagecreatefrompng($srcFile);
           break;
       default:
           return false;
           break;
    }

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);

    switch($size[2])
    {
       case 1:
       case 2:
           imagejpeg($dest,$destFile, $quality);
           break;
       case 3:
           imagepng($dest,$destFile);
    }
    return $destFile;

}


?>