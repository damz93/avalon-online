<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Dedy A Muzawwir">
    <link rel="shortcut icon" href="assets/brand/logo-avalon.jpg">    
    
    <title>Halaman Login | Avalon it's Online</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">


    <!-- UNTUK FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro&family=Poppins:ital,wght@0,100;0,300;0,500;1,900&display=swap" rel="stylesheet">

 <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      
      .center-image {
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto;
        width: 100%;
      }
      
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/sign-in.css" rel="stylesheet">
  </head>
  
  <!-- <body class="d-flex align-items-center py-4"> -->
  <body>
  <!-- <body class="d-flex align-items-center py-4 bg-body-tertiary"> -->
  <div class="bg-image"></div>


    
<!-- <main class="form-signin  style="background-color: #686767;"> -->
<div class="bg-text form-signin w-100 m-auto" style="background-color: #686767;">
  <form id="login-form" class="form m-3" action="help/cek-login.php" onsubmit="return cek_dulu()" autocomplete="off" method="post">
    <img style="border-color: white;" class="mt-5 center-image text-center" src="assets/brand/logo-avalon.png" alt="">
    <hr style="color: white;">
    <!-- <h3 style="color: white;" class="m-3 fw-normal text-center">Silahkan Login...</h3> -->

    <div class="form-floating mb-2">
      <input autofocus type="text" class="form-control" id="username" name="username" placeholder="Input Username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Input Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div>
      <select name="level" class="form-select mt-0" id="level">
        <option value="0">Pilih Level</option>
        <option value="ADMIN">Admin</option>
        <option value="OWNER">Owner</option>
      </select>
    </div>
    <button class="btn btn-danger w-100 py-2 mt-3" type="submit">Login</button>
    
  </form>
  <hr style="color: white;">
  <p style="color: white;" class="mt-5 mb-0 text-center">&copy;2023 - By D.A.M.Z</p>
    </div>

<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
    <script type="text/javascript">
      function cek_dulu(){
        var level = document.getElementById("level").value;
        var s_username = document.getElementById("username").value;
        var s_password = document.getElementById("password").value;
        var ob_level = document.getElementById("level");
        var ob_username = document.getElementById("username");
        var isi_te = "Pilih Level Terlebih dahulu";
        if ((s_username=='') || (s_password=='')){
          alert('Isi Username maupun password terlebih dahulu');
          ob_username.focus();
          return false;
        }
        else if (level == "0"){
          alert('Pilih Level terlebih dahulu.');
          ob_level.focus();
          return false;
        }
        else{        
          return true;
        }
    }
    </script>
</html>
