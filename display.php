<?php 
    session_start();
    include 'functions.php';
    $mysqli = connect_mysql();
    $result = $mysqli->query("select * from users");
    $totalrows = mysqli_num_rows($result);
    $offsetNewCount = $_POST['offsetNewCount'];
    $_SESSION['count']= $totalrows - $offsetNewCount-6;
    $images = $mysqli->query("SELECT * FROM users ORDER BY uploaded_date LIMIT $totalrows OFFSET $offsetNewCount");
    while($row=$images->fetch_assoc()): ?>
        <a href="#">
                <img src="<?=$row['image']?>" alt="<?=$row['description']?>" data-id="<?=$row['id']?>" data-title="<?=$row['title']?>" width="300" height="200">
                <span><?=$row['title']?><br><?= substr($row['description'],0,30)?></span><br>
        </a>    
    <?php endwhile;?>





