<?php

namespace app\controllers;

use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\web\Response;
use yii\rest\Controller;

class CounterController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'corsFilter' => [
        'class' => Cors::class,
        'cors' => [
          'Origin' => ['*'],
          'Access-Control-Allow-Headers' => ['Content-Type'],
          'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        ],
      ],
      'authenticator' => [
        'class' => HttpBearerAuth::class,
      ],
    ];
  }

  public function actionIncrement()
  {
    $post = Yii::$app->request->post();
    $counter = $post['counter'];

    return $counter ? $counter * 2 : 1;
  }

  public function beforeAction($action)
  {
    if (in_array($action->id, ['increment']))
      $this->enableCsrfValidation = false;

    return parent::beforeAction($action);
  }
}
