 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="index3.html" class="nav-link">Home</a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="#" class="nav-link">Contact</a>
         </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <li class="nav-item">
             <div class="dropdown">
                 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                     data-toggle="dropdown" aria-expanded="false">
                     <?php 
                     if(isset($_SESSION['auth']))

                     {
                        
                       echo $_SESSION['auth_user']['user_firstname'];
                       
                     }
                     else
                     {
                       echo "Not Logged In" ;
                     }
                     ?>
                 </button>
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                     
                
                     <form action="code.php"  method="POST">
                      <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                    </form>
                 </ul>
             </div>
         </li>
         <!-- Navbar Search -->
         <li class="nav-item">
             <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                 <i class="fas fa-search"></i>
             </a>
             <div class="navbar-search-block">
                 <form class="form-inline">
                     <div class="input-group input-group-sm">
                         <input class="form-control form-control-navbar" type="search" placeholder="Search"
                             aria-label="Search">
                         <div class="input-group-append">
                             <button class="btn btn-navbar" type="submit">
                                 <i class="fas fa-search"></i>
                             </button>
                             <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                 <i class="fas fa-times"></i>
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </li>

         <!-- Messages Dropdown Menu -->
       
 </nav>
 <!-- /.navbar -->