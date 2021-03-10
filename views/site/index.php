<?php

/* @var $this yii\web\View */

$this->title = 'Акции';

?>

<div class="site-index">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Акция</th>
        </thead>
        <tbody>
        <?php foreach ($promotions as $promotion):?>
        <tr>
            <th scope="row"><?=$promotion->id;?></th>
            <td><?=$promotion->name;?></td>
            <td>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 300px">Приз</th>
                        <th>Кол. призов</th>
                        <th>Требуется оборотов</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($promotion->getPromotionPrizes()->all() as $promotionPrize):?>
                        <tr>
                            <td><?=$promotionPrize->prize?></td>
                            <td><?=$promotionPrize->max_prizes?></td>
                            <td><?=$promotionPrize->need_to_win?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>
