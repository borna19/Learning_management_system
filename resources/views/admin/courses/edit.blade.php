@extends('layouts.admin_dashboard')

@section('admin_content')
<div class="container-fluid p-0">
    <h3 class="fw-bold mb-4">Edit Course: {{ $course->title }}</h3>

    <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="title" class="form-label">Course Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required>{{ $course->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">Course Settings</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price (₹)</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $course->price }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" id="level" name="level" required>
                                <option value="beginner" {{ $course->level == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="intermediate" {{ $course->level == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="advanced" {{ $course->level == 'advanced' ? 'selected' : '' }}>Advanced</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="draft" {{ $course->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ $course->status == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">Thumbnail</h6>
                    </div>
                    <div class="card-body p-4">
                        @if($course->thumbnail)
                            <div class="mb-3">
                                @if(Str::startsWith($course->thumbnail, 'http'))
                                    <img src="{{ $course->thumbnail }}" alt="Thumbnail" class="img-fluid rounded mb-2">
                                @else
                                    <img src="{{ Storage::url($course->thumbnail) }}" alt="Thumbnail" class="img-fluid rounded mb-2">
                                @endif
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Change Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-5">
            <button type="submit" class="btn btn-primary px-4">Update Course</button>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary px-4">Cancel</a>
        </div>
    </form>
</div>
@endsection
