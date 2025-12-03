<main>
  <section>
    <img
      src="<?php echo $poster_url ?>"
      width="300"
      alt="Poster de <?= $title ?>" style="border-radius: 16px;">
  </section>

  <hgroup>
    <h3><?php echo $title ?> - <?= $until_message; ?></h3>
    <p style="padding: 10;"> Fecha de estreno: <?= $release_date; ?></p>
    <p> La proxima sera <?= $following_production; ?></p>
  </hgroup>
</main>