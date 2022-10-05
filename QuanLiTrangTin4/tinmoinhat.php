<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<style>
			.mystyle {
			width: 100%;
			padding: 25px;
			background-color: coral;
			color: white;
			font-size: 25px;
			}
			.row .card{}
		</style>
		<title>Bài viết</title>
	</head>
	<body>
		<div class="main">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			
			<!-- Nội dung: sử dụng card -->
            
			<div id="root"></div>
			
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
			<?php include 'javascript.php'; ?>
		</div>
		
		<!-- Alo? no dang tro toi bando.php ma tại vì t chauw có biết code á..nên là cái bản đồ chỉ để đỡ thoi à. Roi cai page tin moi nhat dau.nó chưa có gì hết á Roi sao ko tao page tin moi nhat. cái chỗ bản đồ á... -->
		<script type="module">
			import { getFirestore, collection, getDocs, getDoc } from 'https://www.gstatic.com/firebasejs/9.6.8/firebase-firestore.js';
			const db = getFirestore();
			
			async function getDanhSachBaiViet() {
				const querySnapshot = await getDocs(collection(db, 'baiviet'));
				const promises = querySnapshot.docs.map(doc => getRefData(doc));
				return Promise.all(promises)
			}
			
			async function getRefData(doc) {
				var baiViet = doc.data();
				baiViet.id = doc.id;
				var Chuded = await getDoc(baiViet.MaChuDe);
				baiViet.cd = { ...Chuded.data() };
				return baiViet;
			}
			await getDanhSachBaiViet().then(results => {
				var output = '';
				results.forEach((d) => {
                    output += `<div class="row card">`;
					output += `<div class="col card-body">`;
					output += `<h2>${d.TenBaiViet}</h2>`;
					output += `<p>${d.TomTat}</p>`;
					output += '<p><img width="100pt" src="images/' + d.HinhAnh+ '"></p>';
					output += `<p>${d.NoiDung}</p>`;			
					output += `</div>`;
					output += `</div>`;
				});
				$('#root').html(output);
			});
		</script>
	</body>
</html>