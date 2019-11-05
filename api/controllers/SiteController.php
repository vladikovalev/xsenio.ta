<?php

namespace app\controllers;

use Yii;
use yii\base\Exception;
use yii\web\Controller;
use app\models\LoginForm;
use yii\filters\Cors;

class SiteController extends Controller
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
          'Access-Control-Allow-Headers' => ['Content-Type', 'Authorization'],
          'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  /**
   * Login action.
   *
   * @return boolean|array
   * @throws Exception
   */
  public function actionLogin()
  {
    $model = new LoginForm();
    $post = Yii::$app->request->post();
    $model->setAttributes($post);

    if ($model->login()) {
      $user = $model->getUser();
      $authKey = $user->getAuthKey();
      return [
        'accessToken' => $authKey,
      ];
    }

    return false;
  }

  public function actionPreflight()
  {
//    Yii::$app->response->format = Response::FORMAT_RAW;
  }

  /**
   * Logout action.
   *
   * @return boolean
   */
  public function actionLogout()
  {
    Yii::$app->user->logout();

    return true;
  }

  public function beforeAction($action)
  {
    if (in_array($action->id, ['login', 'logout']))
      $this->enableCsrfValidation = false;

    return parent::beforeAction($action);
  }
}
