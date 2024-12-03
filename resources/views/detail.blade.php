<!-- tes.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Detail</title>

    <link href="{{ asset('assets/css/detail.css') }}" rel="stylesheet">
</head>

<body>

    <section id="faq-details" class="faq-details section">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-between gy-4 mt-4">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="faq-description">
                        <!-- Menampilkan pertanyaan -->
                        @foreach ($faqCategories as $category)
                            <h2>
                                Kategori: {{ $category->category }}
                            </h2>
                        @endforeach

                        <!-- Testimonial (Optional) -->
                        <div class="testimonial-item">
                            <div class="row justify-content-between gy-4 mt-4">
                                <div class="col-lg-8" data-aos="fade-up">
                                    <div class="portfolio-description">
                                        <h2>{{ $faqQuestion->question }}</h2>
                                        <p>
                                            {!! nl2br($faqQuestion->answer) !!}
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Additional content or description -->
                    <br>
                </div>
            </div>

            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="faq-info">
                    <h3>FAQ Information</h3>
                    <ul>
                        @foreach ($faqCategories as $category)
                            <li><strong> {{ $category->category }} </strong></li>
                        @endforeach
                        <li><strong>Dibuat Pada</strong> {{ $faqQuestion->created_at->format('d M Y') }}</li>
                    </ul>
                    <a href="{{ route('welcome') }}" class="btn-visit">Back to FAQs</a>
                </div>
            </div>

        </div>

        </div>
    </section>

    {{-- <footer id="footer" class="footer position-relative light-background">

        <div class="container copyright text-center mt-4">
            <div>
                © <span class="current-year"></span> | By <a href="https://dispendukcapil.semarangkota.go.id/">
                    Dinas Kependudukan Dan Pencatatan Sipil Kota Semarang</a>


            </div>
        </div>

    </footer>

    <script>
        // Mendapatkan tahun saat ini
        const currentYear = new Date().getFullYear();

        // Menampilkan tahun di elemen dengan kelas 'current-year'
        document.querySelector('.current-year').textContent = currentYear;
    </script> --}}

</body>

</html>
