<?php

include('connection.php');

 $userId=$_POST['x'];
  
   $sql="SELECT * from deliverytable where id=$userId ";
    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
    }






?>
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" id="data1">

                <div class="page-breadcrumb" >
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                       
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                   
                                       <li class="breadcrumb-item"><a href="tablee1.php">Delivery Table</a></li>
                                  
                                  
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="col-sm-2 text-center">Edit</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control"  value="<?php echo $row['name'];?>" name="name" >
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Email</label>
                                        <div class="col-sm-5">
                                            <input type="email" class="form-control"  value="<?php echo $row['email'];?>" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Phone</label>
                                        <div class="col-sm-5">
                                            <input type="tel" class="form-control"  value="<?php echo $row['phone'];?>" name="phone">
                                        </div>
                                    </div>
                                    
                                    
                                <div>

                                    <div class="col-sm-2 text-center">
                                        <input type="hidden" id="userid" name ="id" value="<?php if(!empty($userId)) {echo $userId;}?> "/>
                                        <button type="submit" class="btn btn-primary" name="edit" id="ed">Edit</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    
            </div>
        </div>
    </div>
</div>
      
