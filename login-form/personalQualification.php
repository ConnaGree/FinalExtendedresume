<?php

require_once "databaseConnection.php";
session_start();




$img_type = array('image/jpeg', 'image/jpg', 'image/png');





$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;


$major = $_POST["major"];
$startDate = $_POST["starts"];
$endDate = $_POST["ends"];
$institution = $_POST["institution"];
$firstName = $_POST["firstname"];
$lastName = $_POST["lastname"];
$DOB = $_POST["dob"];
$email = $_POST["email"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$summary = $_POST["personalSummary"];
$experience = $_POST["experience"];
$company = $_POST["company"];
$experience = $_POST["experience"];
$company = $_POST["company"];
$starting = $_POST["commence"];
$ending = $_POST["terminate"];
$jobDescription = $_POST["description"];
$skills = $_POST["skills"];




if (isset($_POST['submit'])) {

    $video_type = array('video/mp4', 'video/avi');
    $upload_dir = "uploads/videos/";
    $name = basename($_FILES["file2"]["name"]);
    $tmp_name = $_FILES["file2"]["tmp_name"];
    $vid = $upload_dir . $name;

    if (in_array($_FILES["file2"]["type"], $video_type)) {
        echo $vid;
        move_uploaded_file($tmp_name, "$upload_dir/$name");
    }


    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $sessionUser = $_SESSION['user'];

    $sql = "SELECT * FROM user_list WHERE username = '$sessionUser'";
    $result = mysqli_query($conn, $sql);

    $rowCount = mysqli_num_rows($result);

    if ($rowCount == 1) {
        while ($row = mysqli_fetch_assoc($result)) {

            $summary_sql = "UPDATE user_list SET briefAbout = '$summary' WHERE username = '$sessionUser'";
            mysqli_query($conn, $summary_sql);

            $prof_sql = "UPDATE user_list SET profile = '$target_file' WHERE username = '$sessionUser'";
            mysqli_query($conn, $prof_sql);

            $Vid_sql = "UPDATE user_list SET video = '$vid' WHERE username = '$sessionUser'";
            mysqli_query($conn, $Vid_sql);


            $first_sql = "UPDATE user_list SET firstName = '$firstName' WHERE username = '$sessionUser'";
            mysqli_query($conn, $first_sql);

            $last_sql = "UPDATE user_list SET lastName = '$lastName' WHERE username = '$sessionUser'";
            mysqli_query($conn, $last_sql);

            $dob_sql = "UPDATE user_list SET DOB = '$DOB' WHERE username = '$sessionUser'";
            mysqli_query($conn, $dob_sql);

            $email_sql = "UPDATE user_list SET email = '$email' WHERE username = '$sessionUser'";
            mysqli_query($conn, $email_sql);

            $address_sql = "UPDATE user_list SET address = '$address' WHERE username = '$sessionUser'";
            mysqli_query($conn, $address_sql);

            $phone_sql = "UPDATE user_list SET phone = '$phone' WHERE username = '$sessionUser'";
            mysqli_query($conn, $phone_sql);

            $major_sql = "UPDATE user_list SET major = '$major' WHERE username = '$sessionUser'";
            mysqli_query($conn, $major_sql);

            $start_sql = "UPDATE user_list SET commence = '$startDate' WHERE username = '$sessionUser'";
            mysqli_query($conn, $start_sql);

            $end_sql = "UPDATE user_list SET finalize = '$endDate' WHERE username = '$sessionUser'";
            mysqli_query($conn, $end_sql);

            $inst_sql = "UPDATE user_list SET institution = '$institution' WHERE username = '$sessionUser'";
            mysqli_query($conn, $inst_sql);

            $title_sql = "UPDATE user_list SET title = '$experience' WHERE username = '$sessionUser'";
            mysqli_query($conn, $title_sql);

            $company_sql = "UPDATE user_list SET company = '$company' WHERE username = '$sessionUser'";
            mysqli_query($conn, $company_sql);

            $started_sql = "UPDATE user_list SET startedWorking = '$starting' WHERE username = '$sessionUser'";
            mysqli_query($conn, $started_sql);

            $ended_sql = "UPDATE user_list SET ending = '$ending' WHERE username = '$sessionUser'";
            mysqli_query($conn, $ended_sql);

            $jobd_sql = "UPDATE user_list SET jobDescription = '$jobDescription' WHERE username = '$sessionUser'";
            mysqli_query($conn, $jobd_sql);

            $skills_sql = "UPDATE user_list SET skills = '$skills' WHERE username = '$sessionUser'";
            mysqli_query($conn, $skills_sql);






            $user = $_SESSION["id"];

            header("Location: display.php?$user");
            exit();
        }
    }
}
