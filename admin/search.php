<?php
require_once '../php/config_plumber.php';

if(ISSET($_POST['search'])){
    $search = $_POST['search'];
    $query = $connect->query("SELECT * FROM plumbers WHERE (first_name LIKE '%".$search."%') OR (service LIKE '%".$search."%') ORDER BY first_name ASC");
    $rows = $query->num_rows;

    if($rows > 0){
//        $fetch = mysqli_fetch_assoc($query);
    }else{
        echo "
				<tr>
					<td colspan='5' class='text-center'>No Data Found!</td>
				</tr>
			";
    }
}
?>

<?php while ($fetch = mysqli_fetch_assoc($query)){?>
<tr>
    <td><?php echo $fetch['first_name'];?></td>
    <td><?php echo $fetch['service'];?></td>
    <td>
        <?php
        $status = $fetch['status'];
        // echo $status;

        if (($status) == '0'){?>
            <a href="block_unblock.php?status=<?php echo $fetch['id'];?>" onclick="return confirm('Block <?php echo $row['first_name'];?>')"><button class="btn btn-danger">Block</button></a>
            <?php
        }
        if (($status) == '1'){?>
            <a href="block_unblock.php?status=<?php echo $fetch['id'];?>"  onclick="return confirm('UnBlock <?php echo $row['first_name'];?>')"><button class="btn btn-success">Unblock</button></a>
            <?php
        }
        ?>
    </td>
    <td>
        <a href="plumber_profile.php?id=<?php echo $fetch['id']?>" class="btn btn-info">View Profile</a>
    </td>

</tr>
<?php } ?>