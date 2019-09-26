<?php if ($this->session->has_userdata('pesan')) { ?>

    <div class="alert alert-danger alert-dismissible show fade">
        <i class="fas fa-exclamation-triangle"></i>
        <?= $this->session->flashdata('pesan'); ?>
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>


<?php } else if ($this->session->has_userdata('berhasil')) { ?>
    <span class="row">
        <span class="col-12 col-md-6 col-lg-6">
            <span class="alert alert-success alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-check-circle"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Sukses</div>
                    <?= $this->session->flashdata('berhasil'); ?>
                </div>
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </span>
        </span>
    </span>

<?php } else if ($this->session->has_userdata('daftar')) { ?>
    <span class="row">
        <span class="col-12 col-md-6 col-lg-6">
            <span class="alert alert-success alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-check-circle"></i></div>
                <div class="alert-body">
                    <div class="alert-title"><?= $this->session->flashdata('daftar'); ?></div>
                    Silahkan <a data-toggle="modal" data-target="#modal-5">Login</a>
                </div>
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </span>
        </span>
    </span>

<?php } ?>