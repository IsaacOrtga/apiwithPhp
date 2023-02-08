<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Recoger información de API</h1>
    <form method="Get">
        <label for="input">Buscar por ID</label>
        <input type="text" name="input" placeholder="Introducir nº" />
        <button type="submit">Buscar</button>
    </form>
    <?php
if (isset($_GET['input'])) {
    echo "</br>";
    echo "</br>";
    echo "</br>";
    echo "</br>";
    // $pokemon = $_GET['name'];
    $id = $_GET['input'];
    echo "<b>Primera forma: CURL</b>";
    echo "</br>";
    echo "</br>";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://rickandmortyapi.com/api/character/' . urlencode($id++));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_POST, false);
    $data = curl_exec($curl);
    curl_close($curl);
    $data_decode = json_decode($data, true); //Por qué no puedo hacer un echo de $data_decode??
    $image = $data_decode['image'];
    echo 'Nombre: ' . $data_decode['name'];
    echo '</br>';
    echo 'Status: ' . $data_decode['status'];
    echo '</br>';
    echo 'Especie: ' . $data_decode['species'];
    echo '</br>';
    echo 'Imagen: ' . '</br>' . '<img src="' . $image . '"/>';
    echo '</br>';
    echo '</br>';
    echo '</br>';

    echo "<b>Segunda forma: FILE_GET_CONTENTS</b>";
    echo "</br>";
    echo "</br>";
    $data_get = file_get_contents('https://rickandmortyapi.com/api/character/' . $id);
    $data_get_decode = json_decode($data_get, true);
    $image = $data_get_decode['image'];
    echo 'Nombre: ' . $data_get_decode['name'];
    echo '</br>';
    echo 'Status: ' . $data_get_decode['status'];
    echo '</br>';
    echo 'Especie: ' . $data_get_decode['species'];
    echo '</br>';
    echo 'Imagen: ' . '</br>' . '<img src="' . $image . '"/>';
    echo '</br>';
    echo '</br>';
    echo '</br>';
    echo "<b> Tercera forma: POST <b>";
    echo '</br>';
    echo '</br>';
    $url = 'https://jsonplaceholder.typicode.com/posts';
    $userId = "1234";
    $id = "1234";
    $title = "1234";
    $body = "1234";
    $fields = [
        'userId' => $userId,
        'id' => $id,
        'title' => $title,
        'body' => $body
    ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl);
    echo $result;
}
?>

</body>

</html>
