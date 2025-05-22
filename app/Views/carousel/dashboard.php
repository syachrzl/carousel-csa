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
                    <iframe id="carouselFrame" src="https://app.powerbi.com/view?r=eyJrIjoiN2VjZGU4MjgtZjQ1MC00ZjRlLWIwNDItYTc0NTBmYjExYzljIiwidCI6IjVjODQ2NDU0LTI4MjMtNGNhZi04ZThhLWNmZjY5NjUzYjMyNiIsImMiOjEwfQ%3D%3D" style="width: 100%; height: 90vh; border: none;"></iframe>
                </div>
            </div>
        </div>
    </section>


</div>
<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
<script>
    const links = [
        "https://app.powerbi.com/view?r=eyJrIjoiN2VjZGU4MjgtZjQ1MC00ZjRlLWIwNDItYTc0NTBmYjExYzljIiwidCI6IjVjODQ2NDU0LTI4MjMtNGNhZi04ZThhLWNmZjY5NjUzYjMyNiIsImMiOjEwfQ%3D%3D",
        "https://app.powerbi.com/view?r=eyJrIjoiYTZiNGU2MzEtMjc4ZC00ZGM2LTlkZTYtOGJjNmUwOTg4YmY0IiwidCI6IjVjODQ2NDU0LTI4MjMtNGNhZi04ZThhLWNmZjY5NjUzYjMyNiIsImMiOjEwfQ%3D%3D",
        "https://app.powerbi.com/view?r=eyJrIjoiOWYwOTk0ZGQtMGE2MC00MzAyLTg3ZGEtMDZmZjJmNzBjZDlhIiwidCI6IjVjODQ2NDU0LTI4MjMtNGNhZi04ZThhLWNmZjY5NjUzYjMyNiIsImMiOjEwfQ%3D%3D",
        "https://app.powerbi.com/view?r=eyJrIjoiN2RiMjIxYTMtZDIwOS00NjlhLWExNzktZjNkZDVlNjIxMDBhIiwidCI6IjVjODQ2NDU0LTI4MjMtNGNhZi04ZThhLWNmZjY5NjUzYjMyNiIsImMiOjEwfQ%3D%3D",
    ];

    let idleTime = 0;
    let currentIndex = 0;
    const iframe = document.getElementById('carouselFrame');

    function resetIdleTimer() {
        idleTime = 0;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % links.length;
        iframe.src = links[currentIndex];
    }

    setInterval(() => {
        idleTime++;
        if (idleTime >= 60) {
            nextSlide();
            idleTime = 0; // Reset setelah ganti slide
        }
    }, 1000);

    window.addEventListener('mousemove', resetIdleTimer);
    window.addEventListener('keypress', resetIdleTimer);
    window.addEventListener('touchstart', resetIdleTimer);
</script>

<script>
    document.querySelectorAll('.report-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const iframe = document.getElementById('carouselFrame');
            const src = this.getAttribute('data-src');
            if (src && iframe) {
                iframe.src = src;
            }
        });
    });
</script>



<?php $this->endSection(); ?>