<?php
/**
 * Web Service Logs Controller
 * 
 * @created    08-03-2017
 * @license    Proprietary
 * @author     Hardeep
 */

require_once APP . 'Config/web_service_constants.php';

class LogsController extends AppController 
{
    public function beforeFilter()
    {
        parent::beforeFilter();
        
        ini_set("memory_limit", "1024M");
    }
    
    /*
     * @Summary Screen
     */
    public function admin_web_service()
    {
        $this->Redirect->urlToNamed();
        
        $model = "WebServiceLog";
        
        $this->loadModel($model);
        
        $web_service_types = array_flip(WebServiceTypes::getList());
        
        $conditions = $this->getSearchConditions(array(
            array('model' => $model, 'field' => 'type', 'type' => 'integer', 'view_field' => 'type'),
            array('model' => $model, 'field' => 'status', 'type' => 'integer', 'view_field' => 'status'),
            array('model' => $model, 'field' => 'created_on', 'type' => 'from_date', 'view_field' => 'from_date'),
            array('model' => $model, 'field' => 'created_on', 'type' => 'to_date', 'view_field' => 'to_date'),
        ));
        
        $this->{$model}->recursive = -1;
        $records = $this->paginate($model, $conditions);
        
        $this->set(compact('records', "web_service_types", "model"));
    }
    
    /*
     * @Summary Screen
     */
    public function admin_cron()
    {
        $this->Redirect->urlToNamed();
        
        $model = "CronLog";
        
        $this->loadModel($model);
        
        $cron_types = array(
            CRON_DAILY_11PM => "Daily 11 PM",
            CRON_MONTHLY => "Monthly",
        );
        
        $conditions = $this->getSearchConditions(array(
            array('model' => $model, 'field' => 'type', 'type' => 'integer', 'view_field' => 'type'),
            array('model' => $model, 'field' => 'status', 'type' => 'integer', 'view_field' => 'status'),
            array('model' => $model, 'field' => 'created_on', 'type' => 'from_date', 'view_field' => 'from_date'),
            array('model' => $model, 'field' => 'created_on', 'type' => 'to_date', 'view_field' => 'to_date'),
        ));
        
        $this->{$model}->recursive = -1;
        $records = $this->paginate($model, $conditions);
        
        $this->set(compact('records', "cron_types", "model"));
    }
    
    public function admin_email()
    {
        $this->Redirect->urlToNamed();
        
        $model = "EmailLog";
        
        $this->loadModel($model);
        
        $conditions = $this->getSearchConditions(array(
            array('model' => $model, 'field' => 'code', 'type' => 'integer', 'view_field' => 'code'),
            array('model' => $model, 'field' => 'created', 'type' => 'from_date', 'view_field' => 'from_date'),
            array('model' => $model, 'field' => 'created', 'type' => 'to_date', 'view_field' => 'to_date'),
        ));
        
        $this->{$model}->recursive = -1;
        $records = $this->paginate($model, $conditions);
        
        $this->set(compact('records', "model", "template_list"));
    }
}