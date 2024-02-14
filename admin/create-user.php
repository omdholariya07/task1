<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                
                <div class="col-sm-6">
                
                    <ol class="breadcrumb float-sm-right">
                   
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                       
                        <li class="breadcrumb-item active">Create users </li>      
                    </ol>     
                </div><!-- /.col -->
                  
            </div><!-- /.row -->
            <a href="" class="btn btn-primary float-right"> Add User </a>  
        </div><!-- /.container-fluid -->
       
    </div>
    <!-- /.content-header -->

   
    
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with user data</h3>
              </div>
             
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>User Image</th>
                    <th>Name of User</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Email Address</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
               </tbody>
             </table>
            </div>
        </div>
        
</div> 



<?php
include('includes/footer.php');
?>
