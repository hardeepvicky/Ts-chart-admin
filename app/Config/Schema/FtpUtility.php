<?php
/* 
 * created 14-02-2017
 */
require_once(dirname(__FILE__) . '/../Other/Util.php');
class FtpUtility
{
    protected $hostname, $username, $password;
    public $conn;
    
    public function __construct($hostname, $username, $password)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        
        $this->_openConn();
    }
    
    private function _openConn()
    {
        $this->conn = ftp_connect($this->hostname);
        
        if (!$this->conn)
        {
            throw new Exception("FTP connection failed");
        }
        
        //Checks for Login FTP
        if (!ftp_login($this->conn, $this->username, $this->password))
        {
            throw new Exception("FTP auth failed");
        }
        
        ftp_pasv($this->conn, true);
    }
    
    public function closeConn()
    {
        ftp_close($this->conn);
    }
    
    public function isDirExist($path)
    {
        $cwd = ftp_pwd($this->conn);

        // Attempts to change the directory
        if (@ftp_chdir($this->conn, $path))
        {
            // If directory exists, set back to current working directory 
            ftp_chdir($this->conn, $cwd);
            return true;
        }

        return false;
    }

    public function isFileExist($file)
    {
        if (ftp_size($this->conn, $file) != -1)
        {
            return true;
        }

        return false;
    }
    
    public function createDirs($path)
    {
        $path = Util::removePathSlashs($path);
        
        $parts = explode('/', $path);
        
        foreach ($parts as $part)
        {
            if (!$this->isDirExist($part))
            {
                ftp_mkdir($this->conn, $part);
            }
            
            ftp_chdir($this->conn, $part);
        }
    }    
    
    public function delete($path, $exts = array(), $with_dir = false, $recursive = false)
    {
        $files = $this->getList($path, $exts, false);
        
        foreach($files as $dir => $file)
        {
            if (is_array($file))
            {
                if ($recursive)
                {
                    if (!$this->delete($path . $dir . "/", $exts, $with_dir, $recursive))
                    {
                        return false;
                    }
                }
            }
            else if (!ftp_delete($this->conn, $path . $file))
            {
                return false;
            }
        }
        
        if ($with_dir && !ftp_rmdir ($this->conn, $path))
        {
            return true;
        }

         return true;
    }
    
    public function getList($path, $exts = array(), $recursive = false)
    {
        ftp_chdir($this->conn, $path);
    
        $files = ftp_nlist($this->conn, $path);
        
        $ret_files = array();
        
        foreach($files as $file)
        {
            if ($this->isFileExist($file)) 
            {
                if (empty($exts) || in_array(pathinfo($file, PATHINFO_EXTENSION), $exts))
                {
                   $ret_files[] = $file;
                }
            }
            else if ($file != '.' && $file != '..' && $this->isDirExist($file))
            {
                if ($recursive)
                {
                    $ret_files[$file] = $this->getList($path . $file . "/", $exts, $recursive);
                    ftp_chdir($this->conn, $path);
                }
                else
                {
                    $ret_files[$file] = array();
                }
            }
        }    

        return $ret_files;
    }
    
    public function putFile($src_file, $dest_file)
    {
        if (!ftp_put($this->conn, $dest_file, $src_file, FTP_ASCII))
        {
            return false;
        }
        
        return false;
    }
    
    public function putFiles($src_path, $files, $dest_path)
    {
        $fail_files = [];
        
        $this->createDirs($dest_path);
        
        foreach($files as $file)
        {
            if (!$this->putFile($src_path . $file, $dest_path . $file))
            {
                $fail_files[] = $file;
            }
        }
        
        return empty($fail_files) ? true : $fail_files;
    }
    
    /**
    * return filename which which will be save 
    * @param string $filename
    * @param string $ext
    * @param string $dest_path
    * @return string
    */
   public function getAutoincreamentFileName($filename, $ext, $dest_path, $sep = "_", $i = 0)
   {
       $temp_name =  $i > 0 ? $filename . $sep . $i : $filename;
       
       if ($this->isFileExist($dest_path . $temp_name . "." . $ext))
       {
           return $this->getAutoincreamentFileName($filename, $ext, $dest_path, $sep, $i + 1);
       }
       else
       {
           return $temp_name . "." . $ext;
       }
   }
}