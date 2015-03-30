<?php

class Mailer
{
    public static function sendMail($subject,$template,$vars,$email){

        Yii::app()->mailer->ClearAddresses();
        Yii::app()->mailer->ClearCCs();
        Yii::app()->mailer->ClearBCCs();
        Yii::app()->mailer->ClearReplyTos();
        Yii::app()->mailer->ClearAllRecipients();
        Yii::app()->mailer->ClearAttachments();
        Yii::app()->mailer->ClearCustomHeaders();


        $email = 'victor.tsukanov@gmail.com';
        /*Yii::app()->mailer->Host = 'smtp.yiiframework.com';
        Yii::app()->mailer->IsSMTP();*/
        Yii::app()->mailer->From = 'service@allavia.ru';
        Yii::app()->mailer->FromName = 'AllAvia';
        Yii::app()->mailer->AddAddress($email);
        Yii::app()->mailer->Subject = $subject;
        Yii::app()->mailer->getView($template, $vars);
        Yii::app()->mailer->IsHTML(true);
        Yii::app()->mailer->CharSet = 'UTF-8';
        Yii::app()->mailer->Send();
    }
}