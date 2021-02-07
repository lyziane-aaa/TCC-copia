<?php

//fetch.php

include('../conexao.php');

$column = array("id", "nome", "matricula", "laudas");

$query = "SELECT idBC, nomeBC, matriculaBC, laudasBC FROM bolsacopia";

if (isset($_POST["search"]["value"])) {
    $query .= '
    WHERE nomeBC LIKE "%' . $_POST["search"]["value"] . '%" 
    OR matriculaBC LIKE "%' . $_POST["search"]["value"] . '%" 
    OR laudasBC LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if (!isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach ($data as $row) {
    $sub_array = array();
    $sub_array[] = $row['idBC'];
    $sub_array[] = $row['nomeBC'];
    $sub_array[] = $row['matriculaBC'];
    $sub_array[] = $row['laudasBC'];
    $data[] = $sub_array;
}



function count_all_data($connect)
{
    $query = "SELECT idBC, nomeBC, matriculaBC, laudasBC FROM bolsacopia";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw'   => intval($_POST['draw']),
    'recordsTotal' => count_all_data($connect),
    'recordsFiltered' => $number_filter_row,
    'data'   => $data
);

echo json_encode($output);
