@extends('layouts.admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap');
    
    body { 
        background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%);
        font-family: 'Tajawal', sans-serif;
        min-height: 100vh;
    }

    .admin-container {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 1);
        border-radius: 2rem;
        box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.05);
    }

    .tab-btn {
        transition: all 0.3s ease;
        font-weight: 800;
        border-radius: 12px;
    }

    .tab-btn.active {
        background: #2563eb !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
    }

    .table-fakhma {
        width: 100%;
        border-spacing: 0 10px;
        border-collapse: separate;
    }

    .table-fakhma thead tr th {
        color: #64748b;
        font-weight: 900;
        padding: 15px;
    }

    .table-fakhma tbody tr {
        background: white;
        transition: all 0.3s ease;
    }

    .table-fakhma tbody tr td {
        padding: 15px;
        border: none;
    }

    .table-fakhma tbody tr td:first-child { border-radius: 0 15px 15px 0; }
    .table-fakhma tbody tr td:last-child { border-radius: 15px 0 0 15px; }

    .preview-box {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #f1f5f9;
        cursor: pointer;
        transition: 0.3s;
    }

    .pdf-icon {
        background: #fef2f2;
        color: #dc2626;
        padding: 8px;
        border-radius: 10px;
        font-weight: 900;
        font-size: 11px;
    }

    .note-badge {
        background: #fff7ed;
        color: #9a3412;
        border: 1px solid #ffedd5;
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 11px;
        max-width: 150px;
        display: block;
    }
</style>

