<?php

require './header.php';
require './function/func_cmprs_png.php';

?>

<title>PNG Compressor -
    <?php echo $title ?>
</title>
<meta name="description" content="PNG Image Compressor">
<meta name="keywords" content="Best image compressor online, image compressor online, image compressor, best image compressor online free, image compressor online free, image compressor free, free image compressor, png compressor">

<div class="compressor_container flex">
    
    <h2 class="heading2">
        <?php echo $title_png ?>
    </h2>
    
    <div class='compressor_box'>
        <a class="reload-button" href='compresspng.php'>&#x21BB;</a>

        <!-- REDIRECT LINKS OF EACH COMPRESS SECTION -->
        <div class="links">
            <a href="./compressjpeg.php">JPEG</a>
            <a class="activeLink" href="./compresspng.php">PNG</a>
        </div>

        <!-- PREVIEW OF COMPRESS OPERATION -->
        <div class="drag-area">
            <div id="load-image">
                <?php
                if (isset($_POST['submit'])) {
                    upload_compress_png();
                }
                ?>
            </div>
        </div>

        <!-- COMPRESS OPERATION BUTTON SECTION -->
        <div class="btn-box flex">

            <form action="" method="post" enctype="multipart/form-data">

                <label class="file" for="fileToUpload">
                    <i class="fa fa-upload"></i>
                    Upload File
                    <input type="file" name="fileToUpload" id="fileToUpload" multiple required>
                </label>

                <label class="fa fa-compress">
                    <input type="submit" value="Compress Now" name="submit" id="submit-compress">
                </label>

            </form>

        </div>
    </div>
</div>

<?php require 'footer.php'; ?>