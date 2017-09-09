<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <p><?php echo $title; ?><span class="tools pull-right"></span></p>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Group Name</th>
                                <th class="hidden-phone">Created Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $record): ?>
                            <tr class="gradeX">
                                <td><?php echo $record[$model]["id"]; ?></td>
                                <td><?php echo $record[$model]["name"]; ?></td>
                                <td><?php echo $record[$model]["created"]; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>