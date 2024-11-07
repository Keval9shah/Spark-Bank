<?php 
if (isset($_POST['d1']) && isset($_POST['d2']) && $d2 > $d1) {
    $sql = "SELECT * FROM transaction WHERE acc_no=" . $acc_no . " AND datetime BETWEEN '" . $d1 . "' and '" . $d2 . " 23:59:59' ORDER BY datetime DESC";
    $result = mysqli_query($con, $sql);
} else {
    $result = mysqli_query($con, "SELECT * FROM transaction WHERE acc_no='$acc_no' ORDER BY datetime DESC");
} 
?>

<div class="table">
    <ul class="responsive-table ulx1">
        <li class="table-header">
            <div class="col c1h col-1">Date</div>
            <div class="col col-2">To/From</div>
            <div class="col col-3">Amount</div>
            <div class="col col-4">Balance</div>
        </li>
    </ul>
    <div class="table-content">
        <ul class="responsive-table">
            <?php 
            $ii = 0;
            while ($rows = $result->fetch_assoc()) {
                if ($ii == 0) { ?>
                    <div class="date-input-form-container">
                        <div class="transaction-date-label">
                            <?php 
                            echo date_format(date_create($rows['datetime']), 'd/m/y');
                            $cur_date = date_format(date_create($rows['datetime']), 'd/m/y');
                            $GLOBALS['frstdate'] = date_format(date_create($rows['datetime']), 'Y-m-d');
                            ?>
                        </div>
                        <div class="date-input-form">
                            <form action="?tr=done" method="POST" id="transaction-date-form">
                                <input type="date" id="d1" name="d1"> to <input type="date" id="d2" name="d2">
                            </form>
                        </div>
                    </div>
                    <div class="transaction-group">
                <?php } else if ($cur_date !== date_format(date_create($rows['datetime']), 'd/m/y')) { ?>
                    </div>
                    <div class="transaction-date-label">
                        <?php 
                        echo date_format(date_create($rows['datetime']), 'd/m/y');
                        $cur_date = date_format(date_create($rows['datetime']), 'd/m/y');
                        $GLOBALS['lastdate'] = date_format(date_create($rows['datetime']), 'Y-m-d');
                        ?>
                    </div>
                    <div class="transaction-group">
                <?php }
                $ii = 1;
                ?>
                <li class="table-row">
                    <div class="col col-1"><?php echo date_format(date_create($rows['datetime']), 'h:i A'); ?></div>
                    <div class="col col-2"><?php echo $rows['s_name']; ?></div>
                    <?php 
                    $am = intval($rows['amount']);
                    if ($am > 0) {
                        echo "<div class='col col-3 positive'>" . $am . "</div>";
                    } else {
                        echo "<div class='col col-3 negative'>" . $am . "</div>";
                    }
                    ?>
                    <div class="col col-4">₹<?php echo $rows['current_bal']; ?></div>
                </li>
            <?php } ?>
        </ul>

        <script>
            var d1 = document.querySelector('#d1');
            var d2 = document.querySelector('#d2');
            var form = document.querySelector('#transaction-date-form');

            d1.onchange = function() {
                form.submit();
            }
            d2.onchange = function() {
                form.submit();
            }

            <?php if (isset($_POST['d1']) && isset($_POST['d2']) && $d2 > $d1) { ?>
                d2.value = '<?php echo $d2 ?>';
                d1.value = '<?php echo $d1; ?>';
            <?php } else { ?>
                d2.value = '<?php echo $GLOBALS['frstdate']; ?>';
                d1.value = '<?php echo $GLOBALS['lastdate']; ?>';
            <?php } ?>
        </script>
    </div>
</div>
