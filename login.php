<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | University of Buitenzorg</title>
    
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

        input:focus {
            border-color: #D4AF37 !important;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
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

    <header class="h-[45vh] flex items-center justify-center text-center px-4 relative bg-uni-primary">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img src="./assets/background/bg-main-building.jpg" class="w-full h-full object-cover opacity-40 mix-blend-overlay">
            <div class="absolute inset-0 bg-gradient-to-b from-uni-primary/80 to-uni-bg"></div>
        </div>
    </header>

    <main class="max-w-md mx-auto px-4 -mt-40 relative z-20 pb-20 flex-grow w-full">
        
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-uni-primary rounded-full opacity-[0.03] blur-3xl"></div>
            <div class="absolute bottom-[0%] -right-[5%] w-[35%] h-[35%] bg-uni-gold rounded-full opacity-[0.05] blur-3xl"></div>
        </div>

        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-2xl w-full max-w-md relative z-10 border-t-8 border-uni-gold">
            <div class="text-center mb-10">
                <img src="./assets/icon/bogor-coa-icon-gray.png" class="h-16 mx-auto mb-4" alt="University Logo">
                <h2 class="text-2xl font-display font-bold text-uni-primary tracking-tight uppercase">Academic Dashboard</h2>
                <p class="text-gray-400 text-xs mt-2 font-medium tracking-widest uppercase">Login</p>
            </div>

            <?php if(isset($_SESSION['success'])): ?>
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm rounded flex items-center gap-3">
                    <i class="fas fa-check-circle"></i>
                    <span><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></span>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm rounded flex items-center gap-3">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></span>
                </div>
            <?php endif; ?>

            <form action="./auth/login-process.php" method="POST" class="space-y-6">
                <div>
                    <label class="block text-gray-700 text-xs font-bold uppercase mb-2 ml-1">Username</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 group-focus-within:text-uni-gold transition-colors">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="username" autocomplete="off" required placeholder="Enter username"
                               class="w-full pl-10 pr-4 py-3 bg-uni-soft border border-gray-200 rounded-xl focus:outline-none transition-all text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 text-xs font-bold uppercase mb-2 ml-1">Password</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 group-focus-within:text-uni-gold transition-colors">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" required placeholder="••••••••"
                               class="w-full pl-10 pr-4 py-3 bg-uni-soft border border-gray-200 rounded-xl focus:outline-none transition-all text-sm">
                    </div>
                </div>
                
                <button type="submit" class="w-full bg-uni-primary text-white font-bold py-4 rounded-xl hover:bg-uni-secondary transition transform hover:-translate-y-1 shadow-xl uppercase tracking-widest text-xs flex items-center justify-center gap-2">
                    <span>Sign In</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </button>
            </form>

            <div class="mt-10 text-center">
                <p class="text-gray-400 text-sm">Don't have an account?</p>
                <a href="register.php" class="text-uni-primary font-bold hover:text-uni-gold transition text-sm">Create Student Account</a>
                
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <a href="./" class="text-xs text-gray-400 hover:text-uni-primary transition">
                        <i class="fas fa-chevron-left mr-1"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-uni-primary text-white border-t-4 border-uni-gold mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-8 text-center">
            <p class="text-sm text-gray-400">&copy; 2026 University of Buitenzorg. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
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