<?php
require_once("duino/config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Smart Door Lock</title>
    <style>
        .card-body{
            height : 275px;
        }
    </style>
  </head>
  <body>
    <div class="container position-absolute top-50 start-50 translate-middle">
      <center>
            <div id = "clock" onload="currentTime()"></div>
            <h1 class="d-grid gap-2 col-6 mx-auto">Smart Door Lock!</h1>
        </center>

      <div class="d-grid gap-2 col-6 mx-auto">
        <a href="duino" class="btn btn-outline-primary rounded-pill">Go to Panel Page</a>
      </div>
 <div class="d-grid gap-2 mx-auto mt-3">
      <?php 
              $i=0;
              $datah = mysqli_query($konek,"SELECT * FROM history ORDER BY id DESC LIMIT 5");
              $count_5 = mysqli_num_rows($datah);
              if($count_5 != 0){ ?>
                  <div class="card">
  <h5 class="card-header">5 Aktivitas Terkahir</h5>
  <div class="card-body overflow-auto">
              <?php
              while($last = mysqli_fetch_array($datah))
 {
 $i++;
 $nama = $last['nama'];
 $tanggal = $last['tanggal'];
 $waktu = $last['waktu'];
 $stamp = $tanggal.' '.$waktu;
 $login = date('d-m-Y H:i:s', strtotime($stamp));
 $str1 = strtotime($login);
 $str2 = strtotime($realtime);
 $selisih = floor($str2-$str1);
//  $selisih = $selisih/60;
 $masa = "Detik";

 if($selisih >= 60){
$selisih = floor($selisih/60);
$masa = "Menit";
 }
 if($selisih >= 60){
$selisih = floor($selisih/60);
$selisih = $selisih;
$masa = "Jam";
 }
 if($selisih >= 60){
$selisih = floor($selisih/24);
$masa = "Hari";
 }
?>
 <div class="alert alert-info" role="alert">
        <p>
          <b><?php echo $nama; ?></b> Melakukan Scan Akses pada <?php echo $tanggal; ?> Jam <?php echo $waktu; ?>.
        </p>
         <p class="mb-0 text-end"><small><i><?php echo $selisih; ?> <?php echo $masa; ?> Yang Lalu</i></small></p>
      </div>
 <?php  } ?>
 </div>
 </div>
 <?php } ?>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

     <script>
        function currentTime() {
  let date = new Date(); 
  let hh = date.getHours();
  let mm = date.getMinutes();
  let ss = date.getSeconds();
  let session = "AM";

//   if(hh === 0){
//       hh = 12;
//   }
//   if(hh > 0 && hh < 4){
//       session = "Dini Hari";
//   }
//   if(hh > 4 && hh > 10){
//       session = "Pagi";
//   }
//   if(hh > 10 && hh < 15){
//       session = "Siang";
//   }
//   if(hh > 15 && hh < 18){
//       session = "Sore";
//   }
//   if(hh > 18 && hh <= 23){
//       session = "Malam";
//   }
//   if(hh > 12){
//       hh = hh - 12;
//     //   session = "PM";
//   }

if(hh === 0){
      hh = 12;
  }
  if(hh > 12){
      hh = hh - 12;
      session = "PM";
   }
   
   hh = (hh < 10) ? "0" + hh : hh;
   mm = (mm < 10) ? "0" + mm : mm;
   ss = (ss < 10) ? "0" + ss : ss;
    
   let time = hh + ":" + mm + ":" + ss + " " + session;

  document.getElementById("clock").innerText = time; 
  let t = setTimeout(function(){ currentTime() }, 1000);
}

currentTime();
    </script>
  </body>
</html>
