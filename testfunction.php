<?php
/**
 * Created by PhpStorm.
 * User: 001386538
 * Date: 1/26/2018
 * Time: 8:28 AM
 */

function func($db) {
    try {
        $sql = $db->prepare("SELECT * FROM employees");
        $employees = array();
        if ($sql->execute() && $sql->rowCount() > 0) {
            $employees = $sql->fetch(PDO::FETCH_ASSOC);
        }
        $table = "<table>";
        $table .= "<tr><td>" . $employees['employee_id'] . "</td>
        <td>" . $employees['f_name'] . "</td><td>" . $employees['l_name'] . " </td>";
        $table .= "</table>";
        return $table;
    } catch (PDOException $e) {
        die("There was a problem seeing the categories");
    }
}
