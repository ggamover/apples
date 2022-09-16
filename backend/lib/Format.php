<?php
namespace backend\lib;

class Format
{
    const YMD_HIS = 'Y-m-d H:i:s';

    public static function date($str)
    {
        $dto = \DateTime::createFromFormat(self::YMD_HIS, $str, Util::getTimeZone());
        if($dto instanceof \DateTime){
            return $dto->format('d.m.Y H:i');
        }
    }
}