<?php

/**
 * @var yii\web\View $this
 *
 * @var \yii\data\ActiveDataProvider $dp
 * @var \backend\models\Apple[] $list
*/

$this->title = 'Тестовая задача PR Holding';
$list = $dp->models;
?>
<div class="site-index">
  <div class="row mb-3">
    <a href="<?= \yii\helpers\Url::to(['apple/build']) ?>" class="btn btn-outline-primary">Сгенерировать</a>
  </div>
  <div class="row">
    <?php foreach ($list as $apple): ?>
      <div class="col-1">
        <div class="apple" style="background-color: <?= $apple->color ?>;">

        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
