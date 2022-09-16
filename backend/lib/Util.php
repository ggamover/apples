<?php


namespace backend\lib;


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
}
