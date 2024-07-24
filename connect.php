<?php
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $category=$_POST['category'];
    $aadhar=$_POST['aadhar'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $unino=$_POST['unino'];
    $uniname=$_POST['uniname'];
    $colname=$_POST['colname'];
    $sem=$_POST['sem'];
    $area=$_POST['area'];
    $state=$_POST['state'];
    $dist=$_POST['dist'];
    $faddress=$_POST['faddress'];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $aphno=$_POST['aphno'];
    $msname=$_POST['msname'];
    $msadd=$_POST['msadd'];
    $mmarks=$_POST['mmarks'];
    $isname=$_POST['isname'];
    $isadd=$_POST['isadd'];
    $imarks=$_POST['imarks'];
    $file_name="";
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "./uploads/".$file_name;
    if(move_uploaded_file($tempname, $folder)){
        echo "Image uploaded successfully";
    }
    else{
        echo "Image not uploaded";
    }
    $sign="";
    $sign = $_FILES['sign']['name'];
    $tempname2 = $_FILES['sign']['tmp_name'];
    $folder2 = "./uploads/".$sign;
    if(move_uploaded_file($tempname2, $folder2)){
        echo "Image uploaded successfully";
    }
    else{
        echo "Image not uploaded";
    }

    $conn = new mysqli('localhost','root','','registration form');
    if($conn->connect_error){
        die('Connection Failed :' .$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registrations(firstName, lastName, file, gender, dob, category, aadhar, fname, mname, unino, uniname, colname, sem, area, state, dist, faddress, email, phno, aphno, msname, msadd, mmarks, isname, isadd, imarks, sign)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssississssssssiississis",$firstName, $lastName, $file_name, $gender, $dob, $category, $aadhar, $fname, $mname, $unino, $uniname, $colname, $sem, $area, $state, $dist, $faddress, $email, $phno, $aphno, $msname, $msadd, $mmarks, $isname, $isadd, $imarks, $sign);
        $stmt->execute();
        echo "Registration Successful";
        $stmt->close();
        $conn->close();
        header('Location: downloadpdf.php'); 
        exit;
    }

?>