<?php
$conn=mysqli_connect('localhost','root','','test1');
if($conn==false){
    ("Connection Failed: " .mysqli_connect_error());
}
$sql = "SELECT * FROM `flexsensor`";
$query = mysqli_query($conn, $sql);
?>
<body>
    <table>
    <thead>
        <tr>
            <th>Resistance1</th>
            <th>Resistance2</th>
            <th>Resistance3</th>
            <th>Resistance4</th>
            <th>Resistance5</th>
        </tr>
    </thead>
    <?php
    while ($rows = mysqli_fetch_array($query)){
    $fieldname1=$rows['resistance1'];
    $fieldname2=$rows['resistance2'];
    $fieldname3=$rows['resistance3'];
    $fieldname4=$rows['resistance4'];
    $fieldname5=$rows['resistance5'];

    echo 
    '<tr>
        <td>'.$fieldname1.'</td>
        <td>'.$fieldname2.'</td>
        <td>'.$fieldname3.'</td>
        <td>'.$fieldname4.'</td>
        <td>'.$fieldname5.'</td>
    </tr>';
    }
    ?>
    </table>
</body>