<!-- dynamic calls are from the construct of Movie.php -->
<div class="col-12 col-md-4 col-lg-3 my-3">
  <div class="card h-100 border-0">
    <img class="thumb" src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
    <div class="card-body">
      <h5 class="card-title text-center py-1">
        <?= $title ?>
      </h5>
      <p class="card-text py-2">
        <?= $content ?>
      </p>
      <div class="d-flex justify-content-between align-items-start">
        <div>
          <?= $custom ?>
        </div>
        <div>
          <img class="flag" src="./img/<?= $language ?>.svg" alt="<?= $language ?>">
        </div>
      </div>
      <?php foreach ($genres as $genre) { ?>
        <div>
          <?= $genre->name ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>