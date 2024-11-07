<?php $result = mysqli_query($con, " SELECT id,name,email,acc_no FROM user"); ?>
<div class='table'>
    <ul class='responsive-table table-header-adjustment'>
        <li class='table-header'>
            <div class='cola cola-1'>No</div>
            <div class='cola cola-2'>Name</div>
            <div class='cola cola-3'>Email</div>
            <div class='cola cola-4'>Account No</div>
        </li>
    </ul>
    <div>
        <div id="user-list" class='table-content'>
            <ul class='responsive-table'><?php $m = 0;
                                            while ($rows = $result->fetch_assoc()) {
                                                $m += 1; ?><li class='table-row'>
                        <div class='cola cola-1'><?php echo $m; ?></div>
                        <div class='cola cola-2'><?php echo $rows['name']; ?></div>
                        <div class='cola cola-3'><?php echo $rows['email']; ?></div>
                        <div class='cola cola-4'><?php echo $rows['acc_no']; ?></div>
                    </li><?php } ?></ul>
        </div>
        <script>
            var tableRows = document.querySelectorAll("#user-list .table-row");

            tableRows.forEach((row) => {
                row.onclick = function() {
                    let userEmail = this.childNodes[5].innerText;
                    showTab('send-money');
                    document.getElementById("transaction-receiver-input").value = userEmail;
                    document.getElementById("transaction-amount-input").focus();
                };
            });
        </script>
    </div>
</div>