<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Xử lý nhập bài viết từ Excel - Trang Tin Tức</title>
	</head>
	<body>
		<div class="main">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Xử lý bài viết từ Excel</div>
				<div class="card-body">
					<?php
						// Xử lý tập tin Excel
						require 'vendor/autoload.php';
						$file = $_FILES['TapTin']['tmp_name'];
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
						$reader->setReadDataOnly(true);
						$spreadsheet = $reader->load($file);
						$sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
						$data = $sheet->toArray();
					?>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getFirestore, doc, writeBatch} from 'https://www.gstatic.com/firebasejs/9.6.8/firebase-firestore.js';
			const db = getFirestore();
			const batch = writeBatch(db);
			
			<?php
				foreach($data as $key => $value)
				{
			?>
					const refData<?php echo $key; ?> = doc(db, 'chude', '<?php echo $value[2]; ?>');
					const docData<?php echo $key; ?> = doc(db, "baiviet", '<?php echo str_pad($value[0], 10, '0', STR_PAD_LEFT); ?>');
					var data<?php echo $key; ?> = {
						MaBaiViet: '<?php echo $value[0]; ?>',
						MaChuDe: refData<?php echo $key; ?>,
						TenBaiViet: '<?php echo $value[3]; ?>',						
						TomTat: '<?php echo $value[4]; ?>',
						NoiDung: '<?php echo $value[5]; ?>',
						NgayDang: '<?php echo $value[6]; ?>',
						HinhAnh: '<?php echo $value[7]; ?>'

					};
					batch.set(docData<?php echo $key; ?>, data<?php echo $key; ?>);
			<?php
				}
			?>
			
			await batch.commit();
			location.href = 'baiviet.php';
		</script>
	</body>
</html>