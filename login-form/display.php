<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['user'] . $_SESSION['id']; ?></title>
    <link rel="stylesheet" href="stylesheets/show.css">
    <link rel="shortcut icon" href="<?php
                                    echo returnData('profile');
                                    ?>"" type=" image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <?php

    function returnData($item)
    {
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPassword = "";
        $dbName = "contacts_list";

        $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

        if (!$conn) {
            die("Failed to Connect to the Database!");
        }


        $sessionUser =  $_SESSION['user'];
        $sql = "SELECT * FROM user_list WHERE username = '$sessionUser'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                return $row[$item];
            }
        }
    }
    ?>

    <div class="main__container">
        <div class="left__container">
            <div class="profile__container">
                <img class="profile__pic" src="<?php
                                                echo returnData('profile');
                                                ?>" alt="">
            </div>

            <div class="contact__container">
                <h2 class="education__title">Contact</h2>
                <p class="email">Email
                    <span> <?php
                            echo returnData('email') ?></span>
                </p>
                <p class="address">
                    Address
                    <span><?php
                            echo returnData('address') ?></span>
                </p>
                <p class="phone">
                    Phone
                    <span><?php
                            echo returnData('phone') ?></span>
                </p>

            </div>

            <div class="education__container">
                <h2 class="education__title">Education</h2>
                <p class="major">
                    <?php
                    echo returnData('major') ?>
                </p>
                <p class="institution">
                    <?php
                    echo returnData('institution') ?>
                </p>

                <div class="date__container">
                    <span class="startDate">
                        <?php
                        echo returnData('commence') ?>
                    </span>

                    <i class="uil uil-line-alt"></i>

                    <span class="endDate">
                        <?php
                        echo returnData('finalize') ?>
                    </span>
                </div>

            </div>

            <div class="skills__container">
                <h2 class="skills__title">Skills</h2>
                <span>
                    <?php
                    echo returnData('skills') ?>
                </span>
            </div>
            <div id="qrcode" class="qr__code">
                <span class="share__qrcode"> <i class="uil uil-asterisk"></i>You can share your resume
                    with you recruiters via the QR code
                </span>
            </div>
        </div>

        <div class="right__container">
            <div class="right__header-container">
                <h1 class="user__name"><?php
                                        echo returnData('firstName');
                                        ?> <?php
                                            echo returnData('lastName');
                                            ?></h1>
                <a href="Session.php" class="edit__button">
                    <i class='bx bxs-edit'></i>
                </a>

            </div>

            <p class="summary"><?php
                                echo returnData('briefAbout');
                                ?></p>

            <span class="startDate">
                DOB - <?php
                        echo returnData('DOB') ?>
            </span>

            <div class="experience__container">
                <h2 class="work__experience-title">Work Experience</h2>
                <p class="job__title"><?php
                                        echo returnData('title');
                                        ?></p>
                <p class="company"><?php
                                    echo returnData('company');
                                    ?></p>
                <p class="description"><?php
                                        echo returnData('jobDescription');
                                        ?></p>
                </p>
                <span class="startDate">
                    <?php
                    echo returnData('startedWorking') ?>
                </span>

                <i class="uil uil-line-alt"></i>

                <span class="endDate">
                    <?php
                    echo returnData('ending') ?>
                </span>
            </div>

            <div class="video__container">
                <h2 class="short__video-desc">A little about me</h2>
                <video width="100%" height="240" controls>
                    <source src="<?php
                                    echo returnData('video') ?>" type="video/mp4">

                </video>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
    <script>
        const currentUrl = window.location.href;
        const qrcode = new QRCode(document.getElementById('qrcode'), {
            text: currentUrl,
            width: 150,
            height: 150,
            colorDark: '#000',
            colorLight: '#fff',
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>

</body>