<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<h5 class="text-success">Forgot Password.</h5>


    <?= view('App\Views\Auth\_message_block') ?>

    <form action="<?= url_to('forgot') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="email"><?=lang('Auth.emailAddress')?></label>
            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>">
            <div class="invalid-feedback">
                <?= session('errors.email') ?>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success btn-block"><?=lang('Auth.sendInstructions')?></button>
    </form>

                

<?= $this->endSection() ?>
