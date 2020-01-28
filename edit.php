<?php
if (isset($_POST['submitForm'])) {
    include('config/connection.php');
    $title = $conn->real_escape_string($_POST['titleText']);
    $body = $conn->real_escape_string($_POST['bodyText']);
    $id = $conn->real_escape_string($_POST['targetId']);
    $sql = "UPDATE cp_data SET title = '$title', body = '$body' WHERE id = '$id'";
    if ($conn->query($sql) or die ($conn->error)) {
        echo '<script type="text/javascript">
        alert("Updated Successfully!");
        window.location.href = "index.php";
    </script>';
    }
    else {
        echo '<script type="text/javascript">
        alert("Failed to Update due to an Error. Please Try again.");
        window.location.href = "index.php";
    </script>';
    }
}
if (isset($_GET['id'])) {
    include('config/connection.php');
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM cp_data WHERE id = '$id' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    else {
        header("Location: index.php");
    }
    $conn->close();
}
else {
    header("Location: index.php");
}
include('functions.php');

// HEADER
include('layout/header.php');
?>
<div class="row justify-content-center">
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<span><strong>Edit Diary Entry</strong></h5>
						<button class="btn btn-success btn-sm float-right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_modal">Add Entry</button>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="titleText" value="<?php echo $row['title'];?>">
                                <input type="hidden" name="targetId" value="<?php echo $row['id'];?>">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <textarea rows="10" class="form-control" name="bodyText"><?php echo $row['body'];?></textarea>
                            </div>
                            <input class="btn btn-success btn-sm" type="submit" value="Update" name="submitForm">
                            <button type="button" class="btn btn-info btn-sm" onclick="window.location.href = 'index.php';">Cancel</button>
                        </form>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
// FOOTER
include('layout/footer.php')
?>