<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-black text-slate-800 italic">لوحة إدارة الطلاب</h1>
            <div class="h-1 w-20 bg-blue-600 rounded-full mt-2"></div>
        </div>
        <a href="{{ route('admin.logout') }}" class="bg-red-50 text-red-600 px-6 py-3 rounded-2xl font-black hover:bg-red-600 hover:text-white transition-all">تسجيل خروج</a>
    </div>

    <div id="stats" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-blue-600 text-white p-6 rounded-[1.5rem] shadow-xl shadow-blue-200">
            <h3 class="text-sm opacity-80 font-bold">الطلاب الإجمالي</h3>
            <p class="text-3xl font-black mt-1">{{ $totalApplicants }}</p>
        </div>
        <div class="bg-emerald-500 text-white p-6 rounded-[1.5rem] shadow-xl shadow-emerald-200">
            <h3 class="text-sm opacity-80 font-bold">المقبولون</h3>
            <p class="text-3xl font-black mt-1">{{ $totalAccepted }}</p>
        </div>
        <div class="bg-amber-500 text-white p-6 rounded-[1.5rem] shadow-xl shadow-amber-200">
            <h3 class="text-sm opacity-80 font-bold">المعلقة</h3>
            <p class="text-3xl font-black mt-1">{{ $pending->count() }}</p>
        </div>
        <div class="bg-rose-500 text-white p-6 rounded-[1.5rem] shadow-xl shadow-rose-200">
            <h3 class="text-sm opacity-80 font-bold">إعادة إرسال</h3>
            <p class="text-3xl font-black mt-1">{{ $resubmitted->count() }}</p>
        </div>
    </div>

    <div class="flex gap-2 mb-6 bg-white/50 p-2 rounded-2xl w-fit border border-white">
        <button onclick="showTab('pending')" id="btn-pending" class="tab-btn active px-6 py-3 text-slate-600">الطلبات المعلقة</button>
        <button onclick="showTab('resubmitted')" id="btn-resubmitted" class="tab-btn px-6 py-3 text-slate-600">إعادة الإرسال</button>
        <button onclick="showTab('acceptedTab')" id="btn-acceptedTab" class="tab-btn px-6 py-3 text-slate-600">المقبولون</button>
    </div>

    <div class="admin-container p-6">
        @php $tabs = ['pending' => $pending, 'resubmitted' => $resubmitted, 'acceptedTab' => $accepted]; @endphp

        @foreach($tabs as $id => $data)
        <div id="{{ $id }}" class="tab-content {{ $id == 'pending' ? '' : 'hidden' }}">
            <h2 class="text-xl font-black text-slate-800 mb-6">قائمة الطلاب ({{ $id == 'acceptedTab' ? 'المقبولون' : ($id == 'resubmitted' ? 'طلبات معدلة' : 'جديدة') }})</h2>
            
            <div class="overflow-x-auto">
                <table class="table-fakhma">
                    <thead>
                        <tr>
                            <th class="text-right">الطالب</th>
                            @if($id == 'pending') <th class="text-right">تاريخ التسجيل</th> @endif
                            @if($id == 'resubmitted') <th class="text-right">سبب الرفض السابق</th> @endif
                            <th class="text-right">التخصص</th>
                            <th class="text-right">الشخصية</th>
                            <th class="text-right">الشهادة</th>
                            <th class="text-right">ملف البوابة</th>
                            <th class="text-right">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $student)
                        <tr>
                            <td>
                                <div class="font-black text-slate-800">{{ $student->name }}</div>
                                <div class="text-xs text-slate-400 font-bold">{{ $student->phone }}</div>
                            </td>

                            @if($id == 'pending')
                            <td>
                                <span class="text-xs font-bold text-slate-500">{{ $student->created_at->format('Y-m-d') }}</span>
                            </td>
                            @endif

                            @if($id == 'resubmitted')
                            <td>
                                <span class="note-badge">{{ $student->notes ?? 'لا توجد ملاحظات' }}</span>
                            </td>
                            @endif

                            <td><span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-xs font-black">{{ $student->major }}</span></td>
                            
                            <td><img src="{{ asset('storage/'.$student->photo) }}" onclick="window.open(this.src)" class="preview-box"></td>
                            <td><img src="{{ asset('storage/'.$student->certificate) }}" onclick="window.open(this.src)" class="preview-box"></td>
                            <td><a href="{{ asset('storage/'.$student->portal_file) }}" target="_blank" class="pdf-icon">📄 عرض الملف</a></td>

                            <td>
                                @if($id != 'acceptedTab')
                                <div class="flex gap-2">
                                    <form action="{{ route('admin.accept', $student->id) }}" method="POST">
                                        @csrf
                                        <button class="bg-emerald-500 text-white px-4 py-2 rounded-xl text-xs font-black hover:bg-emerald-600">قبول</button>
                                    </form>
                                    <button onclick="showRejectModal('{{ $student->id }}')" class="bg-slate-100 text-slate-600 px-4 py-2 rounded-xl text-xs font-black hover:bg-rose-500 hover:text-white">رفض</button>
                                </div>
                                @else
                                <span class="text-emerald-500 font-black text-xs">تم القبول ✅</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div id="rejectModal" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-[100]">
    <div class="bg-white p-8 rounded-[2rem] w-full max-w-md shadow-2xl">
        <h3 class="text-2xl font-black mb-4">سبب الرفض</h3>
        <form id="rejectForm" method="POST">
            @csrf
            <textarea name="notes" class="w-full bg-slate-50 border-none rounded-2xl p-4 mb-4 focus:ring-2 focus:ring-blue-500" placeholder="اكتب السبب هنا..." required></textarea>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeRejectModal()" class="px-6 py-3 font-bold text-slate-400">إلغاء</button>
                <button type="submit" class="px-8 py-3 bg-red-600 text-white rounded-2xl font-black shadow-lg shadow-red-200">إرسال الملاحظة</button>
            </div>
        </form>
    </div>
</div>

<script>
function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.getElementById(tabId).classList.remove('hidden');
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    document.getElementById('btn-' + tabId).classList.add('active');
}

function showRejectModal(id) {
    document.getElementById('rejectModal').classList.remove('hidden');
    document.getElementById('rejectForm').action = '/admin/reject/' + id;
}

function closeRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden');
}
</script>
@endsection