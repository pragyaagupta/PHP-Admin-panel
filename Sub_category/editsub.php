<div class="page-wrapper" id="data2">



<?php

include('connection.php');
$userId=$_POST['x'];

 $sql="SELECT * from subcategory where id=$userId ";
    $res1=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res1)>0){
        $row=mysqli_fetch_assoc($res1);
    }


    $sql="SELECT * from categorytable";
    $res=mysqli_query($conn,$sql);

  

?>
     <!-- Page wrapper  -->
        <!-- ============================================================== -->
  
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
                                    <h4 class="col-sm-2 text-center">Edit Subcategory</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Category</label>
                                        <div class="col-sm-5">
                                            <select class="form-control"  name="category">

                                              
                                                <option value="" name="cat">Select Category</option>
                                                <?php   

                                                if(mysqli_num_rows($res)>0){
                                                while($rows=mysqli_fetch_assoc($res)){?>
                                                 <option value="<?php echo $rows['id'];?>" <?php if($row['category_id']==$rows['id'])echo "selected";?>> <?php echo $rows['title'];?> </option>

                                                            
                                                          <?php  }
                                                        }?>

                                    
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Title</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $row['title'];?>" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Image</label>
                                        <div class="col-sm-5">
                                            <img src="<?php echo $row['image'];?>" style="width:100px; height:100px;"/>      
                                            <input type="file" class="form-control" name="image" >
                                        </div>
                                    </div>
                                    
                                <div>

                                    <div class="col-sm-2 text-center">
                                      <input type="hidden" id="userid" name ="idd" value="<?php if(!empty($userId)) {echo $userId;}?> "/>
                                        <button type="submit" class="btn btn-primary" name="edit">edit</button>
                                    </div>
                                </div>
                            </div>
                            
                            </form>