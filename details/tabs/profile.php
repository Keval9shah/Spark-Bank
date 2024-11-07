<div class='profile'>
    <div class='profile-user-greeting'>Hi,<?php echo ' ', $name; ?></div>
    <div class='profile-email'><?php echo $email; ?></div>
    <div class='profile-account-number'><mark><?php echo $acc_no; ?></mark></div><br>
    <div class='profile-balance'>Balance
        <mark>₹
            <?php 
                $balance = mysqli_fetch_assoc(mysqli_query($con, "SELECT balance FROM user WHERE acc_no='$acc_no'"))['balance'];
                echo $balance; 
            ?>
        </mark>
    </div>
</div>