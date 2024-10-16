<div class="form-group">
    <label for="lawsuit_type">تصنيف الدعوى</label>
    <input type="text" class="form-control" id="lawsuit_type" name="lawsuit_type" value="{{ old('lawsuit_type', $lawsuit->lawsuit_type ?? '') }}">
</div>
<div class="form-group">
    <label for="lawsuit_subject">موضوع الدعوى</label>
    <input type="text" class="form-control" id="lawsuit_subject" name="lawsuit_subject" value="{{ old('lawsuit_subject', $lawsuit->lawsuit_subject ?? '') }}">
</div>
<div class="form-group">
    <label for="court">المحكمة</label>
    <input type="text" class="form-control" id="court" name="court" value="{{ old('court', $lawsuit->court ?? '') }}">
</div>
<div class="form-group">
    <label for="court_number">رقم المحكمة</label>
    <input type="text" class="form-control" id="court_number" name="court_number" value="{{ old('court_number', $lawsuit->court_number ?? '') }}">
</div>
<div class="form-group">
    <label for="plaintiff_name">اسم المدعي</label>
    <input type="text" class="form-control" id="plaintiff_name" name="plaintiff_name" value="{{ old('plaintiff_name', $lawsuit->plaintiff_name ?? '') }}">
</div>
<div class="form-group">
    <label for="defendant_name">اسم المدعى عليه</label>
    <input type="text" class="form-control" id="defendant_name" name="defendant_name" value="{{ old('defendant_name', $lawsuit->defendant_name ?? '') }}">
</div>
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
<div class="form-group">
    <label for="lawsuit_type">تصنيف الدعوى</label>
    <input type="text" class="form-control" id="lawsuit_type" name="lawsuit_type" value="{{ old('lawsuit_type', $lawsuit->lawsuit_type ?? '') }}">
</div>
<div class="form-group">
    <label for="lawsuit_subject">موضوع الدعوى</label>
    <input type="text" class="form-control" id="lawsuit_subject" name="lawsuit_subject" value="{{ old('lawsuit_subject', $lawsuit->lawsuit_subject ?? '') }}">
</div>
<div class="form-group">
    <label for="court">المحكمة</label>
    <input type="text" class="form-control" id="court" name="court" value="{{ old('court', $lawsuit->court ?? '') }}">
</div>
<div class="form-group">
    <label for="court_number">رقم المحكمة</label>
    <input type="text" class="form-control" id="court_number" name="court_number" value="{{ old('court_number', $lawsuit->court_number ?? '') }}">
</div>
<div class="form-group">
    <label for="plaintiff_name">اسم المدعي</label>
    <input type="text" class="form-control" id="plaintiff_name" name="plaintiff_name" value="{{ old('plaintiff_name', $lawsuit->plaintiff_name ?? '') }}">
</div>
<div class="form-group">
    <label for="defendant_name">اسم المدعى عليه</label>
    <input type="text" class="form-control" id="defendant_name" name="defendant_name" value="{{ old('defendant_name', $lawsuit->defendant_name ?? '') }}">
</div>
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