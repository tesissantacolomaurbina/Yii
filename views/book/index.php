<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Userbook;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Biblioteca';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="book-index"> -->

<div class="text-center py-5">
<h2 class="text-center py-5"><?= Html::encode($this->title) ?></h2>
    <form class="form-inline mb-5">
    <div class="ml-auto mr-auto">
        <?php if (Yii::$app->user->identity->level == 1) {?>
            <?= Html::a('Crear', ['create'], ['class' => 'btn btn btn-primary my-2 my-sm-0']) ?>
        <?php } ?>
    </div>
    </form>
<div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Titulo</td>
                <td>Isbn</td>
                <td>Editorial</td>
                <td>Año de Publicacion</td>
                <td>Autor</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dataProvider->models as $row) {?>
            <tr>
                
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->isbn; ?></td>
                <td><?php echo $row->editorial; ?></td>
                <td><?php echo $row->publish_year; ?></td>
                <td><?php echo $row->author_id; ?></td>
                <td>
                <?php if (Yii::$app->user->identity->level != 1) {?>
                    <?= Html::a('Reservar', Url::to(['/book/reserve', 'id'=> $row->id]), ['data-method' => 'POST']) ?>
                <?php } else {?>
                    <a href="<?php echo Url::to(['/book/update?id=']);?><?php echo $row->id;?>"> Editar <a>
                    <?= Html::a('Eliminar', Url::to(['/book/delete', 'id'=> $row->id]), ['data-method' => 'POST']) ?>
                <?php }
                ?> 
                </td>
            <?php } ?>

            </tr>
        </tbody>
    </table>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author_id',
            'name',
            'isbn',
            'editorial',
            //'publish_year',
            Yii::$app->user->identity->level == 1 ? (
                // ['ver', 'editar', 'eliminar']
                ['class' => 'yii\grid\ActionColumn']
            ) : (
                [
                    'label' => 'Reservar',
                    'value' => function ($model) {
                        return Html::a(Userbook::Reservar());
                    }
                ]
            )
            
        ],
    ]); ?> -->


<!-- </div> -->
