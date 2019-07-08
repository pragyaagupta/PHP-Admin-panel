<?php
include('header1.php');
if(isset($_POST['submit'])){

    $c_id=$_POST['city'];
    $locality=$_POST['locality'];
     $pincode=$_POST['pincode'];
      $d_cost=$_POST['d_cost'];
       $d_time=$_POST['d_time'];
    $status=1;
  
    $sql="insert into localitytable(c_id,locality,pincode,delivery_cost, delivery_time,status) values('$c_id','$locality','$pincode', '$d_cost', '$d_time','$status')";
    
    $res=mysqli_query($conn,$sql);
    
    if($res){

        echo "<script> window.location='locality.php';</script>";

    }
    else{
        echo "not inserted";
    }
}

$sql2="select * from citytable";
$res1=mysqli_query($conn,$sql2);


 




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
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="col-sm-2 text-center">Add Locality</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">City</label>
                                        <div class="col-sm-5">
                                            <select class="form-control"  name="city">

                                              
                                                <option value="" >Select City</option>
                                                <?php   

                                                if(mysqli_num_rows($res1)>0){
                                                while($rows=mysqli_fetch_assoc($res1)){?>
                                                 <option value="<?php echo $rows['city_id'];?>"> <?php echo $rows['name'];?> </option>

                                                            
                                                          <?php  }
                                                        }?>

                                    
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Locality</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control"  name="locality">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Pincode</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="pincode" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Delivery cost</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="d_cost" >
                                        </div>
                                    </div>
                                    

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Delivery time</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="d_time" >
                                        </div>
                                    </div>
                                    
                                    
                                <div>

                                    <div class="col-sm-2 text-center">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                            
                            </form>
                        
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           