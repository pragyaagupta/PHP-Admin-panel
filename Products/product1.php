<?php
include('header1.php');

$sql1="select * from categorytable";
$res1=mysqli_query($conn,$sql1);


if(isset($_POST['submit'])){


$catname=$_POST['catname'];
$scatname=$_POST['sub'];
$product=$_POST['product_title'];
$selprice=$_POST['selprice'];
$costprice=$_POST['costprice'];

$status=1;
if(!empty($_FILES['imagee']['name'])){
$img_name=$_FILES['imagee']['name'];
$tmp_name=$_FILES['imagee']['tmp_name'];
$path='img/'.$img_name;
move_uploaded_file($tmp_name,$path);
}

        $sql="insert into product(category_id,subcategory_id, product_title, selprice,costprice,image,status) values('$catname','$scatname','$product','$selprice', '$costprice','$path','$status')";
        $res=mysqli_query($conn,$sql);



if($res){
echo "
<script>
window.location = 'product_table.php';
</script>";
}
else{
echo "not inserted";
}}


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

                                            <option value="<?php echo $rows['id'];?>"><?php echo $rows['title'];?></option>
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
                                            <input type="text" class="form-control" name="product_title" id="fname">
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Selling Price</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="selprice" id="fname">
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-center control-label col-form-label">Cost Price</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="costprice" id="fname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-center control-label col-form-label">Image</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="lname" name="imagee">
                                        </div>
                                    </div>
                                   
                                 <div>

                                    <div class="col-sm-2 text-center">
                                        
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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