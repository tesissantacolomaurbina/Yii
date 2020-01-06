<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property int|null $author_id
 * @property string $name
 * @property string $isbn
 * @property string $editorial
 * @property string $publish_year
 *
 * @property Author $author
 * @property UserBook[] $userBooks
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id'], 'integer'],
            [['name', 'isbn', 'editorial', 'publish_year'], 'required'],
            [['name', 'isbn', 'editorial', 'publish_year'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'name' => 'Name',
            'isbn' => 'Isbn',
            'editorial' => 'Editorial',
            'publish_year' => 'Publish Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserBooks()
    {
        return $this->hasMany(UserBook::className(), ['book_id' => 'id']);
    }
}
