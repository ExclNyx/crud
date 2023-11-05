<?php
  session_start();
  include 'koneksi.php';
?>


<!DOCTYPE html>
<head>
  <title>beranda</title>
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
   position: relative;
    height: 120%;
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

  .JPegawai {
    padding-top: 200px;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

header.JPegawai-heading {
    width: 80vw;
    height: 60px;
    color: white;
    background-color: #ffa12c;
    border-radius: 1rem;
    text-align: center;
    margin-bottom: 1.4rem;
    padding: 0 .5rem;
    display: grid;
    place-items: center;
    box-shadow: 0 .2rem .2rem #0006;  
    transition: .3s ease-in-out;
}

header h1 {
    font: 700 2.8rem sans-serif;
}

header:hover,
.satker:hover {

    transform: scale(1.05);
    cursor: pointer;
    filter: saturate(300%);
    box-shadow: 0 .2rem .2rem #0006;
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

.baris-satker {

    width: 80vw;
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding-bottom: 20px;
}

.satker {
    width: 20%;
    height: 170px;
    border-radius: 1rem;
    padding: 1rem 2rem;
    display: flex;
    align-items: center;
    justify-content: space-around;
    transition: .0.10s ease-in-out;
    box-shadow: 0 .2rem .2rem #ffa12c;
    background:#5f849c;
    font: bold 2.8rem sans-serif;
}

.satker-info {
    text-transform: uppercase;
    color: white;
    text-shadow: 1px 1px 1px #0007;
    text-align: center;
}

.satker-info h1.counter {
    font: normal 2.8rem sans-serif;
}

.satker-info p {
    font: normal 1.1rem sans-serif;
    margin-top: .4rem;
}

footer {
      background-color: #5f849c;
      color: #fff;
    }

footer .copyright {
      width: 100%;
      margin-top: 30px;
      padding-top: 10px;
      padding-bottom: 10px;
      border-top: 1px solid #ffa12c;
      text-align: center;
    }
  </style>
</head>

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


    <div class="JPegawai">
      <header class="JPegawai-heading">
          <h1>JUMLAH PEGAWAI</h1>
      </header>
      <div class="baris-satker">
          <div class="satker">
              <div class="satker-info">
                  <p>Sub Bagian Perencanaan, Evaluasi, dan Pelaporan</p>
                  <h1 class="counter" data-count="2">0</h1>
                  <p>PEGAWAI</p>

              </div>
          </div>
          <div class="satker">
             <div class="satker-info">
                  <p>Sub Bagian Keuangan dan Barang Milik Negara</p>
                  <h1 class="counter" data-count="3">0</h1>
                  <p>PEGAWAI</p>
                </div>
            </div>
          <div class="satker">
              <div class="satker-info">
                  <p>Sub Bagian Hukum, Kepegawaian, dan Organisasi</p>
                  <h1 class="counter" data-count="4">0</h1>
                  <p>PEGAWAI</p>
              </div>
          </div>

          <div class="satker">
              <div class="satker-info">
                  <p>Sub Bagian Umum dan Hubungan Masyarakat</p>
                  <h1 class="counter" data-count="6">0</h1>
                  <p>PEGAWAI</p>
              </div>
          </div>
        </div>

        <div class="baris-satker">
          <div class="satker">
              <div class="satker-info">
                  <p>Bidang Survei dan dan Pemetaan</p>
                  <h1 class="counter" data-count="11">0</h1>
                  <p>PEGAWAI</p>
              </div>
          </div>
          <div class="satker">
             <div class="satker-info">
                  <p>Bidang Penetapan Hak dan Pendaftaran</p>
                  <h1 class="counter" data-count="8">0</h1>
                  <p>PEGAWAI</p>
             </div>
          </div>
          <div class="satker">
            <div class="satker-info">
                  <p>Bidang Penataan dan Pemberdayaan</p>
                  <h1 class="counter" data-count="9">0</h1>
                  <p>PEGAWAI</p>
            </div>
          </div>

          <div class="satker">
            <div class="satker-info">
                  <p>Bidang Pengadaan Tanah dan Pengembangan</p>
                  <h1 class="counter" data-count="9">0</h1>
                  <p>PEGAWAI</p>
            </div>
          </div>
        </div>

        <div class="baris-satker">
          <div class="satker">
              <div class="satker-info">
                  <p>Bidang Pengendalian dan Penaganan Sengketa</p>
                  <h1 class="counter" data-count="4">0</h1>
                  <p>PEGAWAI</p>
              </div>
          </div>
        </div>
    </div>
    <br> <br> <br>
  <footer id="jennie">
      <div class="copyright">&copy;2023 Ain Ruby Jane </div>
  </footer>

    <script>
        const counters = document.querySelectorAll(".counter")
        const speed = 10 

        counters.forEach(counter => {
            let initial_count = 0;
            const final_count = counter.dataset.count;
            // console.log(final_count);

            let  counting = setInterval(updateCounting, 1);

           function updateCounting() {

                if (initial_count < 1000) {
                    initial_count += 1;
                    counter.innerText = initial_count;
                }

                if (initial_count >= 1000) {
                    initial_count += 100;
                    counter.innerText = (initial_count / 1000).toFixed(1) + 'K+';
                }

                if (initial_count >= 10000) {
                    initial_count += 5000;
                }

                if (initial_count >= 1000000) {
                    initial_count += 500000;
                    counter.innerText = (initial_count / 1000000).toFixed(1) + 'M+';
                }

                if (initial_count >= final_count) {
                    clearInterval(counting);
                }
            }
        })

  

        const menuIcon = document.getElementById("menu-icon");
        const menuList = document.getElementById("menu-list");

        menuIcon.addEventListener("click", () => {
        menuList.classList.toggle("hidden");
        });
    </script>
  </body>
</body>
</html>