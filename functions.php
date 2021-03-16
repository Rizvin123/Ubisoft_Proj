 <?php
    function connect_mysql() {
        // Update the details below with your MySQL details
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $dbname = 'ubisoft_acc';
        try {
            return $mysqli = new mysqli($host, $userName, $password, $dbname);
        } catch (Exception $ex) {
            // If there is an error with the connection, stop the script and display the error.
            die ('Failed to connect to database!');
        }
}
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
            <head>
                    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                    <meta name="HandheldFriendly" content="true">
                    <meta charset="utf-8">
                    <title>$title</title>
                    <link href="style.css?ver=<?php echo rand(111,999)?>" rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css<?php echo date('l jS \of F Y h:i:s A');?>">
            </head>
            <body>
        <nav class="navtop">
            <div>
                    <h1>Product Display</h1>
                <a href="index.php"><i class="fas fa-image"></i>Gallery</a>
            </div>
        </nav>
    EOT;
    }

function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}


            