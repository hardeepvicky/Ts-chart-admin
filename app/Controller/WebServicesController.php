<?php
/**
 * @created    04-01-2017
 * @license    Proprietary
 * @author     Hardeep Singh
 */
App::uses('AuthComponent', 'Controller/Component');

class WebServicesController extends Controller
{
    /**
     * Service name with required attributes     
     */
    public $services = array(
        WEB_SERVICE_LOGIN => array(
            "username" => "",
            "password" => "",
            "data" => array()
        ),
    );
    
    public $serviceTypes = array(
        "login" => WEB_SERVICE_LOGIN,
    );
        
    public $serviceType = 0, $responseData = array(), $start_time, $authUser, $info = "";
    
    public function beforeFilter()
    {
        parent::beforeFilter();
        
        ini_set("memory_limit", "512M");
    }
    
    public function index()
    {
        $json = file_get_contents("php://input");
        
        try
        {
            $this->_log_save($json);
            
            $this->request->data = Util::objToArray(json_decode($json));
            
            if (empty($this->request->data))
            {
                $this->responseData["errors"][] = "Invalid JSON Request";
                throw new Exception("Failed");
            }
            
            $this->request->data = $this->_refineData($this->request->data);
            
            $this->_validateServiceType();
            
            $this->_validateServiceRequest($this->services[$this->serviceType], $this->request->data);
            
            $this->_checkLogin();
            
            switch($this->serviceType)
            {
                case WEB_SERVICE_LOGIN:
                    break;
            }
            
            $this->responseData["status"] = 1;            
        }
        catch (Exception $ex)
        {
            $this->responseData["status"] = 0;
            $this->responseData["msg"] = $ex->getMessage();
        }
        
        echo $this->_log_update(); exit;
    }
    
    private function _checkLogin()
    {
        $this->loadModel("User");
        
        $this->authUser = $this->User->find("first", array(
            "conditions" => array(
                "username" => $this->request->data["username"],
                "password" => AuthComponent::password($this->request->data["password"]),
                "is_active" => 1
            )
        ));
        
        if (!$this->authUser)
        {
            $this->responseData["errors"][] = "invalid username or password Or user may be inactive";
            throw new Exception("Failed");
        }
    }
    
    private function _log_save($json)
    {
        $this->start_time = microtime(true);

        header("Pragma: no-cache");
        header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
        
        $this->loadModel("WebServiceLog");

        $this->WebServiceLog->create();
        $this->WebServiceLog->save(array(
            "request" => $json,
            "created_on" => date("Y-m-d H:i:s")
        ));

        $this->responseData = array(
            "msg" => "", "status" => 0
        );
    }
    
    private function _log_update()
    {
        $exec_time = round(microtime(true) - $this->start_time, 3);
        
        $response = json_encode($this->responseData);

        $this->WebServiceLog->save(array(
            "type" => $this->serviceType,
            "response" => $response,
            "info" => $this->info,
            "status" => $this->responseData["status"],
            "execution_time" => $exec_time,
        ));
        
        return $response;
    }

    /**
     * Validate Web services
     * @throws Exception
     */
    private function _validateServiceType()
    {
        if (!isset($this->request->data['service_name']))
        {
            throw new Exception("Missing Service");
        }
        
        if (isset($this->serviceTypes[$this->request->data['service_name']]))
        {
            $this->serviceType = $this->serviceTypes[$this->request->data['service_name']];            
        }
        else
        {
            $this->responseData["errors"][] = "Invaild Service";
            throw new Exception("Failed");
        }
    }
    
    /**
     * validating web service
     * @param type $match_data
     * @param type $data
     * @throws Exception
     */
    private function _validateServiceRequest($match_data, $data, $path = "")
    {
        foreach ($match_data as $field => $value)
        {
            if (!isset($data[$field]))
            {
                $this->responseData["errors"][] = "Missing " . $path . $field;
                throw new Exception("Failed");
            }

            if (!empty($value) && is_array($value))
            {
                $this->_validateServiceRequest($value, $data[$field], $path . $field . "->");
            }
        }
    }   
}