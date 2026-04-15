<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    // عرض نموذج التقديم
    public function showForm()
    {
        return view('student.join'); // صفحة الانضمام
    }

    // معالجة بيانات النموذج
    public function submitForm(Request $request)
    {
        // تحقق من الحقول المطلوبة
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:9', // رقم هاتف يمني 9 أرقام
            'id_number' => 'required|numeric',
            'email' => 'required|email|max:255',
            'major' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'portal_file' => 'required|mimes:pdf|max:5120',
            'certificate' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);




        // حفظ الملفات
        $photoPath = $request->file('photo')->store('students/photos', 'public');
        $portalPath = $request->file('portal_file')->store('students/portal', 'public');
        $certPath = $request->file('certificate')->store('students/certificates', 'public');

        $application = Application::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'id_number' => $request->id_number,
            'email' => $request->email,
            'major' => $request->major,
            'role' => 'student',
            'photo' => $photoPath,
            'portal_file' => $portalPath,
            'certificate' => $certPath,
            'status' => 'pending',
            
 ]);
  return redirect()->route('student.status', $application->id);



        // إنشاء كائن جديد للتطبيق
        $application = new Application();
        $application->name = $request->name;
        $application->phone = $request->phone;
        $application->id_number = $request->id_number;
        $application->email = $request->email;
        $application->major = $request->major;
        $application->status = 'pending';
        $application->notes = '';
        $application->role = 'student'; // ✅ ثابت
$application->password = $request->password; // بدون تشفير ( )
        // رفع الملفات
        $photoName = time().'_'.Str::random(10).'.'.$request->photo->extension();
        $request->photo->move(public_path('students/photos'), $photoName);
        $application->photo = 'students/photos/'.$photoName;

        $portalName = time().'_'.Str::random(10).'.'.$request->portal_file->extension();
        $request->portal_file->move(public_path('students/portal'), $portalName);
        $application->portal_file = 'students/portal/'.$portalName;

        $certificateName = time().'_'.Str::random(10).'.'.$request->certificate->extension();
        $request->certificate->move(public_path('students/certificates'), $certificateName);
        $application->certificate = 'students/certificates/'.$certificateName;

        // حفظ البيانات في قاعدة البيانات
        $application->save();

        return redirect()->back()->with('success', 'تم إرسال طلبك بنجاح! سيتم مراجعته من الإدارة.');
    }



   
        // تحويل الطالب لصفحة حالة الطلب
       
    

    // صفحة حالة الطلب
    public function status($id)
    {
        $application = Application::findOrFail($id);
        return view('student.status', compact('application'));
    }

public function showLoginForm()
{
    return view('student.login');
}

public function login(Request $request)
{
    $email = $request->email;
    $password = $request->password;

    $application = \App\Application::where('email', $email)->first();

    if ($application && $application->password === $password) {
        return redirect()->route('student.status', $application->id);
    }

    return back()->with('error', 'Invalid email or password');
}}