    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            // Cek apakah ada query di URL setelah pencarian
            if (window.location.search.indexOf('query') !== -1) {
                // Tunggu 500ms untuk memastikan konten halaman sudah ter-render
                setTimeout(function() {
                    // Pastikan elemen dengan ID 'faq' ada di halaman
                    if ($('#faq').length) {
                        console.log('Melakukan scroll ke FAQ');
                        $('html, body').animate({
                            scrollTop: $('#faq').offset().top -
                                80 // Sesuaikan dengan tinggi navbar jika perlu
                        }, 800); // 800ms untuk scroll halus
                    }
                }, 500); // Tunggu 500ms untuk memastikan halaman sepenuhnya dimuat
            }
        });
    </script>

    {{-- <!-- Vendor JS Files -->
    <script src="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/js/main.js') }}"></script>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/glightbox/css/glightbox.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('faq/' . $faqQuestion->id . '/detail/assets/vendor/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet"> --}}
