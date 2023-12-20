@extends('admin.layouts.master')

@section('title')
    {{ __('main.editparishes') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">{{ __('main.editparishes') }}</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('main.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.parish.index') }}">{{ __('main.parishes') }}</a></li>
                                 
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
                <form action="{{ route('admin.parish.update',$value->id) }}" method="post" id="form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                              <div class="card-body">
                                <div class="form-group ">
                                    
                                    <label for="title">{{ __('main.parish_name') }}</label>
                                    <input type="text"
                                        class="form-control  form-control-sm @error('parish_name') is-invalid @enderror"
                                        id="parish_name" name="parish_name" value="{{ old('parish_name') ?? $value->parish_name }}">
                                </div>
                                <div class="form-group ">
                                    <label for="parish_priest">{{ __('main.parish_priest') }}</label>
                                    <input type="text"
                                        class="form-control form-control-sm  @error('parish_priest') is-invalid @enderror"
                                        id="parish_priest" name="parish_priest" value="{{ old('parish_priest') ?? $value->parish_priest }}">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-4">
                            <div class="card text-right">
                            <div class="card-header">
                             <label for="media_img">{{ __('main.parishimage') }}</label>
                            </div>
                                <div class="card-body">
                                <img src="{{ $value->getMedia->id == 1 ? '' : $value->getMedia->getUrl() ?? '' }}" alt=""  id="media_img" class="w-100 mr-5">
                                </div>
                            <div class="card-footer">
                            <a href="javascript:void(0);" class="btn btn-xs btn-primary float-left"
                            id="choose">{{ __('main.Choose Image') }}</a>
                            <a href="javascript:void(0);" class="btn btn-xs btn-warning float-right"
                            id="remove">{{ __('main.Remove Image') }}</a>
                            </div>
                      </div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="media_id" id="media_id" value="{{ old('media_id') }}">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>{{ __('main.Category') }}</label>
                                            <select class="form-control form-control-sm" id="category_id" name="category_id">
                                                <option value="0"></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if (old('category') ?? $value->getCategory->id == $category->id) selected @endif>
                                                        {{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <div class="form-group col-6">
                                        <label for="patron">{{ __('main.patron') }}</label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('patron') is-invalid @enderror"
                                            id="patron" name="patron" value="{{ old('patron') ?? $value->patron }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="established_year">{{ __('main.established_year') }}</label>
                                        <input type="number"
                                            class="form-control form-control-sm  @error('established_year') is-invalid @enderror"
                                            id="established_year" name="established_year" value="{{ old('established_year') ?? $value->established_year }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="tamil_population">{{ __('main.tamil_population') }}</label>
                                        <input type="number"
                                            class="form-control form-control-sm  @error('tamil_population') is-invalid @enderror"
                                            id="tamil_population" name="tamil_population" value="{{ old('tamil_population') ?? $value->tamil_population }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="malayalam_population">{{ __('main.malayalam_population') }}</label>
                                        <input type="number"
                                            class="form-control form-control-sm  @error('malayalam_population') is-invalid @enderror"
                                            id="malayalam_population" name="malayalam_population" value="{{ old('malayalam_population') ?? $value->malayalam_population }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="vicariate">{{ __('main.vicariate') }}</label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('vicariate') is-invalid @enderror"
                                            id="vicariate" name="vicariate" value="{{ old('vicariate') ?? $value->vicariate }}">
                                            
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email">{{ __('main.email') }}</label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') ?? $value->email }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="phone">{{ __('main.phone') }}</label>
                                        <input type="number" max="10"
                                            class="form-control form-control-sm  @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone') ?? $value->phone }}">
                                    </div>
                                </div>
                                <div class="form-group "> 
                                    <label for="address">{{ __('main.Address') }}</label>
                                    <textarea 
                                        class="form-control form-control-sm  @error('address') is-invalid @enderror"
                                        id="address" name="address">{{ old('address') ?? $value->address }}</textarea>
                                        
                                </div>
                                    <div class="form-group">
                                        <label for="social_movements">{{ __('main.social_movements') }}</label>
                                        <textarea class="form-control form-control-sm" rows="3" id="social_movements" 
                                            name="social_movements">{{ old('social_movements') ?? $value->social_movements }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pious_associations">{{ __('main.pious_associations') }}</label>
                                        <textarea class="form-control form-control-sm" rows="3"   id="pious_associations"
                                            name="pious_associations">{{ old('pious_associations') ?? $value->pious_associations }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="history">{{ __('main.history') }}</label>
                                        <textarea class="form-control form-control-sm" rows="3" id="history"
                                            name="history">{{ old('history') ?? $value->history }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="save-card">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="btn btn-success btn-sm float-right"
                                    id="submitparish">{{ __('main.Update') }}</a>
                                    <a href="{{ route('admin.parish.index') }}" class="btn btn-danger btn-sm float-right mr-2">Cancel</a>
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
