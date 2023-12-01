
<style>
:root {
  /* ===== Colors ===== */
  --body-color: #E4E9F7;
  --sidebar-color: #fff;
  --primary-color: #695CFE;
  --primary-color-light: #F6F5FF;
  --toggle-color: #DDD;
  --text-color: #707070;

  /* ====== Transition ====== */
  --tran-03: all 0.2s ease;
  --tran-03: all 0.3s ease;
  --tran-04: all 0.3s ease;
  --tran-05: all 0.3s ease;
}

/* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap'); */

@import url('https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet');

* {
  margin 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat';
  
}

body {
  min-height: 100vh;
  background-color: var(--body-color);
  transition: var(--tran-05);
}

::selection {
  background-color: var(--primary-color);
  color: #fff;
}

.nav {
  font-size: 10px;
  margin-left: 20px;
}

body.dark {
  --body-color: #18191a;
  --sidebar-color: #242526;
  --primary-color: #3a3b3c;
  --primary-color-light: #3a3b3c;
  --toggle-color: #fff;
  --text-color: #ccc;
}

/* ===== Sidebar ===== */
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 180px;
  padding: 10px 14px;
  background: var(--sidebar-color);
  transition: var(--tran-05);
  z-index: 100;
}

.sidebar.sb-close {
  width: 88px;
}

/* ===== Reusable code - Here ===== */
.sidebar li {
  height: 34px;
  list-style: none;
  display: flex;
  align-items: center;
  margin-top: 10px;
}

.sidebar header .image,
.sidebar .icon {
  min-width: 60px;
  border-radius: 6px;
}

.sidebar .icon {
  min-width: 60px;
  border-radius: 6px;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
}

.sidebar .text,
.sidebar .icon {
  color: var(--text-color);
  transition: var(--tran-03);
}

.sidebar .text {
  font-size: 17px;
  font-weight: 500;
  white-space: nowrap;
  opacity: 1;
}

.sidebar.sb-close .text {
  opacity: 0;
}

.sidebar.sb-close .image img {
  z-index: 10;
}

/* =========================== */

.sidebar header {
  position: relative;
}

