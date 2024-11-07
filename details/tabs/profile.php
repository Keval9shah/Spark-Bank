<div class='profile'>
    <div class='hi'>Hi,<?php echo ' ', $name; ?></div>
    <div class='em'><?php echo $email; ?></div>
    <div class='acc_no'><mark class='accn'><?php echo $acc_no; ?></mark></div><br>
    <div class='bal'>Balance
        <mark class='bala'>₹
            <?php 
                $balance = mysqli_fetch_assoc(mysqli_query($con, "SELECT balance FROM user WHERE acc_no='$acc_no'"))['balance'];
                echo $balance; 
            ?>
        </mark>
    </div>
</div>