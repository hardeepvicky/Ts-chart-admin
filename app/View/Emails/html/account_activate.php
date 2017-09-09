Hello <?php echo trim($user['firstname'] . ' ' . $user['lastname']) ?>,

<br/>

<a href="<?= SITE_URL ?>users/activate/<?= $user["activation_token"] ?>">Click here</a> to activate your account
<br/>
<a href="<?= SITE_URL ?>users/activate/<?= $user["activation_token"] ?>">
    <?= SITE_URL ?>users/activate/<?= $user["activation_token"] ?>
</a>