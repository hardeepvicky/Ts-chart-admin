<?php
/**
 * created 21-07-2017
 * @author Hardeep
 */
class SettingsController extends AppController
{
    public $system = [
        [
            'name' => 'Admin Details',
            'sub' => [
                [
                    'name' => 'Emails',
                    'body' => [
                        [
                            'label' => [
                                'text' => 'From Email', 'attr' => []
                            ],
                            'input' => [
                                'key' => 'admin_fromEmail',
                                'attr' => [
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'value' => 'support@techformation.co.in',
                                    'required' => true
                                ]
                            ]
                        ],
                        [
                            'label' => [
                                'text' => 'To Email', 'attr' => []
                            ],
                            'input' => [
                                'key' => 'admin_toEmail',
                                'attr' => [
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'value' => 'support@techformation.co.in',
                                    'required' => true
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
    ];
    
    public function admin_system_setting()
    {
        if ($this->request->is("post"))
        {
            $insertArr = array();
            foreach($this->request->data as $k => $v)
            {
                $insertArr[] = array(
                    "key" => $k,
                    "value" => $v
                );
            }
            
            $result = true;
            
            $setting_list = $this->{$this->modelClass}->find("list", array(
                'fields' => array('key', 'id'),
                'conditions' => array(
                    "user_id" => NULL
                )
            ));

            foreach($this->request->data as $k => $v)
            {
                $record['Setting'] = array(
                    "key" => $k,
                    "value" => $v
                );

                if (isset($setting_list[$k]))
                {
                    $this->{$this->modelClass}->id = $setting_list[$k];
                }
                else
                {
                    $this->{$this->modelClass}->create();
                }

                if (!$this->{$this->modelClass}->save($record))
                {
                    $result = false;
                }
            }
            
            if ($result)
            {
                $this->Session->setFlash($this->modelClass . ' has been saved.', 'flash_success');
            }
            else
            {
                $this->Session->setFlash('Unable to save ' . $this->modelClass . '.', 'flash_failure');
            }
        }
        
        $setting_list = $this->{$this->modelClass}->find("list", array(
            'fields' => array('key', 'value'),
            'conditions' => array(
                "user_id" => NULL
            )
        ));
        
        $this->set(compact("setting_list"));
        $this->set('config', $this->system);
    }
}
