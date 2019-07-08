<?php

include('connection.php');

 $userId=$_POST['x'];
  
   $sql="SELECT * from localitytable where l_id=$userId ";
    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
    }


$sql="SELECT * from citytable";
    $res1=mysqli_query($conn,$sql);




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
                                   
                                       <li class="breadcrumb-item"><a href="locality.php">Locality Table</a></li>
                                  
                                  
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
                                    <h4 class="col-sm-2 text-center">Add Locality</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">City</label>
                                        <div class="col-sm-5">
                                            <select class="form-control"  name="city">

                                              
                                                <option value="" >Select City</option>
                                                <?php   

                                                if(mysqli_num_rows($res1)>0){
                                                while($rows=mysqli_fetch_assoc($res1)){?>
                                                 <option value="<?php echo $rows['city_id'];?>" <?php if($row['c_id']==$rows['city_id'])echo "selected";?>> <?php echo $rows['name'];?> </option>

                                                            
                                                          <?php  }
                                                        }?>

                                    
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Locality</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $row['locality'];?>" name="locality">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Pincode</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $row['pincode'];?>" name="pincode" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Delivery cost</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $row['delivery_cost'];?>" name="d_cost" >
                                        </div>
                                    </div>
                                    

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Delivery time</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $row['delivery_time'];?>" name="d_time" >
                                        </div>
                                    </div>
                                    
                                    
                                <div>

                                    <div class="col-sm-2 text-center">
                                        <input type="hidden" id="userid" name ="l_id" value="<?php if(!empty($userId)) {echo $userId;}?> "/>
                                        <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                    </div>
                                </div>
                            </div>
                            
                            </form>
                        
                        </div>
                    
            </div>
        </div>
    </div>
      
