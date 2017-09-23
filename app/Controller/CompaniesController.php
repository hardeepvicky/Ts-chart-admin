<?php
/* 
 * created 23-sep-2017
 */

class CompaniesController extends AppController {

    public function admin_toggleStatus($id)
    {
        $status = parent::toggleStatus($id, false);
        
        if ($status)
        {
            $this->Session->setFlash('Company has unblocked.', 'flash_success');
        }
        else
        {
            $this->Session->setFlash('Company has blocked.', 'flash_success');
        }
        
        $this->redirect(array("controller" => "users", "action" => "admin_index"));
    }
}