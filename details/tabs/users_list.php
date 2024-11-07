<?php $result = mysqli_query($con, " SELECT id,name,email,acc_no FROM user"); ?>
<div class='containerx1'>
    <ul class='responsive-table ulx1'>
        <li class='table-header'>
            <div class='cola cola-1'>No</div>
            <div class='cola cola-2'>Name</div>
            <div class='cola cola-3'>Email</div>
            <div class='cola cola-4'>Account No</div>
        </li>
    </ul>
    <div>
        <div class='containerx'>
            <ul class='responsive-table'><?php $m = 0;
                                            while ($rows = $result->fetch_assoc()) {
                                                $m += 1; ?><li class='table-row trn'>
                        <div class='cola cola-1'><?php echo $m; ?></div>
                        <div class='cola cola-2'><?php echo $rows['name']; ?></div>
                        <div class='cola cola-3'><?php echo $rows['email']; ?></div>
                        <div class='cola cola-4'><?php echo $rows['acc_no']; ?></div>
                    </li><?php } ?></ul>
        </div>
        <script>
            var buttons = document.getElementsByClassName("trn");
            var buttonsCount = buttons.length;
            for (var i = 0; i < buttonsCount; i += 1) {
                // buttons[i].onclick = function(e) {
                //     alert(this.innerHTML);
                // }
                var cptxt;
                buttons[i].onclick = function() {
                    cptxt = this.childNodes[2].innerHTML;
                    // document.execCommand("copy");
                    showSendMoneyTab();
                    document.getElementById("rec").value = cptxt;
                    document.getElementById("ana").focus();
                }
                // buttons[i].addEventListener("copy", function(event) {
                //     event.preventDefault();
                //     // setTimeout(() => {
                //         if (event.clipboardData) {
                //             alert(cptxt+" copied to clipBoard");
                //             event.clipboardData.setData("text/plain", cptxt);
                //             // console.log(event.clipboardData.getData("text"))
                //         }
                //         else{
                //             alert("not copied");
                //         }
                //     });
                // }, 100);
            }
        </script>
    </div>
</div>