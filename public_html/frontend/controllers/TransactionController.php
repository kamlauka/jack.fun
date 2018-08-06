<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.07.2018
 * Time: 16:54
 */

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Transaction;

class TransactionController extends Controller
{
    public static function setTransaction($hash){

        if(Transaction::createTransaction($hash))return true;

    }

}



