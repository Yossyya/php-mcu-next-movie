<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesion de cURL; ch =cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutamos la peticion
   y guardamos el resultado
*/
$result = curl_exec($ch);

if ($result === false) {
  $error_message = curl_error($ch);
  die("Error de cURL: " . $error_message);
}

// Una alternativa seria utilizar file_get_contents
// $result = file_get_contents(API_URL); // si solo quieres hacer un GET de una API

$data = json_decode($result, true);

?>

<head>
  <meta charset="UTF-8" />
  <title>La proxima pelicula de Marvel</title>
  <meta name="description" content="La proxima pelicula de Marvel">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
  <!-- <pre style="font-size: 15px; overflow-y: scroll; height: 350px;">
    <?php var_dump($data); ?>
  </pre> -->
  <section >
    <img
      src="<?php echo $data["poster_url"]; ?>"
      width="300"
      alt="Poster de <?= $data["title"]; ?>" style="border-radius: 16px;" 
    >
  </section>

  <hgroup>
    <h3><?php echo $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias </h3>
    <p style="padding: 10;"> Fecha de estreno: <?= $data["release_date"]; ?></p>
    <p> La proxima sera <?= $data["following_production"]["title"] ?></p>
  </hgroup>
</main>

<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
  }

  section {
    display: flex;
    justify-content: center;
    text-align: center;
  }

  hgroup {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }

  img {
    margin: 0 auto;
  }
</style>