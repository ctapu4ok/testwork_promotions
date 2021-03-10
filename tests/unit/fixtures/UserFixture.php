<?php
namespace tests\unit\fixtures;

class UserFixture extends \yii\test\ActiveFixture
{
    public $modelClass = 'app\models\Users';
    public $dataFile = 'tests\unit\fixtures\data\user.php';
}