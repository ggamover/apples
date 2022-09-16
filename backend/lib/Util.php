<?php


namespace backend\lib;


use backend\models\Apple;

final class Util
{
    /**
     * @return \DateTime
     * @throws \Exception
     */
    public static function getDate()
    {
        return new \DateTime('now', self::getTimeZone());
    }

    /**
     * @return \DateTimeZone
     */
    public static function getTimeZone()
    {
        return new \DateTimeZone('Europe/Moscow');
    }

    public static function buildScene($amount = 12)
    {
        Apple::deleteAll();
        for ($i = 0; $i < $amount; $i++){
            $color = [];
            for($c = 0; $c < 3; $c++){
                $color[] = dechex(rand(4,8));
            }
            $apple = new Apple;
            $apple->color = '#' . implode($color);
            $apple->save();
        }

    }
}
