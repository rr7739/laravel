<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة الطالب | حالة الطلب</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Tajawal', sans-serif; 
            /* خلفية فاتحة مدرجة */
            background: linear-gradient(135deg, #f0f4ff 0%, #f8fafc 50%, #eef2ff 100%);
            background-attachment: fixed;
            position: relative;
        }

        /* إضافة المخطط الشبكي الفاتح (المموج) */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.04) 1px, transparent 1px);
            background-size: 40px 40px; /* حجم المربعات */
            pointer-events: none;
            z-index: -1;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 1);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }

        .info-item {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            transition: all 0.3s ease;
        }
        
        .info-item:hover {
            border-color: #3b82f6;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.05);
        }

        .shadow-text {
            text-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body class="py-12 px-4 md:px-6">

<div class="max-w-5xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <div class="text-right">
            <h1 class="text-3xl font-black text-slate-800 shadow-text">أهلاً بك، {{ explode(' ', $application->name)[0] }} ✨</h1>
            <p class="text-slate-500 font-medium">تابع تفاصيل طلبك والمستندات المرفقة</p>
        </div>
        <div class="flex gap-3">
            <a href="/" class="px-6 py-2.5 text-sm font-bold text-blue-600 bg-white border border-blue-100 rounded-2xl hover:bg-blue-50 transition-all shadow-sm">الرئيسية</a>
            <button onclick="window.print()" class="px-6 py-2.5 text-sm font-bold text-slate-600 bg-white border border-slate-200 rounded-2xl hover:bg-slate-50 transition-all shadow-sm">طباعة 📄</button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-6">
            <div class="dashboard-card p-8 rounded-[2.5rem]">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">🆔</div>
                    <h3 class="text-xl font-black text-slate-800 italic">المعلومات الشخصية</h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="p-5 rounded-3xl info-item">
                        <span class="text-[10px] font-black text-blue-500 uppercase tracking-widest block mb-1">الاسم بالكامل</span>
                        <p class="text-lg font-bold text-slate-700">{{ $application->name }}</p>
                    </div>
                    <div class="p-5 rounded-3xl info-item">
                        <span class="text-[10px] font-black text-blue-500 uppercase tracking-widest block mb-1">التخصص المطلوب</span>
                        <p class="text-lg font-bold text-slate-700">{{ $application->major }}</p>
                    </div>
                    <div class="p-5 rounded-3xl info-item">
                        <span class="text-[10px] font-black text-blue-500 uppercase tracking-widest block mb-1">حالة الطلب</span>
                        <div class="mt-1">
                            @if($application->status == 'pending')
                                <span class="px-4 py-1.5 rounded-full text-xs font-black bg-amber-50 text-amber-600 border border-amber-100 italic">قيد المراجعة...</span>
                            @elseif($application->status == 'accepted')
                                <span class="px-4 py-1.5 rounded-full text-xs font-black bg-emerald-50 text-emerald-600 border border-emerald-100 italic">تم القبول بنجاح ✅</span>
                            @else
                                <span class="px-4 py-1.5 rounded-full text-xs font-black bg-red-50 text-red-600 border border-red-100 italic">مرفوض / تعديل ⚠️</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-5 rounded-3xl info-item">
                        <span class="text-[10px] font-black text-blue-500 uppercase tracking-widest block mb-1">ملاحظات الإدارة</span>
                        <p class="text-sm font-bold text-slate-600">{{ $application->notes ?: 'لا توجد ملاحظات مضافة.' }}</p>
                    </div>
                </div>

                <div class="mt-8 p-6 rounded-[2rem] text-center border-2 border-dashed {{ $application->status == 'accepted' ? 'bg-emerald-50 border-emerald-200 text-emerald-700' : ($application->status == 'resubmitted' ? 'bg-orange-50 border-orange-200 text-orange-700' : 'bg-blue-50 border-blue-200 text-blue-700') }}">
                    <p class="text-lg font-black tracking-tight">
                        @if($application->status == 'accepted')
                             مبارك لك! تم قبولك رسمياً في جامعتنا.
                        @elseif($application->status == 'resubmitted')
                            يجب عليك تحديث بياناتك وفقاً للملاحظات أعلاه.
                        @else
                            طلبك حالياً لدى لجنة الفحص، سيتم إشعارك قريباً.
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="dashboard-card p-6 rounded-[2.5rem]">
                <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center gap-2">
                    <span class="w-1.5 h-5 bg-blue-600 rounded-full"></span>
                    المرفقات
                </h3>
                
                <div class="space-y-4">
                    <div class="group relative overflow-hidden rounded-3xl border-2 border-slate-50 hover:border-blue-400 transition-all cursor-pointer shadow-sm">
                        <a href="{{ asset('storage/' . $application->photo) }}" target="_blank">
                            <img src="{{ asset('storage/' . $application->photo) }}" class="w-full h-44 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-white/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-all">
                                <span class="bg-white px-4 py-2 rounded-xl text-xs font-black text-blue-600 shadow-xl">توسيع 🔍</span>
                            </div>
                        </a>
                    </div>

                    <div class="group relative overflow-hidden rounded-3xl border-2 border-slate-50 hover:border-blue-400 transition-all cursor-pointer shadow-sm">
                        <a href="{{ asset('storage/' . $application->certificate) }}" target="_blank">
                            <img src="{{ asset('storage/' . $application->certificate) }}" class="w-full h-28 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-white/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-all">
                                <span class="bg-white px-4 py-2 rounded-xl text-xs font-black text-blue-600 shadow-xl">عرض الشهادة 🔍</span>
                            </div>
                        </a>
                    </div>

                    <a href="{{ asset('storage/' . $application->portal_file) }}" target="_blank" class="flex items-center gap-4 p-4 rounded-3xl bg-blue-600 text-white hover:bg-blue-700 transition-all group shadow-lg shadow-blue-200">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center text-xl group-hover:rotate-12 transition-transform">📂</div>
                        <div class="flex flex-col">
                            <span class="text-sm font-black italic">ملف البوابة</span>
                            <span class="text-[9px] font-bold opacity-80">OPEN PDF DOCUMENT</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>