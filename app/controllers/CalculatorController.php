<?php

class CalculatorController extends Controller
{

	public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'index'=>'application.controllers.calculator.IndexAction',
            'payment'=>'application.controllers.calculator.PaymentAction',
        );
    }
}