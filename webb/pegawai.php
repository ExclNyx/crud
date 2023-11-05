<?php
  session_start();
  include 'koneksi.php';
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

      width: 100%;
      list-style-type: none;
      overflow: hidden;
      top: 0;
      position: fixed;
      width: 100%;
      z-index: 1;
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

    .jennie {
      padding-top: 120px;

    }
    .box{
    	width : 1400px;
      font-size: 20px;
    	transform: translate(5%,5% );
    	color: black;
    	padding-bottom: 10px;
    	border-radius: 7px;
    	background-color: white;
    	align-items: center;
    }

    .tabel{
      margin-left: 60px;
      text-align: center;
      width: 91%;
      border-collapse: collapse;
    }

    .tabel tr{
      background-color: #fefefe;
    }

    .tabel th {
      background:#5f849c;
      color:white;
      font-weight:bold;
      padding: 20px;
    }

    .tabel th,
    .tabel td{
      font-size:16PX;
    	border-bottom: 1px solid;
    	padding: 8px;

    }

    .tabel tbody tr:hover td {
      background-color: #ffffa2;
      border-color: #ffff0f;
      transition: all .2s;
    }

    .tabel td:first-child{
      width: 50px;
      text-align: center;
    }

    .tabel td:last-child{
      width: 150px;
      text-align: center;
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

    .tmbh{
      margin-left: 60px;
      text-decoration: none;
      color: Black;
      display: flex;
        padding-bottom: 10px;
    }
    .search{
      margin-left: 60px;
      padding-bottom: 10px;
      display: flex;
     
    }

    .search:after{
      content: "";
      clear: both;
      display: block;
    }

    .search input[type="text"]{
      width: 85%;
      padding: 10px;
      font-size: 16px;
      float: left;
      box-sizing: border-box;
      border-top: 1px solid gray;
    }

    .search input [type="text"]:focus{
      outline: none;

    }

    .search button{
      width: 10%;
      padding: 10px;
      font-size: 16px;
      float: left;

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

      <?php }?>

      
        <li>
          <a href="profil.php"><?=$_SESSION['uname']?> (<?=$_SESSION['ulevel']?>)</a>
        </li>

         <li>
          <a href="ubah-password.php">Ubah Password</a>
        </li>
        
        <li>
          <a href="index.html">exit</a>
        </li>
      </ul>
    </nav>

<div class="jennie">
    <div class="box" align="">
    	
      <h4>DAFTAR PEGAWAI</h4><br>

      <a href="tambah-pegawai.php" class="tmbh"><img src="img/add.png" >Tambah</a>
      
      <form>
        <div class="search">
          <input type="text" name="key" placeholder="Search....">
          <button type="submit"><img src="img/search.png" ></button>
        </div>
      </form>

      	<table class="tabel">
      		<thead>
      			<tr>
      				<th>NO</th>
      				<th>NAMA</th>
      				<th>USERNAME</th>
      				<th>LEVEL</th>
      				<th>AKSI</th>
      			</tr>
      		</thead>

      		<tbody>
      			<?php 
      			$no=1;

            $where="WHERE 1=1";
            if (isset($_GET['key'])) {
              $where .=" AND nama LIKE '%".($_GET['key'])."%' ";
            }

      				$pengguna = mysqli_query($conn, "SELECT * FROM user $where ORDER BY id DESC");
      				if (mysqli_num_rows($pengguna) >0) {
      					while ($p=mysqli_fetch_array($pengguna)) {
   

      			 ?>
      			<tr>
      				<td><?=$no++?></td>
      				<td><?=$p['nama']?></td>
      				<td><?=$p['username']?></td>
      				<td><?=$p['level']?></td>
      				<td>
      					<a href="edit-pegawai.php?id=<?= $p['id']?>" title="Edit Data"><img src="img/edit.png"></a>  
      					<a href="hapus-pegawai.php?idpegawai=<?= $p['id']?>" onclick ="return confirm('Yakin menghapus akun pegawai?')" title="Hapus Data"><img src="img/delete.png"></a>
      				</td>
      				
      			</tr>

      		<?php }}else{ ?>
      			<tr>
      				<td colspan="5">Data Tidak Ada</td>
      			</tr>
      		<?php }?>
      		</tbody>
      	</table>
    </div>
  </div>
</body>
</html>