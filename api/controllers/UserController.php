<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\Response;

class UserController extends ActiveController
{
  public $modelClass = 'app\models\User';

  public function behaviors()
  {
    Yii::$app->response->format = Response::FORMAT_JSON;

    return [
      'authenticator' => [
        'class' => HttpBearerAuth::class,
//        'only' => ['create'],
      ],
    ];
  }
}
