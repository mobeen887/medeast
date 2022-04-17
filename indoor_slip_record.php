<?php 
  // Session Start
  session_start(); 
  if (isset($_SESSION['userid'])) {
  // Connection File
  include('backend_components/connection.php');
  // Table Header File
  include('components/table_header.php'); 
  // Navbar File
  include('components/navbar.php');
  // Sidebar File
  include('components/sidebar.php'); 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2"><a type="submit" class="btn btn-block btn-primary btn-sm" href="emergency.php"><i class="fas fa-plus"></i> New Patient</a></div>
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slip Record</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Table Data of Patient -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No#</th>
                    <th>MR-ID</th>
                    <th>Procedure</th>
                    <th>Type</th>
                    <th>Doctor</th>
                    <th>Created By</th>
                    <th>Created On</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $sql ="SELECT *,`DOCTOR_NAME`,`ADMIN_USERNAME` FROM `indoor_slip` INNER JOIN `admin` INNER JOIN `doctor` WHERE `indoor_slip`.`DOCTOR_ID` = `doctor`.`DOCTOR_ID` AND `indoor_slip`.`STAFF_ID` = `admin`.`ADMIN_ID`";
                    //   $sql ="SELECT * FROM `emergency_slip`";
                      $qsql = mysqli_query($db,$sql);
                      while($rs = mysqli_fetch_array($qsql))
                      { 
                       $date = substr($rs['SLIP_DATE_TIME'],0, 21);
                        echo "<tr>
                        <td>$rs[SLIP_ID]
                        </td>
                        <td>$rs[SLIP_MR_ID]</td>
                        <td>$rs[SLIP_PROCEDURE]</td>
                        <td>$rs[SLIP_TYPE]</td>
                        <td>$rs[DOCTOR_NAME]</td>
                        <td>$rs[ADMIN_USERNAME]</td>
                        <td>$date</td> 
                        <td style='display:flex;'>
                            <a href='view_patient.php?id=$rs[SLIP_ID]' style='color:green;'>
                              <i class='fas fa-info-circle'></i> Details
                            </a><br>
                            <a href='add_patient.php?id=$rs[SLIP_ID]'>
                              <i class='fas fa-edit'></i> Edit
                            </a><br>
                            <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='backend_components/delete_handler.php?patId=$rs[SLIP_ID]' style='color:red;'>
                              <i class='fas fa-trash'></i> Delete
                            </a>
                        </td>
                        </tr>"; 
                      }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.Footer -->
<?php 
  // Footer File
  include ('components/footer.php'); 
  echo '</div>';
  // Table Script File
  include('components/table_script.php'); 

}else{
  echo '<script type="text/javascript">window.location = "login.php";</script>';
} 
?>