<?php include('./layout/supplier/header.php'); ?>

<?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

        $sql = "SELECT * FROM `product` WHERE `id` = '$id'";

        $result = mysqli_query($conn, $sql);

        if(!$result){
        echo "failed";
        }
        else{
            $row = mysqli_fetch_array($result);
        }

        
if(isset($_POST['update'])){
    $cylinder =  secures($_POST['cylinder']);
    $name = secures($_POST['name']);
    $contact = secures($_POST['contact']);
    $location = secures($_POST['location']);
    $status = secures($_POST['status']);
    $price = secures($_POST['price']);

      $sql = "UPDATE `product` SET `cylinder`='$cylinder',`name`='$name',`contact`='$contact',`location`='$location',`status`='$status',`price`='$price' WHERE id ='$id'";

      $result = mysqli_query($conn, $sql);


      if($result){
          header('Location: supplier_dashboard.php');
          echo "Succesfuly";
          exit();
      }else{
          die("Something went wrong");
      }
  }

    function secures($data){
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }
?>

<div style="display: flex;gap: 15px;position: scroll;">

<?php include('./layout/supplier/sidebar.php') ?>

    <div style="height: 100vh; width: 86%;padding-top: 100px;flex:content;position:scroll;">
        <div  style="margin-top: 20px;">

              <form class="form-horizontal" style="padding: 20px;" method="post" action="#">


              <div class="form-group">
                <div class="row" style="margin-bottom: 20px;">
                <label class="col-sm-3 control-label"> Cylinder name</label>
                <div class="col-sm-9">
                <select class="form-select" name="cylinder" value="<?php echo $row['cylinder'] ?>">
                    <option name="cylinder" value="<?php echo $row['cylinder'] ?>">--SELECT--</option>
                    <option name="cylinder" value="<?php echo $row['cylinder'] ?>">ORYX GAS</option>
                    <option name="cylinder" value="<?php echo $row['cylinder'] ?>">MANJIS GAS</option>
                    <option name="cylinder" value="<?php echo $row['cylinder'] ?>">LAKE GAS</option>
                    <option name="cylinder" value="<?php echo $row['cylinder'] ?>">O-GAS</option>
                    <option name="cylinder" value="<?php echo $row['cylinder'] ?>">TAIFA GAS</option>
                </select>
                </div>
                </div>
                </div>


                <div class="form-group">
                <div class="row" style="margin-bottom: 20px;">
                <label class="col-sm-3 control-label">Supplier name</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="name"  name="name" autocomplete="off" required="" value="<?php echo $row['name'] ?>">
                </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row" style="margin-bottom: 20px;">
                <label class="col-sm-3 control-label"> Contact</label>
                <div class="col-sm-9">
                <input type="number" class="form-control" id="contact"  name="contact" autocomplete="off" required="" value="<?php echo $row['contact'] ?>">
                </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row" style="margin-bottom: 20px;">
                <label class="col-sm-3 control-label"> Location</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="location"  name="location" autocomplete="off" required="" value="<?php echo $row['location'] ?>">
                </div>
                </div>
                </div>

                <div class="form-group">
                <div class="row" style="margin-bottom: 20px;">
                <label class="col-sm-3 control-label"> Status</label>
                <div class="col-sm-9">
                <select class="form-select" name="status"  value="<?php echo $row['status'] ?>">
                    <option name="status" value="<?php echo $row['status'] ?>">--SELECT--</option>
                    <option name="status" value="<?php echo $row['status'] ?>">Available</option>
                    <option name="status" value="<?php echo $row['status'] ?>">Unvailable</option>
                </select>
                </div>
                </div>
                </div>

                <div class="form-group">
                  <div class="row" style="margin-bottom: 20px;">
                  <label class="col-sm-3 control-label">Price</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="price"  name="price" autocomplete="off" required="" value="<?php echo $row['price'] ?>">
                  </div>
                  </div>
                  </div>

                 

               <button type="submit" name="update" class="btn btn-primary btn-flat m-b-30 m-t-30" style="background-color: red;">Update</button>
      
               </form>
              </div>
           </div>
        </div>
    </div>
   
    <?php include('./layout/supplier/footer.php') ?>