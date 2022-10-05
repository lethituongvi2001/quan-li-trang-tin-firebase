<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Xử lý thêm bài viết - Trang Tin Tức</title>
	</head>
	<body>
		<div class="main">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Xử lý thêm bài viết</div>
				<div class="card-body">
					<div id="HienThi"></div>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php' ?>
		
		<script type="module">
			
			import { getFirestore, doc, setDoc } from 'https://www.gstatic.com/firebasejs/9.6.8/firebase-firestore.js';
			const db = getFirestore();
			await setDoc(doc(db, 'baiviet', '<?php echo str_pad($_POST['MaBaiViet'], 10, '0', STR_PAD_LEFT); ?>'), {
				MaBaiViet: '<?php echo $_POST['MaBaiViet']; ?>',
				MaChuDe: doc(db, 'chude', '<?php echo $_POST['MaChuDe']; ?>'),
				TenBaiViet: '<?php echo $_POST['TenBaiViet']; ?>',
				TomTat: '<?php echo $_POST['TomTat']; ?>',
				NoiDung: '<?php echo $_POST['NoiDung']; ?>',
				NgayDang: '<?php echo $_POST['NgayDang']; ?>',
				HinhAnh: '<?php echo $_POST['HinhAnh']; ?>'
			});
			location.href = 'baiviet.php';

			$('#HienThi').html('Sinh viên đang tìm cách code phần này....');
		</script>
	</body>
</html>