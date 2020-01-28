<?php
if (isset($_GET['id'])) {
    include('config/connection.php');
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM cp_data WHERE id = '$id' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql = "DELETE FROM cp_data WHERE id = '$id'";
        if ($conn->query($sql)) {
            echo '<script type="text/javascript">
            alert("Deleted Successfully!");
            window.location.href = "index.php";
        </script>';
        }
        else {
            echo '<script type="text/javascript">
            alert("Failed to Delete due to an Error. Please Try again.");
            window.location.href = "index.php";
        </script>';
        }
    }
    else {
        header("Location: index.php");
    }
    $conn->close();
}
else {
    header("Location: index.php");
}
?>