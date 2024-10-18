<label for="lawsuit_type">تصنيف الدعوى</label>
<select id="lawsuit_type" name="lawsuit_type" class="form-control" data-lawsuit-types='@json($lawsuitTypes)'>
    <option value="">اختر تصنيف الدعوى</option>
    @foreach(array_keys($lawsuitTypes) as $type)
    <option value="{{ $type }}">{{ $type }}</option>
    @endforeach
</select>

<label for="lawsuit_subject">موضوع الدعوى</label>
<select id="lawsuit_subject" name="lawsuit_subject" class="form-control">
    <option value="">اختر موضوع الدعوى</option>
</select>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var lawsuitTypeSelect = document.getElementById('lawsuit_type');
        var lawsuitTypes = JSON.parse(lawsuitTypeSelect.getAttribute('data-lawsuit-types'));

        console.log(lawsuitTypes); // تحقق من بيانات lawsuitTypes في وحدة التحكم

        lawsuitTypeSelect.addEventListener('change', function() {
            var type = this.value;
            var subjects = lawsuitTypes[type] || [];
            var subjectSelect = document.getElementById('lawsuit_subject');
            subjectSelect.innerHTML = '<option value="">اختر موضوع الدعوى</option>';
            subjects.forEach(function(subject) {
                var option = document.createElement('option');
                option.value = subject;
                option.text = subject;
                subjectSelect.appendChild(option);
            });
        });
    });
</script>

</script>
</body>



<div class="form-group">
    <label for="court">المحكمة</label>
    <select id="court" name="court" class="form-control">
        <option value="">اختر المحكمة</option>
        <option value="دمشق">دمشق</option>
        <option value="ببيلا">ببيلا</option>
        <option value="داريا">داريا</option>
        <option value="جرمانا">جرمانا</option>
    </select>
</div>

<div class="form-group">
    <label for="court_number">رقم المحكمة</label>
    <input type="number" class="form-control" id="court_number" name="court_number" min="1" max="20" value="{{ old('court_number', $lawsuit->court_number ?? '') }}">
</div>

<div class="form-group">



    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- Select2 -->
    <label for="plaintiff_name">اسم المدعي</label>
    <div style="display: flex; align-items: center;">
        <select name="plaintiff_name" class="js-example-basic-single">
            @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->full_name }}</option>
            @endforeach
        </select>
        <button onclick="window.open('/clients/create', '_blank')" style="margin-left: 10px;">إضافة موكل جديد</button>
    </div>

    <label for="defendant_name">اسم المدعى عليه</label>
    <div style="display: flex; align-items: center;">
        <select name="defendant_name" class="js-example-basic-single">
            @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->full_name }}</option>
            @endforeach
        </select>
        <button onclick="window.open('/clients/create', '_blank')" style="margin-left: 10px;">إضافة مدعى عليه جديد</button>
    </div>

    <script>
        $(document).ready(function() {
            function createOption(term) {
                var option = new Option(term, term, true, true);
                return option;
            }

            $('.js-example-basic-single').select2({
                tags: true,
                language: {
                    noResults: function() {
                        return ''; // حذف الرسالة المخصصة
                    }
                },
                escapeMarkup: function(markup) {
                    return markup;
                },
                createTag: function(params) {
                    var term = $.trim(params.term);
                    if (term === '') {
                        return null;
                    }
                    return {
                        id: term,
                        text: term,
                        newOption: true
                    };
                },
                templateResult: function(data) {
                    return $('<span>').text(data.text);
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



    <div class="form-group">
        <label for="lawsuit_status">حالة القضية</label>
        <input type="text" class="form-control" id="lawsuit_status" name="lawsuit_status" value="{{ old('lawsuit_status', $lawsuit->lawsuit_status ?? '') }}">
    </div>
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
    </div>