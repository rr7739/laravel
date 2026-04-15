<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقديم الطلب | نظام القبول الإلكتروني</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Tajawal', sans-serif; 
            /* خلفية متدرجة احترافية ناعمة */
            background: linear-gradient(135deg, #e0e7ff 0%, #f1f5f9 50%, #dcfce7 100%);
            background-attachment: fixed;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
        }

        .input-style {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            color: #1e293b;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-style:focus {
            background: #ffffff;
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
            transform: translateY(-1px);
        }

        /* تحسين مظهر الـ Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 10px; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4 md:p-8">

<div class="glass-card p-8 md:p-12 rounded-[3rem] w-full max-w-2xl my-6 relative overflow-hidden">
    
    <div class="absolute -top-10 -left-10 w-32 h-32 bg-blue-400/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-indigo-400/10 rounded-full blur-3xl"></div>

    <div class="text-center mb-10 relative">
        <div class="w-20 h-20 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-3xl flex items-center justify-center shadow-2xl shadow-blue-200 mx-auto mb-6 transform rotate-3">
            <span class="text-white text-4xl -rotate-3">📝</span>
        </div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">تقديم طلب الالتحاق</h2>
        <p class="text-slate-500 mt-2 font-medium">خطوة واحدة تفصلك عن مستقبلك المشرق</p>
        <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto mt-4 rounded-full"></div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 p-4 rounded-2xl mb-6 flex items-center gap-3 font-bold animate-bounce">
            <span>✅</span>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500/10 border border-red-500/20 text-red-600 p-4 rounded-2xl mb-6">
            <ul class="list-disc pr-5 space-y-1 text-sm font-bold">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('student.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block mb-2 text-sm font-bold text-slate-700 mr-2">الاسم الكامل (English)</label>
                <input type="text" name="name" required class="input-style w-full px-6 py-4 rounded-2xl font-bold" 
                pattern="[A-Za-z\s]+" placeholder="John Doe">
            </div>

            <div>
                <label class="block mb-2 text-sm font-bold text-slate-700 mr-2">رقم الهاتف</label>
                <input type="tel" name="phone" required class="input-style w-full px-6 py-4 rounded-2xl font-bold" 
                pattern="^7[7-9][0-9]{7}$" placeholder="777 000 000">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block mb-2 text-sm font-bold text-slate-700 mr-2">رقم الجلوس / الهوية</label>
                <input type="number" name="id_number" required class="input-style w-full px-6 py-4 rounded-2xl font-bold text-right" placeholder="000-00-000">
            </div>

            <div>
                <label class="block mb-2 text-sm font-bold text-slate-700 mr-2">البريد الإلكتروني</label>
                <input type="email" name="email" required class="input-style w-full px-6 py-4 rounded-2xl font-bold text-left" placeholder="mail@domain.com">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block mb-2 text-sm font-bold text-slate-700 mr-2">كلمة المرور</label>
                <input type="password" name="password" required class="input-style w-full px-6 py-4 rounded-2xl font-bold" placeholder="••••••••">
            </div>

            <div>
                <label class="block mb-2 text-sm font-bold text-slate-700 mr-2">التخصص المطلوب</label>
                <div class="relative">
                    <select name="major" required class="input-style w-full px-6 py-4 rounded-2xl font-black cursor-pointer appearance-none bg-white">
                        <option value="" class="text-slate-400">-- حدد التخصص --</option>
                        <option value="IT">IT - تقنية المعلومات</option>
                        <option value="Cyber">الأمن السيبراني</option>
                        <option value="AI">الذكاء الاصطناعي</option>
                        <option value="Graphics">الجرافيكس</option>
                        <option value="Decor">الديكور</option>
                    </select>
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-4">
            <h4 class="text-indigo-600 font-black text-xs uppercase tracking-[0.2em] mb-4 flex items-center gap-2">
                <span class="w-8 h-px bg-indigo-200"></span>
                المرفقات الرسمية
            </h4>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <label class="group flex flex-col items-center justify-center p-5 border-2 border-dashed border-slate-200 rounded-3xl hover:border-blue-500 hover:bg-blue-50/50 transition-all cursor-pointer">
                    <span class="text-3xl mb-2 group-hover:scale-110 transition-transform">📸</span>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-tighter">الصورة الشخصية</span>
                    <input type="file" name="photo" accept="image/*" required class="hidden">
                </label>

                <label class="group flex flex-col items-center justify-center p-5 border-2 border-dashed border-slate-200 rounded-3xl hover:border-blue-500 hover:bg-blue-50/50 transition-all cursor-pointer">
                    <span class="text-3xl mb-2 group-hover:scale-110 transition-transform">📂</span>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-tighter">ملف البوابة</span>
                    <input type="file" name="portal_file" accept=".pdf,.doc,.docx" required class="hidden">
                </label>

                <label class="group flex flex-col items-center justify-center p-5 border-2 border-dashed border-slate-200 rounded-3xl hover:border-blue-500 hover:bg-blue-50/50 transition-all cursor-pointer">
                    <span class="text-3xl mb-2 group-hover:scale-110 transition-transform">📜</span>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-tighter">الشهادة الثانوية</span>
                    <input type="file" name="certificate" accept="image/*,.pdf" required class="hidden">
                </label>
            </div>
        </div>

        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-indigo-700 text-white font-black py-5 rounded-3xl shadow-2xl shadow-indigo-200 hover:shadow-indigo-400 transform hover:-translate-y-1.5 transition-all active:scale-95 mt-6 text-xl tracking-wide">
            إرسال الملف الآن 🚀
        </button>
    </form>
    
    <div class="text-center mt-10 text-slate-400 text-xs font-bold tracking-widest uppercase">
        نظام القبول الذكي &copy; 2026
    </div>
</div>

</body>
</html>