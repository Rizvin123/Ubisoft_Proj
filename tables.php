<?php

include 'functions.php';
$link = connect_mysql("localhost", "root", "", "demo");
$sql = "CREATE TABLE IF NOT EXISTS `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` text NOT NULL,
  	`description` text NOT NULL,
  	`img` text NOT NULL,
  	`uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;";
        
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);



