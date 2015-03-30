<?
class LogoutAction extends CAction
{
    public function run()
    {
        Yii::app()->user->logout();
        $controller = $this->getController();
        $controller->redirect('/cp');
    }
}