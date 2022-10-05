<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Liên kết và cấu hình Firebase -->
<script type="module">
	// Import the functions you need from the SDKs you need
	import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.8/firebase-app.js";
	import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.8/firebase-analytics.js";
	
	//Lấy cái này trên Firebase xuống
	const firebaseConfig = {
		apiKey: "AIzaSyBB4OU3aAwBmiwoMjXyHc14aovfg6t7i0w",
		authDomain: "quan-ly-trang-tin.firebaseapp.com",
		projectId: "quan-ly-trang-tin",
		storageBucket: "quan-ly-trang-tin.appspot.com",
		messagingSenderId: "1079286071550",
		appId: "1:1079286071550:web:b57affdbdc0caaaf90a5af",
		measurementId: "G-THKNH9WBHV"
};
	
	// Initialize Firebase
	const app = initializeApp(firebaseConfig);
	const analytics = getAnalytics(app);
</script>