<?php

try {
    include 'fetch_items.php';
} catch (Exception $exception) {
    die($exception->getMessage());
}

$sql = "SELECT hotel, experiencia, puesto FROM vacantes";
$result = $conn->query($sql);

if ($result) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            
            'hotel' => $row['hotel'],
            'experiencia' => $row['experiencia'],
            'puesto' => $row['puesto']
           
        ];
    }

    echo json_encode([
        'data' => $data,
    ]);
} else {
    var_dump($conn->errorInfo());
    die;
}
?>
