<?php
require_once '../php/config_plumber.php';

if(ISSET($_POST['search'])){
    $search = $_POST['search'];
    $query = $connect->query("SELECT * FROM plumbers WHERE (service LIKE '%".$search."%') OR (address LIKE '%".$search."%') ORDER BY service ASC");
    $rows = $query->num_rows;

    if($rows > 0){
//        $fetch = mysqli_fetch_assoc($query);
    }else{
        echo "
				<tr>
					<td colspan='12' class='text-center text-danger'>No Data Found!</td>
				</tr>
			";
    }
}
?>

<?php while ($fetch = mysqli_fetch_assoc($query)){?>
<tr>
    <td class="text-capitalize"><?php echo $fetch['first_name'];?> <?php echo $fetch['last_name'];?></td>
    <td><?php echo $fetch['service'];?></td>
    <td><?php echo $fetch['address'];?></td>
<!--    <td>-->
<!--        --><?php
//        $status = $fetch['status'];
//        // echo $status;
//
//        if (($status) == '0'){?>
<!--            Available-->
<!--            --><?php
//        }
//        if (($status) == '1'){?>
<!--            Un available-->
<!--            --><?php
//        }
//        ?>
<!--    </td>-->
    <td><?php echo $fetch['set_schedule'];?></td>
    <td><?php echo number_format($fetch['rate'], 2);?></td>
    <td>
        <a href="confirm_book.php?book=<?php echo $fetch['id'];?>" class="btn btn-success">Book Now</a>
    </td>
    <td>
        <a href="plumber_profile.php?id=<?php echo $fetch['id']?>" target="_blank" class="btn btn-info">View Profile</a>
    </td>

</tr>
<?php } ?>