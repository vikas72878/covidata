<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
            width: 100%;
            border-collapse: collapse;
            }

            table, td, th {
            border: 1px solid black;
            padding: 5px;
            }

            th {text-align: left;}
        </style>
    </head>
    <body>

        <?php
 
        $con = mysqli_connect('localhost','root','','covid-19_database');
        if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
        }
         mysqli_select_db($con,"ajax_demo");
        $sql="SELECT * FROM  india_cases  ORDER BY india_cases.index1 ASC";
        $result = mysqli_query($con,$sql);
         echo "<table>
        <tr>
        <th>index</th>
        <th>name</th>
        <th>total_cases</th>
        <th>total_recovered</th>
        <th>total_deaths</th>
        </tr>";
        while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['index1'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['total_cases'] . "</td>";
        echo "<td>" . $row['total_recovered'] . "</td>";
        echo "<td>" . $row['total_deaths'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
        ?>
    </body>
</html>