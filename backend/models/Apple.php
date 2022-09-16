<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "apple".
 *
 * @property int $id
 * @property string $color Цвет
 * @property string $created
 * @property string|null $fallen Дата падения
 * @property int $status Состояние
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
    const YMD_HIS = 'Y:m:d H:i:s';

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
            [['status', 'consumed'], 'integer'],
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
        $this->fallen = (new \DateTime)->format(self::YMD_HIS);
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
        $dto = \DateTime::createFromFormat(self::YMD_HIS, $this->fallen);
        $now = new \DateTime;
        return ($dto instanceof \DateTime) && $dto->modify('+5 hours') > $now;
    }

    /**
     * @param int $portion
     * @throws \Exception
     */
    public function bite($portion)
    {
        if($this->isFallen() && !$this->isRotten() && is_numeric($portion)){
            $this->consumed = max(100, $this->consumed + round($portion));
            if($this->consumed == 100){
                $this->status = self::STATUS_OFF;
            }
        }
        return $this;
    }

    public function getSize()
    {
        return 100 - $this->consumed;
    }

}
