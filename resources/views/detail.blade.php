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
                                            {!! nl2br(e($faqQuestion->answer)) !!}
                                        </p>
                                    </div>
                                </div>

        
                            </div>
                        </div>
                    </div>

                    <!-- Additional content or description -->
                    <p>Additional details or content related to the FAQ...</p>
                </div>
            </div>

            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="faq-info">
                    <h3>FAQ Information</h3>
                    <ul>
                        <li><strong>Category</strong> {{ $faqQuestion->category->name }}</li>
                        <li><strong>Created At</strong> {{ $faqQuestion->created_at->format('d M, Y') }}</li>
                        <li><a href="{{ route('welcome') }}" class="btn-visit">Back to FAQs</a></li>
                    </ul>
                </div>
            </div>

        </div>

        </div>
    </section>


</body>

</html>
