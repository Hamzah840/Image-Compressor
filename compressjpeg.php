<?php

require './header.php';
require './function/func_cmprs_jpeg.php';

?>

<meta name="description" content="JPEG Image Compressor">
<meta name="keywords" content="Best image compressor online, image compressor online, image compressor, best image compressor online free, image compressor online free, image compressor free, free image compressor, jpeg compressor, jpg compressor, jpeg and jpeg compressor">

<title>JPEG Compressor -
    <?php echo $title ?>
</title>

<div class="compressor_container flex">
    
    <h2 class="heading2">
        <?php echo $title_jpeg ?>
    </h2>
    
    <div class='compressor_box'>
        <a class="reload-button" href='compressjpeg.php'>&#x21BB;</a>

        <!-- REDIRECT LINKS OF EACH COMPRESS SECTION -->
        <div class="links">
            <a class="activeLink" href="./compressjpeg.php">JPEG</a>
            <a href="./compresspng.php">PNG</a>
        </div>

        <!-- PREVIEW OF COMPRESS OPERATION -->
        <div class="drag-area">
            <div id="load-image">
                <?php
                if (isset($_POST['submit'])) {
                    upload_compress_jpeg();
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