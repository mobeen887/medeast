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
                    <th>Name</th>
                    <th>Alais</th>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $sql ="SELECT * FROM `patient_type`";
                      $qsql = mysqli_query($db,$sql);
                      while($rs = mysqli_fetch_array($qsql))
                      { 
                        $date = substr($rs['TYPE_SAVE_TIME'],0, 21);
                        echo "<tr>
                        <td>$rs[PATIENT_TYPE_ID]</td>
                        <td>$rs[PATIENT_TYPE_NAME]</td>
                        <td>$rs[PATIENT_TYPE_ALAIS]</td>
                        <td>$date</td>
                        <td>$rs[PATIENT_TYPE_STATUS]</td>
                        <td style='display:flex;'>
                            <a href='view_patient_type.php?id=$rs[PATIENT_TYPE_ID]' style='color:green;'>
                              <i class='fas fa-info-circle'></i> Details
                            </a><br>
                            <a href='add_patient_type.php?id=$rs[PATIENT_TYPE_ID]'>
                              <i class='fas fa-edit'></i> Edit
                            </a><br>
                            <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='backend_components/delete_handler.php?patTypeId=$rs[PATIENT_TYPE_ID]' style='color:red;'>
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