<?php
include("./databasecon.php");
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM logs WHERE id LIKE '%$search%' OR date LIKE '%$search%' OR kilometers_driven LIKE '%$search%' OR duration LIKE '%$search%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['date']}</td>
                <td>{$row['kilometers_driven']}</td>
                <td>{$row['duration']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}
$conn->close(); 





?> 