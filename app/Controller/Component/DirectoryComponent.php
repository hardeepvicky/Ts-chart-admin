<?php
App::uses('Component', 'Controller');
class DirectoryComponent extends Object {
    
    var $controller = null;
  
    //Creates all missing folders
  	function rebuildStructure()
    {
        //Gets plant list
        $this->controller->loadModel('Plant');
        $plantList = $this->controller->Plant->find('list', array('fields' => 
            array('id', 'plant_code')));
        
        //Loops all plants
        foreach($plantList as $k => $v)
        {
            $directory = FILE_TRANSFER_PATH . "plant-" . $k . "-" . $v;
            if (!file_exists($directory)) 
            {
                mkdir($directory, 0777, true);
            }
        }
        
        //Gets cc list
        $this->controller->loadModel('Cc');
        $this->controller->Cc->recursive = -1;
        $ccList = $this->controller->Cc->find('all', array('fields' => 
            array('id', 'plant_id', 'cc_code')));
        
        $ccCodeList = Hash::combine(
            $ccList,
            '{n}.Cc.id',
            '{n}.Cc.cc_code'
        );
        
        $ccList = Hash::combine(
            $ccList,
            '{n}.Cc.id',
            array('%s~%s', '{n}.Cc.plant_id', '{n}.Cc.cc_code')
        );
        
        //Loops all plants
        foreach($ccList as $k => $v)
        {
            $ccInfo = explode("~", $v);
            
            $plantFolder = "plant-" . $ccInfo[0] . "-" . $plantList[$ccInfo[0]] . "/";
            
            $directory = FILE_TRANSFER_PATH . $plantFolder . "cc-" . $k . "-" . $ccInfo[1];
            if (!file_exists($directory))
            {
                $this->controller->Cc->id = $k;
                $this->controller->Cc->saveField('local_directory_path', $directory);
                
                $this->createAllDirectories($directory);
            }
        }
        
        //Gets vlcc list
        $this->controller->loadModel('Vlcc');
        $this->controller->Vlcc->recursive = -1;
        $vlccList = $this->controller->Vlcc->find('all', array('fields' => 
            array('id', 'plant_id', 'cc_id', 'vlcc_code')));

        $vlccList = Hash::combine(
            $vlccList,
            '{n}.Vlcc.id',
            array('%s~%s~%s', '{n}.Vlcc.plant_id', '{n}.Vlcc.cc_id', '{n}.Vlcc.vlcc_code')
        );
        
        //Loops all plants
        foreach($vlccList as $k => $v)
        {
            $vlccInfo = explode("~", $v);
            
            $plantFolder = "plant-" . $vlccInfo[0] . "-" . $plantList[$vlccInfo[0]] . "/";
            $ccFolder = "cc-" . $vlccInfo[1] . "-" . $ccCodeList[$vlccInfo[1]] . "/";
            
            $directory = FILE_TRANSFER_PATH . $plantFolder . $ccFolder . "vlcc-" . $k . "-" . $vlccInfo[2];
            if (!file_exists($directory))
            {
                $this->controller->Vlcc->id = $k;
                $this->controller->Vlcc->saveField('local_directory_path', $directory);
                
                $this->createAllDirectories($directory);
            }
        }
    }
    
    //Creates all required directories in the target directory
    function createAllDirectories($directory)
    {
        mkdir($directory, 0777, true);
        mkdir($directory . '/BDF', 0777, true);
        mkdir($directory . '/CSV', 0777, true);
        mkdir($directory . '/MBDF', 0777, true);
        mkdir($directory . '/PDCSV', 0777, true);
        mkdir($directory . '/MCSV', 0777, true);
        mkdir($directory . '/DBL', 0777, true);
        mkdir($directory . '/TXT', 0777, true);
    }
    
    //Creates plant specific folder
    function createPlantFolder($plant)
    {
        $directory = FILE_TRANSFER_PATH . "plant-" . $plant->id . "-" . $plant->field('plant_code');
        if (!file_exists($directory)) 
        {
            mkdir($directory, 0777, true);
        }
    }
    
    //Creates cc specific folder
    function createCCFolder($cc)
    {
        //Gets plant list
        $this->controller->loadModel('Plant');
        $plantList = $this->controller->Plant->find('list', array('fields' => 
            array('id', 'code')));
        
        $plantFolder = "plant-" . $cc->field('plant_id') . "-" . $plantList[$cc->field('plant_id')] . "/";
            
        $directory = FILE_TRANSFER_PATH . $plantFolder . "cc-" . $cc->id . "-" . $cc->field('code');
        
        $cc->saveField('local_directory_path', $directory);
        
        if (!file_exists($directory))
        {
            $this->createAllDirectories($directory);
        }
    }
    
    //Creates vlcc specific folder
    function createVlccFolder($vlcc)
    {
        //Gets plant list
        $this->controller->loadModel('Plant');
        $plantList = $this->controller->Plant->find('list', array('fields' => 
            array('id', 'code')));
        
        //Gets cc list
        $this->controller->loadModel('Cc');
        $ccList = $this->controller->Cc->find('list', array('fields' => 
            array('id', 'code')));
            
        $plantFolder = "plant-" . $vlcc->field('plant_id') . "-" . 
                    $plantList[$vlcc->field('plant_id')] . "/";
        
        $ccFolder = "cc-" . $vlcc->field('cc_id') . "-" . $ccList[$vlcc->field('cc_id')] . "/";

        $directory = FILE_TRANSFER_PATH . $plantFolder . $ccFolder . 
                    "vlcc-" . $vlcc->id . "-" . $vlcc->field('code');
        
        $vlcc->saveField('local_directory_path', $directory);
        
        if (!file_exists($directory))
        {
           $this->createAllDirectories($directory);
        }
    }
	
    function initialize(Controller $controller)
    {
        $this->controller = $controller;
    } 
	
	function startup(Controller $controller)
    {
        $this->controller = $controller;
    }
	
	function beforeRender(Controller $controller)
    {
        $this->controller = $controller;
    }
	
	function shutdown(Controller $controller)
    {
        $this->controller = $controller;
    }
	 
	function beforeRedirect(Controller $controller)
    {
        $this->controller = $controller;
    }    
    
}
?>