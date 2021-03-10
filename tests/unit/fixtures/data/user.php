<?php
return [
    [
        'id' => 1,
        'parent_id' => 0,
        'username' => 'admin',
        'password' => \Yii::$app->security->generatePasswordHash('admin'),
        'role' => 'admin'
    ]
];