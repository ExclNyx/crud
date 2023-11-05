<?php
  session_start();
  include 'koneksi.php';
?>

<!DOCTYPE html>
<head>
  <title>PERENCANAAN</title>
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
          <a href="berandaadmin.php">Home</a>
        </li>
        <li>
          <a href="profil.php">Profil</a>
        </li>
        <li>
          <a href="#">Pegawai</a>
        </li>
        <li>
          <a href="#">Akun</a>
        </li>
        <li>
        <li>
          <a href="index.html">exit</a>
        </li>
      </ul>
    </nav>

    <div class="box">
      <br>
      <h4><center>DAFTAR PEGAWAI<br>SUB BAGIAN PERENCANAAN, EVALUASI, DAN PELAPORAN</center></h4>
    
    <?php
      include "koneksi.php";

      if(isset($_GET['id_pegawai'])) {
        $id_pegawai=htmlspecialchars($_GET['id_pegawai']);

        $sql="delete from pegawai where id_pegawai='$id_pegawai'";
        $hasil=mysqli_query($kon,$sql);

        if($hasil){
          header ("Location:perencanaan.php");
        }
        else {
          echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
      }
    ?>

    <tr class="table-danger">
      <br>
    <thead>
      <tr>
        <table class="tabel border">
          <tr class="table-primary">
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>JABATAN</th>
            <th>PANGKAT/GOL</th>
            <th colspan="2">AKSI</th>
      </tr>
    </thead>

    <?php 
    include "koneksi.php";
    $sql="select * from pegawai order by id_pegawai desc";

    $hasil=mysqli_query($conn,$sql);
    $no=0;
    while ($data = mysqli_fetch_array($hasil)) {
      $no++;
    
    ?>

      <tbody>
      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $data["nama"];?></td>
        <td><?php echo $data["NIP"];?></td>
        <td><?php echo $data["jabatan"];?></td>

        <td>
          <a href="update.php?id_pegawai=<?php echo htmlspecialchars($data['id_pegawai']);?>"></a>
          <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"></a>
        </td>
      </tr>
    </tbody>
        </table>
        <a href="create.php" class="button-primary" role="button">Tambah Data</a>
      </div>


<?php
  }
?>
</body>
</html>