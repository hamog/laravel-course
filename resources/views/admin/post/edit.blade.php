@extends('layouts.master')

@section('title', 'لیست خبر ها')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">لیست خبر ها</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">ویرایش خبر</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $post->title) }}" required autofocus>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="category_id">دسته بندی</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">یک دسته بندی را انتخاب کنید</option>
                                        @foreach($categories as $id => $name)
                                            <option value="{{ $id }}" @selected(old('category_id', $post->category_id) == $id)>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="body">متن</label>
                                <div class="form-group">
                                    <textarea name="body" id="body" class="form-control" cols="30" rows="10" required>{{ old('body', $post->body) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tags">برچسب ها</label>
                                    <select name="tags[]" id="tags" class="form-control" multiple>
                                        @foreach($tags as $id => $name)
                                            <option value="{{ $id }}" @selected($post->tags->contains($id))>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="title">تصویر</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="title">تاریخ انتشار</label>
                                    <input type="text" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y/n/j') : '') }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check pt-3">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="status" checked>
                                    <label class="form-check-label" for="status">
                                        فعال
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-warning">ویرایش خبر</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $("#published_at").persianDatepicker({
            showGregorianDate: true,
            {{--selectedDate: '{{ $post->published_at->format('Y/n/j') }}'--}}
        });
    </script>
@endsection
