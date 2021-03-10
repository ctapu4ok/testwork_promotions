<?php

namespace app\controllers;
set_time_limit(0);

use app\models\ProgressUserPromotions;
use app\models\Promotions;
use app\models\UserPromotions;
use app\models\Users;
use DateTime;
use Yii;
use yii\web\Controller;

class StatisticsController extends Controller
{
    public function actionIndex()
    {
        $usersModel = [];
        if (!Yii::$app->user->isGuest) {
            $usersModel = Users::findAll(['parent_id' => Yii::$app->user->identity->getId()]);
        }
        return $this->render('index', ['users' => $usersModel]);
    }

    public function actionGenerate_users()
    {
        if (!Yii::$app->user->isGuest) {
            $promotionsCount = Promotions::find()->count();

            $usesCount = Users::find()->count();

            $userModel = new Users();
            $userModel->username = 'test' . ($usesCount + 1);
            $userModel->password = Yii::$app->security->generatePasswordHash('test' . ($usesCount + 1));
            $userModel->parent_id = Yii::$app->user->identity->getId();
            $userModel->role = 'user';

            if ($userModel->validate() && $userModel->save()) {
                $userPromotions = new UserPromotions();
                $userPromotions->user_id = $userModel->getId();
                $userPromotions->promotion_id = rand(1, $promotionsCount);
                $userPromotions->begin_date = (new DateTime('now'))->format('Y-m-d H:i:s');
                $userPromotions->end_date = (new DateTime('now'))->modify("+30 days")->format('Y-m-d H:i:s');
                if ($userPromotions->validate() && $userPromotions->save()) {
                    return $this->redirect('/statistics');
                }
            }
        }
        return $this->goHome();
    }

    public function actionAdd_statistics($count, $promotion_id, $user_id)
    {
        if (!Yii::$app->user->isGuest) {
            $progressRows = [];
            while ($count != 0) {
                $progressRows[] = [
                    'promotion_id' => $promotion_id,
                    'user_id' => $user_id,
                    'status' => rand(0,1),
                    'date' => (new DateTime('now'))->format('Y-m-d H:i:s')
                ];
                $count--;
            }

            Yii::$app->db->createCommand()->batchInsert(ProgressUserPromotions::tableName(), ['promotion_id', 'user_id','status','date'], $progressRows)->execute();
        }
        return $this->redirect('/statistics');
    }
}
