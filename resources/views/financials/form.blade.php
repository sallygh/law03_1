<!-- resources/views/financials/form.blade.php -->
<div class="form-group">
    <label for="lawsuit_id">رقم القضية</label>
    <select class="form-control" id="lawsuit_id" name="lawsuit_id" required>
        @foreach($lawsuits as $lawsuit)
        <option value="{{ $lawsuit->id }}" {{ old('lawsuit_id', $financial->lawsuit_id ?? '') == $lawsuit->id ? 'selected' : '' }}>
            {{ $lawsuit->id }} - {{ $lawsuit->lawsuit_subject }}
        </option>
        @endforeach
    </select>
</div>

<!-- resources/views/financials/form.blade.php -->
<div class="form-group">
    <label for="lawsuit_id">رقم القضية</label>
    <select class="form-control" id="lawsuit_id" name="lawsuit_id" required>
        @foreach($lawsuits as $lawsuit)
        <option value="{{ $lawsuit->id }}" {{ old('lawsuit_id', $financial->lawsuit_id ?? '') == $lawsuit->id ? 'selected' : '' }}>
            {{ $lawsuit->id }} - {{ $lawsuit->lawsuit_subject }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="agreed_amount">المبلغ المتفق عليه</label>
    <input type="number" step="0.01" class="form-control" id="agreed_amount" name="agreed_amount" value="{{ old('agreed_amount', $financial->agreed_amount ?? '') }}" required>
</div>
<div class="form-group">
    <label for="paid_amount">المبلغ المدفوع</label>
    <input type="number" step="0.01" class="form-control" id="paid_amount" name="paid_amount" value="{{ old('paid_amount', $financial->paid_amount ?? '') }}" required>
</div>
<div class="form-group">
    <label for="remaining_amount">المتبقي</label>
    <input type="number" step="0.01" class="form-control" id="remaining_amount" name="remaining_amount" value="{{ old('remaining_amount', $financial->remaining_amount ?? '') }}" required>
</div>