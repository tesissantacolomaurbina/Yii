<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Userbook;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="book-index"> -->

<div class="text-center py-5">
<h2 class="text-center py-5"><?= Html::encode($this->title) ?></h2>
    <form class="form-inline mb-5">
    <div class="ml-auto mr-auto">
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
                <td><?php echo $row->book->name; ?></td>
                <td><?php echo $row->book->isbn; ?></td>
                <td><?php echo $row->book->editorial; ?></td>
                <td><?php echo $row->book->publish_year; ?></td>
                <td><?php echo $row->book->author->name; ?></td>
                <td>
                    <?= Html::a('Eliminar', Url::to(['/userbook/delete', 'id'=> $row->id]), ['data-method' => 'POST']) ?>
                    <!-- <a href="<?php echo Url::to(['/userbook']);?>"> Devolver <a> -->
                </td>
            <?php } ?>

            </tr>
        </tbody>
    </table>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<!-- </div> -->
