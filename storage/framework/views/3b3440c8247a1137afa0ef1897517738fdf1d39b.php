<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
  <!--Preloader-->
  <div id="preloader" class="preloader">
    <div class="preloader-inner">
        <div class="preloader-6">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
  </div>
  <!--/-->
  <!--Header-->
  <header class="app-header app-header-1 boxed light">
      <div class="header-nav bg-primary">
          <?php echo $__env->make('layouts.mainmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
  </header>
  <!--/-->
  <!--Sidenav-->
  <div class="app-sidenav app-sidenav-1">
      <?php echo $__env->make('layouts.sidemainmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <span class="sidenav-close"></span>
  </div>
  <!--/-->
  <!--Shopping Cart-->
  <div class="app-shopping-cart app-shopping-cart-1">
      <?php echo $__env->make('layouts.cartlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
  <!--/-->

  <section class="section">
    <div class="display-spacing">
      <div class="container text-center">
        <div class="row p-3">
          <div class="d-flex flex-column justify-content-center w-100">
            <h3>Selesaikan pembayaran sebelum</h3>
            <p class="text-secondary">Batas Akhir Pembayaran</p>
            <h5 class="text-bold"><?php echo e(__($detail->batas_pembayaran." WIB")); ?></h5>
          </div>
        </div>
        <div class="row p-3 d-flex justify-content-center">
          <div class="card text-left w-50">
            <div class="card-header d-flex justify-content-between align-items-center">
              <?php if($detail->metode_pembayaran == 'Bank BRI'): ?>
                <h5 class="mb-0">BRIVA</h5>
                <img src="<?php echo e(asset('assets/images/icons/briva.png')); ?>" alt="briva" width="60px">
              <?php endif; ?>
              <?php if($detail->metode_pembayaran == 'Bank Mandiri'): ?>
                <h5 class="mb-0">Mandiri Virtual Account</h5>
                <img src="<?php echo e(asset('assets/images/icons/mandiri.png')); ?>" alt="mandiri" width="60px">
              <?php endif; ?>
              <?php if($detail->metode_pembayaran == 'Bank BCA'): ?>
                <h5 class="mb-0">BCA Virtual Account</h5>
                <img src="<?php echo e(asset('assets/images/icons/bca.png')); ?>" alt="mandiri" width="60px">
              <?php endif; ?>
            </div>
            <div class="card-body">
              <div>
                <p class="mb-0">Nomor Virtual Akun</p>
                <h5>88XXXXX XXXX XXXXX</h5>
              </div>
              <div>
                <p class="mb-0">Total pembayaran</p>
                <h5 class="text-bold" style="color: #d85d16"><?php echo e(__('Rp '.$detail->total_harga)); ?></h5> 
              </div>
              <div>
                <a href="<?php echo e(route('info-payment', $detail->id)); ?>">
                  <button class="button bg-success rounded text-light" style="padding: 5px 20px;float: right">Cek Status Pembayaran</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-5">
          <div class="row d-flex flex-column w-100 row-0">
            <div class="mb-4">
              <span class="text-bold">PANDUAN PEMBAYARAN</span>
            </div>
            <?php if($detail->metode_pembayaran == 'Bank BRI'): ?>
              <div class="w-50 d-flex flex-column justify-content-center m-auto">
                <div id="atm-bri" class="d-flex justify-content-between mt-2 mb-2" style="cursor: pointer">
                  <label class="text-bold" style="cursor: pointer">ATM BRI</label>
                  <i id="icon" class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <div id="atm-bri-desc" class="text-left border-bottom" style="display: none">
                  <ol>
                    <li>Masukkan Kartu Debit BRI dan PIN Anda</li>
                    <li>Pilih menu Transaksi Lain > Pembayaran > Lainnya > BRIVA</li>
                    <li>Masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang terdaftar di akun Tokopedia Anda (Contoh: 80777100128070325)</li>
                    <li>Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai seperti Nomor BRIVA, Nama Pelanggan dan Jumlah Pembayaran</li>
                    <li>Ikuti instruksi untuk menyelesaikan transaksi</li>
                    <li>Simpan struk transaksi sebagai bukti pembayaran</li>
                  </ol>
                </div>
                <div id="mobile-bri" class="d-flex justify-content-between mt-2 mb-2" style="cursor: pointer">
                  <label class="text-bold" style="cursor: pointer">Mobile Banking BRI</label>
                  <i id="icon" class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <div id="mobile-bri-desc" style="display: none" class="text-left border-bottom">
                  <ol>
                    <li>Login aplikasi BRI Mobile</li>
                    <li>Pilih menu Mobile Banking BRI > Pembayaran > BRIVA</li>
                    <li>Masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang terdaftar di akun Tokopedia Anda (Contoh: 80777100128070325)</li>
                    <li>Masukan Jumlah Pembayaran</li>
                    <li>Masukkan PIN</li>
                    <li>Simpan notifikasi SMS sebagai bukti pembayaran</li>
                  </ol>
                </div>
              </div>
            <?php endif; ?>
            <?php if($detail->metode_pembayaran == 'Bank Mandiri'): ?>
              <div class="w-50 d-flex flex-column justify-content-center m-auto">
                <div id="atm-bri" class="d-flex justify-content-between mt-2 mb-2" style="cursor: pointer">
                  <label class="text-bold" style="cursor: pointer">ATM Mandiri</label>
                  <i id="icon" class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <div id="atm-bri-desc" class="text-left border-bottom" style="display: none">
                  <ol>
                    <li>Masukkan kartu ATM dan PIN</li>
                    <li>Pilih menu "Bayar/Beli"</li>
                    <li>Pilih menu "Lainnya", hingga menemukan menu "Multipayment"</li>
                    <li>Masukkan Kode Biller Tokopedia (88708), lalu pilih Benar</li>
                    <li>Masukkan "Nomor Virtual Account" Tokopedia, lalu pilih tombol Benar</li>
                    <li>Masukkan Angka "1" untuk memilih tagihan, lalu pilih tombol Ya</li>
                    <li>Akan muncul konfirmasi pembayaran, lalu pilih tombol Ya</li>
                    <li>Simpan struk sebagai bukti pembayaran Anda</li>
                  </ol>
                </div>
                <div id="mobile-bri" class="d-flex justify-content-between mt-2 mb-2" style="cursor: pointer">
                  <label class="text-bold" style="cursor: pointer">Internet Banking Mandiri/Mandiri Online</label>
                  <i id="icon" class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <div id="mobile-bri-desc" style="display: none" class="text-left border-bottom">
                  <ol>
                    <li>Login Mandiri Online dengan memasukkan Username dan Password</li>
                    <li>Pilih menu "Pembayaran"</li>
                    <li>Pilih menu "Multipayment"</li>
                    <li>Pilih penyedia jasa "Tokopedia"</li>
                    <li>Masukkan "Nomor Virtual Account" dan "Nominal" yang akan dibayarkan, lalu pilih Lanjut</li>
                    <li>Setelah muncul tagihan, pilih Konfirmasi</li>
                    <li>Masukkan PIN / Challenge Code Token</li>
                    <li>Transaksi selesai, simpan bukti bayar Anda</li>
                  </ol>
                </div>
              </div>
            <?php endif; ?>
            <?php if($detail->metode_pembayaran == 'Bank BCA'): ?>
              <div class="w-50 d-flex flex-column justify-content-center m-auto">
                <div id="atm-bri" class="d-flex justify-content-between mt-2 mb-2" style="cursor: pointer">
                  <label class="text-bold" style="cursor: pointer">ATM BCA</label>
                  <i id="icon" class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <div id="atm-bri-desc" class="text-left border-bottom" style="display: none">
                  <ol>
                    <li>Masukkan Kartu ATM BCA & PIN</li>
                    <li>Pilih menu Transaksi Lainnya > Transfer > ke Rekening BCA Virtual Account</li>
                    <li>Masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang terdaftar di akun Tokopedia Anda (Contoh: 80777100128070325)</li>
                    <li>Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai seperti No VA, Nama, Perus/Produk dan Total Tagihan</li>
                    <li>Masukkan Jumlah Transfer sesuai dengan Total Tagihan</li>
                    <li>Ikuti instruksi untuk menyelesaikan transaksi</li>
                    <li>Simpan struk transaksi sebagai bukti pembayaran</li>
                  </ol>
                </div>
                <div id="mobile-bri" class="d-flex justify-content-between mt-2 mb-2" style="cursor: pointer">
                  <label class="text-bold" style="cursor: pointer">m-BCA (BCA Mobile)</label>
                  <i id="icon" class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <div id="mobile-bri-desc" style="display: none" class="text-left border-bottom">
                  <ol>
                    <li>Lakukan log in pada aplikasi BCA Mobile</li>
                    <li>Pilih menu m-BCA, kemudian masukkan kode akses m-BCA</li>
                    <li>Pilih m-Transfer > BCA Virtual Account</li>
                    <li>Pilih dari Daftar Transfer, atau masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang terdaftar di akun Tokopedia Anda (Contoh: 80777100128070325)</li>
                    <li>Masukkan pin m-BCA</li>
                    <li>Pembayaran selesai. Simpan notifikasi yang muncul sebagai bukti pembayaran</li>
                  </ol>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  


  <!--Footer-->
  <footer class="app-footer app-footer-1">
    <div class="footer-copyright">
        <div class="container">
            <p><span class="text-bold">WG Farm</span> organic and wellness.</p>
            <p class="text-2">© 2020 All Rights Reserved</p>
        </div>
    </div>
  </footer>
<!--/-->
  <div class="afra-demo">
      <div class="afra-demo-panel">
          <span class="afra-demo-close">
              <i class="ti-close"></i>
          </span>
          <span class="afra-demo-title">Demo Options</span>
          <span class="afra-demo-subtitle">- Color Schemes</span>
          <ul class="afra-demo-colors">
              <li class="afra-demo-color-1" style="background-color: orange;"></li>
              <li class="afra-demo-color-2" style="background-color: #de5881;"></li>
              <li class="afra-demo-color-3" style="background-color: #0b7554;"></li>
              <li class="afra-demo-color-4" style="background-color: #7b1f29;"></li>
              <li class="afra-demo-color-5" style="background-color: #00b7b8;"></li>
              <li class="afra-demo-color-6" style="background-color: #33b5e5;"></li>
          </ul>
          <ul class="afra-demo-colors">
              <li class="afra-demo-color-7" style="background-color: #1d3268;"></li>
              <li class="afra-demo-color-8" style="background-color: #00897b;"></li>
              <li class="afra-demo-color-9" style="background-color: #ff5e14;"></li>
              <li class="afra-demo-color-10" style="background-color: #fdb415;"></li>
              <li class="afra-demo-color-11" style="background-color: #c89454;"></li>
              <li class="afra-demo-color-12" style="background-color: hotpink;"></li>
          </ul>
          <ul class="afra-demo-colors">
              <li class="afra-demo-color-13" style="background-color: #ac5f33;"></li>
              <li class="afra-demo-color-14" style="background-color: #e79e7e;"></li>
              <li class="afra-demo-color-15" style="background-color: #ffcdb4;"></li>
              <li class="afra-demo-color-16" style="background-color: #e8a384;"></li>
              <li class="afra-demo-color-17" style="background-color: #f9b689;"></li>
              <li class="afra-demo-color-18" style="background-color: #ffcba6;"></li>
          </ul>
          <ul class="afra-demo-colors">
              <li class="afra-demo-color-19" style="background-color: #a45223;"></li>
              <li class="afra-demo-color-20" style="background-color: #d88c75;"></li>
              <li class="afra-demo-color-21" style="background-color: #f7c3b6;"></li>
              <li class="afra-demo-color-22" style="background-color: #dc9263;"></li>
              <li class="afra-demo-color-23" style="background-color: #e9b876;"></li>
              <li class="afra-demo-color-24" style="background-color: #d78150;"></li>
          </ul>
      </div>
      <div class="afra-demo-toggle">
          <i class="ti-settings"></i>
      </div>
  </div>    
  <!--Scripts-->
  <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/main-scripts.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/demo.js')); ?>"></script>
  <script src="<?php echo e(asset('js/multi-countdown.js')); ?>"></script>
  <script>
    $(document).ready(function(){
      $('#atm-bri').click(function(){
        $('#atm-bri-desc').slideToggle('slow');
      })
      $('#mobile-bri').click(function(){
        $('#mobile-bri-desc').slideToggle('slow');
      })
    })
  </script>
  <!--/-->
</body>
</html><?php /**PATH /home/witsudi/LaravelProject/project-ppl/resources/views/payment.blade.php ENDPATH**/ ?>