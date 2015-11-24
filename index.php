<html>
	<head>
		<meta charset="UTF-8"/>
		<title>#Squad</title>
		<link href="css/indexStyle.css" rel="stylesheet" type="text/css"/>
        <link href="css/unsemantic-grid-responsive-tablet.css" rel="stylesheet" type="text/css"/>
        
        <script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/javascript.js" type="text/javascript"></script>
        
	</head>
	
	<body>
		<div id="wrapper">
			
            <header>
            	<nav>
					<ul class="listmenu">
						<li id="upload">Upload</li>
					</ul>
				</nav>
            </header>
			
			<div id="position_displacer" class="grid-100"></div>
			<div id="uploadForm">
					<form method="post" action="index.php" enctype="multipart/form-data">
						<p>
							<input type="file" name="upImage">
						</p>
						<p>
							<input type="submit" name="submit" value="Upload Image">
						</p>
					</form>
				
			</div>

			<?php
				if(isset($_POST["submit"]) && $_POST["submit"] === "Upload Image") {
					$img_dir = "img/uploads/";
					$target_file = $img_dir . basename($_FILES["upImage"]["name"]);
					$validIMG = 1;

					// Tries to move the uploaded img file away from the tmpfolder if it's a valid img
					if($validIMG === 1 && move_uploaded_file($_FILES["upImage"]["tmp_name"], $target_file)){}
				}
			
				$img_dir = "img/uploads/";
				$uploadedIMG = scandir($img_dir);
				array_shift($uploadedIMG);
				array_shift($uploadedIMG);
			
			
			?>
			
            <section class="prefix-5 grid-30 30 row">
				<?php
					for($i=0;$i+2<count($uploadedIMG);$i=$i+3){
				?>
						
					<article class="uploadedIMGArticle">
						<img src="<?php echo $img_dir . $uploadedIMG[$i]; ?>"/>
					</article>
				<?php
					}
				?>
				
            </section> 
            <section class="grid-30 30 row">
				<?php
					for($i=1;$i+2<count($uploadedIMG);$i=$i+3){
				?>
						
					<article class="uploadedIMGArticle">
						<img src="<?php echo $img_dir . $uploadedIMG[$i]; ?>"/>
					</article>
				<?php
					}
				?>
				
            </section> 
            <section class="grid-30 30 row">
				<?php
					for($i=2;$i+2<count($uploadedIMG);$i=$i+3){
				?>
						
					<article class="uploadedIMGArticle">
						<img src="<?php echo $img_dir . $uploadedIMG[$i]; ?>"/>
					</article>
				<?php
					}
				?>
				
            </section>
			   
        </div>
    </body>

</html>    


