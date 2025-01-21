<?php
include './adminheader.php';
if(!isset($_POST['submit1'])) {
?>
        <form name="f" action="adminhome.php" method="post" style="float:left;">
            <table class="center_tab" style="float:left;">
                <thead>
                    <tr>
                        <th colspan="2">SPECIALISATION TYPE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="sname" required autofocus></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="center">
                            <input type="submit" name="submit1" value="Create">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
<img src="img/im2.jpg" width="400px" style="margin-left: 100px;">
<?php
if(isset($_GET['sname'])) {
    mysqli_query($link, "delete from specialisation where sname='$_GET[sname]'");
}
$result = mysqli_query($link, "select * from specialisation") or die(mysqli_error($link));
    echo "<table class='right_tab'><thead><tr><th colspan='2'>SPECIALISATION LIST";
    echo "<tr><th>Name<th>Task<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach($row as $r) {                
                echo "<td>$r";
            }
            echo "<td><a href='adminhome.php?sname=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
        }
    echo "</table>";
mysqli_free_result($result);
} else {
    extract($_POST);
    mysqli_query($link, "insert into specialisation(sname) values('$sname')");
    echo "<div class='center'>Type Created Successfully...!<br><a href='adminhome.php'>Back</a></div>";
}
include './footer.php';
?>