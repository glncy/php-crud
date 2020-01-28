<?php
if (isset($_POST['search_entry'])){
    include('config/connection.php');
    $search_entry = $conn->real_escape_string($_POST['search_entry']);

    $sql = "SELECT * FROM cp_data WHERE title LIKE '%$search_entry%' ORDER BY id DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        ?>
            <li class="list-group-item">
                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo date("m/d/Y h:i a", $row['up_date']); ?></h6>
                <p class="card-text"><?php echo $row['body']; ?></p>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-pill badge-success p-3">Edit</a>
                <a href="#" class="badge badge-pill badge-danger p-3" role="button" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a>
            </li>
        <?php
        }
    }
    else {
        echo '
        <li class="list-group-item">
            <h5 class="card-title">Uh oh. No Entry Found.</h5>
            <h6 class="card-subtitle mb-2 text-muted">There\'s No Existing Entry you are trying to searching.</h6>
        </li>';
    }
    $conn->close();
}
?>