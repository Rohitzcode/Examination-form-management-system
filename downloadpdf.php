<?php

$conn = new mysqli('localhost', 'root', '', 'registration form');
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
    $stmt = $conn->prepare("SELECT * FROM registrations WHERE email =?");
    $email="rohitsinha707098@gmail.com";
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $gender = $row['gender'];
    $dob = $row['dob'];
    $category = $row['category'];
    $faddress = $row['faddress'];
    $fname = $row['fname'];
    $mname = $row['mname'];
    $aphno = $row['aphno'];
    $phno = $row['phno'];
    $unino = $row['unino'];
    $uniname = $row['uniname'];
    $colname = $row['colname'];
    $sem = $row['sem'];
    $email = $row['email'];
    $aadhar = $row['aadhar'];
    $area = $row['area'];
    $state = $row['state'];
    $dist = $row['dist'];
    $faddress = $row['faddress'];
    $msname = $row['msname'];
    $msadd = $row['msadd'];
    $mmarks = $row['mmarks'];
    $isname = $row['isname'];
    $isadd = $row['isadd'];
    $imarks = $row['imarks'];
    $file_name = $row['file'];
    $sign = $row['sign'];
    $salt = "2407180010";
    $app = $salt.$row['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCCL</title>
    <link rel="icon" href="images/BCCL logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="regis.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <script src="download.js" defer></script>
</head>
<body>
    <div class="container" id="container">
        <h2>Registration Details</h2>
        <div class="form-container">
            <form>
                <div class="application-no">
                    <label for="appno">Application No.</label>
                    <input type="text" class="name1" name="appno" disabled id="appno" value="<?php echo $app;?>"required>
                </div>
                <br>
                <div class="name">
                    <label for="name">Name :</label>
                    <input type="text" class="name1" name="firstname" disabled value="<?php echo $row["firstName"]; ?>" required>
                    &nbsp;&nbsp;&nbsp;
                    <input type="text" class="name1" name="lastName" disabled value="<?php echo $row["lastName"]; ?>" required>
                    <br>
                    <br>
                </div>
                <div class="in-line">
                    <div class="gen">
                        <label for="gender">Gender :</label>
                        <input type="radio" name="gender" value="Male" disabled <?php echo ($row['gender'] == "Male") ? "checked" : ""; ?> required> Male
                        <input type="radio" name="gender" value="Female" disabled <?php echo ($row['gender'] == "Female") ? "checked" : ""; ?> required> Female
                        <input type="radio" name="gender" value="Other" disabled <?php echo ($row['gender'] == "Other") ? "checked" : ""; ?> required> Other
                        <br><br>
                    </div>
                    <div class="photo">
                            <img class="pro-photo" src="uploads/<?php echo $row['file'] ?>">
                    </div>
                </div>
                <br><br>
                <div class="dob">
                    <label for="dob">Date of birth :</label>
                    <input type="date" class="name1" disabled name="dob" value="<?php echo $row["dob"]; ?>" required>
                    <br>
                    <br>
                </div>
                <div class="category">
                    <label for="category">Category :</label>
                    <select name="category" placeholder="Select" class="name1" required>
                        <optgroup>
                            <option value="" disabled hidden>Select category</option>
                            <option value="GEN" disabled <?php echo ($row['category'] == "GEN") ? "selected" : ""; ?>>GEN</option>
                            <option value="EWS" disabled <?php echo ($row['category'] == "EWS") ? "selected" : ""; ?>>EWS</option>
                            <option value="ST" disabled <?php echo ($row['category'] == "ST") ? "selected" : ""; ?>>ST</option>
                            <option value="SC" disabled <?php echo ($row['category'] == "SC") ? "selected" : ""; ?>>SC</option>
                            <option value="OBC" disabled <?php echo ($row['category'] == "OBC") ? "selected" : ""; ?>>OBC</option>
                        </optgroup>
                    </select>
                    <br><br>
                </div>
                <div class="aadhar">
                    <label for="aadhar">Aadhar Number :</label>
                    <input type="number" class="name1" disabled name="aadhar" value="<?php echo $row["aadhar"]; ?>" required>
                    <br><br>
                </div>
                <div class="name">
                    <label for="Fname">Father's Name :</label>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="name1" disabled name="fname" value="<?php echo $row["fname"]; ?>" required>
                    <br>
                </div>
                <div class="name">
                    <br>
                    <label for="Mname">Mother's Name :</label>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="name1" disabled name="mname" value="<?php echo $row["mname"]; ?>" required>
                    <br><br>
                </div>
                <div class="unireg">
                    <label for="unireg">University Registration Number :</label>
                    <input type="text" class="name1" disabled name="unino" value="<?php echo $row["unino"]; ?>" required>
                    <br>
                    <br>
                    <label for="unireg">University Name :</label>
                    <input type="text" class="name1" disabled name="uniname" value="<?php echo $row["uniname"]; ?>" required>

                    <br>
                    <br>
                    <label for="unireg">College Name :</label>
                    <input type="text" class="name1" disabled name="colname" value="<?php echo $row["colname"]; ?>" required>

                    <br>
                    <br>
                    <label for="unireg">Current Semester :</label>
                    <input type="text" class="name1" disabled name="sem" value="<?php echo $row["sem"]; ?>" required>

                    <br>
                    <br>
                </div>
                <div class="address">
                    <label for="add">Place of residence :</label>
                    <input type="radio" name="area" value="Rural" disabled <?php echo ($row['area'] == "Rural") ? "checked" : ""; ?> required> Rural
                    <input type="radio" name="area" value="Urban" disabled <?php echo ($row['area'] == "Urban") ? "checked" : ""; ?> required> Urban
                    <br><br>
                    <label for="state">State :</label>
                    <input type="text" class="name1" disabled name="state" value="<?php echo $row["state"]; ?>" required>

                    <br><br>
                    <label for="district">District :</label>
                    <input type="text" class="name1" disabled name="dist" value="<?php echo $row["dist"]; ?>" required>

                    <br><br>
                    <label for="address">Full Permanent Address :</label>
                    <input type="text" class="faddress name1" disabled name="faddress" value="<?php echo $row["faddress"]; ?>" required>

                    <br><br>
                </div>
                <div class="email">
                    <label for="email">Email :</label>
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" disabled class="name1" name="email" value="<?php echo $row["email"]; ?>" required>

                    <br>
                    <br>
                </div>
                <div class="phno">
                    <label for="phno">Phone Number :</label>
                    <i class="fa-solid fa-phone"></i>
                    <input type="tel" class="name1" disabled name="phno" value="<?php echo $row["phno"]; ?>" required>

                    <br><br>
                    <label for="phno">Alternate Phone Number :</label>
                    <i class="fa-solid fa-phone"></i>
                    <input type="tel" class="name1" disabled name="aphno" value="<?php echo $row["aphno"]; ?>" required>

                    <br><br>
                </div>
                <hr>
                <h3>Qualification</h3>
                <h4>Matriculation</h4>
                <div class="matric">
                    <label for="school">Name of Institution:</label>
                    <br>
                    <input type="text" class="qua" disabled name="msname" value="<?php echo $row["msname"]; ?>" required>

                    <br>
                    <br>
                    <label for="school">Full Address of Institution:</label>
                    <br>
                    <input type="text" class="qua" disabled name="msadd" value="<?php echo $row["msadd"]; ?>" required>

                    <br>
                    <br>
                    <label for="Marks">Marks obtained(Percentage/Grade):</label>
                    <br>
                    <input type="text" class="name1" disabled name="mmarks" value="<?php echo $row["mmarks"]; ?>" required>

                </div>
                <hr>
                <h4>Intermediate</h4>
                <div class="inter">
                    <label for="school">Name of Institution:</label>
                    <br>
                    <input type="text" class="qua" disabled name="isname" value="<?php echo $row["isname"]; ?>" required>

                    <br>
                    <br>
                    <label for="school">Full Address of Institution:</label>
                    <br>
                    <input type="text" class="qua" disabled name="isadd" value="<?php echo $row["isadd"]; ?>" required>

                    <br>
                    <br>
                    <label for="Marks">Marks obtained(Percentage/Grade):</label>
                    <br>
                    <input type="text" class="name1" disabled name="imarks" value="<?php echo $row["imarks"]; ?>" required>
                    <br>
                </div>
                <div>
                    <label>Signature:</label>
                    <img class="sign-photo" src="uploads/<?php echo $row['sign'] ?>">
                </div>
            </form>
        </div>
    </div>
    <div class="download-button">
        <button class="download" id="download">Download PDF</button>
    </div>
</body>
</html>