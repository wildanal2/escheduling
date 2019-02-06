<div class="container">
   <div class="py-5 text-center" style="margin-top: -40px">
       <h2>Selamat datang 
        <span class="badge badge-secondary">Admin</span>
       </h2>
       <hr style="height:1px;border:none;color:#333;background-color:#333;" />
   </div>

   <!-- COLOM AGENDA -->
    <div class="row" style="margin-top: -40px">
      <div class="col-xl-6 col-sm-12 mb-6" > 
        <div class="card text-white    bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="row">
              <div class="col-xl-8 card-body-icon">
                <i class="fa fa-fw fa-comments">Jumlah <b>Agenda</b> minggu ini</i>
              </div>
              <div class="col-xl-3 jmlmingagenda">
                <h1 class="display-2" id="ccc_agenda"><strong><?php echo $w_agenda->ok ?></strong></h1>
              </div>
              <div class="col-xl-7" style="margin-top: -40px; margin-bottom: -10px">Jumlah <b>Agenda</b> bulan ini <br> 
                <h2 class="txtagendabln"><?php echo $m_agenda->ok ?></h2>
              </div>
            </div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url() ?>/Agenda">
            <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right">
                  <h6 class="display-6" id="c_pengumuman"> Total Semua : <strong><?php echo $agenda->ok ?></strong></h6>
                </i>
            </span>
          </a>
        </div>
      </div>

      <!-- KOLOM PENGUMUMAN -->
      <div class="col-xl-6 col-sm-12 mb-6 boxpengumuman"> 
        <div class="card text-white    bg-danger o-hidden h-100" >
          <div class="card-body">
            <div class="row">
              <div class="col-xl-8 card-body-icon">
                <i class="fa fa-fw fa-comments">Jumlah <b>Pengumuman</b> minggu ini</i>
              </div>
              <div class="col-xl-3 jmlmingpengumuman">
                <h1 class="display-2" id="ccc_pengumuman"><strong><?php echo $w_pengumuman->ok ?></strong></h1>
              </div>
              <div class="col-xl-7" style="margin-top: -40px; margin-bottom: -10px">Jumlah <b>Pengumuman</b> bulan ini <br> 
                <h2 class="txtpengumumanbln"><?php echo $m_pengumuman->ok ?></h2>
              </div>
            </div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url() ?>/Pengumuman">
            <span class="float-left" >View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right">
                  <h6 class="display-6" id="c_pengumuman"> Total Semua : <strong><?php echo $pengumuman->ok ?></strong></h6>
                </i>
            </span>
          </a>
        </div>
      </div>

      <!-- KOLOM GALERI -->
      <div class="col-xl-6 col-sm-12 mb-6" style="margin-top: 30px; margin-bottom: 30px"> 
        <div class="card text-white    bg-success o-hidden h-100">
          <div class="card-body">
            <div class="row">
              <div class="col-xl-8 card-body-icon">
                <i class="fa fa-fw fa-comments">Jumlah <b>Galeri</b> minggu ini</i>
              </div>
              <div class="col-xl-3 jmlminggallery">
                <h1 class="display-2" id="ccc_galeri"><strong><?php echo $w_galeri->ok ?></strong></h1>
              </div>
              <div class="col-xl-7" style="margin-top: -40px; margin-bottom: -10px">Jumlah <b>Galeri</b> bulan ini <br> 
                <h2 class="txtgallerybln"><?php echo $m_galeri->ok ?></h2>
              </div>
            </div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url() ?>/Gallery">
            <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right">
                  <h6 class="display-6" id="c_pengumuman"> Total Semua : <strong><?php echo $galeri->ok ?></strong></h6>
                </i>
            </span>
          </a>
        </div>
      </div> 
  </div>
</div>


