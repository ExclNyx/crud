<?php
  session_start();
  include 'koneksi.php';
?>

<?php 
  date_default_timezone_set("Asia/Jakarta");
  $pegawai=mysqli_query($conn, "SELECT * FROM user  WHERE id ='".$_GET['id']."' ");
  $p      =mysqli_fetch_object($pegawai);
?>

<!DOCTYPE html>
<head>
  <title>PROFIL</title>
  <style type="text/css">
    *,
html {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  scroll-behavior: smooth;
}

body {
  background-color: #DAE4EB;
}

nav {
  height: 100px;
  background-color:#5f849c;
  font-size: 15X;
  display: flex;
  justify-content: space-between;
  padding: 1rem 2rem;
  border-bottom: 2PX navy;
  text-transform: uppercase;
}

nav ul {
  display: flex;
  align-items: center;
  gap: 2rem;
  list-style: none;
  border-bottom: navy;
}

nav div img {
  width: 50px;
}

nav ul li a {
  text-decoration: none;
  font-family: "Segoe UI", sans-serif;
  color: white;
  font-weight: 600;
  padding: 8px 0;
  transition: all;
  transition-duration: 300ms;
  border-bottom: 1px solid rgba(255, 68, 0, 0);
}

nav ul li a:hover {
  color: #ffa12c;
  border-bottom: 1px solid #ffa12c;
}

.menu-icon {
  /* background-color: tomato; */
  font-size: 28px;
  display: none;
}

main {
  padding-top: 7rem;
}

@media only screen and (max-width: 768px) {
  nav {
    flex-wrap: wrap;
    position: fixed;
    width: 100%;
    top: 0;
  }

  nav ul {
    flex-direction: column;
    width: 100%;
  }

  nav ul li:last-of-type {
    padding-bottom: 8px;
  }

  nav ul.hidden {
    display: none;
  } 

  .menu-icon {
    display: flex;
  }
}

.jen{
  color: white;
  font-size: 20px;
   display: flex;
   padding-left: 15px;
    padding-top: 10px;
}
.jen p {
  padding-top: 0px;
  padding-left: 10px;
  display: flex;
}

 .form-control{
    box-sizing: border-box;
    width: 80%;
    font-size: 15pt;
  }

  .form-group{
    padding-left: 30px;
  }

.box{

	width : 600px;
      height: 300px;
      font-size: 20px;
			transform: translate(50%,50% );
		
			color: black;
			padding-bottom: 10px;
			border-radius: 7px;
			background-color: white;
			align-items: center;
	}


h4{
  text-align: center;

	height: 40px;
	color: white;
	font-size: 30px;
	margin-top: 5px;
	background-color:#ffa12c ;
	margin-bottom: 5px;
	border-top-left-radius: 7px;
	border-top-right-radius: 7px ;
}

.btn-submit{
    width: 100px;
    height: 40px;
    background-color: green;
    color: white;
    font-size: 13px;
    border: white;
    border-radius: 3px;
    cursor: pointer;
  }

  .btn-back{
    width: 100px;
    height: 40px;
    background-color: blue;
    color: white;
    font-size: 13px;
    border: white;
    border-radius: 3px;
    cursor: pointer;
  }

.btn-submit:  hover {
background: #5f849c;
  
  }

.btn-hapus{
      height: 40px;
    cursor: pointer;
    background-color:red;
    color: white;
    width: 100px;
    font-size: 13px;
    border: white;
    border-radius: 3px;
  }



  </style>

</head>

<body>
<body>
  <font face="calibri" bold>
    <nav> 
      <div class="jen"> 
      
            <img src="img/ll.png" alt="my-avatar" /><p>Kementerian Tata Ruang/ <br> Badan Pertanahan Nasional Kanwil Papua</p>
      </div>
  </font>

      <div id="menu-icon" class="menu-icon">
        <i class="ph-fill ph-list"></i>
      </div>
     <ul id="menu-list" class="hidden">
        <li>
          <a href="beranda.php">Home</a>
        </li>

        <?php if($_SESSION['ulevel'] == 'admin'){?>

        <li>
          <a href="pegawai.php">Pegawai</a>
        </li>

      <?php }else if($_SESSION['ulevel'] == 'user'){?>

        <li>
          <a href="profil.php">Profil</a>
        </li>

      <?php } ?>

        <li>
          <a href="akun.html"><?=$_SESSION['uname']?> (<?=$_SESSION['ulevel']?>)</a>
        </li>

        <li>
          <a href="index.html">exit</a>
        </li>
      </ul>
    </nav>

    <div class="box" align="">
    	
      <h4>EDIT PEGAWAI</h4><br>

        <form action="" method="POST">


         <div class="form-group">
        <table>
        <tr><td>Nama</td><td>
        <input type="text" name="nama" class="form-control" placeholder="" required value="<?= $p->nama?>"></td></tr>
      </div>

      <div class="form-group">
        <tr><td>Username</td><td>
        <input type="text" name="user" class="form-control" placeholder="" required value="<?= $p->username?>"></td></tr>
      </div>

      <div class="form-group">
        <tr><td>Level</td><td>
          <select name="level" class= " input-control" value="<?= $p->level?>">
            <option value="">Pilih</option>
            <option value="Admin"<?= ($p->level=='admin')? 'selected':'';?> >Admin</option>
            <option value="Pegawai" <?= ($p->level=='pegawai')? 'selected':'';?>>Pegawai</option>
          </select>
        </div>

        <?php
          if(isset($_POST['submit'])){

            $nama =  $_POST['nama'];
            $user = $_POST['user'];
            $level = $_POST['level'];
     

           $update =mysqli_query($conn, "UPDATE user SET
            nama='".$nama."',
            username='".$user."',
            level='".$level."',
            WHERE id='".$_GET['id']."'
            ");
           
            if($update){
              echo "Data Berhasil Di edit";
            }else{
              echo 'Data gagal di Edit'.mysqli_error($conn);
            }
          }
        ?>


        <tr><td><button type="button" class="btn-back" onclick="window.location = 'pegawai.php'">Back</button>
        <td>    <button type="submit" name="submit" class="btn-submit">submit</button>
                <button type="reset" value="HAPUS" class=btn-hapus>hapus</button></td></tr>

    </div>

</body>
</html>