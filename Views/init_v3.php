<?php if ($init) : ?>

    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=<?= $key; ?>"></script>

<?php endif; ?>

<script type="text/javascript">
    grecaptcha.ready(function() {
        grecaptcha.execute('<?= $key; ?>', <?= json_encode($options); ?>).then(function(token) {
            document.getElementById('<?= $id; ?>').value = token;

        });
    });

    setInterval(function() {
        grecaptcha.ready(function() {
            grecaptcha.execute('<?= $key; ?>', {
                action: '<?= $options['action'] ?? '' ?>'
            }).then(function(e) {
                $('#<?= $id; ?>').val(e);
            });
        });
    }, 90 * 1000);
</script>