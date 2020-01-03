<?php
namespace common\models;

use yii\web\IdentityInterface;

/* Нужен для работы приложения */
class User extends Model implements IdentityInterface
{
    /**
     * @inheritDoc
     */
    public static function findIdentity ($id)
    {
        // TODO: Implement findIdentity() method.
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken ($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * @inheritDoc
     */
    public function getId ()
    {
        // TODO: Implement getId() method.
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey ()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey ($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
