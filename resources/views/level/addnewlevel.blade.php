@php
    $current_page = 'level';
@endphp

@include('includes.dashboardheader')

        <div class="row">
                    <div class="col-md-6">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Add New Level</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ route('level.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Level') }}</label>
                                                <input type="text" placeholder="{{ __('Level') }}" class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}" required autofocus>
                                                @if ($errors->has('level'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('level') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Level Title') }}</label>
                                                <input type="text" placeholder="{{ __('Level Title') }}" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>
                                                @if ($errors->has('title'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('title') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add New Level</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                   <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Levels In this Organization</h4>
                                <p class="category">This is the list of Levels To which anyone could rise up to</p>
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Level</th>
                                        <th>Level Title</th>
                                        <th>Level Description</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($level as $eachLevel)

                                        <tr>
                                            <td>{{$eachLevel->level}}</td>
                                            <td>{{$eachLevel->title}}</td>
                                            <td>{{"{$eachLevel->description}"}}</td>
                                            <td>Action</td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


                </div>
@include('includes.dashboardfooter')