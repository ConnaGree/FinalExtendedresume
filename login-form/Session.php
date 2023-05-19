<?php
require_once "databaseConnection.php";
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['user'] . $_SESSION['id']; ?></title>
    <link rel="stylesheet" href="stylesheets/sessions.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <nav class="nav__container">
        <a style="display: block;" href="logout.php" class="logout"><i class='bx bx-power-off'></i> <span>logout</span></a>
    </nav>

    <div class="username__greeting">
        <div class="image__container">
            <form method="post" action="personalQualification.php" enctype="multipart/form-data">
                <div class="circle">
                    <img class="profile-pic" src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                    <div class="upload__container">
                        <i class='bx bxs-plus-circle upload-button'></i></i>
                        <input class="file-upload" type="file" name="file" accept="image/*" />
                    </div>

                </div>

        </div>
        <div>
            <h1 class="welcome">Welcome, <span class="username" display: inline;"><?php echo $_SESSION['user']; ?><span>
            </h1>
            <p class="qualification__text">Please enter your details</p>
        </div>

    </div>

    <!-- Qualificaions -->

    <div class="qualifications__section">

        <div class="qualifications__container">

            <div class="skills__section">
                <h3>Credentials</h3>
                <input type="text" name="firstname" placeholder="First name">
                <input type="text" name="lastname" placeholder="Last name">
                <input type="text" name="dob" placeholder="Date of birth" onfocus="(this.type='date')">
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Phone Number">

            </div>

            <div class="education__section">
                <h3>Education <i class='bx bxs-plus-circle'></i></i></h3>
                <input type="text" name="major" placeholder="Major">
                <input type="text" name="institution" placeholder="Institution">
                <input type="text" name="starts" placeholder="Start Date" onfocus="(this.type='date')">
                <input type="text" name="ends" placeholder="End Date" onfocus="(this.type='date')">
            </div>

            <div class="video__section">
                <h3>Video <i class='bx bxs-plus-circle'></i></i></h3>
                <div class="upload__container">
                    <input class="video-upload" type="file" name="file2" accept="video/*" />
                </div>
            </div>


            <div class="experience__section">
                <h3>Experiences<i class='bx bxs-plus-circle'></i></i></h3>
                <input type="text" name="experience" placeholder="Eg 'Accountant'">
                <input type="text" name="company" placeholder="Institution">
                <input type="text" name="commence" placeholder="Start Date" onfocus="(this.type='date')">
                <input type="text" name="terminate" placeholder="End Date" onfocus="(this.type='date')">
                <textarea name="description" id="" cols="30" rows="10" placeholder="Describe your role"></textarea>
            </div>


            <div class="self__summary">
                <h3>Summary</h3>
                <h4>Write a short summary so recruiters get to know you</h4>
                <textarea class="summary" col="20" rows="10" name="personalSummary"></textarea>
            </div>

            <div class="skills__section">
                <h3>Skills <i class='bx bxs-plus-circle'></i></i></h3>
                <input type="text" name="skills" placeholder="Add you skills separated my ,">
            </div>

        </div>

        <button class="submit" name="submit">Submit</button>
        </form>
    </div>


    <!-- <script type="text/javascript" src="js/Upload profile pic.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });



            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
        });
    </script>
</body>

</html>