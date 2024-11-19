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
        <h1 class="text-1xl font-bold mb-4 text-center">تفاصيل القضية</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

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

            </select>
        </div>

        <!-- زر التفاصيل -->
        <button id="details_button" type="button" class="btn btn-info mt-2">تفاصيل</button>



        <div class="mb-4">
            <label for="court" class="block text-gray-700 text-right mb-2 font-cairo">المحكمة</label>
            <select id="court" name="court" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">
                <option value="">اختر المحكمة</option>
                <option value="دمشق" {{ old('court', $lawsuit->court ?? '') == 'دمشق' ? 'selected' : '' }}>دمشق</option>
                <option value="ببيلا" {{ old('court', $lawsuit->court ?? '') == 'ببيلا' ? 'selected' : '' }}>ببيلا</option>
                <option value="داريا" {{ old('court', $lawsuit->court ?? '') == 'داريا' ? 'selected' : '' }}>داريا</option>
                <option value="جرمانا" {{ old('court', $lawsuit->court ?? '') == 'جرمانا' ? 'selected' : '' }}>جرمانا</option>
            </select>
        </div>



        <div class="mb-4">
            <label for="court_number" class="block text-gray-700 text-right mb-2 font-cairo">رقم المحكمة</label>
            <input type="number" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" id="court_number" name="court_number" min="1" max="20" value="{{ old('court_number', $lawsuit->court_number ?? '') }}">
        </div>

        <div class="mb-4">
            <label for="plaintiff_name" class="block text-gray-700 text-right mb-2 font-cairo">اسم المدعي</label>
            <div class="flex items-center space-x-3">
                <select name="plaintiff_name" class="js-example-basic-single block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('plaintiff_name', $lawsuit->plaintiff_name ?? '') == $client->id ? 'selected' : '' }}>{{ $client->full_name }}</option>
                    @endforeach
                </select>
                <button onclick="window.open('/clients/create', '_blank')" class="ml-2 inline-flex items-center px-4 py-3 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 font-cairo">إضافة موكل جديد</button>
            </div>
        </div>



        <div class="mb-4">
            <label for="defendant_name" class="block text-gray-700 text-right mb-2 font-cairo">اسم المدعى عليه</label>
            <div class="flex items-center space-x-3">
                <select name="defendant_name" class="js-example-basic-single form-select block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('defendant_name', $lawsuit->defendant_name ?? '') == $client->id ? 'selected' : '' }}>{{ $client->full_name }}</option>
                    @endforeach
                </select>
                <button onclick="window.open('/clients/create', '_blank')" class="ml-2 inline-flex items-center px-4 py-3 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 font-cairo">إضافة موكل جديد</button>
            </div>
        </div>



        <div class="mb-4">
            <label for="lawsuit_status" class="block text-gray-700 text-right mb-2 font-cairo">حالة القضية</label>
            <select id="lawsuit_status" name="lawsuit_status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">
                <option value="">اختر حالة القضية</option>
                <option value="انتظار" {{ old('lawsuit_status', $lawsuit->lawsuit_status ?? '') == 'انتظار' ? 'selected' : '' }}>انتظار</option>
                <option value="قيد الدراسة" {{ old('lawsuit_status', $lawsuit->lawsuit_status ?? '') == 'قيد الدراسة' ? 'selected' : '' }}>قيد الدراسة</option>
                <option value="تم التسجيل" {{ old('lawsuit_status', $lawsuit->lawsuit_status ?? '') == 'تم التسجيل' ? 'selected' : '' }}>تم التسجيل</option>
                <option value="تم الفصل" {{ old('lawsuit_status', $lawsuit->lawsuit_status ?? '') == 'تم الفصل' ? 'selected' : '' }}>تم الفصل</option>
            </select>
        </div>

        <div class="mb-4" id="base_number_group" style="display: none;">
            <label for="base_number" class="block text-gray-700 text-right mb-2 font-cairo">رقم الأساس</label>
            <input type="number" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" id="base_number" name="base_number" min="1" max="50000" value="{{ old('base_number', $lawsuit->base_number ?? '') }}">
        </div>
        <div class="mb-4" id="decision_number_group" style="display: none;">
            <label for="decision_number" class="block text-gray-700 text-right mb-2 font-cairo">رقم القرار</label>
            <input type="number" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" id="decision_number" name="decision_number" min="1" max="50000" value="{{ old('decision_number', $lawsuit->decision_number ?? '') }}">
        </div>


        <div class="mb-4">
            <label for="attachments" class="block text-gray-700 text-right mb-2 font-cairo">مرفقات</label>
            <input type="file" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" id="attachments" name="attachments[]" multiple>
        </div>

        <div class="mb-4">
            <label for="agreed_amount" class="block text-gray-700 text-right mb-2 font-cairo">المبلغ المتفق عليه</label>
            <input type="number" step="0.01" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" id="agreed_amount" name="agreed_amount" value="{{ old('agreed_amount', $lawsuit->agreed_amount ?? '') }}">
        </div>

        <div class="mb-4">
            <label for="remaining_amount" class="block text-gray-700 text-right mb-2 font-cairo">المبلغ المتبقي</label>
            <input type="number" step="0.01" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" id="remaining_amount" name="remaining_amount" value="{{ old('remaining_amount', $lawsuit->remaining_amount ?? '') }}">
        </div>

        <div class="mb-4">
            <label for="paid_amount" class="block text-gray-700 text-right mb-2 font-cairo">المبلغ المدفوع</label>
            <input type="number" step="0.01" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" id="paid_amount" name="paid_amount" value="{{ old('paid_amount', $lawsuit->paid_amount ?? '') }}">
        </div>

        <div class="mb-4">
            <label for="notes" class="block text-gray-700 text-right mb-2 font-cairo">ملاحظات</label>
            <textarea class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" id="notes" name="notes">{{ old('notes', $lawsuit->notes ?? '') }}</textarea>
        </div>



        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var lawsuitTypeSelect = document.getElementById('lawsuit_type');
                var lawsuitTypes = JSON.parse(lawsuitTypeSelect.getAttribute('data-lawsuit-types'));
                var lawsuitSubjectSelect = document.getElementById('lawsuit_subject');
                var detailsButton = document.getElementById('details_button');

                // استخراج قيمة الموضوع من Blade بشكل آمن
                var initialSubject = "{{ old('lawsuit_subject', $lawsuit->lawsuit_subject ?? '') }}";

                function updateLawsuitSubjects(selectedType) {
                    var subjects = lawsuitTypes[selectedType] || [];
                    lawsuitSubjectSelect.innerHTML = ' ';
                    subjects.forEach(function(subject) {
                        var option = document.createElement('option');
                        option.value = subject;
                        option.text = subject;
                        if (subject === initialSubject) {
                            option.selected = true;
                        }
                        lawsuitSubjectSelect.appendChild(option);
                    });
                }

                function updateDetailsButtonLink(selectedSubject) {
                    var url = '';

                    switch (selectedSubject) {
                        case 'بيع شقة':
                            url = '/apartments/create';
                            break;
                        case 'بيع سيارة':
                            url = '/cars/create';
                            break;
                        default:
                            url = '#'; // يمكنك تعيين رابط افتراضي إذا لم يكن هناك موضوع محدد
                            break;
                    }

                    detailsButton.setAttribute('onclick', `location.href='${url}'`);
                }

                // استدعاء الوظيفة لملء موضوع الدعوى بناءً على القيمة الحالية
                updateLawsuitSubjects(lawsuitTypeSelect.value);
                updateDetailsButtonLink(lawsuitSubjectSelect.value);

                // تحديث الرابط عند تغيير القيمة
                lawsuitTypeSelect.addEventListener('change', function() {
                    updateLawsuitSubjects(this.value);
                    updateDetailsButtonLink(lawsuitSubjectSelect.value);
                });

                lawsuitSubjectSelect.addEventListener('change', function() {
                    updateDetailsButtonLink(this.value);
                });
            });
        </script>


        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2({
                    tags: false, // منع إضافة موكل جديد مباشرة
                    language: {
                        noResults: function() {
                            return '<option value="add_new">أضف موكل جديد</option>'; // رسالة مخصصة عند عدم وجود نتائج
                        }
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }
                });

                // إضافة خيار "أضف موكل جديد" كبند مستقل
                $('.js-example-basic-single').append('<option value="add_new">أضف موكل جديد</option>');

                // تحديد السلوك عند اختيار "أضف موكل جديد"
                $('.js-example-basic-single').on('select2:select', function(e) {
                    if (e.params.data.id === 'add_new') {
                        window.open('/clients/create', '_blank');
                    }
                });
            });
        </script>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var lawsuitStatus = document.getElementById('lawsuit_status');
                var baseNumberGroup = document.getElementById('base_number_group');
                var decisionNumberGroup = document.getElementById('decision_number_group');

                function toggleFields(status) {
                    if (status === 'تم التسجيل') {
                        baseNumberGroup.style.display = 'block';
                        decisionNumberGroup.style.display = 'none';
                    } else if (status === 'تم الفصل') {
                        baseNumberGroup.style.display = 'block';
                        decisionNumberGroup.style.display = 'block';
                    } else {
                        baseNumberGroup.style.display = 'none';
                        decisionNumberGroup.style.display = 'none';
                    }
                }

                // Initial check based on existing value
                toggleFields(lawsuitStatus.value);

                lawsuitStatus.addEventListener('change', function() {
                    toggleFields(this.value);
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var lawsuitForm = document.getElementById('lawsuitForm');

                // استرجاع البيانات من الجلسة عند تحميل الصفحة
                var lawsuitData = JSON.parse(sessionStorage.getItem('lawsuitData'));
                if (lawsuitData) {
                    for (var key in lawsuitData) {
                        var input = document.querySelector(`[name="${key}"]`);
                        if (input) {
                            input.value = lawsuitData[key];
                        }
                    }
                }
            });
        </script>

</body>