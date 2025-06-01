@extends('layouts.master')

@section('title', 'لیست اخبار')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">لیست اخبار</h3>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-end">ثبت خبر جدید</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>تصویر</th>
                            <th>عنوان</th>
                            <th>دسته بندی</th>
                            <th>نویسنده</th>
                            <th>تعداد بازدید</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ $post->getImage() }}" target="_blank">
                                            <img src="{{ $post->getImage() }}" alt="dhhasdf" class="img img-thumbnail" style="width: 90px;height: 75px">
                                        </a>
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->views_count }}</td>
                                    <td>
                                        @if($post->status)
                                            <span class="badge text-bg-success">فعال</span>
                                        @else
                                            <span class="badge text-bg-danger">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>{{ verta($post->created_at)->format('Y/m/d H:i') }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.show', $post->id) }}" role="button">
                                            نمایش
                                        </a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.posts.edit', $post->id) }}" role="button">
                                            ویرایش
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('delete-{{ $post->id }}')">
                                            حذف
                                        </button>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" id="delete-{{ $post->id }}">
                                            @csrf
                                            @method('delete')

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $posts->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

