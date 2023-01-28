<table class="table">
    <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Clock in</th>
            <th scope="col">Clock out</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php 
        $employee_id = $_SESSION["employee_id"];

        $sql = "SELECT * FROM attendances WHERE employee_id=$employee_id";
        $result = $db->query($sql);

        while ($row = $result->fetch_assoc()) {
            $date = $row['date'];
            $clock_in = $row['clock_in'];
            $clock_out = (empty($row['clock_out'])) ? "" : $row['clock_out']; ;
            echo <<<end
            
            <tr>
                <td>$date</td>
                <td>$clock_in</td>
                <td>$clock_out</td>
            </tr>
            
            end;
        }
        
        ?>
    </tbody>
</table>