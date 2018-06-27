@php
    $current_page = 'department';
@endphp

@include('includes.dashboardheader')

        <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                        
                        @isset($displaystate)
                            @if ($displaystate == 'edit')
                                <div class="header">
                                <h4 class="title">Update Department Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ url('department/'.$department->first()->id )}}" method="POST">

                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Department') }}</label>
                                                <input type="text" placeholder="{{ __('Department') }}" class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" value="{{ old('department', $department->first()->department) }}" required autofocus>
                                                @if ($errors->has('department'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('department') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $department->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <a href="{{ url("department/create")}}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Department Information</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @else
                                {{-- Only Display the Information --}}
                                <div class="header">
                                <h4 class="title">View Department Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" >


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Department') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('Department') }}" class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" value="{{ old('department', $department->first()->department) }}" required autofocus>
                                                @if ($errors->has('department'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('department') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $department->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ url("department/create") }}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <a href="{{ url("department/{$department->first()->id}").'/edit' }}" class="btn btn-info btn-fill pull-right">Edit Department Information</a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @endif
                        @else
                            
                            <div class="header">
                                <h4 class="title">Add New Department</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ route('department.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Department') }}</label>
                                                <input type="text" placeholder="{{ __('Department') }}" class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" value="{{ old('department') }}" required autofocus>
                                                @if ($errors->has('department'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('department') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add New Department</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        @endisset
                        </div>
                    </div>
                   <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Department Available</h4>
                                <p class="category">This is the list of All Department Available</p>
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Department</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($department as $eachDeparment)

                                        <tr>
                                            <td>{{$eachDeparment->department}}</td>
                                            <td>{{$eachDeparment->description}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="{{ url("department/$eachDeparment->id").'/edit' }}" >Edit</a>
                                                <a class="btn btn-sm btn-default" href="{{ url("department/$eachDeparment->id") }}" >View</a>
                                            </td>
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