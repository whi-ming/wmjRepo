<?php include "../back/includes/dbh.inc.php"; ?>
<?php include "../path.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ROOT_PATH . '/front/includes/head.php'; ?>
    <title>wmj</title>
</head>
<body>
        <div class="loader"></div>
        <a class="back" href="../back">back</a>
        <div class="content">
            <img class="collage" id="sun" src="assets/images/sun_beamin.gif" alt="">
            <img class="horse" src="assets/images/logos/horse_runnin.gif" alt="">
            <div class="directories">
                <a class="works" href="2_works.php">works</a>
                <a class="about" href="3_about.php">about</a>
                <a class="contact" href="4_contact.php">contact</a>
            </div>
        </div>     
        <?php include ROOT_PATH . "/front/includes/footer.php"; ?>
        <script type="module">
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
            import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-analytics.js";
            // TODO: Add SDKs for Firebase products that you want to use
            // https://firebase.google.com/docs/web/setup#available-libraries

            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            const firebaseConfig = {
                apiKey: "AIzaSyAPy9OEM0ojRYflLRkidr3KC9kVcM-5uOk",
                authDomain: "wjwebsite-dad90.firebaseapp.com",
                projectId: "wjwebsite-dad90",
                storageBucket: "wjwebsite-dad90.firebasestorage.app",
                messagingSenderId: "858208522434",
                appId: "1:858208522434:web:df1128279e78fb0151eb5b",
                measurementId: "G-N2ZZDFGWTG"
            };

            // Initialize Firebase
            const app = initializeApp(firebaseConfig);
            const analytics = getAnalytics(app);
        </script>
    

</body>
</html>