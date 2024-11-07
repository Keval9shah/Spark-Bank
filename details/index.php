<?php
require('../connection.inc.php');

session_start();

if (isset($_POST['d1']) && isset($_POST['d2'])) {
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
}

if (!array_key_exists("account_number", $_SESSION)) {
    echo '<script type="text/JavaScript">
    window.location.href = "../redirect";
    </script>';
}
$account_number = $_SESSION['account_number'];
$res = mysqli_query($con, "SELECT * FROM user WHERE acc_no='$account_number'");
$row = mysqli_fetch_assoc($res);
// echo $row['acc_no'],", ",$row['name'],", ",$row['balance'];
// echo ".";
$fullname = $row['name'];
if (strpos($fullname, " ")) {
    $name = substr($fullname, 0, strpos($fullname, " "));
} else {
    $name = $fullname;
}
$acc_no = $row['acc_no'];
$balance = $row['balance'];
$email = $row['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <title><?php echo $fullname ?></title>
    <link rel="stylesheet" href=".././assets/styles/main-page.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/clementfive" type="text/css"/> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="logout">
        <img src="../assets/images/logout-button.svg" alt="Log Out Button">
        Log Out
    </div>
    <div class="navigation">
        <div class="profile-tab tab current-tab" onclick="showTab('profile')">
            <?php echo $name; ?>'s profile
        </div>
        <div class="partition"></div>
        <div class="send-money-tab tab" onclick="showTab('send-money')">
            Send Money
        </div>
        <div class="partition"></div>
        <div class="transactions-tab tab" onclick="showTab('transactions')">
            Transactions
        </div>
        <div class="partition"></div>
        <div class="users-list-tab tab" onclick="showTab('users-list')">
            Users List
        </div>
    </div>
    <div class="pill"></div>

    <div id="profile-content" class="tab-content">
        <?php include('./tabs/profile.php'); ?>
    </div>
    <div id="send-money-content" class="tab-content">
        <?php include('./tabs/send_money.php'); ?>
    </div>
    <div id="transactions-content" class="tab-content">
        <?php include('./tabs/transactions.php'); ?>
    </div>
    <div id="users-list-content" class="tab-content">
        <?php include('./tabs/users_list.php'); ?>
    </div>
    
    <img src="../assets/images/top-veils-prop.png" class="top-veils-prop">
    <img src="../assets/images/vase-prop.png" class="vase-prop">
    <!-- Social Links -->
    <a href="https://twitter.com/keval2001" target="_blank" class="twitter social-buttons__button social-button social-button--linkedin" aria-label="LinkedIn"><i class="fa fa-twitter tw"></i></a>
    <a href="https://www.linkedin.com/in/keval-shah-a4b2811a3/" target="_blank" class="linkedin social-buttons__button social-button social-button--linkedin" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
    <a href="https://github.com/Keval9shah" target="_blank" class="github social-buttons__button social-button social-button--codepen" aria-label="CodePen"><i class="fa fa-github gb"></i></a>
    <a href="https://www.instagram.com/kvl.sh/" target="_blank" class="instagram social-buttons__button social-button social-button--github" aria-label="GitHub"><i class="fa fa-instagram in"></i></a>
    <script>
        const $ = (selector) => document.querySelector(selector);
        var pill = $(".pill");
        let currentTab = 'profile';
        const tabs = ['profile', 'transactions', 'send-money', 'users-list'];

        
        var balance = <?php echo $row['balance']; ?>;
        var acc_no = <?php echo $row['acc_no']; ?>;
        let tabsContainerWidth;
        let nav = $(".navigation");
        tabsContainerWidth = 0;
        tabs.forEach(tab => {
            tabsContainerWidth += $("." + tab + "-tab").offsetWidth;
        });
        tabsContainerWidth += 38;
        nav.style.width = tabsContainerWidth + "px";
        
        window.onresize = adjustPill;
        showTab(currentTab);
        
        function showTab(tab) {
            currentTab = tab;
            const element = $('.' + tab + '-tab');
            tabs.forEach(tab => {
                $("." + tab + "-tab").classList.remove("current-tab");
            });
            element.classList.add("current-tab");
            
            pill.style.left = element.offsetLeft + 1 + "px";
            pill.style.width = element.offsetWidth + 2 + "px";
            
            const partitionBefore = element.previousElementSibling;
            const partitionAfter = element.nextElementSibling;
            
            document.querySelectorAll('.partition').forEach(partition => {
                partition.style.visibility = "visible";
            });
            
            if (partitionBefore && partitionBefore.classList.contains('partition')) {
                partitionBefore.style.visibility = "hidden";
            }
            
            if (partitionAfter && partitionAfter.classList.contains('partition')) {
                partitionAfter.style.visibility = "hidden";
            }
            
            tabs.forEach(tab => {
                $("#" + tab + "-content").style.display = "none";
            });
            $("#" + tab + "-content").style.display = "block";
        }

        function adjustPill() {
            const element = $('.' + currentTab + '-tab');
            pill.style.left = element.offsetLeft + 1 + "px";
            pill.style.width = element.offsetWidth + 2 + "px";
        }
        // var acc_string=acc_no.toString();
        // var imgs=["0.jpg","1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg"];
        
        // function addAccImages(){
            // var images="";
            //     for(i=0;i<8;i++){
                //         images+="<img class='accimg' src='"+imgs[acc_string[i]]+"'>";
                //     }
                //     document.getElementsByClassName("acc_no")[0].innerHTML=images;
                // }
                // addAccImages();
                
                // set tabs container width
        </script>
</body>

</html>