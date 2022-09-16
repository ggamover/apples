<?php

use backend\lib\Format;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 *
 * @var \backend\models\Apple[] $list
*/

$this->title = 'Тестовая задача PR Holding';
?>
<div class="scene">
  <div class="tree container">
    <div class="row">
        <?php foreach ($list as $apple): ?>
          <div class="apple-box col-md-1 col-3 mb-3">
            <div class="apple<?= $apple->isFallen ? ' fallen' : '' ?>" style="background-color: <?= $apple->color ?>;">
                <?php if(!$apple->isFallen):?>
                  <div class="list-group apple-menu">
                    <div class="list-group-item">
                      <a href="<?= Url::to(['apple/drop', 'id' => $apple->id]) ?>">Сорвать</a>
                    </div>
                  </div>
                <?php endif;?>
            </div>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
  <div class="ground container">
    <div class="row">
        <?php foreach ($list as $apple): ?>
            <?php if(!$apple->isFallen) continue; ?>
          <div class="apple-box col-md-1 col-3 mb-3">
            <div class="apple<?= $apple->isRotten ? ' rotten' : '' ?>" style="background-color: <?= $apple->color ?>;">
              <span class="cross">❌</span>
              <div class="list-group apple-menu">
                <?php if(!$apple->isRotten): ?>
                <div class="list-group-item">
                  Откусить <input type="number" min="1" max="100" value="25">%
                  <button class="btn btn-outline-primary btn-sm btnBite" data-id="<?= $apple->id ?>"> &ndash;&rang; </button>
                </div>
                <?php endif;?>
                <div class="list-group-item info-row">
                  <div class="badge badge-secondary">#<?= $apple->id ?> <?= $apple->isRotten ? 'сгнило' : '' ?> </div>
                  <div>Создано <span class="badge badge-secondary"><?= Format::date($apple->created) ?></span></div>
                  <div>Упало <span class="badge badge-secondary"><?= Format::date($apple->fallen) ?></span></div>
                </div>
              </div>
            </div>
            <span class="badge badge-pill"><?= $apple->size ?>%</span>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
    <?php $form = ActiveForm::begin([
        'action' => Url::to(['apple/bite']),
        'id' => 'biteForm',
        'method' => 'get'
    ]); ?>
      <input type="hidden" name="portion" value="">
      <input type="hidden" name="id" value="">
    <?php ActiveForm::end(); ?>
</div>

