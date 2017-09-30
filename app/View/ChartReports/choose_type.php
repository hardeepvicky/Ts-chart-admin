<?php
    $link = array("action" => "admin_add");
    
    if ($action == "admin_edit")
    {
        $link = array("action" => "admin_edit", $id);
    }
?>
<h3 class="heading text-center">Choose Chart Data Source Type</h3>
    <div style="width: 170px; margin:auto;">
        <a href="<?= $this->Html->url(array_merge($link, [ReportTypes::INTERNAL])) ?>" class="btn btn-primary">CSV</a>
        <a href="<?= $this->Html->url(array_merge($link, [ReportTypes::EXTERNAL_URL])) ?>" class="btn btn-primary">External URL</a>
    </div>