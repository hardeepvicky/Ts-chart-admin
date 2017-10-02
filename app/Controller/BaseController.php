<?php
/**
 * @created    08-03-2017
 * @author     Hardeep
 */

App::uses('CakeEmail', 'Network/Email');

class BaseController extends Controller 
{
    protected function _queryLog()
    {
        $dbo = $this->{$this->modelClass}->getDatasource();
        return $dbo->getLog();
    }
    
    protected function _queryLastLog()
    {
        $logs = $this->_queryLog();
        $lastLog = end($logs['log']);
        return $lastLog['query'];
    }
    
    //function to prevent load model more than 2 times
    protected function load_model($model)
    {
        if (!in_array($model, $this->uses, true)) 
        {
            $this->loadModel($model);
        }
    }
    
    protected function savePDF($view, $filename)
    {
        $this->autoRender = false; //Sets rendering false before getting output of view		
		$this->layout = null; //No layout is required
		
		$view_output = $this->render($view); //Gets view output to a variable
		//Includes the library file and configures the default settings		
        require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'autoload.inc.php'); 
		$dompdf = new Dompdf\Dompdf();
		$dompdf->set_paper = 'A4';
		
		$dompdf->load_html(utf8_decode($view_output), Configure::read('App.encoding')); //Loads html of view variable into memory
		$dompdf->render();

		$filename =  $filename . ".pdf";
        
        $output = $dompdf->output();
        file_put_contents($filename, $output);
        
        return $filename;
    }

    protected function createPDF($view, $filePrefix)
    {
		$this->autoRender = false; //Sets rendering false before getting output of view		
		$this->layout = null; //No layout is required
		
		$view_output = $this->render($view); //Gets view output to a variable
		//Includes the library file and configures the default settings		
        require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'autoload.inc.php'); 
		$dompdf = new Dompdf\Dompdf();
		$dompdf->set_paper = 'A4';
		
		$dompdf->load_html(utf8_decode($view_output), Configure::read('App.encoding')); //Loads html of view variable into memory
		$dompdf->render();

		$filename =  $filePrefix . "_" . date('d_m_Y_H_i') . ".pdf";
        
        $dompdf->stream($filename);
	}
    
    /**
     * For sending emails
     * @param type $to
     * @param type $from
     * @param type $subject
     * @param type $content
     * @param type $cc
     * @param type $bcc
     */
    protected function email($code, $to, $from, $subject, $content, $cc = array(), $bcc = array(), $files = array())
    {
        $log["EmailLog"] = array(
            "code" => $code,
            "from_email" => $from,
            "to_email" => $to,
            "subject" => $subject,
            "body" => $content
        );
        
        $this->load_model("EmailLog");
        
        $this->EmailLog->create();
        if ( !$this->EmailLog->save($log))
        {
            return false;
        }
        
        $email = new CakeEmail();

        $email->from(array($from => SITE_NAME));
        $email->to($to);
        $email->subject($subject);
        
        if ($files)
        {
            $email->attachments($files);
        }

        return $email->send($content);
    }
}