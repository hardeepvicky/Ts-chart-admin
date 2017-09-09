<?php
class GitUtility
{
    private $path;
    public function __construct($path)
    {
        $this->path = $path;
    }
    
    public function getBranchList()
    {
        chdir($this->path);
        exec("git branch", $list);
        
        $result = array();
        
        foreach($list as $name)
        {
            $branch = trim(str_replace("*", "", $name));
            $result[$branch]['name'] = $name;
            $result[$branch]['checkout'] = false;    
            
            if (strpos($name, "*") !== false)
            {
                $result[$branch]['checkout'] = true;
            }
        }
        
        return $result;
    }
    
    public function getCurrentBranchName()
    {
        $stringfromfile = file($this->path . "/.git/HEAD");

        $firstLine = $stringfromfile[0]; //get the string from the array

        $explodedstring = explode("/", $firstLine, 3); //seperate out by the "/" in the string

        $branchname = $explodedstring[2]; //get the one that is always the branch name

        return strtolower(trim($branchname));
    }
    
    public function getCommits()
    {
        $current = getcwd();
        chdir($this->path);
        exec("git log", $logs);
		$data = array();
		$i = 0;
		$commit_name = $author_name = $datetime = "";
		foreach($logs as $str)
		{
			if (str_contain($str, "commit", 0, strlen("commit")))
			{
				$i++;
				$data[$i]["commit"] = trim(substr($str, strpos($str, "commit") + strlen("commit")));				
			}
			else if (str_contain($str, "Author:", 0, strlen("Author:")))
			{
				$data[$i]["author"] = trim(substr($str, strpos($str, "Author:") + strlen("Author:")));				
			}		
			else if (str_contain($str, "Date:", 0, strlen("Date:")))
			{
				$data[$i]["datetime"] = DateUtility::getDate(trim(substr($str, strpos($str, "Date:") + strlen("Date:"))));
			}
			else
			{
				$msg = trim($str);
				if ($msg)
				{
					$data[$i]["msg"] = $msg;
				}
			}
		}
        
        foreach($data as $k => $arr)
        {
            if (!isset($arr['commit']) || !isset($arr['datetime']) || !isset($arr['author']))
            {
                unset($data[$k]);
            }
        }
		
        chdir($current);
		return $data;
    }
	
	public function getFilesOfCommit($commit)
	{
		chdir($this->path);
        $cmd = 'git show --no-commit-id --name-only -r ' . $commit;
        exec($cmd, $files);
        
		$flag = true;
		foreach($files as $k => $file)
		{
			if (strpos($file, "commit ") !== false)
			{
				$flag = false;
			}
		
			if (!$flag)
			{
				unset($files[$k]);
			}
		}
		
		return $files;
	}
}

