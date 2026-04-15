<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام القبول الإلكتروني</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Tajawal', sans-serif; scroll-behavior: smooth; }
       
        .hero-bg {
            background-color: #020617;
            background-image: 
                radial-gradient(at 0% 0%, rgba(30, 64, 175, 0.4) 0, transparent 50%), 
                radial-gradient(at 100% 0%, rgba(79, 70, 229, 0.4) 0, transparent 50%),
                radial-gradient(at 50% 100%, rgba(15, 23, 42, 1) 0, transparent 80%);
            position: relative;
        }

        
        .advanced-glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-shadow:hover {
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.3);
            border-color: rgba(59, 130, 246, 0.5);
        }

    
        .group:hover .icon-bounce {
            transform: translateY(-5px) scale(1.1);
        }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
    </style>
</head>
<body class="bg-[#fcfcfd] text-slate-900">

<header class="fixed top-0 w-full z-[100] backdrop-blur-xl bg-white/70 border-b border-slate-200/50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2 group cursor-pointer">
            <div class="w-10 h-10 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200 group-hover:rotate-12 transition-transform">
                <span class="text-white text-xl">🎓</span>
            </div>
            <h1 class="text-xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-800">
                نظام القبول الجامعي
            </h1>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.login') }}" class="hidden md:flex items-center gap-2 px-6 py-2.5 text-sm font-bold text-slate-700 hover:text-blue-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                دخول الإدارة
            </a>
            <a href="{{ route('student.login.form') }}" class="px-7 py-2.5 text-sm font-extrabold text-white bg-slate-900 rounded-full shadow-xl shadow-slate-200 hover:bg-blue-600 hover:shadow-blue-200 transform hover:-translate-y-0.5 transition-all active:scale-95">
                تسجيل الطلاب
            </a>
        </div>
    </div>
</header>

<section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden hero-bg">
    <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute top-0 -right-4 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    
    <div class="relative z-10 text-center max-w-5xl mx-auto px-6">
        <div class="inline-flex items-center gap-2 px-4 py-2 mb-8 rounded-full advanced-glass border border-white/10 shadow-2xl">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
            </span>
            <span class="text-xs font-bold text-blue-100 uppercase tracking-widest">متاح الآن: تسجيل العام 2026</span>
        </div>
        
        <h2 class="text-5xl md:text-7xl font-black mb-8 text-white leading-[1.15] drop-shadow-sm">
            ارسم مسارك المهني <br/>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-indigo-300 to-emerald-400">بذكاء واحترافية</span>
        </h2>
        
        <p class="text-lg md:text-xl mb-12 text-slate-300 leading-relaxed max-w-3xl mx-auto font-light">
            منصة متكاملة تسهل لك عملية التقديم على أرقى التخصصات الجامعية <br class="hidden md:block"/> بخطوات بسيطة، ذكية، ومن مكانك.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
            <a href="#majors" class="group relative px-10 py-5 bg-white text-blue-900 rounded-2xl font-black text-lg overflow-hidden transition-all hover:scale-105 active:scale-95">
                <span class="relative z-10">استكشف التخصصات</span>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-indigo-50 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </a>
            <a href="{{ route('student.join') }}" class="px-10 py-5 bg-blue-600/10 border border-blue-400/30 text-white rounded-2xl font-bold text-lg backdrop-blur-md hover:bg-blue-600 transition-all active:scale-95">
                تقديم طلب جديد
            </a>
        </div>
    </div>
