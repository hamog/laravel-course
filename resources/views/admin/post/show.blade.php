@extends('layouts.master')

@section('title', 'نمایش خبر ')

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
                    <div class="row">
                        <div class="col">
                            <ul>
                                <li>عنوان خبر: {{ $post->title }}</li>
                                <li>دسته بندی: {{ $post->category->name }}</li>
                                <li>نویسنده: {{ $post->user->name }}</li>
                                <li>تاریخ ثبت: {{  verta($post->created_at)->format('Y/m/d H:i') }}</li>
                                <li>
                                    برچسب ها:
                                    @foreach($post->tags as $tag)
                                        {{ $tag->name }} @if(!$loop->last) , @endif
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li>متن خبر: {{ $post->body }}</li>
                            </ul>
                        </div>
                        <div class="col">
                            تصویر: <br>
                            <a href="{{ $post->getImage() }}" target="_blank">
                                <img src="{{ $post->getImage() }}" alt="dhhasdf" class="img img-thumbnail">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

