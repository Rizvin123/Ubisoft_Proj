<?php
include 'functions.php';
    session_start();
    $_SESSION['message'] = '';
    $mysqli= connect_mysql();
    if ($_SERVER["REQUEST_METHOD"]=="POST") {            
        $title= $mysqli->real_escape_string($_POST['title']);
        $description= $mysqli->real_escape_string($_POST['description']);
        $image_path = $mysqli->real_escape_string('images/'.$_FILES['image']['name']);
        
        //make sure file type is image
        if (preg_match("!image!", $_FILES['image']['type'])){
            
            if(copy($_FILES['image']['tmp_name'],$image_path)){
                
                $_SESSION['title']= $title;
                $_SESSION['image']= $image_path;
                $sql= "INSERT INTO users(title,description,image,uploaded_date)"
                        ."VALUES('$title','$description','$image_path',now())";
                
                //if the query is succesful, redirect to welcome.php , done !
                if($mysqli->query($sql)=== true){
                    $_SESSION['message'] = "Product added to the database!";
                    //header("location:index.php");
                }
                else {
                    $_SESSION['message'] = "Product could not be added to the database!";
                }               
            }
            else {
                $_SESSION['message'] = "File upload failed" ;
            }  
        } else {
                $_SESSION['message'] = "Please upload GIF , PNG or JPG Images !" ;
            }  
    }
?>
<?=template_header('Upload Image')?>

<div class="content upload">
	<h2>Upload Image</h2>
        <p><?=$_SESSION['message']?></p>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<label for="image">Choose Image</label>
		<input type="file" name="image" accept="image/*" id="image">
		<label for="title">Title</label>
		<input type="text" name="title" id="title">
		<label for="description">Description</label>
		<textarea name="description" id="description"></textarea>
	    <input type="submit" value="Upload Image" name="submit">
	</form>
</div>

<?=template_footer()?>