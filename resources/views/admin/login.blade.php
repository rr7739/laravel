<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول الإدارة | لوحة التحكم</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Tajawal', sans-serif; 
            /* تدرج لوني مشرق وهادئ */
            background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* المربعات المموجة المضيئة */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.03) 1.5px, transparent 1.5px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.03) 1.5px, transparent 1.5px);
            background-size: 45px 45px;
            z-index: -1;
        }

        .admin-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 1);
            box-shadow: 0 25px 50px -12px rgba(59, 130, 246, 0.08);
            border-radius: 2.5rem;
        }

        .input-box {
            background: #ffffff;
            border: 1.5px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        .input-box:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.05);
            outline: none;
        }

        .btn-admin {
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 20px -5px rgba(37, 99, 235, 0.3);
            filter: brightness(1.1);
        }
    </style>
</head>
<body class="p-6">

<div class="admin-card w-full max-w-md p-8 md:p-12 relative overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-40 h-1 bg-gradient-to-r from-transparent via-blue-500/20 to-transparent"></div>

    <div class="text-center mb-10">
        <div class="w-20 h-20 bg-blue-50 rounded-3xl flex items-center justify-center mx-auto mb-5 shadow-inner border border-blue-100/50">
            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-3.652A12.035 12.035 0 0111 11.466V11a3 3 0 00-6 0v.466a12.035 12.035 0 014.444 6.426m4.556-3.426a12.05 12.05 0 01-4.556-6.426V11a3 3 0 006 0v.466a12.035 12.035 0 01-4.444 6.426z"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-black text-slate-800 tracking-tight italic">لوحة الإدارة</h2>
        <p class="text-sm text-slate-500 mt-2 font-medium">نظام القبول الموحد | الدخول الآمن</p>
    </div>

    @if(session('error'))
        <div class="bg-red-50 border border-red-100 text-red-600 p-4 rounded-2xl mb-6 text-xs font-bold flex items-center gap-2">
            <span>❌</span>
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
        @csrf
        
        <div class="space-y-2">
            <label class="block text-xs font-black text-slate-500 mr-2 uppercase tracking-tighter italic">البريد الرسمي</label>
            <div class="relative">
                <input type="email" name="email" required placeholder="admin@system.com" 
                class="input-box w-full px-6 py-4 rounded-2xl text-slate-700 font-medium placeholder:text-slate-300">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-black text-slate-500 mr-2 uppercase tracking-tighter italic">كلمة المرور</label>
            <div class="relative">
                <input type="password" name="password" required placeholder="••••••••" 
                class="input-box w-full px-6 py-4 rounded-2xl text-slate-700 font-medium placeholder:text-slate-300">
            </div>
        </div>

        <button type="submit" class="btn-admin w-full text-white font-black py-4 rounded-2xl text-lg mt-4">
            تسجيل الدخول
        </button>
    </form>

    <div class="mt-10 text-center">
        <a href="/" class="text-xs font-bold text-slate-400 hover:text-blue-600 transition-colors uppercase tracking-widest flex items-center justify-center gap-2">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            العودة للموقع
        </a>
    </div>
</div>

</body>
</html>