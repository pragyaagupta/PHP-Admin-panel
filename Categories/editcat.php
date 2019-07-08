<?php

include('connection.php');

 $userId=$_POST['x'];
  
   $sql="SELECT * from categorytable where id=$userId ";
    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0){
        $rows=mysqli_fetch_assoc($res);
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
                        <h4 class="page-title">Products</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="form_b.php">Add Category</a></li>
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
                                    <h4 class="col-sm-2 text-center">Edit Category</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Title</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $rows['title'];?>" name="title" id="ti">
                                        </div>
                                    </div>
                                    
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Image</label>
                                        <div class="col-sm-5">
                                            <img src="<?php echo $rows['image'];?>" style="width:100px; height:100px;" />
                                            <input type="file" class="form-control"   name="image" id="im" >
                                        </div>
                                    </div>
                                    
                                <div>

                                    <div class="col-sm-2 text-center">
                                        <input type="hidden" id="userid" name ="idd" value="<?php if(!empty($userId)) {echo $userId;}?> "/>
                                        <button type="submit" class="btn btn-primary" name="edit" id="ed">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
            </div>
        </div>
    </div>
      
