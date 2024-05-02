<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CSV</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body pad table-responsive">
                        <form action="code.php" method="post">
                            <p><b>Click below button to download CSV file</b></p>
                                <tr>
                                    <td>
                                        <button type="submit" name="generate_csv" class="btn btn-success">Download  CSV</button> 
                                    </td>
                                </tr>
                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php include('includes/footer.php'); ?>
