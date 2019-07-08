<?php
session_start();
include('connection.php');
$id=$_POST['x'];
$sql="select * from subcategory where category_id='$id'";
$res=mysqli_query($conn,$sql);
?>

<div class="form-group row" id="fg">
<label for="fname" class="col-sm-2 text-center control-label col-form-label">Sub Category</label>
<div class="col-sm-5">
<select class="form-control" name="sub">
<option value="">Select sub category</option>
<?php
                                                    if(mysqli_num_rows($res)>0){
                                                        while($rows=mysqli_fetch_assoc($res)){?>
                                     <option value="<?php echo $rows['id'];?>">
                                     	<?php echo $rows['title'];?>
                                     		
                                     	</option>


                                      <?php }
                                       }?>
</select>
</div>
</div>