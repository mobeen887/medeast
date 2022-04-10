<?php 
  session_start();
  $pname = (isset($_GET['pname']) ? $_GET['pname'] : '');
  $saveOn = (isset($_GET['on']) ? $_GET['on'] : '');
  $mrid = (isset($_GET['mrid']) ? $_GET['mrid'] : '');
  $phone = (isset($_GET['phone']) ? $_GET['phone'] : '');
  $by = (isset($_GET['by']) ? $_GET['by'] : '');

  $mo = (isset($_GET['mo']) ? $_GET['mo'] : '');
  $injectionim = (isset($_GET['injectionim']) ? $_GET['injectionim'] : '');
  $injectioniv = (isset($_GET['injectioniv']) ? $_GET['injectioniv'] : '');
  $ivline = (isset($_GET['ivline']) ? $_GET['ivline'] : '');
  $sin = (isset($_GET['sin']) ? $_GET['sin'] : '');
  $sout = (isset($_GET['sout']) ? $_GET['sout'] : '');
  $ivinfection = (isset($_GET['ivinfection']) ? $_GET['ivinfection'] : '');
  $bsf = (isset($_GET['bsf']) ? $_GET['bsf'] : '');
  $sstay = (isset($_GET['sstay']) ? $_GET['sstay'] : '');
  $bp = (isset($_GET['bp']) ? $_GET['bp'] : '');
  $ecg = (isset($_GET['ecg']) ? $_GET['ecg'] : '');
  $other = (isset($_GET['other']) ? $_GET['other'] : '');

  $tbill = (isset($_GET['tbill']) ? $_GET['tbill'] : '');
  $disc = (isset($_GET['disc']) ? $_GET['disc'] : '');
  $fbill = (isset($_GET['fbill']) ? $_GET['fbill'] : '');

  $date = substr($saveOn,0, 24);
?>
  <!-- Header Form -->
  <?php include('backend_components/connection.php'); ?>
  <!-- Header Form -->
  <?php
    $adminSql ="SELECT `ADMIN_USERNAME` FROM `admin` WHERE `ADMIN_ID` =".$by;
    $asql = mysqli_query($db,$adminSql);
    $admin_row = mysqli_fetch_array($asql);
  ?>
  <?php include('components/form_header.php'); ?>
  <!-- Navbar -->
  <?php include('components/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('components/sidebar.php'); ?>
  <!-- /.Main Sidebar Container-->

<div class="content-wrapper">
  <!-- Main content -->
  <section class="container invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-md-12">
        <center><h2 class="page-header">
          <img src="dist/img/medeast-logo-icon.png" alt="MedEast Logo"/> MEDEAST HOSPITAL
          <!-- <small class="float-right">Date: 2/10/2014</small> -->
        </h2></center>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
     <!-- /.col -->
     <div class="col-sm-8 invoice-col">
        <b>MR_ID# </b><?php echo $mrid; ?><br>
        <b>Patient Name : </b><?php echo $pname; ?><br>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Contact :</b> <?php echo $phone; ?><br>
        <!-- <b>Medical Officer :</b> 2/22/2014<br> -->
        <b>Date/Time :</b> <?php echo $date; ?><br>
        <b>Staff :</b> <?php echo $admin_row['ADMIN_USERNAME']; ?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
          <tr style="width:100%;">
            <th style="width:80%;">Particular</th>
            <th style="width:20%;">Amount</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>Emergency Slip / Medical Officer</td>
            <td><?php echo $mo; ?></td>
          </tr>
          <tr>
            <td>Injection I/M</td>
            <td><?php echo $injectionim; ?></td>
          </tr>
          <tr>
            <td>Injection I/V</td>
            <td><?php echo $injectioniv; ?></td>
          </tr>
          <tr>
            <td>I/V Line (In / Out)</td>
            <td><?php echo $ivline; ?></td>
          </tr>
          <tr>
            <td>I/V infusion (100ml,200ml,1000ml)</td>
            <td><?php echo $sin; ?></td>
          </tr>
          <tr>
            <td>Per Stitch in x 300</td>
            <td><?php echo $sout; ?></td>
          </tr>
          <tr>
            <td>Per Stitch Out x 100</td>
            <td><?php echo $ivinfection; ?></td>
          </tr>
          <tr>
            <td>BSF / BSR</td>
            <td><?php echo $bsf; ?></td>
          </tr>
          <tr>
            <td>Short Stay (After 1st Hour)</td>
            <td><?php echo $sstay; ?></td>
          </tr>
          <tr>
            <td>Blood Pressure - BP</td>
            <td><?php echo $bp; ?></td>
          </tr>
          <tr>
            <td>ECG</td>
            <td><?php echo $ecg; ?></td>
          </tr>
          <tr>
            <td>Other</td>
            <td><?php echo $other; ?></td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6"></div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Amount Due <?php echo $date; ?></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>PKR - <?php echo $tbill; ?></td>
            </tr>
            <!-- <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr> -->
            <tr>
              <th>Discount:</th>
              <td>PKR - <?php echo $disc; ?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>PKR - <?php echo $fbill; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
 <!-- Main Footer -->
 <?php include('components/footer.php'); ?>
  <!-- /. Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include('components/form_script.php'); ?>