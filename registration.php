<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'registration form');
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$email = $_SESSION['email'];

$stmt = $conn->prepare("SELECT * FROM registrations WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0){
    header('Location: downloadpdf.php');
    exit();
}

$stmt = $conn->prepare("SELECT * FROM signups WHERE email =?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $phno = $row['phno'];
} else {
    echo "No user found with this email.";
}
?>
<?php
    $res = mysqli_query($conn, "select * from registrations");
    $row = mysqli_fetch_assoc($res);
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
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <div class="form-container">
            <form action="connect.php" method="post" enctype="multipart/form-data">
                <div class="name">
                    <label for="name">Name :</label>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="First Name" class="name1" name="firstName" value="<?php echo $firstName; ?>" required>
                    &nbsp;&nbsp;&nbsp;
                    <input type="text" placeholder="Last Name" class="name1" name="lastName" value="<?php echo $lastName; ?>" required>
                    <br>
                    <br>
                </div>
                <div class="gen">
                    <label for="gender">Gender :</label>
                    <input type="radio" name="gender" value="Male" <?php echo ($row['gender'] == "Male") ? "checked" : ""; ?> required> Male
                    <input type="radio" name="gender" value="Female" <?php echo ($row['gender'] == "Female") ? "checked" : ""; ?> required> Female
                    <input type="radio" name="gender" value="Other" <?php echo ($row['gender'] == "Other") ? "checked" : ""; ?> required> Other
                    <br>
                    <br>
                </div>
                <div class="dob">
                    <label for="dob">Date of birth :</label>
                    <input type="date" class="name1" name="dob" value="<?php echo $dob; ?>" required>
                    <br>
                    <br>
                </div>
                <div class="upload-photo">
                    <label for="input-file">Upload Photo :</label>
                    <input type="file" name="image" accept="image/jpeg, image/png, image/jpg" id="input-file">
                    <br><br>
                </div>
                
                <div class="category">
                    <label for="category">Category :</label>
                    <select name="category" placeholder="Select" class="name1" name="category" required>
                      <optgroup>
                        <option value="" disable selected hidden>Select category </option>
                          <option value="1">GEN</option>
                          <option value="2">EWS</option>
                          <option value="3">ST</option>
                          <option value="4">SC</option>
                          <option value="5">OBC</option>
                      </optgroup>
                    </select>
                    <br><br>
                </div>
                <div class="aadhar">
                    <label for="aadhar">Aadhar Number :</label>
                    <input type="number" class="name1" name="aadhar" required>
                    <br><br>
                </div>
                <div class="name">
                    <label for="Fname">Father's Name :</label>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="name1" name="fname" required>
                    <br>
                </div>
                <div class="name">
                    <br>
                    <label for="Mname">Mother's Name :</label>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="name1" name="mname" required>
                    <br><br>
                </div>
                <div class="unireg">
                    <label for="unireg">University Registration Number :</label>
                    <input type="text" class="name1" name="unino" required>
                    <br>
                    <br>
                    <label for="unireg">University Name :</label>
                    <input type="text" class="name1" name="uniname" required>
                    <br>
                    <br>
                    <label for="unireg">College Name :</label>
                    <input type="text" class="name1" name="colname" required>
                    <br>
                    <br>
                    <label for="unireg">Current Semester :</label>
                    <input type="text" class="name1" name="sem" required>
                    <br>
                    <br>
                </div>
                <div class="address">
                    <label for="add">Place of residence :</label>
                    <input type="radio" name="area" value="Rural" required>Rural
                    <input type="radio" name="area" value="Urban" required>Urban
                    <br><br>
                    <label for="state">State :</label>
                    <input type="text" class="name1" name="state" required>
                    <br><br>
                    <label for="district">District :</label>
                    <input type="text" class="name1" name="dist" required>
                    <br><br>
                    <label for="address">Full Permanent Address :</label>
                    <input type="text" class="faddress name1" name="faddress" required>
                    <br><br>
                </div>
                <div class="email">
                    <label for="email">Email :</label>
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" class="name1" name="email" value="<?php echo $email; ?>" required>
                    <br>
                    <br>
                </div>
                <div class="phno">
                    <label for="phno">Phone Number :</label>
                    <i class="fa-solid fa-phone"></i>
                    <input type="tel" class="name1" name="phno" value="<?php echo $phno; ?>" required>
                    <br><br>
                    <label for="phno">Alternate Phone Number :</label>
                    <i class="fa-solid fa-phone"></i>
                    <input type="tel" class="name1" name="aphno" required>
                    <br><br>
                </div>
                <hr>
                <h3>Qualification</h3>
                <h4>Matriculation</h4>
                <div class="matric">
                    <label for="school">Name of Institution:</label>
                    <br>
                    <input type="text" class="qua" name="msname" required>
                    <br>
                    <br>
                    <label for="school">Full Address of Institution:</label>
                    <br>
                    <input type="text" class="qua" name="msadd" required>
                    <br>
                    <br>
                    <label for="Marks">Marks obtained(Percentage/Grade):</label>
                    <br>
                    <input type="text" class="name1" name="mmarks" required>
                </div>
                <hr>
                <h4>Intermediate</h4>
                <div class="inter">
                    <label for="school">Name of Institution:</label>
                    <br>
                    <input type="text" class="qua" name="isname" required>
                    <br>
                    <br>
                    <label for="school">Full Address of Institution:</label>
                    <br>
                    <input type="text" class="qua" name="isadd" required>
                    <br>
                    <br>
                    <label for="Marks">Marks obtained(Percentage/Grade):</label>
                    <br>
                    <input type="text" class="name1" name="imarks" required>
                    <br><br>
                </div>
                <hr>
                <div class="upload-signature">
                    <label for="input-file">Upload your signature: </label>
                    <input type="file" name="sign" accept="image/jpeg, image/png, image/jpg" id="input-file"> 
                    <br><br>
                </div>
                
                <div class="verify">
                    <input type="checkbox" required>I verify that all information stated above is true.
                    <br><br>
                </div>
                <div class="buttons">
                    <button type="submit" class="submitb" onclick="checkPassword()">Submit</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="resetb">Reset</button>
                </div>
            </form>
            <script src="script.js"></script>
        </div>
    </div>
</body>
</html>