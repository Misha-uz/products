<?php

namespace common\models\constants;

use Yii;


class GeneralStatus
{
    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 10;
    const STATUS_ACTIVE = 20;

    public static function getString($num)
    {
        switch ($num) {
            case self::STATUS_DELETED:
                return Yii::t('app', 'Удалено');
            case self::STATUS_NOT_ACTIVE:
                return Yii::t('app', 'Не активен');
            case self::STATUS_ACTIVE:
                return Yii::t('app', 'Активный');
        }
    }

    public static function getList()
    {
        return [
            self::STATUS_ACTIVE => self::getString(self::STATUS_ACTIVE),
            self::STATUS_NOT_ACTIVE => self::getString(self::STATUS_NOT_ACTIVE),
        ];
    }

    public static function getArray()
    {
        $statuses[self::STATUS_ACTIVE] = Yii::t('app', 'Активный');
        $statuses[self::STATUS_NOT_ACTIVE] = Yii::t('app', 'Не активен');

        return $statuses;
    }

    public static function getProposalString($status)
    {
        switch ($status) {
            case self::STATUS_DELETED:
                return Yii::t('app', 'Waiting');
            case self::STATUS_NOT_ACTIVE:
                return Yii::t('app', 'Declined');
            case self::STATUS_ACTIVE:
                return Yii::t('app', 'Accepted');
        }
    }
}