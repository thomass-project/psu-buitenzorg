<?php if(isset($_SESSION['error'])): ?>
    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm rounded flex items-center gap-3">
        <i class="fas fa-exclamation-circle"></i>
        <span><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></span>
    </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | University of Buitenzorg</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lora:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/icon/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/icon/favicon-16.png">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'uni-primary': '#002147', 
                        'uni-secondary': '#003366', 
                        'uni-gold': '#D4AF37',    
                        'uni-bg': '#F5F7FA',
                        'uni-soft': '#F8FAFC'
                    },
                    fontFamily: {
                        'display': ['Cinzel', 'serif'], 
                        'serif': ['Lora', 'serif'],
                        'sans': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Navbar Transition */
        .navbar-scrolled {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        .navbar-scrolled .nav-text { color: #002147 !important; }
        .navbar-scrolled .nav-icon { filter: none !important; }
        
        .navbar-transparent { padding-top: 1.5rem; padding-bottom: 1.5rem; }
        .navbar-transparent .nav-text { color: white; }
        .navbar-transparent .nav-icon { filter: brightness(0) invert(1); }

        /* Input Styling */
        input:focus {
            border-color: #D4AF37 !important;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(12%) sepia(21%) saturate(5458%) hue-rotate(192deg) brightness(92%) contrast(105%);
        }
    </style>
</head>
<body class="bg-uni-bg text-gray-800 font-sans antialiased flex flex-col min-h-screen">

    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 navbar-transparent top-0 left-0 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <img class="h-12 w-auto filter brightness-0 invert transition-all nav-icon" id="nav-logo" src="./assets/icon/bogor-coa-icon-gray.png" alt="University Logo">
                    <div class="hidden md:block nav-text transition-colors">
                        <span class="block font-display font-bold text-lg tracking-wider leading-none">Univ. of Buitenzorg</span>
                        <span class="block text-xs font-serif italic text-uni-gold mt-1">Province of Pasundan</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <a href="./" class="text-sm font-semibold font-display tracking-widest hover:text-uni-gold transition nav-text flex items-center gap-2">
                        <i class="fas fa-home"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header class="h-[50vh] flex items-center justify-center text-center px-4 relative bg-uni-primary">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img src="./assets/background/bg-main-building.jpg" class="w-full h-full object-cover opacity-40 mix-blend-overlay">
            <div class="absolute inset-0 bg-gradient-to-b from-uni-primary/80 to-uni-bg"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto pt-10"> 
            <h1 class="text-4xl md:text-5xl font-display font-bold text-white mb-2 drop-shadow-lg">
                Account <span class="text-uni-gold">Registration</span>
            </h1>
            <p class="text-lg text-gray-300 font-light font-serif italic">
                Join our academic community and start your journey today.
            </p>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-20 pb-20 flex-grow w-full">
        
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden border-t-8 border-uni-gold">
            <div class="bg-uni-primary px-8 py-6 border-b border-gray-700 text-center md:text-left">
                <h2 class="text-xl font-display font-bold text-white flex items-center justify-center md:justify-start gap-3">
                    <i class="fas fa-user-plus text-uni-gold"></i> Create New Account
                </h2>
            </div>

            <div class="p-8 md:p-10">
                <form action="./auth/register-process.php" method="POST" class="space-y-8">
                    <input type="hidden" name="status" value="public">

                    <div>
                        <h3 class="text-lg font-bold text-uni-primary border-b border-gray-200 pb-2 mb-6">Personal Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Surname (First Name)</label>
                                <input type="text" name="surname" autocomplete="off" required placeholder="First Name"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none bg-uni-soft transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Family Name (Last Name)</label>
                                <input type="text" name="family_name" autocomplete="off" required placeholder="Last Name"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none bg-uni-soft transition-all">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth</label>
                            <div class="relative">
                                <input type="date" name="dob" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none bg-uni-soft transition-all text-gray-600">
                            </div>
                        </div>
                    </div>

                    <div class="relative py-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-xs uppercase">
                            <span class="bg-white px-4 text-gray-400 font-bold tracking-widest font-display">Account Credentials</span>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" name="username" autocomplete="off" required placeholder="Username"
                                       class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none bg-uni-soft transition-all">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="email" autocomplete="off" required placeholder="Email"
                                       class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none bg-uni-soft transition-all">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" autocomplete="off" required placeholder="••••••••"
                                       class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none bg-uni-soft transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-100 text-center">
                        <button type="submit" class="w-full md:w-auto px-12 py-4 bg-uni-primary text-white rounded-lg shadow-lg hover:bg-uni-gold hover:text-uni-primary transition-all font-bold uppercase tracking-widest text-sm transform hover:-translate-y-1 active:scale-95">
                            Register Now <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                        
                        <p class="mt-8 text-gray-500 text-sm">
                            Already have an account? 
                            <a href="login.php" class="text-uni-primary font-bold hover:text-uni-gold transition underline decoration-uni-gold/30">Login Here</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </main>

    <footer class="bg-uni-primary text-white border-t-4 border-uni-gold mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-8 text-center">
            <p class="text-sm text-gray-400">&copy; 2026 Pasundan State University of Buitenzorg. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Sticky Navbar Logic
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            const logo = document.getElementById('nav-logo');
            const navTexts = document.querySelectorAll('.nav-text');
            
            if (window.scrollY > 50) {
                navbar.classList.remove('navbar-transparent', 'text-white');
                navbar.classList.add('navbar-scrolled', 'text-gray-800');
                logo.classList.remove('invert', 'brightness-0');
                navTexts.forEach(el => {
                    el.classList.remove('text-white');
                    el.classList.add('text-uni-primary');
                });
            } else {
                navbar.classList.add('navbar-transparent', 'text-white');
                navbar.classList.remove('navbar-scrolled', 'text-gray-800');
                logo.classList.add('invert', 'brightness-0');
                navTexts.forEach(el => {
                    el.classList.add('text-white');
                    el.classList.remove('text-uni-primary');
                });
            }
        });
    </script>

</body>
</html>