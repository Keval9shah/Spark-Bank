<div class='receipt'>
    <div class='receipt-list'>
        <div class='fields'>
            <div class='send-money-balance'>your balance <br>
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
                <div class='receiver'>
                    <div class='field'>Email/Account no.</div>
                    <div class='answer'><input id='transaction-receiver-input' minlength='3' maxlength='30' name='receiver' required placeholder='Ex@xyz.com or 10080085'></div>
                </div>
                <div class='amount'>
                    <div class='field'>Amount</div>
                    <div class='answer'><input id='transaction-amount-input' maxlength='10' static='' name='amount' required placeholder='Enter Amount'></div>
                </div>
                <button name='submit' type='submit' class='pay'>Pay <img src="../assets/images/chevron-right.svg" alt="Chevron Right"></button>
            </form>
        </div>
    </div>
</div>