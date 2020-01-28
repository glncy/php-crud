<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.php");
}
include('functions.php');
// HEADER
include('layout/header.php');

if (isset($_POST['submitForm'])) {
    include("config/connection.php");
    $uname = $conn->real_escape_string($_POST['uname']);
    $pw = $conn->real_escape_string($_POST['pw']);
    $sql = "SELECT * FROM cp_users WHERE username = '$uname' AND pw = '$pw' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row['id'];
        header("Location: index.php");
    }
    else {
        echo "<script>alert('Incorrect Credentials');</script>";
    }
}

?>
<div class="row justify-content-center">
	<div class="col-sm-4">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-white bg-success">
					<div class="card-header">
						<span><strong>Login</strong></h5>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="uname">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pw">
                            </div>
                            <input type="submit" class="btn btn-danger float-right" value="Login" name="submitForm">
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