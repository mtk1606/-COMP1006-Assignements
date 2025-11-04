<?php
require_once "classes/Database.php";

$db = new Database();
$conn = $db->connect();

if ($conn) {
    echo "<p style='color:green'>✅ Connection successful to Georgian MySQL!</p>";
} else {
    echo "<p style='color:red'>❌ Connection failed.</p>";
}
?>
