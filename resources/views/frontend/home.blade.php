<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enfant - Primary School & Kindergarten</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            800: '#002845',
                            900: '#001b30',
                        },
                        coral: {
                            500: '#ff523b',
                            600: '#e03e27',
                        }
                    },
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                        sans: ['Open Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .hex-bg {
            background-color: #fcfcfc;
            background-image: radial-gradient(#e5e7eb 0.75px, transparent 0.75px);
            background-size: 16px 16px;
        }
        .chevron-top-bg {
            background-color: #f2f4f6;
            background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
            background-size: 12px 12px;
        }
    </style>
</head>
<body class="font-sans text-gray-700 bg-white antialiased overflow-x-hidden min-h-screen flex flex-col justify-between">

    <!-- 1. TOP HEADER BAR -->
    <header class="bg-navy-800 text-white py-3 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="font-montserrat text-3xl font-extrabold tracking-tight text-white">
                    enfant<span class="text-coral-500">.</span>
                </a>

                <!-- Contact & Info Widgets -->
                <div class="hidden md:flex items-center space-x-8 text-xs">
                    <div class="flex items-center space-x-3">
                        <i class="fa-regular fa-compass text-2xl text-white/80"></i>
                        <div>
                            <span class="font-bold text-coral-500 uppercase tracking-wide">Find Us:</span>
                            <span class="block">London UK</span>
                            <span class="text-gray-300">12-14 Kensington High Street</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fa-regular fa-clock text-2xl text-white/80"></i>
                        <div>
                            <span class="font-bold text-coral-500 uppercase tracking-wide">Open Time:</span>
                            <span class="block">09:00 - 17:00</span>
                            <span class="text-gray-300">Saturday and Sunday - Closed</span>
                        </div>
                    </div>
                    @if(Route::has('admin.dashboard'))
                        <a href="{{ route('admin.dashboard') }}" class="bg-coral-500 hover:bg-coral-600 text-white font-montserrat font-bold px-4 py-2 rounded-full transition uppercase text-[10px]">
                            Dashboard
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!-- 2. NAVIGATION BAR -->
    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14">
                
                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center space-x-6 font-montserrat font-semibold text-xs text-navy-800 uppercase tracking-wider">
                    <a href="#" onclick="switchPage('home'); return false;" id="nav-home" class="nav-link text-coral-500 flex items-center gap-1 hover:text-coral-500 transition">
                        Home <i class="fa-solid fa-chevron-down text-[9px]"></i>
                    </a>
                    <a href="#" onclick="switchPage('blog'); return false;" id="nav-blog" class="nav-link flex items-center gap-1 hover:text-coral-500 transition">
                        Blog <i class="fa-solid fa-chevron-down text-[9px]"></i>
                    </a>
                    <a href="#" onclick="switchPage('pages'); return false;" id="nav-pages" class="nav-link flex items-center gap-1 hover:text-coral-500 transition">
                        Pages <i class="fa-solid fa-chevron-down text-[9px]"></i>
                    </a>
                    <a href="#" onclick="switchPage('contact'); return false;" id="nav-contact" class="nav-link flex items-center gap-1 hover:text-coral-500 transition">
                        Contact <i class="fa-solid fa-chevron-down text-[9px]"></i>
                    </a>
                    <a href="#" onclick="switchPage('plans'); return false;" id="nav-plans" class="nav-link flex items-center gap-1 hover:text-coral-500 transition">
                        Plans <i class="fa-solid fa-chevron-down text-[9px]"></i>
                    </a>
                    <a href="#" onclick="switchPage('shop'); return false;" id="nav-shop" class="nav-link flex items-center gap-1 hover:text-coral-500 transition">
                        Shop <i class="fa-solid fa-chevron-down text-[9px]"></i>
                    </a>
                    <a href="#" onclick="switchPage('about'); return false;" id="nav-about" class="nav-link hover:text-coral-500 transition">About</a>
                </div>

                <!-- Right Action Icons (Search & Cart) -->
                <div class="flex items-center space-x-5 text-navy-800 ml-auto lg:ml-0">
                    <button onclick="toggleSearchModal()" aria-label="Search" class="hover:text-coral-500 transition">
                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                    </button>
                    <a href="#" onclick="switchPage('shop'); return false;" class="relative hover:text-coral-500 transition">
                        <i class="fa-solid fa-bag-shopping text-sm"></i>
                        <span id="cart-counter" class="absolute -top-2 -right-2 bg-coral-500 text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center">0</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" aria-label="Toggle Mobile Menu" class="lg:hidden ml-4 text-navy-800 focus:outline-none">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation Drawer -->
            <div id="mobile-menu" class="hidden lg:hidden pb-4 font-montserrat font-semibold text-xs text-navy-800 space-y-3 pt-2 border-t border-gray-100">
                <a href="#" onclick="switchPage('home'); return false;" class="block hover:text-coral-500 py-1">Home</a>
                <a href="#" onclick="switchPage('blog'); return false;" class="block hover:text-coral-500 py-1">Blog</a>
                <a href="#" onclick="switchPage('pages'); return false;" class="block hover:text-coral-500 py-1">Pages</a>
                <a href="#" onclick="switchPage('contact'); return false;" class="block hover:text-coral-500 py-1">Contact</a>
                <a href="#" onclick="switchPage('plans'); return false;" class="block hover:text-coral-500 py-1">Plans</a>
                <a href="#" onclick="switchPage('shop'); return false;" class="block hover:text-coral-500 py-1">Shop</a>
                <a href="#" onclick="switchPage('about'); return false;" class="block hover:text-coral-500 py-1">About</a>
            </div>
        </div>
    </nav>

    <!-- SEARCH MODAL OVERLAY -->
    <div id="search-modal" class="fixed inset-0 bg-navy-900/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-lg relative">
            <button onclick="toggleSearchModal()" class="absolute top-4 right-4 text-gray-400 hover:text-navy-800">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
            <h3 class="font-montserrat font-bold text-navy-800 text-lg mb-4">Search Enfant School</h3>
            <div class="relative">
                <input type="text" placeholder="Type to search programs, classes, news..." class="w-full border border-gray-300 rounded-lg pl-4 pr-10 py-3 text-sm focus:outline-none focus:border-coral-500">
                <i class="fa-solid fa-magnifying-glass absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>
    </div>

    <!-- MAIN DYNAMIC CONTENT CONTAINER -->
    <main id="main-content" class="flex-grow">
        
        <!-- ================= HOME PAGE CONTENT ================= -->
        <div id="page-home" class="page-view">
            
            <!-- 3. HERO SLIDER BANNER -->
            <section class="relative bg-cover bg-center min-h-[440px] flex items-center text-center text-white" 
                     style="background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25)), url('https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1600&auto=format&fit=crop');">
                <button aria-label="Previous Slide" class="absolute left-4 top-1/2 -translate-y-1/2 text-white/70 hover:text-white text-3xl transition"><i class="fa-solid fa-chevron-left"></i></button>
                <button aria-label="Next Slide" class="absolute right-4 top-1/2 -translate-y-1/2 text-white/70 hover:text-white text-3xl transition"><i class="fa-solid fa-chevron-right"></i></button>

                <div class="max-w-4xl mx-auto px-4 py-16">
                    <h3 class="font-montserrat text-sm md:text-base font-semibold tracking-widest uppercase mb-3 drop-shadow">Enfant Primary School</h3>
                    <h1 class="font-montserrat text-3xl sm:text-4xl md:text-5xl font-extrabold uppercase leading-tight mb-8 drop-shadow-md">Best Gift for a Child<br class="hidden sm:inline"> is a Great Education</h1>
                    <a href="#" onclick="scrollToEnroll(); return false;" class="inline-block bg-coral-500 hover:bg-coral-600 text-white font-montserrat font-bold text-xs uppercase px-8 py-3.5 rounded-full shadow-lg transition transform hover:-translate-y-0.5">Enroll Now</a>
                </div>
            </section>

            <!-- 4. ENROLL CALLOUT STRIP -->
            <section class="bg-navy-800 text-white py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-center md:text-left">
                        <div class="flex flex-col sm:flex-row items-center space-y-3 sm:space-y-0 sm:space-x-5">
                            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-coral-500 text-2xl shrink-0 shadow-inner">
                                <i class="fa-solid fa-chalkboard-user"></i>
                            </div>
                            <div>
                                <h2 class="font-montserrat font-bold text-lg uppercase tracking-wide">Enroll a Child</h2>
                                <p class="text-xs text-gray-300">We provide the perfect education for your child every day</p>
                            </div>
                        </div>
                        <div>
                            <a href="#" onclick="switchPage('contact'); return false;" class="inline-block border-2 border-white hover:bg-white hover:text-navy-800 text-white font-montserrat font-bold text-xs uppercase px-7 py-2.5 rounded-full transition duration-300">Contact Us</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 5. OUR SERVICES SECTION -->
            <section class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    
                    <div class="text-center mb-16">
                        <h2 class="font-montserrat text-2xl font-bold text-gray-800 uppercase tracking-wide mb-2">Our Services</h2>
                        <p class="text-xs text-gray-500 mb-4">We make your child happy day after day</p>
                        <div class="relative w-12 h-[1px] bg-coral-500 mx-auto">
                            <span class="absolute left-1/2 -top-1 -translate-x-1/2 w-2 h-2 bg-white border border-coral-500 rounded-full"></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                        <!-- Left Column -->
                        <div class="lg:col-span-5 pr-0 lg:pr-4">
                            <h3 class="font-montserrat text-base font-bold text-gray-700 uppercase tracking-wide">Our Daily Care</h3>
                            <h4 class="font-montserrat text-xs font-semibold text-gray-400 uppercase tracking-wide mb-6">Popular Education for Your Child</h4>
                            
                            <p class="text-xs text-gray-500 leading-relaxed mb-6">
                                Alterum accommodare duo cu. Ius labore luptatum efficiendi ex, ne vim enim rebum honestatis, ad his consulatu pertinacia deterruisset. Te bonorum ancillae nec. Mea errem alterum in, harum iudico vel et, nec atqui propriae id.
                            </p>

                            <ul class="space-y-3 mb-8 text-xs text-gray-600">
                                <li class="flex items-center gap-3">
                                    <span class="w-4 h-4 rounded-full border border-coral-500 flex items-center justify-center text-coral-500 text-[10px] shrink-0"><i class="fa-solid fa-check"></i></span>
                                    Learning program with after-school
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="w-4 h-4 rounded-full border border-coral-500 flex items-center justify-center text-coral-500 text-[10px] shrink-0"><i class="fa-solid fa-check"></i></span>
                                    Opportunities to scientific experiments
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="w-4 h-4 rounded-full border border-coral-500 flex items-center justify-center text-coral-500 text-[10px] shrink-0"><i class="fa-solid fa-check"></i></span>
                                    Positive learning environment
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="w-4 h-4 rounded-full border border-coral-500 flex items-center justify-center text-coral-500 text-[10px] shrink-0"><i class="fa-solid fa-check"></i></span>
                                    Learning through play
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="w-4 h-4 rounded-full border border-coral-500 flex items-center justify-center text-coral-500 text-[10px] shrink-0"><i class="fa-solid fa-check"></i></span>
                                    Individual attention in small classes
                                </li>
                            </ul>

                            <a href="#" onclick="switchPage('about'); return false;" class="inline-block border border-coral-500 text-coral-500 hover:bg-coral-500 hover:text-white font-montserrat font-semibold text-[11px] uppercase tracking-wider px-6 py-2 rounded-full transition duration-300">More Info</a>
                        </div>

                        <!-- Right Column (6 Grid) -->
                        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-y-10 gap-x-6 text-center">
                            <div>
                                <div class="w-16 h-16 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4 text-coral-500 text-2xl"><i class="fa-solid fa-school-flag"></i></div>
                                <h5 class="font-montserrat font-bold text-xs text-gray-700 uppercase mb-2">Great Facilities</h5>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Alterum accommodare duo cu. Ius labore luptatum efficiendi ex, ne vim enim rebum.</p>
                            </div>
                            <div>
                                <div class="w-16 h-16 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4 text-coral-500 text-2xl"><i class="fa-solid fa-vials"></i></div>
                                <h5 class="font-montserrat font-bold text-xs text-gray-700 uppercase mb-2">Funny Games</h5>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Alterum accommodare duo cu. Ius labore luptatum efficiendi ex, ne vim enim rebum.</p>
                            </div>
                            <div>
                                <div class="w-16 h-16 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4 text-coral-500 text-2xl"><i class="fa-solid fa-chalkboard"></i></div>
                                <h5 class="font-montserrat font-bold text-xs text-gray-700 uppercase mb-2">Varied Classes</h5>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Alterum accommodare duo cu. Ius labore luptatum efficiendi ex, ne vim enim rebum.</p>
                            </div>
                            <div>
                                <div class="w-16 h-16 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4 text-coral-500 text-2xl"><i class="fa-solid fa-atom"></i></div>
                                <h5 class="font-montserrat font-bold text-xs text-gray-700 uppercase mb-2">Science Labs</h5>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Alterum accommodare duo cu. Ius labore luptatum efficiendi ex, ne vim enim rebum.</p>
                            </div>
                            <div>
                                <div class="w-16 h-16 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4 text-coral-500 text-2xl"><i class="fa-solid fa-ice-cream"></i></div>
                                <h5 class="font-montserrat font-bold text-xs text-gray-700 uppercase mb-2">Delicious Meals</h5>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Alterum accommodare duo cu. Ius labore luptatum efficiendi ex, ne vim enim rebum.</p>
                            </div>
                            <div>
                                <div class="w-16 h-16 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4 text-coral-500 text-2xl"><i class="fa-solid fa-bus"></i></div>
                                <h5 class="font-montserrat font-bold text-xs text-gray-700 uppercase mb-2">School Bus</h5>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Alterum accommodare duo cu. Ius labore luptatum efficiendi ex, ne vim enim rebum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 6. ENROLLMENT PROCESS TIMELINE SECTION -->
            <section id="enrollment-section" class="py-20 hex-bg relative border-t border-b border-gray-100">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    
                    <div class="text-center mb-16">
                        <h2 class="font-montserrat text-2xl font-bold text-gray-800 uppercase tracking-wide mb-2">Enrollment</h2>
                        <p class="text-xs text-gray-500 mb-4">Steps done with heart, soul, mind & strength</p>
                        <div class="relative w-12 h-[1px] bg-coral-500 mx-auto">
                            <span class="absolute left-1/2 -top-1 -translate-x-1/2 w-2 h-2 bg-white border border-coral-500 rounded-full"></span>
                        </div>
                    </div>

                    <!-- Timeline Steps -->
                    <div class="relative mb-12">
                        <div class="hidden md:block absolute top-6 left-[12%] right-[12%] h-[1px] border-t border-dashed border-gray-300 z-0"></div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 relative z-10 text-center">
                            
                            <!-- Step 1 -->
                            <div class="step-card group cursor-pointer" onclick="setActiveStep(1)">
                                <div id="step-circle-1" class="w-12 h-12 rounded-full bg-navy-800 text-white font-montserrat font-bold text-lg flex items-center justify-center mx-auto mb-4 shadow-md transition duration-300">1</div>
                                <h4 class="font-montserrat font-semibold text-sm text-gray-700 uppercase mb-2">Contact</h4>
                                <p class="text-[11px] text-gray-400 leading-relaxed px-2">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>

                            <!-- Step 2 -->
                            <div class="step-card group cursor-pointer" onclick="setActiveStep(2)">
                                <div id="step-circle-2" class="w-12 h-12 rounded-full bg-coral-500 text-white font-montserrat font-bold text-lg flex items-center justify-center mx-auto mb-4 shadow-md transition duration-300">2</div>
                                <h4 class="font-montserrat font-semibold text-sm text-gray-700 uppercase mb-2">Application</h4>
                                <p class="text-[11px] text-gray-400 leading-relaxed px-2">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>

                            <!-- Step 3 -->
                            <div class="step-card group cursor-pointer" onclick="setActiveStep(3)">
                                <div id="step-circle-3" class="w-12 h-12 rounded-full bg-navy-800 text-white font-montserrat font-bold text-lg flex items-center justify-center mx-auto mb-4 shadow-md transition duration-300">3</div>
                                <h4 class="font-montserrat font-semibold text-sm text-gray-700 uppercase mb-2">Counseling</h4>
                                <p class="text-[11px] text-gray-400 leading-relaxed px-2">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>

                            <!-- Step 4 -->
                            <div class="step-card group cursor-pointer" onclick="setActiveStep(4)">
                                <div id="step-circle-4" class="w-12 h-12 rounded-full bg-coral-500 text-white font-montserrat font-bold text-lg flex items-center justify-center mx-auto mb-4 shadow-md transition duration-300">4</div>
                                <h4 class="font-montserrat font-semibold text-sm text-gray-700 uppercase mb-2">Admission</h4>
                                <p class="text-[11px] text-gray-400 leading-relaxed px-2">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>

                        </div>
                    </div>

                    <!-- Step Controls Buttons -->
                    <div class="flex justify-center items-center gap-2">
                        <button onclick="prevStep()" class="border border-coral-500 text-coral-500 hover:bg-coral-500 hover:text-white font-montserrat font-semibold text-[10px] uppercase px-4 py-1.5 rounded-sm transition">PREV</button>
                        <button onclick="nextStep()" class="border border-coral-500 text-coral-500 hover:bg-coral-500 hover:text-white font-montserrat font-semibold text-[10px] uppercase px-4 py-1.5 rounded-sm transition">NEXT</button>
                    </div>

                </div>
            </section>

            <!-- 7. WHAT'S NEW SECTION (DYNAMIC LARAVEL POSTS) -->
            <section class="py-20 bg-white">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    
                    <div class="text-center mb-16">
                        <h2 class="font-montserrat text-2xl font-bold text-gray-800 uppercase tracking-wide mb-2">WHAT'S NEW</h2>
                        <p class="text-xs text-gray-500 mb-4">Keep up to date with the latest news</p>
                        <div class="relative w-12 h-[1px] bg-coral-500 mx-auto">
                            <span class="absolute left-1/2 -top-1 -translate-x-1/2 w-2 h-2 bg-white border border-coral-500 rounded-full"></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-14">
                        @forelse($posts as $post)
                            <div class="text-left group cursor-pointer">
                                <div class="overflow-hidden mb-5 rounded-lg bg-gray-100">
                                    <img src="{{ $post->image ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop' }}" 
                                         alt="{{ $post->title }}" 
                                         class="w-full h-52 object-cover transition duration-300 group-hover:scale-105">
                                </div>
                                <div class="font-montserrat font-bold text-lg mb-2">
                                    <span class="text-coral-500 text-xl">{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('d') }}</span> 
                                    <span class="text-navy-800 text-xs font-semibold uppercase">/ {{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('F') }}</span>
                                </div>
                                <h3 class="font-montserrat font-bold text-sm text-navy-800 group-hover:text-coral-500 transition leading-snug mb-3">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-[11px] text-gray-400 leading-relaxed line-clamp-3">
                                    {{ $post->content }}
                                </p>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-8 text-gray-400 font-montserrat text-xs">
                                No news posts published yet.
                            </div>
                        @endforelse
                    </div>

                    <div class="text-center">
                        <a href="#" onclick="switchPage('blog'); return false;" class="inline-block border border-coral-500 text-coral-500 hover:bg-coral-500 hover:text-white font-montserrat font-bold text-[10px] uppercase tracking-wider px-7 py-2.5 rounded-full transition duration-300">
                            GO TO BLOG
                        </a>
                    </div>

                </div>
            </section>

        </div>

        <!-- ================= BLOG PAGE CONTENT ================= -->
        <div id="page-blog" class="page-view hidden py-16 bg-slate-50">
            <div class="max-w-6xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h1 class="font-montserrat text-3xl font-bold text-navy-800 uppercase">School News & Articles</h1>
                    <p class="text-sm text-gray-500 mt-2">Latest updates from Enfant Primary School</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse($posts as $post)
                        <article class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                            <img src="{{ $post->image ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600&auto=format&fit=crop' }}" class="w-full h-48 object-cover" alt="{{ $post->title }}">
                            <div class="p-6">
                                <span class="text-xs font-bold text-coral-500 uppercase font-montserrat">{{ $post->category ?? 'Education' }}</span>
                                <h3 class="font-montserrat font-bold text-navy-800 text-base mt-1 mb-3">{{ $post->title }}</h3>
                                <p class="text-xs text-gray-500 leading-relaxed mb-4 line-clamp-3">{{ $post->content }}</p>
                                <span class="text-gray-400 text-[11px] font-semibold">{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('M d, Y') }}</span>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-3 text-center py-8 text-gray-400 font-montserrat text-xs">
                            No articles found.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- ================= SHOP PAGE CONTENT ================= -->
        <div id="page-shop" class="page-view hidden py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h1 class="font-montserrat text-3xl font-bold text-navy-800 uppercase">School Store</h1>
                    <p class="text-sm text-gray-500 mt-2">Uniforms, books, and educational kits</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="border border-gray-100 rounded-lg p-4 text-center hover:shadow-md transition">
                        <div class="bg-gray-100 h-40 rounded-md mb-4 flex items-center justify-center text-4xl text-gray-400">
                            <i class="fa-solid fa-shirt"></i>
                        </div>
                        <h4 class="font-montserrat font-bold text-sm text-navy-800">School Polo Shirt</h4>
                        <p class="text-coral-500 font-bold text-sm my-2">$25.00</p>
                        <button onclick="addToCart()" class="bg-navy-800 hover:bg-coral-500 text-white font-montserrat font-semibold text-xs uppercase px-4 py-2 rounded transition">Add to Cart</button>
                    </div>

                    <div class="border border-gray-100 rounded-lg p-4 text-center hover:shadow-md transition">
                        <div class="bg-gray-100 h-40 rounded-md mb-4 flex items-center justify-center text-4xl text-gray-400">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <h4 class="font-montserrat font-bold text-sm text-navy-800">Activity Workbook</h4>
                        <p class="text-coral-500 font-bold text-sm my-2">$15.00</p>
                        <button onclick="addToCart()" class="bg-navy-800 hover:bg-coral-500 text-white font-montserrat font-semibold text-xs uppercase px-4 py-2 rounded transition">Add to Cart</button>
                    </div>

                    <div class="border border-gray-100 rounded-lg p-4 text-center hover:shadow-md transition">
                        <div class="bg-gray-100 h-40 rounded-md mb-4 flex items-center justify-center text-4xl text-gray-400">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                        <h4 class="font-montserrat font-bold text-sm text-navy-800">Kids Backpack</h4>
                        <p class="text-coral-500 font-bold text-sm my-2">$35.00</p>
                        <button onclick="addToCart()" class="bg-navy-800 hover:bg-coral-500 text-white font-montserrat font-semibold text-xs uppercase px-4 py-2 rounded transition">Add to Cart</button>
                    </div>

                    <div class="border border-gray-100 rounded-lg p-4 text-center hover:shadow-md transition">
                        <div class="bg-gray-100 h-40 rounded-md mb-4 flex items-center justify-center text-4xl text-gray-400">
                            <i class="fa-solid fa-palette"></i>
                        </div>
                        <h4 class="font-montserrat font-bold text-sm text-navy-800">Art Supply Kit</h4>
                        <p class="text-coral-500 font-bold text-sm my-2">$20.00</p>
                        <button onclick="addToCart()" class="bg-navy-800 hover:bg-coral-500 text-white font-montserrat font-semibold text-xs uppercase px-4 py-2 rounded transition">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= CONTACT PAGE CONTENT ================= -->
        <div id="page-contact" class="page-view hidden py-16 bg-slate-50">
            <div class="max-w-4xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h1 class="font-montserrat text-3xl font-bold text-navy-800 uppercase">Contact Us</h1>
                    <p class="text-sm text-gray-500 mt-2">Get in touch with Enfant Primary School admissions</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
                    <form onsubmit="alert('Thank you for contacting us!'); return false;" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-montserrat font-bold text-navy-800 uppercase mb-2">Parent's Name</label>
                                <input type="text" required placeholder="John Doe" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-xs focus:outline-none focus:border-coral-500">
                            </div>
                            <div>
                                <label class="block text-xs font-montserrat font-bold text-navy-800 uppercase mb-2">Email Address</label>
                                <input type="email" required placeholder="john@example.com" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-xs focus:outline-none focus:border-coral-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-montserrat font-bold text-navy-800 uppercase mb-2">Subject</label>
                            <input type="text" required placeholder="Inquiry about enrollment" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-xs focus:outline-none focus:border-coral-500">
                        </div>

                        <div>
                            <label class="block text-xs font-montserrat font-bold text-navy-800 uppercase mb-2">Message</label>
                            <textarea rows="5" required placeholder="Tell us about your child and desired entry grade..." class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-xs focus:outline-none focus:border-coral-500"></textarea>
                        </div>

                        <button type="submit" class="bg-coral-500 hover:bg-coral-600 text-white font-montserrat font-bold text-xs uppercase px-8 py-3 rounded-full transition">Send Message</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ================= ABOUT PAGE CONTENT ================= -->
        <div id="page-about" class="page-view hidden py-16 bg-white">
            <div class="max-w-5xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h1 class="font-montserrat text-3xl font-bold text-navy-800 uppercase">About Enfant School</h1>
                    <p class="text-sm text-gray-500 mt-2">Nurturing young minds for over 20 years</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                    <div>
                        <h2 class="font-montserrat font-bold text-xl text-navy-800 uppercase mb-4">Our Mission</h2>
                        <p class="text-xs text-gray-500 leading-relaxed mb-4">
                            At Enfant Primary School, we are committed to building a joyful, inclusive, and stimulating environment where every child feels valued, confident, and motivated to learn.
                        </p>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Our holistic approach balances academic fundamentals with creative arts, physical activities, and personal growth.
                        </p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop" class="rounded-xl shadow-md" alt="About Enfant">
                </div>
            </div>
        </div>

    </main>

    <!-- 8. NEWSLETTER SUBSCRIBE BANNER -->
    <section class="chevron-top-bg py-12 border-t border-gray-100">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-center gap-6 text-center md:text-left">
                <!-- Envelope Icon Badge -->
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-coral-500 text-2xl shadow-sm border border-gray-100 shrink-0">
                    <i class="fa-regular fa-envelope-open text-coral-500"></i>
                </div>
                
                <!-- Heading & Input Form -->
                <div class="flex-grow max-w-xl w-full">
                    <h3 class="font-montserrat font-bold text-navy-800 text-xl text-center mb-4">Want to Hear From Us?</h3>
                    <form onsubmit="alert('Thank you for signing up!'); return false;" class="flex flex-col sm:flex-row items-center gap-2">
                        @csrf
                        <input type="email" required placeholder="Your email address" class="w-full bg-white text-xs border border-gray-200 rounded-full px-5 py-3 focus:outline-none focus:border-coral-500 shadow-sm text-gray-600">
                        <button type="submit" class="w-full sm:w-auto bg-coral-500 hover:bg-coral-600 text-white font-montserrat font-bold text-xs uppercase px-8 py-3 rounded-full shadow-sm transition shrink-0">SIGN UP</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. 3-COLUMN FOOTER & SOCIAL LINKS -->
    <footer class="bg-navy-800 text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                
                <!-- Column 1: About Us -->
                <div>
                    <h4 class="font-montserrat font-bold text-xs uppercase tracking-wider mb-6 text-white relative inline-block">
                        ABOUT US
                        <span class="block w-6 h-[2px] bg-coral-500 mt-1"></span>
                    </h4>
                    <p class="text-xs text-gray-300 leading-relaxed mb-6">
                        Unum qualisque quo in, per probo definitiones no. His suas rebum menandri in, debet voluptatum mel ne. At suas similique definitiones est, vim ea tempor perpetua.
                    </p>
                    <a href="{{ route('home') }}" class="font-montserrat text-2xl font-extrabold tracking-tight text-white inline-block">
                        enfant<span class="text-coral-500">.</span>
                        <span class="block font-normal text-[9px] tracking-normal text-gray-400 uppercase -mt-1">primary school</span>
                    </a>
                </div>

                <!-- Column 2: Recent Posts -->
                <div>
                    <h4 class="font-montserrat font-bold text-xs uppercase tracking-wider mb-6 text-white relative inline-block">
                        RECENT POSTS
                        <span class="block w-6 h-[2px] bg-coral-500 mt-1"></span>
                    </h4>
                    <div class="space-y-4">
                        @forelse($posts->take(3) as $post)
                            <div class="flex items-center space-x-3 group cursor-pointer">
                                <img src="{{ $post->image ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=150&auto=format&fit=crop' }}" class="w-12 h-12 object-cover rounded-sm shrink-0" alt="{{ $post->title }}">
                                <div>
                                    <h5 class="font-montserrat text-xs font-semibold text-gray-200 group-hover:text-coral-500 transition line-clamp-2">{{ $post->title }}</h5>
                                    <span class="text-[11px] font-bold text-coral-500 font-montserrat">{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('d') }} <span class="text-[9px] text-gray-400 font-semibold uppercase">/ {{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('F') }}</span></span>
                                </div>
                            </div>
                        @empty
                            <p class="text-xs text-gray-400">No posts yet.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Column 3: Our Features -->
                <div>
                    <h4 class="font-montserrat font-bold text-xs uppercase tracking-wider mb-6 text-white relative inline-block">
                        OUR FEATURES
                        <span class="block w-6 h-[2px] bg-coral-500 mt-1"></span>
                    </h4>
                    <p class="text-xs text-gray-300 leading-relaxed mb-4">
                        At suas similique definitiones est, vim ea tempor perpetua.
                    </p>
                    <ul class="space-y-2 text-xs text-gray-300 font-medium">
                        <li class="flex items-center space-x-2">
                            <i class="fa-regular fa-circle-check text-white text-xs"></i>
                            <span>Friendly clean design</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fa-regular fa-circle-check text-white text-xs"></i>
                            <span>Ultra responsive design</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fa-regular fa-circle-check text-white text-xs"></i>
                            <span>Pleasant colors</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Social Icons & Copyright Bar -->
        <div class="bg-white py-6 border-t border-gray-100 text-center">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-navy-800 hover:bg-coral-500 hover:text-white transition shadow-sm"><i class="fa-brands fa-facebook-f text-xs"></i></a>
                <a href="#" aria-label="YouTube" class="w-9 h-9 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-navy-800 hover:bg-coral-500 hover:text-white transition shadow-sm"><i class="fa-brands fa-youtube text-xs"></i></a>
                <a href="#" aria-label="Twitter" class="w-9 h-9 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-navy-800 hover:bg-coral-500 hover:text-white transition shadow-sm"><i class="fa-brands fa-twitter text-xs"></i></a>
                <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-navy-800 hover:bg-coral-500 hover:text-white transition shadow-sm"><i class="fa-brands fa-linkedin-in text-xs"></i></a>
            </div>
            <p class="text-[11px] text-gray-400">
                © {{ date('Y') }} Enfant Primary School crafted with <i class="fa-solid fa-heart text-coral-500 text-[10px]"></i>
            </p>
        </div>
    </footer>

    <!-- INTERACTIVE JAVASCRIPT LOGIC -->
    <script>
        // Mobile Menu Drawer Toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Search Modal Toggle
        function toggleSearchModal() {
            const modal = document.getElementById('search-modal');
            modal.classList.toggle('hidden');
        }

        // Cart Item Counter
        let cartCount = 0;
        function addToCart() {
            cartCount++;
            document.getElementById('cart-counter').innerText = cartCount;
            alert('Item added to cart!');
        }

        // Enrollment Step State Management
        let currentStep = 2;

        function updateStepUI() {
            for (let i = 1; i <= 4; i++) {
                const circle = document.getElementById(`step-circle-${i}`);
                if (circle) {
                    if (i === currentStep) {
                        circle.className = "w-12 h-12 rounded-full bg-coral-500 text-white font-montserrat font-bold text-lg flex items-center justify-center mx-auto mb-4 shadow-md transition duration-300 transform scale-110";
                    } else {
                        circle.className = "w-12 h-12 rounded-full bg-navy-800 text-white font-montserrat font-bold text-lg flex items-center justify-center mx-auto mb-4 shadow-md transition duration-300";
                    }
                }
            }
        }

        function setActiveStep(stepNum) {
            currentStep = stepNum;
            updateStepUI();
        }

        function nextStep() {
            if (currentStep < 4) {
                currentStep++;
                updateStepUI();
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateStepUI();
            }
        }

        function scrollToEnroll() {
            const section = document.getElementById('enrollment-section');
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Single Page Router / Page Switcher
        function switchPage(pageId) {
            const pages = document.querySelectorAll('.page-view');
            pages.forEach(page => page.classList.add('hidden'));

            const targetPage = document.getElementById(`page-${pageId}`) || document.getElementById('page-home');
            targetPage.classList.remove('hidden');

            mobileMenu.classList.add('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });

            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => link.classList.remove('text-coral-500'));
            const activeNav = document.getElementById(`nav-${pageId}`);
            if (activeNav) {
                activeNav.classList.add('text-coral-500');
            }
        }
    </script>

</body>
</html>