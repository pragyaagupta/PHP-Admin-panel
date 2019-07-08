<?php
include('header1.php');


if(isset($_POST['submit'])){
   
    $title=$_POST['title'];
    $status=1;
    
    if(!empty($_FILES['image']['name'])){
        $img_name=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $path='images/'.$img_name;
        move_uploaded_file($tmp_name,$path);
        
    }
    
    $sql="insert into categorytable(title,image,status) values('$title','$path','$status')";
    
    $res=mysqli_query($conn,$sql);
    
    if($res){

        echo "<script> window.location='tablee1.php';</script>";

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

                <div class="page-breadcrumb" >
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Products</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="tablee1.php">Category Table</a></li>
                                  
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
                                    <h4 class="col-sm-2 text-center">Add Category</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Title</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control"  name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Image</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" name="image" >
                                        </div>
                                    </div>
                                    
                                <div>

                                    <div class="col-sm-2 text-center">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
           