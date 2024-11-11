@extends('layouts.guest')

@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-5">Sign in</h3>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <!-- Email Input -->
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="typeEmailX-2"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Email" required autofocus />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Input with Eye Toggle -->
                            <div class="form-outline mb-4 position-relative">
                                <input type="password" name="password" id="typePasswordX-2"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    placeholder="Password" required />
                                <i id="togglePassword" class="fas fa-eye position-absolute" style="top: 15px; right: 10px; cursor: pointer;"></i>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Sign In Button -->
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                            <hr class="my-4">

                            <p class="text-center mt-4">
                                Ingin Kembali Ke Halaman Utama?
                                <a href="{{ route('welcome') }}"
                                    class="text-primary text-decoration-none text-decoration-underline-on-hover">Kembali</a>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add JavaScript for toggling password visibility -->
    <script>
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("typePasswordX-2");

        togglePassword.addEventListener("click", function () {
            // Toggle password visibility
            const type = password.type === "password" ? "text" : "password";
            password.type = type;

            // Toggle the eye icon
            this.classList.toggle("fa-eye-slash");
        });
    </script>
@endsection
