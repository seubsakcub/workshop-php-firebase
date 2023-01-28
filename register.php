<?php
session_name('firebase');
session_start();

$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

$_SESSION['error'] = null;

?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<title>Demo php</title>
</head>
<body>
	<div class="container">
        <h1 class="text-center">Register user</h1>
		<div class="row justify-content-center mt-5">
			<div class="col-md-6">
                <form method="POST" action="api/register.php">
                    <div class="form-group">
                        <label for="">ชื่อผู้ใช้</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">อีเมล</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="">ยืนยันรหัสผ่าน</label>
                        <input type="password" name="confirm_password" class="form-control"required>
                        <p class="text-danger"><?=$error;?></p>
                    </div>
                    <div>
                        <button type="submit" name="submit" value="register" class="btn btn-primary" >ลงทะเบียน</button>
                    </div>
                </form>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>
</html>