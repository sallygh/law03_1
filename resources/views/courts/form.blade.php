<!-- resources/views/courts/form.blade.php -->
<div class="form-group">
    <label for="name">اسم المحكمة</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $court->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="location">الموقع</label>
    <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $court->location ?? '') }}">
</div>
<div class="form-group">
    <label for="court_number">رقم المحكمة</label>
    <input type="text" class="form-control" id="court_number" name="court_number" value="{{ old('court_number', $court->court_number ?? '') }}" required>
</div>
<div class="form-group">
    <label for="status">حالة القضية</label>
    <select class="form-control" id="status" name="status" required>
        <option value="انتظار" {{ old('status', $court->status ?? '') == 'انتظار' ? 'selected' : '' }}>انتظار</option>
        <option value="دراسة" {{ old('status', $court->status ?? '') == 'دراسة' ? 'selected' : '' }}>دراسة</option>
        <option value="تم التسجيل" {{ old('status', $court->status ?? '') == 'تم التسجيل' ? 'selected' : '' }}>تم التسجيل</option>
        <option value="تم الفصل" {{ old('status', $court->status ?? '') == 'تم الفصل' ? 'selected' : '' }}>تم الفصل</option>
    </select>
</div>
<div class="form-group">
    <label for="base_number">رقم الأساس</label>
    <input type="number" class="form-control" id="base_number" name="base_number" value="{{ old('base_number', $court->base_number ?? '') }}">
</div>
<div class="form-group">
    <label for="decision_number">رقم القرار</label>
    <input type="number" class="form-control" id="decision_number" name="decision_number" value="{{ old('decision_number', $court->decision_number ?? '') }}">
</div>