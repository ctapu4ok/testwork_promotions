<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Статистика';

?>

<div class="site-index">
    <?php if (!Yii::$app->user->isGuest): ?>
        <?php if (!Yii::$app->user->isGuest): ?>
            <?= Html::a('Создать пользователя', ['statistics/generate_users'], ['class' => 'profile-link']) ?>
        <?php endif ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Логин / Пароль</th>
                <th scope="col">Акция</th>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?= $user->getId(); ?></th>
                    <td><?= $user->username; ?></td>
                    <td>
                        <table class="table table-striped">
                            <thead>
                            <th scope="col" width="400px">Наименование</th>
                            <th scope="col" width="200px">Дата начала</th>
                            <th scope="col">Завершиться</th>
                            <th scope="col">Действие</th>
                            </thead>
                            <tbody>
                            <?php foreach ($user->getUserPromotions()->all() as $promotion): ?>
                                <tr>
                                    <td><?= $promotion->getPromotion()->one()->name ?></td>
                                    <td><?= $promotion->begin_date ?></td>
                                    <td><?= $promotion->end_date ?></td>
                                    <td>
                                        <?= Html::a('+1 оборот', ['statistics/add_statistics', 'count' => 1, 'promotion_id' => $promotion->id, 'user_id' => $user->getId()], ['class' => 'profile-link']) ?>
                                        <br/>
                                        <?= Html::a('+100 оборотов', ['statistics/add_statistics', 'count' => 100, 'promotion_id' => $promotion->id, 'user_id' => $user->getId()], ['class' => 'profile-link']) ?>
                                        <br/>
                                        <?= Html::a('+6000 оборотов', ['statistics/add_statistics', 'count' => 6000, 'promotion_id' => $promotion->id, 'user_id' => $user->getId()], ['class' => 'profile-link']) ?>
                                    </td>
                                <tr>
                                    <td colspan="4">
                                        <?php
                                        $statusSuccessCount = $promotion->getProgressUserPromotions()->where(['status' => 1])->count();
                                        $statusDangerCount = $promotion->getProgressUserPromotions()->where(['status' => 0])->count();
                                        $needToWin = $promotion->getPromotion()->one()->getPromotionPrizes()->one()->need_to_win;
                                        $percent = $statusSuccessCount / $needToWin * 100;
                                        ?>
                                        Успешных оборотов: <?= $statusSuccessCount ?>
                                        Провал: <?= $statusDangerCount ?>
                                        Нужно: <?= $needToWin ?>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?=$percent?>%;"
                                                 aria-valuenow="<?=$percent?>" aria-valuemin="0" aria-valuemax="100"><?=$percent?>%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Для дольнейшей работы, авторизуйтесь на сайте! <br/>
        <div style="font-size: 6px">
            <div>подсказка: admin:admin</div>
            <div>А если вы сгенерировали пользователей, то для проверок, используйте логин и пароль:
                test(COUNT(DB_USERS)):test(COUNT(DB_USERS)) [test2:test2,test3:test3....]
            </div>
        </div>
        </p>
    <?php endif; ?>
</div>
