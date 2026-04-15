<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام القبول الذكي | لوحة الإدارة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Tajawal', sans-serif; 
            background: #f8fafc;
            background-image: 
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.05) 0, transparent 50%), 
                radial-gradient(at 50% 0%, rgba(99, 102, 241, 0.05) 0, transparent 50%);
            min-height: 100vh;
        }

        /* تحسين مظهر الهيدر الزجاجي */
        .nav-glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            right: 0;
            width: 0;
            height: 2px;
            background: #2563eb;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* تنسيق التنبيهات */
        .alert-pop {
            animation: slideIn 0.5s ease forwards;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="antialiased">

    <nav class="nav-glass py-4 px-6 mb-8">
        <div class="container mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-10V4m0 10V4m-2 4h4" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-black text-slate-800 text-lg leading-none italic uppercase tracking-tighter">Luminate</span>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Admin Portal</span>
                </div>
            </div>

            <div class="flex items-center gap-8">
                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-slate-600 font-bold text-sm hover:text-blue-600 transition-colors">الرئيسية</a>
                    <a href="#" class="nav-link text-slate-600 font-bold text-sm hover:text-blue-600 transition-colors">الطلاب</a>
                    <a href="#" class="nav-link text-slate-600 font-bold text-sm hover:text-blue-600 transition-colors">التقارير</a>
                </div>
                
                <div class="h-6 w-[1px] bg-slate-200 mx-2"></div>

                <a href="{{ route('admin.logout') }}" class="flex items-center gap-2 px-5 py-2.5 bg-rose-50 text-rose-600 font-black rounded-xl hover:bg-rose-600 hover:text-white transition-all duration-300 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="text-xs">خروج</span>
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 pb-12">
        
        @if(session('success'))
            <div class="alert-pop max-w-2xl mx-auto mb-8 flex items-center gap-3 bg-emerald-50 border border-emerald-100 p-4 rounded-2xl shadow-sm">
                <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <p class="text-emerald-800 font-black text-sm">تمت العملية بنجاح!</p>
                    <p class="text-emerald-600 text-xs font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="content-wrapper">
            @yield('content')
        </div>

    </main>

    <footer class="text-center py-8 border-t border-slate-100">
        <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em]">Smart Admission System &copy; 2026</p>
    </footer>

</body>
</html>