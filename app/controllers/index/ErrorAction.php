<?
class ErrorAction extends CAction
{
    public function run()
    {

        $controller = $this->getController();
        
        $controller->render('error', array());
    }
}