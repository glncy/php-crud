<?php

if (isset($_POST['submitData'])) {
    include('config/connection.php');
    $title = $conn->real_escape_string($_POST['titleText']);
    $body = $conn->real_escape_string($_POST['bodyText']);
    $timestamp = time();
    $sql = "INSERT INTO cp_data (title,body,up_date) VALUES ('$title','$body','$timestamp')";
    if ($conn->query($sql)) {
        echo '<script type="text/javascript">
        alert("Added Successfully!");
        window.location.href = "index.php";
    </script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("Failed to Add due to an Error. Please Try again.");
        window.location.href = "index.php";
    </script>';
    }
    $conn->close();
}
else {
    echo "Access Denied";
}

?>