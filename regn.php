<?php
include './header.php';
if(!isset($_POST['submit1'])) {
    $result = mysqli_query($link, "select sname from specialisation");
?>
        <form name="f" action="regn.php" method="post" enctype="multipart/form-data" onsubmit="return check()">
            <table class="center_tab">
                <thead>
                    <tr>
                        <th colspan="4">PATIENT REGISTRATION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>First Name</th>
                        <td><input type="text" name="fname" required autofocus></td>
                        <th>Last Name</th>
                        <td><input type="text" name="lname" required></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>
                            <input type="radio" name="gender" value="Male" checked>Male
                            <input type="radio" name="gender" value="Female">Female
                        </td>
                        <th>Occupation</th>
                        <td>
                            <select name="occ">
                            <option value='business'>Business</option>
                            <option value='private'>Private</option>
                            <option value='govt'>Government</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><textarea name="addr" required></textarea></td>
                        <th>DOB</th>
                        <td><input type="date" name="dob" required></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><input type="text" name="city" required></td>
                        <th>State</th>
                        <td><input type="text" name="state" required></td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td><input type="text" name="mobile" required maxlength="10"></td>
                        <th>Your Image</th>
                        <td><input type="file" name="ff" accept="image/*" required></td>
                    </tr>
                    <tr>
                        <th>EMail (User id)</th>
                        <td><input type="text" name="email" required></td>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" name="pwd" required></td>
                        <th></th>
                        <td></td>
                    </tr>                    
                    <tr>
                        <th>Confirm Pwd</th>
                        <td><input type="password" name="cpwd" required></td>
                        <th></th>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="center">
                            <input type="submit" name="submit1" value="Create">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
<?php
} else {
    if(is_uploaded_file($_FILES['ff']['tmp_name'])) {
        $iname = "uploads/".time().$_FILES['ff']['name'];
        move_uploaded_file($_FILES['ff']['tmp_name'], $iname) or die("<div class='center'>Cannot Move Image...!<br><a href='regn.php'>Back</a></div>");
    extract($_POST);
    mysqli_query($link, "insert into newpatient(fname,lname,gender,occ,addr,city,state,dob,mobile,userid,pwd,iname) values('$fname','$lname','$gender','$occ','$addr','$city','$state','$dob','$mobile','$email','$pwd','$iname')");
    echo "<div class='center'>Patient Id Created Successfully...!<br><a href='regn.php'>Back</a></div>";
    } else {
        echo "<div class='center'>Image not Uploaded...!<br><a href='regn.php'>Back</a></div>";
    }
}
?>
<script>
    function check() {
        var m = f.mobile.value
        var e = f.email.value
        var pw = f.pwd.value
        var cp = f.cpwd.value
        
        var mp = /^[987]\d{9}$/
        var ep = /^\w+\.{0,1}\w+\@\w+\.([a-z]{3}|[a-z]{2}\.[a-z]{2}){1}$/
        
        if(!m.match(mp)) {
            alert("Invalid Mobile Number")
            f.mobile.focus()
            return false
        }
        if(!e.match(ep)) {
            alert("Invalid EMail Id")
            f.email.focus()
            return false
        }
        if(pw!=cp) {
            alert("Confirm Password not Match")
            f.cpwd.focus()
            return false
        }
        return true
    }
</script>
<?php
include './footer.php';
?>