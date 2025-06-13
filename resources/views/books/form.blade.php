<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label for="author_id" class="form-label">Author</label>
    <select name="author_id" id="author_id" class="form-select" required>
        <option value="">Select an author</option>
        @foreach ($authors as $author)
            <option value="{{ $author->id }}"
                {{ old('author_id', $book->author_id ?? '') == $author->id ? 'selected' : '' }}>
                {{ $author->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="published_date" class="form-label">Published Date</label>
    <input type="date" class="form-control" id="published_date" name="published_date"
        value="{{ old('published_date', $book->published_date ?? '') }}" required>
</div>
