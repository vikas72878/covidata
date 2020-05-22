<!DOCTYPE html>
<html>
    <head>
            <link href="table.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php
        //$q = intval($_GET['q']);

        $con = mysqli_connect('localhost','root','','covid-19_database');
        if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
        }
//SELECT * FROM `world_cases` ORDER BY `world_cases`.`index` ASC
        mysqli_select_db($con,"ajax_demo");
        $sql="SELECT * FROM  world_cases  ORDER BY world_cases.index ASC";
        $result = mysqli_query($con,$sql);
//index , country_name,total_cases,new_cases,total_deaths,new_deaths,total_recovered
//,active_cases,serious_critical,tot_cases_per_1M,deaths_per_1M,total_tests,tests_per_1M,population,continent
        echo "<table>
        <tr>
        <th>index</th>
        <th>country_name</th>
        <th>total_cases</th>
        <th>new_cases</th>
        <th>total_deaths</th>
        <th>new_deaths</th>
        <th>total_recovered</th>
        <th>active_cases</th>
        <th>serious_critical</th>
        <th>tot_cases_per_1M</th>
        <th>deaths_per_1M</th>
        <th>total_tests</th>
        <th>tests_per_1M</th>
        <th>population</th>
        <th>continent</th> 
        </tr>";
        while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['index'] . "</td>";
        echo "<td>" . $row['country_name'] . "</td>";
        echo "<td>" . $row['total_cases'] . "</td>";
        echo "<td>" . $row['new_cases'] . "</td>";
        echo "<td>" . $row['total_deaths'] . "</td>";

        echo "<td>" . $row['new_deaths'] . "</td>";
        echo "<td>" . $row['total_recovered'] . "</td>";
        echo "<td>" . $row['active_cases'] . "</td>";
        echo "<td>" . $row['serious_critical'] . "</td>";
        echo "<td>" . $row['tot_cases_per_1M'] . "</td>";

        echo "<td>" . $row['deaths_per_1M'] . "</td>";
        echo "<td>" . $row['total_tests'] . "</td>";
        echo "<td>" . $row['tests_per_1M'] . "</td>";
        echo "<td>" . $row['population'] . "</td>";
        echo "<td>" . $row['continent'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
        ?>
    </body>
</html>