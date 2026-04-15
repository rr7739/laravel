<table class="min-w-full border border-gray-300 mb-8">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-2 border">الاسم</th>
            <th class="p-2 border">البريد الإلكتروني</th>
            <th class="p-2 border">الهاتف</th>
            <th class="p-2 border">الهوية</th>
            <th class="p-2 border">التخصص</th>
            <th class="p-2 border">صورة</th>
            <th class="p-2 border">ملف البوابة</th>
            <th class="p-2 border">الشهادة</th>
            <th class="p-2 border">الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $app)
        <tr>
            <td class="p-2 border">{{ $app->name }}</td>
            <td class="p-2 border">{{ $app->email }}</td>
            <td class="p-2 border">{{ $app->phone }}</td>
            <td class="p-2 border">{{ $app->id_number }}</td>
            <td class="p-2 border">{{ $app->major }}</td>
            <td class="p-2 border">
                <a href="{{ asset($app->photo) }}" target="_blank">
                    <img src="{{ asset($app->photo) }}" class="w-16 h-16 object-cover rounded" alt="photo">
                </a>
            </td>
            <td class="p-2 border">
                <a href="{{ asset($app->portal_file) }}" target="_blank">فتح الملف</a>
            </td>
            <td class="p-2 border">
                <a href="{{ asset($app->certificate) }}" target="_blank">فتح الملف</a>
            </td>
            <td class="p-2 border flex gap-2">
                <form method="POST" action="{{ route('admin.accept', $app->id) }}">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">قبول</button>
                </form>
                <button onclick="showRejectModal({{ $app->id }})" class="bg-red-500 text-white px-3 py-1 rounded">رفض</button>
            </td>
        </tr>



        
        @endforeach
    </tbody>
</table>

<table class="w-full border">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Photo</th>
            <th>Portal File</th>
            <th>Certificate</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $app)
        <tr>
            <td>{{ $app->name }}</td>
            <td>{{ $app->email }}</td>
            <td>{{ $app->major }}</td>
            <td>
                <a href="{{ asset($app->photo) }}" target="_blank">View</a>
            </td>
            <td>
                <a href="{{ asset($app->portal_file) }}" target="_blank">View</a>
            </td>
            <td>
                <a href="{{ asset($app->certificate) }}" target="_blank">View</a>
            </td>
            <td>{{ $app->status }}</td>
            <td class="flex gap-2">
                <form method="POST" action="{{ route('admin.accept', $app->id) }}">
                    @csrf
                    <button type="submit" class="bg-green-500 px-2 py-1 text-white rounded">Accept</button>
                </form>

                <form method="POST" action="{{ route('admin.reject', $app->id) }}">
                    @csrf
                    <input type="text" name="notes" placeholder="Reason" required class="border px-1 py-1">
                    <button type="submit" class="bg-red-500 px-2 py-1 text-white rounded">Reject</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>