@extends('admin.layouts.master')

@section('title')
{{ __('main.Create Slide') }}
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">{{ __('main.Create Slide') }}</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('main.Home') }}</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.slide.index') }}">{{ __('main.Slides') }}</a></li>
              <li class="breadcrumb-item active">{{ __('main.Create Slide') }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">

                </div>
                <div class="col-md-1"></div>
            </div>
            <form action="{{ route('admin.slide.store') }}" method="post" id="form">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="bg">{{__('main.Background')}}</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" name="bg" id="urltext" value="">
                                        <span class="input-group-append">
                                          <button type="button" class="btn btn-info btn-flat" id="choose">{{__('main.Choose')}}</button>
                                        </span>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <input value="0" type="radio" class="" id="image" name="is_video" checked>
                                    <label for="image">{{__('main.Image')}}</label>
                                    <input value="1" type="radio" class="ml-5" id="video" name="is_video" >
                                    <label for="video">{{__('main.Video')}}</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="color">{{__('main.Overlay')}}</label>
                                            <input type="color" class="form-control form-control-sm" id="color" name="color">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="opacity">{{__('main.Opacity')}}</label>
                                            <input type="range" class="form-control form-control-sm" id="opacity" name="opacity" value="100">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="order">{{__('main.Order')}}</label>
                                            <input type="number" class="form-control form-control-sm" id="order" name="order" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="language">{{__('main.Language')}}</label>
                                    <select name="language" id="language" class="form-control form-control-sm">
                                        @foreach ($languages as $language)
                                        <option value="{{$language->language}}">{{$language->value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="link">{{__('main.Link')}}</label>
                                    <input type="text" class="form-control form-control-sm" id="link" name="link">
                                </div>
                                <div class="form-group">
                                    <label for="title">{{__('main.Title')}}</label>
                                    <input type="text" class="form-control form-control-sm" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="content">{{__('main.Content')}}</label>
                                    <input type="text" class="form-control form-control-sm" id="contents" name="content">
                                </div>
                                <div class="form-group">
                                    <label for="button">{{__('main.Button')}}</label>
                                    <input type="text" class="form-control form-control-sm" id="button" name="button">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('main.Category') }}</label>
                                    <select class="form-control form-control-sm" id="category" name="category_id">
                                        <option value="0"></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card" id="save-card">
                <div class="card-body">

                    <a href="javascript:void(0);" class="btn btn-success btn-sm float-right" id="submitslide">{{ __('main.Update') }}</a>
                    <a href="{{ route('admin.slide.index') }}" class="btn btn-danger btn-sm float-right mr-2">Cancel</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @include('admin.layouts.media')
@endsection

@section('script')

@endsection
