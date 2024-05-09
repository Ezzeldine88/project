<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Donations</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $equipment_sql = "SELECT * FROM equipment_donations";
    $equipment_result = $conn->query($equipment_sql);

    $cash_sql = "SELECT * FROM donations WHERE payment_method = 'Cash'";
    $cash_result = $conn->query($cash_sql);

    $gear_sql = "SELECT * FROM gear_donations";
    $gear_result = $conn->query($gear_sql);
    ?>

    <h2>Equipment Donations</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Equipment Type</th>
            <th>Equipment Used</th>
            <th>Amount</th>
            <th>Purchase Date</th>
            <th>Cost</th>
            <th>Made In</th>
            <th>Message</th>
        </tr>
        <?php
        if ($equipment_result->num_rows > 0) {
            while($row = $equipment_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["equipment_type"] . "</td>";
                echo "<td>" . $row["equipment_used"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "<td>" . $row["purchase_date"] . "</td>";
                echo "<td>" . $row["cost"] . "</td>";
                echo "<td>" . $row["made_in"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No equipment donations found</td></tr>";
        }
        ?>
    </table>

    <h2>Cash Donations</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Amount</th>
            <th>Message</th>
        </tr>
        <?php
        if ($cash_result->num_rows > 0) {
            while($row = $cash_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No cash donations found</td></tr>";
        }
        ?>
    </table>

    <h2>Gear Donations</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gear Type</th>
            <th>Amount</th>
            <th>Message</th>
        </tr>
        <?php
        if ($gear_result->num_rows > 0) {
            while($row = $gear_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["gear_type"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No gear donations found</td></tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
    <form action="admindashboard.html" method="get">
            <button type="submit">Exit</button>
        </form>
</body>
</html>
