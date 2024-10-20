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
        <h1 class="text-2xl font-bold mb-4 text-center">تفاصيل القضية</h1>
        <form>
            <div class="mb-4">
                <label for="lawsuit_type" class="block text-gray-700">تصنيف الدعوى</label>
                <select id="lawsuit_type" name="lawsuit_type" class="block w-full mt-1 border-gray-300 rounded">
                    <option value="">اختر تصنيف الدعوى</option>
                    @foreach(array_keys($lawsuitTypes) as $type)
                    <option value="{{ $type }}" {{ old('lawsuit_type', $lawsuit->lawsuit_type ?? '') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="lawsuit_subject" class="block text-gray-700">موضوع الدعوى</label>
                <select id="lawsuit_subject" name="lawsuit_subject" class="block w-full mt-1 border-gray-300 rounded">
                    <option value="">اختر موضوع الدعوى</option>
                </select>
            </div>

</body>

<div class="form-group">
    <label for="court">المحكمة</label>
    <select id="court" name="court" class="form-control">
        <option value="">اختر المحكمة</option>
        <option value="دمشق" {{ old('court', $lawsuit->court ?? '') == 'دمشق' ? 'selected' : '' }}>دمشق</option>
        <option value="ببيلا" {{ old('court', $lawsuit->court ?? '') == 'ببيلا' ? 'selected' : '' }}>ببيلا</option>
        <option value="داريا" {{ old('court', $lawsuit->court ?? '') == 'داريا' ? 'selected' : '' }}>داريا</option>
        <option value="جرمانا" {{ old('court', $lawsuit->court ?? '') == 'جرمانا' ? 'selected' : '' }}>جرمانا</option>
    </select>
</div>


<div class="form-group">
    <label for="court_number">رقم المحكمة</label>
    <input type="number" class="form-control" id="court_number" name="court_number" min="1" max="20" value="{{ old('court_number', $lawsuit->court_number ?? '') }}">
</div>

<div class="form-group">


    <label for="plaintiff_name">اسم المدعي</label>
    <div style="display: flex; align-items: center;">
        <select name="plaintiff_name" class="js-example-basic-single">
            @foreach($clients as $client)
            <option value="{{ $client->id }}" {{ old('plaintiff_name', $lawsuit->plaintiff_name ?? '') == $client->id ? 'selected' : '' }}>{{ $client->full_name }}</option>
            @endforeach
        </select>
        <button onclick="window.open('/clients/create', '_blank')" style="margin-left: 10px;">إضافة موكل جديد</button>
    </div>

    <label for="defendant_name">اسم المدعى عليه</label>
    <div style="display: flex; align-items: center;">
        <select name="defendant_name" class="js-example-basic-single">
            @foreach($clients as $client)
            <option value="{{ $client->id }}" {{ old('defendant_name', $lawsuit->defendant_name ?? '') == $client->id ? 'selected' : '' }}>{{ $client->full_name }}</option>
            @endforeach
        </select>
        <button onclick="window.open('/clients/create', '_blank')" style="margin-left: 10px;">إضافة مدعى عليه جديد</button>

        <div class="form-group">
            <label for="lawsuit_status">حالة القضية</label>
            <select id="lawsuit_status" name="lawsuit_status" class="form-control">
                <option value="">اختر حالة القضية</option>
                <option value="انتظار" {{ old('lawsuit_status', $lawsuit->lawsuit_status ?? '') == 'انتظار' ? 'selected' : '' }}>انتظار</option>
                <option value="قيد الدراسة" {{ old('lawsuit_status', $lawsuit->lawsuit_status ?? '') == 'قيد الدراسة' ? 'selected' : '' }}>قيد الدراسة</option>
                <option value="تم التسجيل" {{ old('lawsuit_status', $lawsuit->lawsuit_status ?? '') == 'تم التسجيل' ? 'selected' : '' }}>تم التسجيل</option>
                <option value="تم الفصل" {{ old('lawsuit_status', $lawsuit->lawsuit_status ?? '') == 'تم الفصل' ? 'selected' : '' }}>تم الفصل</option>
            </select>
        </div>

        <div class="form-group" id="base_number_group" style="display: none;">
            <label for="base_number">رقم الأساس</label>
            <input type="number" class="form-control" id="base_number" name="base_number" min="1" max="50000" value="{{ old('base_number', $lawsuit->base_number ?? '') }}">
        </div>

        <div class="form-group" id="decision_number_group" style="display: none;">
            <label for="decision_number">رقم القرار</label>
            <input type="number" class="form-control" id="decision_number" name="decision_number" min="1" max="50000" value="{{ old('decision_number', $lawsuit->decision_number ?? '') }}">

            <div class="form-group">
                <label for="attachments">مرفقات</label>
                <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
            </div>
            <div class="form-group">
                <label for="agreed_amount">المبلغ المتفق عليه</label>
                <input type="number" step="0.01" class="form-control" id="agreed_amount" name="agreed_amount" value="{{ old('agreed_amount', $lawsuit->agreed_amount ?? '') }}">
            </div>
            <div class="form-group">
                <label for="remaining_amount">المبلغ المتبقي</label>
                <input type="number" step="0.01" class="form-control" id="remaining_amount" name="remaining_amount" value="{{ old('remaining_amount', $lawsuit->remaining_amount ?? '') }}">
            </div>
            <div class="form-group">
                <label for="paid_amount">المبلغ المدفوع</label>
                <input type="number" step="0.01" class="form-control" id="paid_amount" name="paid_amount" value="{{ old('paid_amount', $lawsuit->paid_amount ?? '') }}">
            </div>
            <div class="form-group">
                <label for="notes">ملاحظات</label>
                <textarea class="form-control" id="notes" name="notes">{{ old('notes', $lawsuit->notes ?? '') }}"></textarea>

                <!-- باقي الحقول -->
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">حفظ</button>
                </form>
            </div>
            </body>



            <!-- كود تصنيف الدعوى -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var lawsuitTypeSelect = document.getElementById('lawsuit_type');
                    var lawsuitTypes = JSON.parse(lawsuitTypeSelect.getAttribute('data-lawsuit-types'));

                    // استخراج قيمة الموضوع من Blade بشكل آمن
                    var initialSubject = "{{ old('lawsuit_subject', $lawsuit->lawsuit_subject ?? '') }}";

                    function updateLawsuitSubjects(selectedType) {
                        var subjects = lawsuitTypes[selectedType] || [];
                        var subjectSelect = document.getElementById('lawsuit_subject');
                        subjectSelect.innerHTML = '<option value="">اختر موضوع الدعوى</option>';
                        subjects.forEach(function(subject) {
                            var option = document.createElement('option');
                            option.value = subject;
                            option.text = subject;
                            if (subject === initialSubject) {
                                option.selected = true;
                            }
                            subjectSelect.appendChild(option);
                        });
                    }

                    updateLawsuitSubjects(lawsuitTypeSelect.value); // استدعاء الوظيفة لملء موضوع الدعوى بناءً على القيمة الحالية

                    lawsuitTypeSelect.addEventListener('change', function() {
                        updateLawsuitSubjects(this.value);
                    });
                });
            </script>
            <!-- كود اسم المدعي -->
            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        </div>

    </div>
    <!--  كود إظهار وإخفاء زر رقم القرار والاساس -->
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
</div>

</html>