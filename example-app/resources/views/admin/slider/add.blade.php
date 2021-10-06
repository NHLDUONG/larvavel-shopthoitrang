@extends('admin.back.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ADD SLIDER</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Slider</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif

        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <form action="add" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Tiêu Đề</label>
                            <input type="text" name="name" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Đường Dẫn</label>
                            <input type="text" name="link" value="" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="menu">Ảnh Sản Phẩm</label>
                    <input type="file" name="image"  class="form-control" id="upload">
                    <div id="image_show">

                    </div>
                    <input type="hidden" name="thumb" id="thumb">
                </div>


                <div class="form-group">
                    <label for="menu">Nội Dung</label>
                    <input type="text" name="content" value="" class="form-control">
                </div>

                <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm Slider</button>
            </div>
            @csrf
        </form>
    </div>
@endsection

