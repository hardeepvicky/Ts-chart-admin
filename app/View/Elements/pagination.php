<div class="row">
    <?php if (isset($with_info)): ?>
        <div class="col-md-8" style="margin-top : 30px;">
            <?= $this->Paginator->counter('Page {:page} of {:pages}, showing {:current} records out of {:count} total'); ?>
        </div>
    <?php endif; ?>
    <div class="col-md-4 pull-right" style="text-align: right;">
        <ul class="pagination">
            <li><?php echo $this->Paginator->first('<<', array('separator' => '', 'class' => 'prev ajax-paginator', 'title' => 'First')); ?></li>
            <li><?php echo $this->Paginator->prev('<', array('separator' => '', 'class' => 'prev ajax-paginator', 'title' => 'Previous')); ?></li>
            <?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '', 'class' => 'ajax-paginator', 'modulus' => 3)); ?>
            <li><?php echo $this->Paginator->next('>', array('separator' => '', 'class' => 'prev ajax-paginator', 'title' => 'Next')); ?> </li>
            <li><?php echo $this->Paginator->last('>>', array('separator' => '-', 'class' => 'prev ajax-paginator', 'title' => 'Last')); ?></li>
        </ul>
    </div>
</div>