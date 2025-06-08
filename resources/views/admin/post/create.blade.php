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
                    <h3 class="card-title">ثبت خبر</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                               <div class="form-group">
                                   <label for="title">عنوان</label>
                                   <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required autofocus>
                               </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="category_id">دسته بندی</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">یک دسته بندی را انتخاب کنید</option>
                                        @foreach($categories as $id => $name)
                                            <option value="{{ $id }}" @selected(old('category_id') == $id)>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="body">متن</label>
                                <div class="form-group">
                                    <textarea name="body" id="body" class="form-control" cols="30" rows="10" required>{{ old('body') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tags">برچسب ها</label>
                                    <select name="tags[]" id="tags" class="form-control" multiple>
                                        @foreach($tags as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="title">تاریخ انتشار</label>
                                    <input type="text" name="published_at" id="published_at" class="form-control" value="{{ old('published_at') }}" autocomplete="off">
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
                                <button type="submit" class="btn btn-primary">ثبت خبر</button>
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
        });
    </script>
@endsection
