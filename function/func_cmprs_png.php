<?php
ini_set('display_errors', 0);

	function upload_compress_png($compression=9) {		//Default compression is 60%
		$min = "min-";
		$prmtName = $_FILES["fileToUpload"]["name"];
		$tempName = $_FILES["fileToUpload"]["tmp_name"];
		$upload_dir = "./img/compressor/uploads_png/";
		$compressed_dir = "./img/compressor/compressed_png/";
		$target_file = $upload_dir . $prmtName;
		$uploadOk = 1;
		$imageFileType = "";
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($tempName);
		  $imageFileType = pathinfo($prmtName, PATHINFO_EXTENSION);
		  if($check !== false) {
			$uploadOk = 1;
		  } else {
			echo "<div class='error fa'>File is not an image</div>";
			$uploadOk = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		//   echo "<div class='error fa'>Sorry, file already exists</div>";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 50000000) {       // 50 MB Maximum File size is allowed
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType == "png") {
			$uploadOk = 1;
		} else {
		  echo "<div class='error fa'>Sorry, only PNG Format is allowed</div>";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "<div class='error fa'>Sorry, your file was not uploaded</div>";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($tempName, $target_file)) {
				$filePath = "./img/compressor/uploads_png/".htmlspecialchars($prmtName);
				$compressedFilePath = "./img/compressor/compressed_png/".$min.$prmtName;
				
				compress($filePath, $compressedFilePath, $compression);
				
				echo "
				<div class='preview_container'>
				<h3 class='heading3'>Preview</h3>
				<div class='col-2 flex'>
					<div class='col-2-part'>
					<h4 class='heading4'>Uploaded File</h4>
					<div class='imgBox'>
					<img src='".$filePath."'/>
					<span>".round(filesize($filePath) / 1024, 2)." KB</span>
					</div>
				</div>
				<div class='col-2-part'>
					<h4 class='heading4'>Compressed File</h4>
					<div class='imgBox'>
					<img src='".$compressedFilePath."'/>
					<a href='".$compressedFilePath."' class='btn icon-download absolute-br' role='button' download><i class='fa fa-download'></i></a>
					<span>".round(filesize($compressedFilePath) / 1024, 2)." KB <b>".round((filesize($filePath)-filesize($compressedFilePath))*100/filesize($filePath), 0)."% Size Reduced</b> </span>
				</div>
				</div>
				</div>
				</div>
				";

		  } else {
			echo "<div class='error fa'>Sorry, there was an error uploading your file</div>";
		  }

		}
	}
	
	function compress($src_file_loc, $dest_file_loc, $compression = 9) {
		$img = imagecreatefrompng($src_file_loc);
		imagesavealpha($img, true);
		$bgcolor = imagecolorallocatealpha($img, 0, 0, 0, 127);
		imagefill($img, 0, 0, $bgcolor);
		imagepng($img, $dest_file_loc, $compression);
		imagedestroy($img);
	}
	
	function src_file_loc($filename) {
		return "./img/compressor/uploads_png/".htmlspecialchars($filename);
	}
	function compressed_file_loc($filename) {
		return "./img/compressor/compressed_png/".$filename;
	}
	
?>