.sidebar header .image-text {
  margin-top: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sidebar header .logo-text {
  display: flex;
  flex-direction: column;
}

header .image-text .name {
  margin-top: 2px;
  font-size: 18px;
  font-weight: 600;
}

header .image-text .profession {
  font-size: 16px;
  margin-top: -2px;
  display: block;
}

.sidebar header .image {
  display: flex;
  align-items: center;
  justify-content: center;
}

.sidebar header .image img {
  height: 100%;
  width: 150px;
}

.sidebar header .image .img-navbar-close {
  height: 100%;
  width: 100%;
}

.sidebar header .toggle {
  position: absolute;
  top: 50%;
  right: -25px;
  transform: translateY(-50%) rotate(180deg);
  height: 25px;
  width: 25px;
  background-color: var(--primary-color);
  color: var(--sidebar-color);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  cursor: pointer;
  transition: var(--tran-05);
}

body.dark .sidebar header .toggle {
  color: var(--text-color);
}

.sidebar.sb-close .toggle {
  transform: translateY(-50%) rotate(0deg);
}

.sidebar~.main-content {
  margin-left: 250px;
  transition: var(--tran-05);
}

.sidebar.sb-close~.main-content {
  margin-left: 90px;
}

.sidebar .menu {
  margin-top: 30px;
}

.sidebar li.search-box {
  border-radius: 6px;
  background-color: var(--primary-color-light);
  cursor: pointer;
  transition: var(--tran-05);
}

.sidebar li.search-box input {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  background-color: var(--primary-color-light);
  color: var(--text-color);
  border-radius: 6px;
  font-size: 17px;
  font-weight: 500;
  transition: var(--tran-05);
}

.sidebar li a {
  list-style: none;
  height: 100%;
  background-color: transparent;
  display: flex;
  align-items: center;
  margin-left: -5px;
  height: 100%;
  width: 100%;
  border-radius: 6px;
  text-decoration: none;
  transition: var(--tran-03);
}

.active2 {
  background-color: var(--primary-color);
  color: var(--sidebar-color);
  border-radius: 6px;
}

.active2 .text {
  color:white;
}

.active2 .icon {
  color:white;
}

.sidebar li a:hover {
  background-color: #8F8E8E;
}

.sidebar li a:hover .icon,
.sidebar li a:hover .text {
  color: var(--sidebar-color);
}

body.dark .sidebar li a:hover .icon,
body.dark .sidebar li a:hover .text {
  color: var(--text-color);
}

.sidebar .menu-bar {
  height: calc(100% - 55px);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow-y: hidden;
}

.scrollsidebar{
  overflow:scroll;
}
.menu-bar::-webkit-scrollbar {
  display: none;
}

.sidebar .menu-bar .mode {
  border-radius: 6px;
  background-color: var(--primary-color-light);
  position: relative;
  transition: var(--tran-05);
}

.menu-bar .mode .sun-moon {
  height: 50px;
  width: 60px;
}

.menu-bar .bottom-content {
  padding-top: 10px;
}

.menu-bar .bottom-content .toggle-switch {
  position: absolute;
  right: 0;
  height: 100%;
  min-width: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 6px;
  cursor: pointer;
}

.toggle-switch .switch {
  position: relative;
  height: 22px;
  width: 40px;
  border-radius: 25px;
  background-color: var(--toggle-color);
  transition: var(--tran-05);
}

.switch::before {
  content: '';
  position: absolute;
  height: 15px;
  width: 15px;
  border-radius: 50%;
  top: 50%;
  left: 5px;
  transform: translateY(-50%);
  background-color: var(--sidebar-color);
  transition: var(--tran-04);
}

body.dark .switch::before {
  left: 20px;
}

/* .home {
  position: absolute;
  top: 0;
  top: 0;
  left: 250px;
  height: 100vh;
  width: calc(100% - 250px);
  background-color: var(--body-color);
  transition: var(--tran-05);
} */

/* .home .text {
  font-size: 30px;
  font-weight: 500;
  color: var(--text-color);
  padding: 12px 60px;
} */

/* .sidebar.sb-close~.home {
  left: 78px;
  height: 100vh;
  width: calc(100% - 78px);
} */

.img {
  content: url("/Re-engineering/assets/img/brand/networkit logo 1.png");
}

.img-navbar-close {
  content: url("/Re-engineering/assets/img/brand/networkit logo 2.png");
}

/* body.dark .home .text {
  color: var(--text-color);
} */
</style>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!----======== CSS ======== -->


  <!----===== Boxicons CSS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <!--<title>Dashboard Sidebar Menu</title>-->
</head>


<body>
<?php

// if (isset($_SESSION['admin_id'])) {
//   $admin_id = $_SESSION['admin_id'];
//   //$login_id = $_SESSION['login_id'];
//   $ret = "SELECT * FROM admin WHERE admin_id = ?";
//   $stmt = $mysqli->prepare($ret);
//   $stmt->bind_param('s', $admin_id);
//   $stmt->execute();
//   $res = $stmt->get_result();

//   while ($admin = $res->fetch_object()) {

?>
  <nav class="sidebar">
    <header>
      <div class="image-text">
        <span class="image">
          <img class="img">
        </span>

        <div class="text logo-text">
          <span class="name"></span>
          <span class="profession"></span>
        </div>
      </div>
    
      <i id="arrow" class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
      <div class="menu">
  

        <ul class="menu-links" id = "menuu">
          
        
          <li class="item">
            <a href="logout.php" style="margin-bottom: -50.25em;">
              <i class='bx bx-log-out icon'></i>
              <span class="text nav-text">Logout</span>
            </a>
          </li>
    </div>
</div>
  </nav>


  <script>
    
  const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text"),
    logo = document.querySelector('.img');
    

  toggle.addEventListener("click", () => {
    sidebar.classList.toggle("sb-close");
    if (logo.classList.contains('img')) {
      logo.classList.remove('img');
      logo.classList.add('img-navbar-close');
    } else {
      logo.classList.add('img');
      logo.classList.remove('img-navbar-close');
    }
  });
  </script>


<script>
    // Get all the anchor elements with class "item"
    const links = document.querySelectorAll("#menuu .item");

    // Loop through the links
    links.forEach(link => {
      // Add a click event listener to each link
      link.addEventListener("click", function(event) {

        // Add "active" class to the clicked link
        this.classList.add("active2");
        
        // Remove "active" class from all links
        links.forEach(link => {
          link.classList.remove("active2");
        });
        
        // Add "active" class to the clicked link
        this.classList.add("active2");
        
      });
    });
  </script>

</body>

<?php
//   }
// }
?>
