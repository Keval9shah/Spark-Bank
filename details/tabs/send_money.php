<div class='receipt'>
    <div class='receipt-list'>
        <div class='fields'>
            <div class='flbal'>your balance <br>
                <div class='flbal1'>
                    ₹
                    <span>
                        <?php 
                            $balance = mysqli_fetch_assoc(mysqli_query($con, "SELECT balance FROM user WHERE acc_no='$acc_no'"))['balance'];
                            echo $balance;
                        ?>
                    </span>
                </div>
            </div>
            <form action='transaction_data.php' method='POST'>
                <div class='receiver fl'>
                    <div class='field'>Email/Account no.</div>
                    <div class='answer'><input id='rec' minlength='3' maxlength='30' name='receiver' required placeholder='Ex@xyz.com or 10080085'></div>
                </div>
                <div class='fl'>
                    <div class='amount fl'>
                        <div class='field'>Amount</div>
                        <div class='answer'><input id='ana' maxlength='10' static='' name='amount' required placeholder='Enter Amount'></div>
                    </div>
                    <div class='go fl'><button name='submit' type='submit' class='pay'>Pay <img src="../assets/images/chevron-right.svg" alt="Chevron Right"></button></div>
                </div>
            </form>
        </div>
    </div>
</div>