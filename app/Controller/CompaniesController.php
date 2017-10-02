<?php
/* 
 * created 23-sep-2017
 */

class CompaniesController extends AppController {

    public function admin_block()
    {
        $id = $this->request->data['company_id'];
        
        $status = parent::toggleStatus($id, false);
        
        $this->_send_email($id, $this->request->data['msg'], EmailTypes::COMPANY_BLOCK);
        
        $this->Session->setFlash('Company has blocked.', 'flash_success');
        
        $this->redirect(array("controller" => "users", "action" => "admin_index"));
    }
    
    public function admin_unblock()
    {
        $id = $this->request->data['company_id'];
        
        $status = parent::toggleStatus($id, false);
        
        $this->_send_email($id, $this->request->data['msg'], EmailTypes::COMPANY_UNBLOCK);
        
        $this->Session->setFlash('Company has remove from Block list', 'flash_success');
        
        $this->redirect(array("controller" => "users", "action" => "admin_index"));
    }
    
    private function _send_email($id, $msg, $code)
    {
        $company = $this->Company->find('first', array(
            'conditions' => array(
                'Company.id' => $id,
            ),
            'contain' => array(
                'User' => array(
                    'conditions' => array(
                        'group_id' => GROUP_COMPANY_ADMIN
                    )
                )
            )
        ));
        
        $this->load_model("EmailTemplate");
        $template = $this->EmailTemplate->find("first", array(
            "conditions" => array(
                "code" => $code
            )
        ));
        
        $placeholder_values['Company.name'] = $company['Company']['name'];
        $placeholder_values['User.firstname'] = $company['User'][0]['firstname'];
        $placeholder_values['User.lastname'] = $company['User'][0]['lastname'];
        $placeholder_values['Company.block_reason'] = $msg;
        $placeholder_values['Company.ublock_msg'] = $msg;
        $to_email = $company['User'][0]['email'];
        
        $subject = $template['EmailTemplate']['subject'];
        $content = $template['EmailTemplate']['body'];
        
        foreach($placeholder_values as $placeholder => $val)
        {
            $subject = str_replace("{" . $placeholder . "}", $val , $subject);
            $content = str_replace("{" . $placeholder . "}", $val , $content);
        }
        
        return $this->email($code, $to_email, FROM_EMAIL, $subject, $content);
    }
}