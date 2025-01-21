<?php
include './header.php';
if(strcasecmp($_GET['utype'], "admin")==0) {
    echo "<div style='text-align:center;'><img src='img/im1.gif' width='300px'></div>";
}
if(!isset($_POST['submit'])) {
    $utype = $_GET['utype'];
?>
<form name="f" action="login.php" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2"><?php echo strtoupper($utype);?> LOGIN</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>User Id</th>
		<td><input type="text" name="userid" required autofocus></td>
	    </tr>
	    <tr>
		<th>Password</th>
		<td>
                    <input type="password" name="pwd" required>
                    <input type="hidden" name="utype" value="<?php echo $utype;?>">
                </td>
	    </tr>
	    <!--tr>
		<th>Type</th>
		<td>
		    <select name="utype">
			<option value="user">User</option>
                        <option value="doctor">Doctor</option>
			<option value="admin">Admin</option>
		    </select>
		</td>
	    </tr-->
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="submit" value="Login">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);
    if(strcasecmp($utype, "admin")==0) {
	$result = mysqli_query($link, "select * from admin where userid='$userid' and pwd='$pwd'") or die(mysqli_error($link));
	if(mysqli_num_rows($result)>0) {
	    $_SESSION['adminuserid'] = $userid;
	    header("Location:adminhome.php");
	} else {
	    echo "<div class='center'>Invalid Userid/Password</div>";
	}
	mysqli_free_result($result);
    } else if(strcasecmp($utype, "patient")==0) {        
            $result = mysqli_query($link, "select * from newpatient where userid='$userid' and pwd='$pwd'");
            if(mysqli_num_rows($result)>0) {
                $_SESSION['userid'] = $userid;
                header("Location:patienthome.php");
            } else {
                echo "<div class='center'>Invalid Userid/Password</div>";
            }
            mysqli_free_result($result);        
    }   else if(strcasecmp($utype, "doctor")==0) {
	$result = mysqli_query($link, "select * from newdoctor where userid='$userid' and pwd='$pwd'") or die(mysqli_error($link));
	if(mysqli_num_rows($result)>0) {
	    $_SESSION['doctorid'] = $userid;
	    header("Location:doctorhome.php");
	} else {
	    echo "<div class='center'>Invalid Userid/Password</div>";
	}
	mysqli_free_result($result);
    }
    echo "<div class='center'><a href='index.php'>Back</a></div>";
}
include './footer.php';
?>