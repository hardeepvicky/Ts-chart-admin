<?php
/**
 * @created    04-01-2017
 * @license    Proprietary
 * @author     Hardeep Singh
 */
App::uses('AuthComponent', 'Controller/Component');

require_once APP . 'Config/web_service_constants.php';

class WebServicesController extends Controller
{
    /**
     * Service name with required attributes     
     */
    public $services = array(
        WebServiceTypes::LOGIN => array(
            "username" => "",
            "password" => "",
            "company_id" => ""
        ),
        WebServiceTypes::GET_COMPANY_DETAILS => array(
            "code" => "",
        ),
        WebServiceTypes::GET_MENU_REPORTS => array(
            "company_id" => "",
        ),
    );
    
    public $serviceList, $serviceType = 0, $responseData = array(), $start_time, $companyID, $info = "";
    
    public function beforeFilter()
    {
        parent::beforeFilter();
        
        ini_set("memory_limit", "512M");
    }
    
    public function index()
    {
        $json = file_get_contents("php://input");
        
        $this->serviceList = WebServiceTypes::getList();
        
        try
        {
            $this->_log_save($json);
            
            $this->request->data = Util::objToArray(json_decode($json));
            
            if (empty($this->request->data))
            {
                $this->responseData["errors"][] = "Invalid JSON Request";
                throw new Exception("Failed");
            }
            
            $this->_validateServiceType();
            
            $this->responseData["service_name"] = $this->request->data['service_name'];
            
            $this->_validateServiceRequest($this->services[$this->serviceType], $this->request->data);
            
            switch($this->serviceType)
            {
                case WebServiceTypes::LOGIN:
                    $this->_checkLogin();
                    break;
                
                case WebServiceTypes::GET_COMPANY_DETAILS:
                    $this->responseData['data'] = $this->_checkCompanyCode($this->request->data['code']);
                    break;
                
                case WebServiceTypes::GET_MENU_REPORTS:
                    $this->_get_menu_reports();
                    break;
            }
            
            $this->responseData["status"] = 1;
            $this->responseData["msg"] = "Success";
        }
        catch (Exception $ex)
        {
            $this->responseData["status"] = 0;
            $this->responseData["msg"] = $ex->getMessage();
        }
        
        echo $this->_log_update(); exit;
    }
    
    private function _get_menu_reports()
    {
        $this->companyID = $this->request->data['company_id'];
        $this->loadModel("ChartMenu");
        
        $tree = $this->ChartMenu->getTree(array(
            "fields" => array("id", "parent_id", "name", "type", "fa_icon", "is_private"),
            "conditions" => array(
                "company_id" => $this->companyID,
                "is_active" => 1
            ),
            "contain" => array(
                "ChartReport" => array(
                    "fields" => array("id", "type", "name", "url"),
                    "conditions" => array(
                        "is_active" => 1
                    )
                )
            )
        ));
        
        $this->responseData['data'] = $tree;
    }
    
    private function _checkCompanyCode($code)
    {
        $this->loadModel("Company");
        
        $company = $this->Company->find("first", array(
            "conditions" => array(
                "code" => $code,
            ),
            "recursive" => -1
        ));
        
        if (!$company)
        {
            throw new Exception("Invalid Company Code");
        }
        
        if (!$company['Company']['is_active'])
        {
            throw new Exception("Company is inactive");
        }
        
        $this->companyID = $company['Company']['id'];
        
        return $company['Company'];
    }
    
    private function _checkLogin()
    {
        $this->loadModel("User");
        
        $record = $this->User->find("first", array(
            "conditions" => array(
                "company_id" => $this->request->data["company_id"],
                "username" => $this->request->data["username"],
                "password" => AuthComponent::password($this->request->data["password"]),
            ),
            "recursive" => 0
        ));
        
        if (!$record)
        {
            throw new Exception("Invalid username or password");
        }
        
        if (!$record['User']['is_active'])
        {
            throw new Exception("User is inactive");
        }
        
        if (!$record['Company']['is_active'])
        {
            throw new Exception("Company is inactive");
        }
        
        AppModel::$authUser = $record['User'];
        $this->companyID = AppModel::$authUser['User']['company_id'];
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
        ));

        $this->responseData = array(
            "msg" => "", "status" => 0
        );
    }
    
    private function _log_update()
    {
        $exec_time = round(microtime(true) - $this->start_time, 3);
        
        $response = json_encode($this->responseData);

        $record = array(
            "type" => $this->serviceType,
            "response" => $response,
            "info" => $this->info,
            "status" => $this->responseData["status"],
            "execution_time" => $exec_time,
        );
        
        if (AppModel::$authUser)
        {
            $record['user_id'] = AppModel::$authUser['id'];
        }
        
        if ($this->companyID)
        {
            $record['company_id'] = $this->companyID;
        }
        
        $this->WebServiceLog->save($record);
        
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
        
        if (isset($this->serviceList[$this->request->data['service_name']]))
        {
            $this->serviceType = $this->serviceList[$this->request->data['service_name']];            
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