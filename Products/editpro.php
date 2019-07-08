
<div class="page-wrapper" id="data2">       

<?php

include('connection.php');
$userId=$_POST['z'];

$sql="SELECT * from product where id=$userId ";
    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
    }


$sql1="select * from categorytable";
$res1=mysqli_query($conn,$sql1);







?>

        <!-- ============================================================== -->
             <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" >
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row" >
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal"method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="col-sm-2 text-center">Add Products</h4>
                                    
                                   <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label" >Category</label>
                                          <div class="col-sm-5">
                                        <select class="form-control" id="cat" name="catname">
                                        <option value="" >Select category</option>
                                        <?php
                                            if(mysqli_num_rows($res1)>0){
                                            while($rows=mysqli_fetch_assoc($res1)){?>

                                            <option value="<?php echo $rows['id'];?>" <?php if($row['category_id']==$rows['id'])echo "selected";?>> <?php echo $rows['title'];?></option>
                                            <?php }
                                            }?>

                                        </select>
                                        </div>
                                    </div>
                                        <div class="form-group row" id="fg">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label" >Sub Category</label>
                                        <div class="col-sm-5">
                                            <select class="form-control" name="sub" readonly>
                                            <option value="">Select sub category</option>


                                            </select>
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Product Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $row['product_title'];?>" name="product_title" id="fname">
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Selling Price</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $row['selprice'];?>" name="selprice" id="fname">
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Cost Price</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $row['costprice'];?>" name="costprice" id="fname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Image</label>
                                        <div class="col-sm-5">
                                            <img src="<?php echo $row['image'];?>" style="width:100px; height:100px;"/>      
                                            <input type="file" class="form-control" id="lname" name="imagee">
                                        </div>
                                    </div>
                                   
                                 <div>

                                    <div class="col-sm-2 text-center">
                                        <input type="hidden" id="userid" name ="idd" value="<?php if(!empty($userId)) {echo $userId;}?> "/>
                                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                              </div>
                               
                            </form>
                        </div>
            </div>
        </div>
         </div>

          <script type="text/javascript">
                                                  $(document).ready(function(){

                                                    $("#cat").change(function(){
                                                      var x=$("#cat").val();
                                                                                                        
                                                      $.ajax({
                                                          type:"post",
                                                          url:"sub.php",
                                                          data:{x:x},
                                                          success:function(data){
                                                          $('#fg').css('display','block');
                                                            $('#fg').replaceWith(data);
                                                          }
                                                        });
                                                      });
                                                });

                                </script>