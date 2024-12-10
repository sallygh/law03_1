<div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', $document->title ?? '') }}" required>
</div>
<div>
    <label for="description">Description</label>
    <textarea name="description" id="description">{{ old('description', $document->description ?? '') }}</textarea>
</div>
<div>
    <label for="file_path">File</label>
    <input type="file" name="file_path" id="file_path" {{ isset($document) ? '' : 'required' }}>
</div>
<div>
    <label for="thumbnail">Thumbnail</label>
    <input type="file" name="thumbnail" id="thumbnail">
</div>
<div>
    <label for="lawsuit_id">Lawsuit</label>
    <select name="lawsuit_id" id="lawsuit_id" required>
        <!-- افترض أن لديك قائمة بالدعاوى القضائية لتحميلها هنا -->
        @foreach($lawsuits as $lawsuit)
        <option value="{{ $lawsuit->id }}" {{ old('lawsuit_id', $document->lawsuit_id ?? '') == $lawsuit->id ? 'selected' : '' }}>
            {{ $lawsuit->name }}
        </option>
        @endforeach
    </select>
</div>