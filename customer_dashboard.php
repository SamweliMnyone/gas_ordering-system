<?php include('./layout/customer/header.php'); ?>

<div style="display: flex;gap: 15px;position: scroll;">

<?php include('./layout/customer/sidebar.php') ?>

    <div style="height: 100vh; width: 86%;padding-top: 100px;position:scroll;">
        <div class="table-responsive" style="margin-top: 20px;">
            <P style="text-align:center;font-size: 19px;font-weight: 900;">Request cylinders</P>
            <div class="container mt-5" >
        <table class="table table-hover" id="example" width="100%">
        <thead class="table-dark" style="font-weight: 600;font-size: 15px;" width="100%">
            <tr>
                    <th>No</th>
                    <th>Cylinder Name</th>
                    <th>Supplier Name</th>
                    <th>Contacts</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
		$sql = "SELECT * FROM product";
		$result = mysqli_query($conn,$sql);            

		if($result){
			$counter=1; //initialization for s/no
			while($row=mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $counter;  ?></td>
                <td><?php echo $row['cylinder'];  ?></td>
                <td><?php echo $row['name'];  ?></td>
                <td><?php echo $row['contact'];  ?></td>
                <td><?php echo $row['location'];  ?></td>
                <td><?php echo $row['status'];  ?></td>
                <td><?php echo $row['price'];  ?></td>

                <td><a href="verfylocation.php?id=<?php echo $row['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
</svg></a></td>
            </tr>
            <?php
            $counter++;
            }
        }
        ?>
        </tbody>
    </table>
</div>

            </div>

        </div>
    </div>
</div>
 
<?php include('./layout/customer/footer.php') ?>