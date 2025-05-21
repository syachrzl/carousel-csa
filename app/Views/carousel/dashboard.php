<?php $this->extend('layout/wrapper'); ?>
<!-- Dinamis CSS -->
<?php $this->section('style'); ?>
<?php $this->endSection(); ?>

<!-- Dinamis Content -->
<?php $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <iframe id="carouselFrame" src="" style="width: 100%; height: 90vh; border: none;"></iframe>
                </div>
            </div>
        </div>
    </section>

</div>
<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
<script>
    let idleTime = 0;
    let isSecondPageShown = false;
    const iframe = document.getElementById('carouselFrame');

    // Reset idle timer on user activity
    function resetIdleTimer() {
        idleTime = 0;
    }

    // Cek idle setiap 1 detik
    setInterval(() => {
        idleTime++;
        if (idleTime >= 60 && !isSecondPageShown) {
            iframe.src = "";
            isSecondPageShown = true;
        }
    }, 1000);

    // Aktifitas user
    window.addEventListener('mousemove', resetIdleTimer);
    window.addEventListener('keypress', resetIdleTimer);
    window.addEventListener('touchstart', resetIdleTimer);
</script>

<?php $this->endSection(); ?>