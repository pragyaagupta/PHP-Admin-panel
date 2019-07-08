

<?php
include('header1.php');

include('connection.php');
$sql2="select * from citytable order by id desc";
$res1=mysqli_query($conn,$sql2);



if(isset($_POST['submit'])){
   // echo "hello";die;
    $name=$_POST['name'];
   
    $pincode=$_POST['pincode'];
    $status=1;
    
    $sql="insert into citytable(name,pincode,status) values('$name','$pincode','$status')";
    
    $res=mysqli_query($conn,$sql);
    
    if($res){

        echo "<script> window.location='city.php';</script>";

    }
    else{
        echo "not inserted";
    }


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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="col-sm-2 text-center">Enter City Details</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control"  name="name" placeholder="Enter Name Here">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center  control-label col-form-label">Pincode</label>
                                        <div class="col-sm-5">
                                            <input type="tel" class="form-control"  name="pincode" placeholder="Phone number Here">
                                        </div>
                                    </div>
                                
                                <div>

                                    <div class="col-sm-2 text-center">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           