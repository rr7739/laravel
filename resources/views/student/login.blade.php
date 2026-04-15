<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول الطالب | بوابة القبول</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Tajawal', sans-serif; 
            background: linear-gradient(135deg, #f0f4ff 0%, #f8fafc 50%, #eef2ff 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* الخلفية المموجة/المخططة */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: -1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 1);
            box-shadow: 0 25px 50px -12px rgba(59, 130, 246, 0.15);
            border-radius: 2.5rem;
        }

        .input-field {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: #3b82f6;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
            transform: translateY(-1px);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 20px -3px rgba(37, 99, 235, 0.4);
            filter: brightness(1.1);
        }
    </style>
</head>
<body class="p-6">

<div class="login-card w-full max-w-md p-8 md:p-10 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100/50 rounded-full -mr-16 -mt-16 blur-3xl"></div>
    
    <div class="text-center mb-10 relative">
        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg mx-auto mb-4 border border-blue-50">
            <span class="text-3xl">🔑</span>
        </div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">تسجيل الدخول</h2>
        <p class="text-slate-500 mt-2 font-medium">مرحباً بك مجدداً في بوابة الطالب</p>
    </div>

    @if(session('error'))
        <div class="bg-red-50 border border-red-100 text-red-600 p-4 rounded-2xl mb-6 text-sm font-bold flex items-center gap-2 animate-bounce">
            <span>⚠️</span>
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('student.login') }}" class="space-y-5">
        @csrf

        <div class="relative">
            <label class="block mb-2 text-xs font-black text-slate-500 mr-2 uppercase tracking-widest">البريد الإلكتروني</label>
            <input type="email" name="email" placeholder="example@mail.com" required 
            class="input-field w-full px-6 py-4 rounded-2xl font-medium text-slate-700 placeholder:text-slate-300">
        </div>

        <div class="relative">
            <label class="block mb-2 text-xs font-black text-slate-500 mr-2 uppercase tracking-widest">كلمة المرور</label>
            <input type="password" name="password" placeholder="••••••••" required 
            class="input-field w-full px-6 py-4 rounded-2xl font-medium text-slate-700 placeholder:text-slate-300">
        </div>

        <div class="flex items-center justify-between px-2 pt-1 text-sm">
            <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                <span class="text-slate-500 font-medium group-hover:text-blue-600 transition-colors">تذكرني</span>
            </label>
            <a href="#" class="text-blue-600 font-bold hover:underline">نسيت كلمة المرور؟</a>
        </div>

        <button type="submit" class="btn-gradient w-full text-white font-black py-4 rounded-2xl mt-4 text-lg">
            دخول للمنصة 🚀
        </button>
    </form>

    <div class="mt-8 text-center border-t border-slate-100 pt-6">
        <p class="text-slate-500 font-medium">ليس لديك حساب؟ 
            <a href="{{ route('student.join') }}" class="text-blue-600 font-black hover:text-indigo-600 transition-colors">سجل الآن</a>
        </p>
    </div>
</div>

</body>
</html>