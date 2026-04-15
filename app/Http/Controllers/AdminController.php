<?php
namespace App\Http\Controllers;


use App\Application;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }



    public function login(Request $request)
{
    $email = $request->email;
    $password = $request->password;

    $admin = \App\User::where('email', $email)
                ->where('role','admin')
                ->first();

    if($admin && $admin->password === $password) {
        // تسجيل دخول يدويًا
        \Illuminate\Support\Facades\Auth::login($admin);
        return redirect()->route('admin.dashboard');
    }

    return back()->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة');
}
    public function dashboard()
    {
        // جلب كل الطلاب المسجلين
        $students = \App\User::where('role','student')->get();


    $applications = Application::all(); // جلب كل الطلبات
    
        
    // جلب كل الطلاب المسجلين
    $students = \App\User::where('role','student')->get();

    // جلب الطلبات حسب الحالة
    $pending = \App\Application::where('status', 'pending')->get();
    $resubmitted = \App\Application::where('status', 'resubmitted')->get();
 $accepted = \App\Application::where('status', 'accepted')->get(); // الطلاب المقبولين
    // الإحصائيات
    $totalApplicants = \App\Application::count();
    $totalAccepted = \App\Application::where('status', 'accepted')->count();

    // تمرير كل شيء للـ View
    return view('admin.dashboard', compact('students', 'pending', 'resubmitted','accepted', 'totalApplicants', 'totalAccepted'));
}




  







    // قبول الطلب
    public function accept($id)
    {
        $app = Application::findOrFail($id);
        $app->status = 'accepted';
        $app->notes =  'Your application has been accepted';
        $app->save();

        // هنا يمكن إرسال إشعار للطالب (mail أو notification)
        return back()->with('success', 'تم قبول الطالب');
    }

    // رفض الطلب وطلب إعادة الإرسال
    public function reject(Request $request, $id)
    {
        $app = Application::findOrFail($id);
        $app->status = 'resubmitted';
        $app->notes = $request->notes; // سبب إعادة الإرسال
        $app->save();


// رفض الطلب وطلب إعادة الإر

        return back()->with('success', 'تم إرسال طلب إعادة الإرسال للطالب');
    }

    // تسجيل خروج الإدارة
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}


