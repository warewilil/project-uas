<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center vh-100 align-items-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0 border-top border-primary">
            <div class="card-body">
                <?php $validation =  \Config\Services::validation(); ?>
                <?php if (session()->getFlashdata('erros')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('erros'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?= route_to('login'); ?>" method="post" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                        <smll class="text-danger"><?= $validation->getError('email'); ?></smll>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        <smll class="text-danger"><?= $validation->getError('password'); ?></smll>
                    </div>
                    <div class="mt-4 d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>