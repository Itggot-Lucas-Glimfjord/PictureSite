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
                        <input type="file" name="upImage" >
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Upload Image">
                    </p>
                </form>
            </section>
            
            
        </div>
    </body>
    <?php
    
    if(isset($_POST["submit"])) {
        $target_dir = "img/uploads/";
        $target_file = $target_dir . basename($_FILES["upImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["upImage"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["upImage"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["upImage"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
    }
        
        
        
    
    
    
    ?>
</html>