</section>
<section class="relative z-30 -mt-16 px-6">
    <div class="max-w-5xl mx-auto">
        <br/> 
        <div class="text-center mb-6">
            <h3 class="text-sm font-black text-white/80 uppercase tracking-[0.3em] flex items-center justify-center gap-3">
                <span class="w-8 h-[1px] bg-blue-500/50"></span>
                متطلبات التسجيل
                <span class="w-8 h-[1px] bg-blue-500/50"></span>
            </h3>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            
            <div class="bg-white/90 backdrop-blur-md p-5 rounded-[1.5rem] border border-white shadow-lg flex flex-col items-center text-center group hover:bg-blue-600 transition-all duration-300">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center mb-3 group-hover:bg-white/20 transition-all">
                    <span class="text-xl">📸</span>
                </div>
                <h4 class="text-xs font-black text-slate-800 group-hover:text-white transition-colors">صورة شخصية</h4>
                <p class="text-[9px] text-slate-400 mt-1 group-hover:text-blue-100 font-bold uppercase tracking-tighter">خلفية بيضاء</p>
            </div>

            <div class="bg-white/90 backdrop-blur-md p-5 rounded-[1.5rem] border border-white shadow-lg flex flex-col items-center text-center group hover:bg-indigo-600 transition-all duration-300">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center mb-3 group-hover:bg-white/20 transition-all">
                    <span class="text-xl">📜</span>
                </div>
                <h4 class="text-xs font-black text-slate-800 group-hover:text-white transition-colors">شهادة الثانوية</h4>
                <p class="text-[9px] text-slate-400 mt-1 group-hover:text-indigo-100 font-bold uppercase tracking-tighter">نسخة الأصل</p>
            </div>

            <div class="bg-white/90 backdrop-blur-md p-5 rounded-[1.5rem] border border-white shadow-lg flex flex-col items-center text-center group hover:bg-blue-600 transition-all duration-300">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center mb-3 group-hover:bg-white/20 transition-all">
                    <span class="text-xl">🆔</span>
                </div>
                <h4 class="text-xs font-black text-slate-800 group-hover:text-white transition-colors">رقم الجلوس</h4>
                <p class="text-[9px] text-slate-400 mt-1 group-hover:text-blue-100 font-bold uppercase tracking-tighter">للتوثيق</p>
            </div>

            <div class="bg-white/90 backdrop-blur-md p-5 rounded-[1.5rem] border border-white shadow-lg flex flex-col items-center text-center group hover:bg-indigo-600 transition-all duration-300">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center mb-3 group-hover:bg-white/20 transition-all">
                    <span class="text-xl">🌍</span>
                </div>
                <h4 class="text-xs font-black text-slate-800 group-hover:text-white transition-colors">ملف البوابة</h4>
                <p class="text-[9px] text-slate-400 mt-1 group-hover:text-indigo-100 font-bold uppercase tracking-tighter">التنسيق الموحد</p>
            </div>

        </div>
    </div>
</section>

