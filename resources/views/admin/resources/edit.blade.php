@extends('admin.layouts.master')

@section('title')
    {{ __('main.editresources') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header"> 
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{ __('main.editresources') }}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('main.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.resource.index') }}">{{ __('main.resources') }}</a></li>
                                 
                                 <li class="breadcrumb-item active">{{ $value->title }}</li>
                           </ol>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
           
            <div class="container-fluid">
                <form action="{{ route('admin.resource.update',$value->id) }}" method="post" id="form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" id="category_id" name="category_id"
                                        value="{{ old('category_id') ?? $value->getCategory->id }}">
                                    <input type="hidden" name="media_id" id="media_id"
                                        value="{{ old('media_id') ?? $value->getMedia->id }}">
                                    <div class="form-group">
                                        <label for="title">{{ __('main.Title') }}</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title') ?? $value->title }}">
                                        @error('title') <small
                                            class="ml-auto text-danger">{{ __('main.titleError') }}</small> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="file_id">{{ __('main.upload') }}</label>
                                        <input type="file" class="form-control form-control-sm" id="file_id" name="file_id" required>
                                        <div class=""><a href="{{ url('/newsletter/'. $value->file_id ) }}" download="download">{{ $value->file_id }}</a></div>
                                        @error('file_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="slug">{{ __('main.Permalink') }}</label> --}}
                                        <input type="text" hidden
                                            class="form-control form-control-sm @error('slug') is-invalid @enderror"
                                            id="slug" name="slug" value="{{ old('slug') ?? $value->getSlug->slug }}">
                                        @error('slug') <small
                                            class="ml-auto text-danger">{{ __('main.slugError') }}</small> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="desc"></label>
                                        <textarea class="form-control form-control-sm" rows="3" id="content"
                                            name="content">{{ old('content') ?? $value->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @include('admin.layouts.slug')
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="language">{{ __('main.Language') }}</label>
                                </div>
                                <div class="card-body">
                                    <select name="language" id="language" class="form-control form-control-sm">
                                        
                                     
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->language }}" @if (old('language') ?? $value->language == $language->language) selected @endif>
                                                {{ $language->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <label for="language">{{ __('main.eventdate') }}</label>
                                </div>
                                <div class="card-body">
                                    <input type="date" name="eventdate" id="eventdate" value="{{ old('title') ?? $value->eventdate }}" class="form-control form-control-sm @error('eventdate') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <label for="media_img">{{ __('main.Featured Image') }}</label>
                                </div>
                                <div class="card-body">
                                    <img src="{{ $value->getMedia->id == 1 ? '' : $value->getMedia->getUrl() ?? '' }}"
                                        alt="" id="media_img" class="w-100">
                                </div>
                                <div class="card-footer">
                                    <a href="javascript:void(0);" class="btn btn-xs btn-primary float-left"
                                        id="choose">{{ __('main.Choose Image') }}</a>
                                    <a href="javascript:void(0);" class="btn btn-xs btn-warning float-right"
                                        id="remove">{{ __('main.Remove Image') }}</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <label>{{ __('main.Category') }}</label>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" id="category" name="category">
                                            <option value="0"></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if (old('category') ?? $value->getCategory->id == $category->id) selected @endif>
                                                    {{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="save-card">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="btn btn-success btn-sm float-right"
                                    id="submit">{{ __('main.Update') }}</a>
                                    <a href="{{ route('admin.resource.index') }}" class="btn btn-danger btn-sm float-right mr-2">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
        </div><!-- /.content -->
    </div>
    @include('admin.layouts.media')
@endsection

@section('script')

@endsection
