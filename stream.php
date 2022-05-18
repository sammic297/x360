<!DOCTYPE html>
<html>

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <title>Altarsound 360 | Calabar’s Flagship One-Stop-Shop Multimedia Services Provider</title>
    <meta name="description" content="Calabar’s Flagship One-Stop-Shop Multimedia Services Provider">
    <meta name="keywords" content="Multimedia, Recording, Studio">
    <meta name="author" content="Samuel Odey">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <!-- Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/base.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/magnific-popup.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600%7cPermanent+Marker" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <style>
        body {
            overflow: hidden;
        }

        .video-container {
            width: 100vw;
            height: 100vh;

        }

        iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100vw;
            height: 100vh;
            transform: translate(-50%, -50%);

        }
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stream";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT frm_youtube FROM link";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
    
    <!--stream div begins here-->
    <div class="video-container">
        <iframe src="<?php echo "$row[frm_youtube]"; ?>"></iframe>
        <!--iframe src="https://www.youtube.com/embed/mpl1MmX_3mU"></iframe-->
    </div>

    <?php
    }
} else {
    echo "0 results";
}

        $conn->close();
    ?>
</body>
</html>