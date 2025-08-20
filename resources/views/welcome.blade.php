<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800">SalesApp</div>
            <div class="space-x-6">
                <a href="#home" class="text-gray-600 hover:text-blue-600">Home</a>
                <a href="#contact" class="text-gray-600 hover:text-blue-600">Contact</a>
               
                @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="bg-gray-100 py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-4">Sales Management</h1>
            <p class="text-xl text-gray-600 mb-8">Discover how our product can transform your life with cutting-edge technology and unmatched quality.</p>
            <button class="bg-blue-600 text-white px-6 py-3 rounded text-lg hover:bg-blue-700">Get Started Today</button>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Why Choose Our Product?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="text-4xl mb-4">🚀</div>
                    <h3 class="text-xl font-semibold mb-2">Fast Performance</h3>
                    <p class="text-gray-600">Experience lightning-fast results with our optimized technology.</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl mb-4">🔒</div>
                    <h3 class="text-xl font-semibold mb-2">Secure & Reliable</h3>
                    <p class="text-gray-600">Your data is safe with our top-tier security protocols.</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl mb-4">🌟</div>
                    <h3 class="text-xl font-semibold mb-2">User-Friendly</h3>
                    <p class="text-gray-600">Intuitive design makes it easy for anyone to use.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="mb-4">© 2025 SalesApp. All rights reserved.</p>
            <div class="space-x-4">
                <a href="#" class="hover:text-blue-400">Privacy Policy</a>
                <a href="#" class="hover:text-blue-400">Terms of Service</a>
                <a href="#" class="hover:text-blue-400">Contact Us</a>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
