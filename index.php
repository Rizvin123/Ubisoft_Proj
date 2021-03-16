<?php
include 'functions.php';
// Connect to MySQL
session_start();
$mysqli = connect_mysql();
// MySQL query that selects all the images
?>

<?=template_header('Gallery')?>

<div class="content home">
    
	<h2>Gallery !<a> Welcome to the gallery page, you can view the list of Products below.</a>
        <a href="upload.php"class="upload-image">Registration Page</a>
        </h2>
        <input type="checkbox" id="load-more"/>
        <div id="images" class="images">
            <?php
            $result = $mysqli->query("select * from users");
            $totalrows = mysqli_num_rows($result);
            $images = $mysqli->query("SELECT * FROM users ORDER BY uploaded_date ");
            while($row=$images->fetch_assoc()): ?>
            <a href="#">
                    <img src="<?=$row['image']?>" alt="<?=$row['description']?>" data-id="<?=$row['id']?>" data-title="<?=$row['title']?>" width="300" height="200">
                    <span><?=$row['title']?><br><?= substr($row['description'],0,30)?></span>
            </a>
            <?php endwhile;?>
        </div> 
        <label class="load-more-btn" for="load-more">
            <span class="unloaded">LOAD MORE</span>
            <span class="loaded">VIEW LESS</span>
        </label>

<script src="http://code.jquery.com/jquery-latest.js"></script>        
<script>
$(document).ready(function(){
    var totalrows = "<?php echo $totalrows?>";
    var offsetCount = 0;
    setInterval(function() {
                if(totalrows - offsetCount !==6){
              offsetCount = offsetCount + 1; 
              $("#images").load("display.php", {offsetNewCount : offsetCount }).fadeIn("slow");
          }
          else return ;
          }, 1000);
    });
    
 </script>
</div>
