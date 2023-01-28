
<table class="table">
    <thead>
        <tr>
            <th scope="col">E-ID</th>
            <th scope="col">Fullname</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php 
        $employee_id = $_SESSION["employee_id"];
        $current_date = date('Y-m-d'); 

        $sql = "SELECT * FROM users";
        $result = $db->query($sql);

        while ($row = $result->fetch_assoc()) {
            $id = $row['employee_id'];
            $fullname = $row['fullname'];
            $role = $row['role'];
            echo <<<end
            <tr>
                <td>$id</td>
                <td>$fullname</td>
                <td>$role</td>
                <td><a href="./employee_profile.php?eid=$id"><span class="badge text-bg-primary span-clickable">See profile</span></a></td>
            </tr>
            end;
        }
        ?>
        <!-- <tr>
            <td>101</td>
            <td>Daffa Islami Azka</td>
            <td>Admin</td>
            <td><span class="badge text-bg-success">Present</span></td>
            <td><link rel="stylesheet" href=""><span class="badge text-bg-primary span-clickable">See profile</span></td>
        </tr> -->
    </tbody>
</table>
