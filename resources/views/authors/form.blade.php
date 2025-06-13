<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label for="birth_date" class="form-label">Birth Date</label>
    <input type="date" class="form-control" id="birth_date" name="birth_date"
        value="{{ old('birth_date', $author->birth_date ?? '') }}" required>
</div>
