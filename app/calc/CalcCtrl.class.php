<?php
require_once $conf->root_path.'/libs/Smarty.class.php';
require_once $conf->root_path.'/libs/Messages.class.php';
require_once $conf->root_path.'/app/calc/CalcForm.class.php';
require_once $conf->root_path.'/app/calc/CalcResult.class.php';

class CalcCtrl
{
private $msgs;
private $form;
private $result;
private $hide_intro;

public function __construct(){
    $this->msgs = new Messages();
    $this->form = new CalcForm();
    $this->result = new CalcResult();
    $this->hide_intro = false;
}

public function getParameters(){
    $this->form->x = isset($_REQUEST['x']) ? $_REQUEST ['x'] : null;
    $this->form->y = isset($_REQUEST['y']) ? $_REQUEST ['y'] : null;
    $this->form->z = isset($_REQUEST['z']) ? $_REQUEST ['z'] : null;
}

public function validate(){
    if(! (isset($this->form->x) && isset($this->form->y) && isset($this->form->y))){
    return false;
    }
    else{
    $this->hide_intro = true;
    }

    if($this->form->x==""){
        $this->msgs->addError('Nie podano kwoty');
    }
    if($this->form->y==""){
        $this->msgs->addError('Nie podano okresu spłaty');
    }
    if($this->form->z==""){
        $this->msgs->addError('Nie podano oprocentowania');
    }

    if(! $this->msgs->isError()){
        if(!is_numeric($this->form->x)){
            $this->msgs->addError('Kwota nie jest liczbą');
        }
        if(!is_numeric($this->form->y)){
            $this->msgs->addError('Źle uzupełniony okres spłaty');
        }
        if(!is_numeric($this->form->z)){
            $this->msgs->addError('Źle uzupełnione oprocentowanie');
        }
     }
    return ! $this->msgs->isError();

}
    public function calculate(){
        $this->getParameters();

        if($this->validate()){
            $this->form->x = floatval($this->form->x);
            $this->form->y = floatval($this->form->y);
            $this->form->z = floatval($this->form->z);

            $month = $this->form->x/($this->form->y*12);
            $percent = ($month * $this->form->z)/100;

            $this->result->result = $month + $percent;

        }
        $this->generateView();
    }
    public function generateView(){
    global $conf;

        $smarty = new Smarty();
        $smarty->assign('conf',$conf);


        $smarty->assign('hide_intro',$this->hide_intro);
        $smarty->assign('form', $this->form);
        $smarty->assign('res',$this->result);
        $smarty->assign('msgs', $this->msgs);

        $smarty->display($conf->root_path.'/app/calc/calc.tpl');
    }










}