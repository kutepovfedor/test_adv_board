<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "adv".
 *
 * @property int $id
 * @property int $user_id Владелец объявления
 * @property string $name Наименование
 * @property string $content Контент
 * @property string $create_at Создано
 * @property string $update_at Обновлено
 *
 * @property User $user
 */
class Adv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'content'], 'required'],
            [['user_id'], 'integer'],
            [['content'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Владелец объявления',
            'name' => 'Наименование',
            'content' => 'Контент',
            'create_at' => 'Создано',
            'update_at' => 'Обновлено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
