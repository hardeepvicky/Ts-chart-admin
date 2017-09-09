<div class="content">
    <?php echo $this->Session->flash(); ?>
    <div class="row">
        <div class="col-md-6">
            <a class="btn" href="/users/login">
                Click here
            </a>
            to <a href="/users/login">Login</a>
        </div>
        
        <div class="col-md-6 text-right">
            <a class="btn btn-primary" href="/users/signup_send_email/<?= $id ?>">Send Email Again</a>
        </div>
    </div>
</div>

