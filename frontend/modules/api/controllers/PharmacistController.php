<?php

namespace frontend\modules\api\controllers;

use yii\rest\Controller;
use common\models\Pharmacist;
use common\models\RegisterPharmacist;
use common\models\RegisterPharmacistapi;
use common\models\RegisterPharmacistMounthly;
use common\models\Plan;
use common\models\Planapi;
use common\models\Dori;
use common\models\Firm;
use common\models\DoriApi;

use \Yii;

/**
 * Default controller for the `api` module
 */
class PharmacistController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionRegistration()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $response->statusCode = 405;
        $error = true;
        $data = null;
        $message = '';
        if ($request->isPost) {
            $pharmacist = Pharmacist::findOne(['phone' => $request->post('phone')]);
            if ($pharmacist != null) {
                $response->statusCode = 200;
                if ($pharmacist->sms_code == $request->post('sms_code')) {
                    $pharmacist->attributes = $request->post();
                    $pharmacist->free_day = 1;
                    $pharmacist->token = Yii::$app->security->generateRandomString(128);
                    $pharmacist->save();
                    if ($pharmacist->errors == null) {
                        $data = $pharmacist;
                        $error = false;
                        $message = 'Succes';
                    } else {
                        $data = $pharmacist->errors;
                    }
                } else {
                    $response->statusCode = 200;
                    $message = 'Sms kod notogri';
                }
            } else {
                $message = 'Bunday telefon raqam mavjud emas';
            }
        } else {
            $response->statusCode = 200;
            $message = 'Method post bolishi kerak';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionLogin()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $response->statusCode = 405;
        $error = true;
        $data = null;
        $message = '';
        if ($request->isPost) {
            $pharmacist = Pharmacist::findOne(['phone' => $request->post('phone'), 'password' => $request->post('password')]);
            if ($pharmacist != null) {
                if ($pharmacist->status == Pharmacist::ACTIVE) {
                    $response->statusCode = 200;
                    $pharmacist->token = Yii::$app->security->generateRandomString(128);
                    $pharmacist->save();
                    $data = $pharmacist;
                    $error = false;
                    $message = 'Succes';
                } else {
                    $message = 'Faol emas';
                }
            } else {
                $message = 'Login yoki parol notog`ri';
            }
        } else {
            $response->statusCode = 200;
            $message = 'Method post bolishi kerak';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionRegisterPhone($phone)
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $response->statusCode = 405;
        $token = $request->headers->get('token');
        $error = true;
        $data = [];
        $message = '';
        if ($request->isGet) {
            $pharmacist = new Pharmacist();
            $pharmacist->phone = $phone;
            $pharmacist->sms_code = '1234';
            $pharmacist->save();
            if ($pharmacist->errors == null) {
                $response->statusCode = 200;
                $error = false;
                $message = 'Succes';
            } else {
                $message = $pharmacist->errors['phone'];
            }
        } else {
            $response->statusCode = 200;
            $message = 'Method xato';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionSetPlan()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $token = $request->headers->get('token');
        $pharmacist = Pharmacist::findToken($token);
        $error = true;
        $data = [];
        $message = '';
        $xato = 0;
        if ($pharmacist != null && $request->isPost) {
            foreach ($request->post('plan') as $val) {
                if (Plan::findOne(['dori_id' => $val['dori_id'], 'pharmacist_id' => $pharmacist->id, 'date' => date('Ym')]) != null) {
                    $xato = 1;
                    $message = 'Bunday reja mavjud';
                } else {
                    $datas = new Plan();
                    $datas->pharmacist_id = $pharmacist->id;
                    $datas->dori_id = $val['dori_id'];
                    $datas->count = $val['count'];
                    $datas->firm_id = $val['firm_id'];
                    $datas->date = date('Ym');
                    $datas->save();
                    if ($datas->errors != null) {
                        $xato = 1;
                        $message = $datas->errors;
                    }
                }
            }
            if ($xato == 0) {
                $error = false;
                $message = 'Success';
            }
        } else {
            $message = 'Bunday token mavjud emas';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionCurelist($id)
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $token = $request->headers->get('token');
        $pharmacist = Pharmacist::findToken($token);
        $error = true;
        $data = [];
        $message = '';
        if ($pharmacist != null) {
            $error = false;
            $message = 'Success';
            $cure = DoriApi::find()->where(['firm_id' => $id])->all();
            $data = $cure;
        } else {
            $message = 'Token xato';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionGetplan($id)
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $token = $request->headers->get('token');
        $pharmacist = Pharmacist::findToken($token);
        $error = true;
        $data = [];
        $message = '';
        if ($pharmacist != null) {
            $error = false;
            $message = 'Success';
            $plan = Planapi::find()->where(['pharmacist_id' => $pharmacist->id, 'date' => date('Ym'), 'firm_id' => $id])->all();
            $data = $plan;
        } else {
            $message = 'Token xato';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionFirmlist()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $token = $request->headers->get('token');
        $pharmacist = Pharmacist::findToken($token);
        $error = true;
        $data = [];
        $message = '';
        if ($pharmacist != null) {
            $error = false;
            $data = Firm::find()->all();
        } else {
            $message = 'Token xato';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionIncome()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $token = $request->headers->get('token');
        $pharmacist = Pharmacist::findToken($token);
        $error = true;
        $data = [];
        $message = '';
        if ($pharmacist != null) {
            $register = new RegisterPharmacist();
            $register->date = strtotime('now');
            $register->dori_id = $request->post('dori_id');
            $register->count = $request->post('count');
            $register->type = 'kirim';
            $register->plan_id = $request->post('plan_id');
            $register->mounth = date('Ym');
            $register->pharmacist_id = $pharmacist->id;
            $register->save();
            if ($register->errors == null) {
                $error = false;
                $message = 'Success';
            } else {
                $data = $register->errors;
            }
        } else {
            $message = 'Token xato';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionOutlay()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $token = $request->headers->get('token');
        $pharmacist = Pharmacist::findToken($token);
        $error = true;
        $data = [];
        $message = '';
        if ($pharmacist != null) {
            $summ = RegisterPharmacistapi::find()->where(['pharmacist_id' => $pharmacist->id])->sum('count');
            $register = new RegisterPharmacist();
            $register->date = strtotime('now');
            $register->dori_id = $request->post('dori_id');
            $count = $summ - $request->post('count');
            $register->count = -$count;
            $register->type = 'chiqim';
            $register->plan_id = $request->post('plan_id');
            $register->pharmacist_id = $pharmacist->id;
            $register->mounth = date('Ym');
            $register->bonus = $register->dori['bonus'];
            $register->summa = $register->bonus * $register->count * (-1);
            if ($count > 0) {
                $register->save();
                if ($register->errors == null) {
                    $error = false;
                    $message = 'Success';
                } else {
                    $data = $register->errors;
                }
            } else {
                $message = 'Siz kiritgan qoldiq avvalgi qoldiqdan katta';
            }
        } else {
            $message = 'Token xato';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionOutlaylist()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $token = $request->headers->get('token');
        $pharmacist = Pharmacist::findToken($token);
        $error = true;
        $data = [];
        $message = '';
        if ($pharmacist != null) {
            $error = false;
            $message = 'Success';
            $list = RegisterPharmacistapi::find()->where(['type' => 'chiqim', 'pharmacist_id' => $pharmacist->id])->andWhere(['>', 'date', strtotime(date('Y-m-01 00:00:00'))])->andWhere(['<', 'date', strtotime('now')])->all();
            $data = $list;
        } else {
            $message = 'Token xato';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionIncomelist()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $token = $request->headers->get('token');
        $pharmacist = Pharmacist::findToken($token);
        $error = true;
        $data = [];
        $message = '';
        if ($pharmacist != null) {
            $error = false;
            $message = 'Success';
            $list = RegisterPharmacistapi::find()->where(['type' => 'kirim', 'pharmacist_id' => $pharmacist->id])->andWhere(['>', 'date', strtotime(date('Y-m-01 00:00:00'))])->andWhere(['<', 'date', strtotime('now')])->all();
            $data = $list;
        } else {
            $message = 'Token xato';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
    public function actionMonthlyIncome()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $token = $request->headers->get('token');
        $pharmacist = Pharmacist::findToken($token);
        $error = true;
        $data = [];
        $message = '';
        if ($pharmacist != null) {
            $error = false;
            $message = 'Success';
            $list = RegisterPharmacistMounthly::find()->select(['mounth', 'SUM(summa) AS sum'])->where(['type' => 'chiqim', 'pharmacist_id' => $pharmacist->id])->groupBy(['mounth'])->all();
            $data = $list;
        } else {
            $message = 'Token xato';
        }
        return ['error' => $error, 'message' => $message, 'data' => $data];
    }
}
