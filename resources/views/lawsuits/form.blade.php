<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>تفاصيل القضية</title>
</head>

<body class="bg-gray-100 font-cairo">
    <div class="container mx-auto mt-10 bg-white p-8 rounded shadow">
        <h1 class="text-1xl font-bold mb-4 text-center">معلومات القضية</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-4">
            <label for="lawusti_id" class="block text-gray-700 text-right mb-2 font-cairo">رقم القضية الحالية:</label>
            <span id="lawusti_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">{{ $nextCaseNumber }}</span>
        </div>

        <!-- تصنيف الدعوى -->
        <div class="mb-4">
            <label for="lawsuit_type" class="block text-gray-700 text-right mb-2 font-cairo">تصنيف الدعوى</label>
            <select id="lawsuit_type" name="lawsuit_type" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" data-lawsuit-types='@json($lawsuitTypes)'>

                @foreach(array_keys($lawsuitTypes) as $type)
                <option value="{{ $type }}" {{ old('lawsuit_type', $lawsuit->lawsuit_type ?? '') == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <!-- موضوع الدعوى -->
        <div class="mb-4">
            <label for="lawsuit_subject" class="block text-gray-700 text-right mb-2 font-cairo">موضوع الدعوى</label>
            <select id="lawsuit_subject" name="lawsuit_subject" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">
                <!-- إضافة خيارات لقائمة موضوع الدعوى -->
                <option value="">اختر موضوع الدعوى</option>
                <option value="بيع شقة">بيع شقة</option>
                <option value="بيع سيارة">بيع سيارة</option>
                <!-- يمكنك إضافة المزيد من الخيارات هنا -->
            </select>
        </div>
        <div>
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">حفظ القضية</button>
        </div>
    </div>
</body>

</html>