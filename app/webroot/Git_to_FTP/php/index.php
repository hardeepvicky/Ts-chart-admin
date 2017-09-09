<?php 
$git = new  GitUtility(GIT_PATH);
$branch_name = $git->getCurrentBranchName();
$commits = $git->getCommits();

$sync_csv = new CsvUtility(SYNC_FILE);
$sync_commit_list = $sync_csv->getList("commit", "commit");

foreach($commits as $k => $commit)
{
    if(LAST_SYNC_DATETME)
    {
        if (DateUtility::compare($commit["datetime"], LAST_SYNC_DATETME) <= 0)
        {
            unset($commits[$k]);
            continue;
        }   
    }
    
    if (isset($sync_commit_list[$commit['commit']]))
    {
        unset($commits[$k]);
        continue;
    }
    
    
    $commits[$k]["files"] = array();
	$files = $git->getFilesOfCommit($commit['commit']);
    foreach($files as $file)
    {
        $commits[$k]["files"][] = array(
            "file" => $file,
            "is_exist" => file_exists($file) ? 1 : 0
        );
    }
}
