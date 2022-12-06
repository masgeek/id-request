<?php

namespace app\modules\studentid\models;

use app\models\SmIdRequestStatus;
use yii\helpers\ArrayHelper;


class IdRequestStatus extends SmIdRequestStatus
{
    const ISSUED = 'ISSUED';
    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';

    /**
     * @return array
     */
    public static function getPendingRequestStatus(): array
    {
        $data = self::find()
            ->where(['status_name' => self::PENDING])
            ->orderBy('status_id')
            ->asArray()->all();

        return ArrayHelper::map($data, 'status_id', 'status_name');
    }
}