<section id="majors" class="py-32 px-6 max-w-7xl mx-auto">
    <div class="flex flex-col items-center mb-20">
        <div class="inline-block px-4 py-1 rounded-full bg-blue-50 text-blue-600 font-extrabold text-xs mb-4 uppercase tracking-widest border border-blue-100">Future Ready</div>
        <h3 class="text-4xl md:text-5xl font-black text-slate-900 text-center">أقوى التخصصات الأكاديمية</h3>
        <div class="w-20 h-2 bg-gradient-to-r from-blue-600 to-indigo-600 mt-6 rounded-full shadow-lg shadow-blue-200"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

        <div class="group relative bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:border-blue-200 transition-all duration-500 card-shadow">
            <div class="w-20 h-20 bg-blue-50 rounded-3xl flex items-center justify-center mb-8 icon-bounce transition-all duration-300 group-hover:bg-blue-600 group-hover:text-white">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <h4 class="text-2xl font-black mb-4 text-slate-800">تقنية المعلومات</h4>
            <p class="text-slate-500 leading-relaxed mb-8 font-medium">هندسة البرمجيات، تطوير الويب، وإدارة قواعد البيانات بأحدث المعايير.</p>
            <a href="{{ route('student.join') }}" class="inline-flex items-center gap-2 text-blue-600 font-black group-hover:gap-4 transition-all uppercase text-sm tracking-wider">
                انضم للبرنامج
                <span>&larr;</span>
            </a>
        </div>

        <div class="group relative bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:border-red-200 transition-all duration-500 card-shadow">
            <div class="w-20 h-20 bg-red-50 rounded-3xl flex items-center justify-center mb-8 icon-bounce transition-all duration-300 group-hover:bg-red-500 group-hover:text-white">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <h4 class="text-2xl font-black mb-4 text-slate-800">الأمن السيبراني</h4>
            <p class="text-slate-500 leading-relaxed mb-8 font-medium">حماية الفضاء الرقمي، التشفير المتقدم، والتحقيق في الجرائم الإلكترونية.</p>
            <a href="{{ route('student.join') }}" class="inline-flex items-center gap-2 text-red-600 font-black group-hover:gap-4 transition-all uppercase text-sm tracking-wider">
                انضم للبرنامج
                <span>&larr;</span>
            </a>
        </div>

        <div class="group relative bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:border-emerald-200 transition-all duration-500 card-shadow">
            <div class="w-20 h-20 bg-emerald-50 rounded-3xl flex items-center justify-center mb-8 icon-bounce transition-all duration-300 group-hover:bg-emerald-500 group-hover:text-white">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <h4 class="text-2xl font-black mb-4 text-slate-800">الذكاء الاصطناعي</h4>
            <p class="text-slate-500 leading-relaxed mb-8 font-medium">بناء الأنظمة الذكية، تعلم الآلة، ومعالجة اللغات الطبيعية والروبوتات.</p>
            <a href="{{ route('student.join') }}" class="inline-flex items-center gap-2 text-emerald-600 font-black group-hover:gap-4 transition-all uppercase text-sm tracking-wider">
                انضم للبرنامج
                <span>&larr;</span>
            </a>
        </div>

        <div class="group relative bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:border-amber-200 transition-all duration-500 card-shadow">
            <div class="w-20 h-20 bg-amber-50 rounded-3xl flex items-center justify-center mb-8 icon-bounce transition-all duration-300 group-hover:bg-amber-500 group-hover:text-white">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <h4 class="text-2xl font-black mb-4 text-slate-800">هندسة الديكور</h4>
            <p class="text-slate-500 leading-relaxed mb-8 font-medium">تصميم الفراغات، الإضاءة الإبداعية، وفن تحويل المساحات إلى تحف فنية.</p>
            <a href="{{ route('student.join') }}" class="inline-flex items-center gap-2 text-amber-600 font-black group-hover:gap-4 transition-all uppercase text-sm tracking-wider">
                انضم للبرنامج
                <span>&larr;</span>
            </a>
        </div>

        <div class="group relative bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:border-purple-200 transition-all duration-500 card-shadow">
            <div class="w-20 h-20 bg-purple-50 rounded-3xl flex items-center justify-center mb-8 icon-bounce transition-all duration-300 group-hover:bg-purple-600 group-hover:text-white">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <h4 class="text-2xl font-black mb-4 text-slate-800">الجرافيكس</h4>
            <p class="text-slate-500 leading-relaxed mb-8 font-medium">تصميم الهوية البصرية، الرسم الرقمي، والإنتاج الإعلاني الاحترافي.</p>
            <a href="{{ route('student.join') }}" class="inline-flex items-center gap-2 text-purple-600 font-black group-hover:gap-4 transition-all uppercase text-sm tracking-wider">
                انضم للبرنامج
                <span>&larr;</span>
            </a>
        </div>

    </div>
</section>

<footer class="bg-slate-950 text-white py-20 px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start gap-12">
        <div class="max-w-sm">
            <h2 class="text-2xl font-black mb-6">🎓 نظام القبول الذكي</h2>
            <p class="text-slate-400 leading-relaxed mb-8">نحن نؤمن بأن التكنولوجيا هي المفتاح لتبسيط التعليم. انضم إلينا اليوم وابنِ مستقبلك.</p>
            <div class="flex gap-4">
                <div class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors cursor-pointer text-xl">𝕏</div>
                <div class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors cursor-pointer text-xl">f</div>
                <div class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors cursor-pointer text-xl">in</div>
            </div>
        </div>
        
        <div class="grid grid-cols-2 gap-16">
            <div>
                <h5 class="font-black mb-6 uppercase tracking-widest text-sm text-blue-400">المنصة</h5>
                <ul class="space-y-4 text-slate-400 font-medium">
                    <li><a href="#" class="hover:text-white transition-colors">الرئيسية</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">التخصصات</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">الشروط</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-black mb-6 uppercase tracking-widest text-sm text-blue-400">الدعم</h5>
                <ul class="space-y-4 text-slate-400 font-medium">
                    <li><a href="#" class="hover:text-white transition-colors">مركز المساعدة</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">اتصل بنا</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto border-t border-white/5 mt-20 pt-10 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-slate-500 text-sm font-medium">&copy; 2026 نظام القبول الإلكتروني. جميع الحقوق محفوظة.</p>
        <div class="flex gap-8 text-xs font-bold text-slate-500 uppercase tracking-widest">
            <a href="#" class="hover:text-white transition-colors">سياسة الخصوصية</a>
            <a href="#" class="hover:text-white transition-colors">الأحكام</a>
        </div>
    </div>
</footer>

</body>
</html>