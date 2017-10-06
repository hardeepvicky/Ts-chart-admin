<?php

require_once APP . 'Vendor/tech-dev-tools/CsvUtility.php';

class ChartReportsController extends AppController
{
    public function beforeFilter()
    {
        parent::beforeFilter();
        
        $this->Auth->allow('draw_chart');
    }
    
    public function admin_index()
    {
        //Converts querystring to named parameter
        $this->Redirect->urlToNamed();

        // Sets Search Parameters
        $conditions = $this->getSearchConditions(array(
            array('model' => $this->modelClass, 'field' => array('chart_menu_id'), 'type' => 'int', 'view_field' => 'chart_menu_id'),
            array('model' => $this->modelClass, 'field' => array('name'), 'type' => 'string', 'view_field' => 'name')
        ));
        
        $this->paginate['recursive'] = -1;
        
        $records = $this->paginate($this->modelClass, $conditions);
        
        $menu_link_list = $this->{$this->modelClass}->ChartMenu->getTreeList();
        
        //setting variables
        $this->set(compact('records', 'menu_link_list'));
    }
    
    /**
     * add method
     * @return void
     */
    public function admin_add($type = "")
    {
        $result = true;
        if ($this->request->is(['post', 'put']))
        {
            if (isset($this->request->data['ChartReport']['csv_file']))
            {
                if (empty($this->request->data['ChartReport']['csv_file']['name']))
                {
                    $result = false;
                    $this->{$this->modelClass}->invalidate('csv_file', 'CSV file is required');
                }
            }
        }
        
        if ($result)
        {
            parent::add(array("action" => "admin_index"));
        }
        
        $this->_setList();
        
        if ($type)
        {
            $this->set(compact('type'));
            if ($type == ReportTypes::INTERNAL)
            {
                $this->render('admin_form_csv');
            }
            else if ($type == ReportTypes::EXTERNAL_URL)
            {
                $this->render('admin_form_external_url');
            }
        }
        else
        {
            $this->render('choose_type');
        }
    }

    public function admin_edit($id, $copy = false)
    {
        if ($this->request->is(['post', 'put']))
        {
            if ($copy)
            {
                if (!isset($this->request->data['ChartReport']['csv_file']) || empty($this->request->data['ChartReport']['csv_file']['name']))
                {
                    $record = $this->{$this->modelClass}->find("first", array(
                        'fields' => 'csv_file',
                       'conditions' => array(
                           'id' => $id
                       ),
                        'recursive' => -1
                    ));
                    
                    $this->request->data['ChartReport']['csv_file'] = $record['ChartReport']['csv_file'];
                }
            }
        }
        
        parent::edit($id, array("action" => "admin_index"), $copy);
        
        if (isset($this->request->data[$this->modelClass]['options']) && !is_array($this->request->data[$this->modelClass]['options']))
        {
            $this->request->data['options'] = unserialize($this->request->data[$this->modelClass]['options']);
        }
        
        $type = $this->request->data[$this->modelClass]['type'];
        
        $this->_setList();

        if ($type)
        {
            $this->set(compact('type'));
            if ($type == ReportTypes::INTERNAL)
            {
                $this->render('admin_form_csv');
            }
            else if ($type == ReportTypes::EXTERNAL_URL)
            {
                $this->render('admin_form_external_url');
            }
        }
        else
        {
            $this->render('choose_type', 'id');
        }
    }
    
    public function admin_delete($id)
    {
        parent::delete($id, array("action" => "admin_index"));
    }
    
    public function admin_toggleStatus($id)
    {
        $this->toggleStatus($id);
    }
    
    public function draw_chart($id)
    {
        if (!$id)
        {
            die("Invalid id");
        }
        
        $record = $this->{$this->modelClass}->find("first", array(
            "conditions" => array(
                "id" => $id
            ),
            "recursive" => -1
        ));
        
        if (!$record)
        {
            die("Invalid id");
        }
        
        if ($record[$this->modelClass]['type'] == ReportTypes::EXTERNAL_URL)
        {
            $this->redirect($record[$this->modelClass]['url']);
            exit;
        }
        
        $record[$this->modelClass]['options'] = unserialize($record[$this->modelClass]['options']);
        
        $chart_data = CsvUtility::fetchCSV(PATH_CHART_CSV_FILES . $record[$this->modelClass]['csv_file'], false);
        
        $options = $record['ChartReport']['options'];
        $options = $record['ChartReport']['options']['common'];

        $view = "";
        switch($record[$this->modelClass]['chart_type'])
        {
            case ChartTypes::LINE:
                $options = array_merge($options, $record['ChartReport']['options']['line']);
                $view = "draw_chart_line";
                break;
            
            case ChartTypes::AREA:
                $options = array_merge($options, $record['ChartReport']['options']['area']);
                $view = "draw_chart_area";
                break;
            
            case ChartTypes::BAR:
                $options = array_merge($options, $record['ChartReport']['options']['bar']);
                $view = "draw_chart_bar";
                break;
            
            case ChartTypes::COLUMN:
                $options = array_merge($options, $record['ChartReport']['options']['column']);
                $view = "draw_chart_column";
                break;
            
            case ChartTypes::PIE:
                $options = array_merge($options, $record['ChartReport']['options']['pie']);
                $view = "draw_chart_pie";
                break;
        }
        
        $options = $this->unsetIfEmpty($options);
        
        $this->set(compact('chart_data', 'record', 'options'));
        $this->layout = null;
        $this->render($view);
    }
    
    private function _setList()
    {
        $menu_link_list = $this->{$this->modelClass}->ChartMenu->getTreeList("id", "name", ["is_active" => 1]);
        
        $this->set(compact('menu_link_list'));
    }
    
    private function unsetIfEmpty($options)
    {
        foreach($options as $k => $opt)
        {
            if (is_array($opt))
            {
                $options[$k] = $this->unsetIfEmpty($opt);
                
                if (empty($options[$k]))
                {
                    unset($options[$k]);
                }
            }
            else if (strlen($options[$k]) == 0 )
            {
                unset($options[$k]);
            }
        }
        
        return $options;
    }
}