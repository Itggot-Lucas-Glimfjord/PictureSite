<html>
	<head>
		<meta charset="UTF-8"/>
		<title>#Squad</title>
		<link href="css/indexStyle.css" rel="stylesheet" type="text/css"/>
        <link href="css/unsemantic-grid-responsive-tablet.css" rel="stylesheet" type="text/css"/>
        
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/javascript.js" type="text/javascript"></script>
        
	</head>
	
	<body>
		<div id="wrapper">
			
            <header>
                <nav>
                    <section id="upload">
                        <p>Upload</p>
                    </section>
                </nav>
            </header>
            
            <section id="uploadForm">
                <form method="post" action="index.php" enctype="multipart/form-data">
                    <p>
                        <input type="file" name="upImage">
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Upload Image">
                    </p>
                </form>
				    <?php
	$img_dir = "img/uploads/";
    if(isset($_POST["submit"]) && $_POST["submit"] === "Upload Image") {

		$target_file = $img_dir . basename($_FILES["upImage"]["name"]);
		$validIMG = 1;
		
		getimagesize($_FILES["upImage"]["name"]);
		if( file_exists($target_file) ){
			$validIMG = 0;
		}
		
		// Tries to move the uploaded img file away from the tmpfolder if it's a valid img
		if($validIMG === 1 && move_uploaded_file($_FILES["upImage"]["tmp_name"], $target_file)){}
	}
    ?>
            </section>
            
			<?php
				$uploadedIMG = scandir($img_dir);
				array_shift($uploadedIMG);
				array_shift($uploadedIMG);
				
				foreach($uploadedIMG as $img){
			?>
				<div class="image">
					<img src=<?php echo "\"" . $img_dir . $img . "\""; ?>>
				</div>
			<?php
				}
				
				
				
            ?>
        </div>
    </body>

</html>
