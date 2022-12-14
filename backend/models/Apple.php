<?php

namespace backend\models;

use backend\lib\Format;
use backend\lib\Util;

/**
 * This is the model class for table "apple".
 *
 * @property int $id
 * @property string $color Цвет
 * @property string $created
 * @property string|null $fallen Дата падения
 * @property int $consumed Сколько съели
 *
 * @property bool $isRotten
 * @property bool $isFallen
 * @property int $size
 */
class Apple extends \yii\db\ActiveRecord
{
    const STATUS_ON = 1;
    const STATUS_OFF = 13;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apple';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['color'], 'required'],
            [['created', 'fallen'], 'safe'],
            [['consumed'], 'integer'],
            [['color'], 'string', 'max' => 7],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Цвет',
            'created' => 'Created',
            'fallen' => 'Дата падения',
            'status' => 'Состояние',
            'consumed' => 'Сколько съели',
        ];
    }

    public function drop()
    {
        $this->fallen = (Util::getDate())->format(Format::YMD_HIS);
        return $this;
    }

    /**
     * упало ли
     * @return bool
     */
    public function getIsFallen()
    {
        return $this->fallen !== null;
    }

    /**
     * сгнило ли
     *
     * @return bool
     * @throws \Exception
     */
    public function getIsRotten()
    {
        if($this->fallen === null) return false;
        $dto = \DateTime::createFromFormat(Format::YMD_HIS, $this->fallen, Util::getTimeZone());
        $now = Util::getDate();
        $diff = $dto->diff($now);
        return ($diff instanceof \DateInterval) && ($diff->days || $diff->h >= 5);
    }

    /**
     * @param int $portion
     * @throws \Exception
     */
    public function bite($portion)
    {
        if($this->isFallen && !$this->isRotten && is_numeric($portion)){
            $this->consumed = min(100, $this->consumed + round($portion));
        }
        return $this;
    }

    public function getSize()
    {
        return 100 - $this->consumed;
    }

}
