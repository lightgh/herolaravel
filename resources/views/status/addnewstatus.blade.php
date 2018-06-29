@php
    $current_page = 'status';
@endphp

@include('includes.dashboardheader')

        <div class="row">
                    <div class="col-md-6">
                        <div class="card">

                            @isset($displaystate)
                            @if ($displaystate == 'edit')
                                <div class="header">
                                <h4 class="title">Update Status Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ url('status/'.$status->first()->id )}}" method="POST">

                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Status') }}</label>
                                                <input type="text" placeholder="{{ __('Status') }}" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status', $status->first()->status) }}" required autofocus>
                                                @if ($errors->has('status'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Status Description') }}</label>
                                                <input type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $status->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <a href="{{ url("status/create")}}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Status Information</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @elseif($displaystate == 'delete')
                                <div class="header">
                                <h4 class="title text-danger">Delete Status Confirmation</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ url('status/'.$status->first()->id )}}" method="POST">

                                    @method('DELETE')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-danger">Are You Sure That You Want To DELETE This Status?</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Status') }}</label>
                                                <input disabled="disabled" type="text" placeholder="{{ __('Status') }}" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status', $status->first()->status) }}" required autofocus>
                                                @if($errors->has('status'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Status Description') }}</label>
                                                <input disabled="disabled" type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $status->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <a href="{{ url("status/create")}}" class="btn btn-default btn-fill pull-left">No, View All</a> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-danger btn-fill pull-right">Yes I Want To DELETE Status</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @else
                                {{-- Only Display the Information --}}
                                <div class="header">
                                <h4 class="title">View Status Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" >


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Status') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('Status') }}" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status', $status->first()->status) }}" required autofocus>
                                                @if ($errors->has('status'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $status->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ url("status/create") }}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <a href="{{ url("status/{$status->first()->id}").'/edit' }}" class="btn btn-info btn-fill pull-right">Edit Status Information</a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @endif
                        @else

                            <div class="header">
                                <h4 class="title">Add New Status</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ route('status.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Status') }}</label>
                                                <input type="text" placeholder="{{ __('Status') }}" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required autofocus>
                                                @if ($errors->has('status'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Status Description') }}</label>
                                                <input type="text" placeholder="{{ __('status description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add New Status</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @endisset
                        </div>
                    </div>
                   <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Status List</h4>
                                <p class="category">This is the list of Status that anyone can have</p>
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Status</th>
                                        <th>Status Description(If Any need)</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($status as $eachStatus)

                                        <tr>
                                            <td>{{$eachStatus->status}}</td>
                                            <td>{{"{$eachStatus->description}"}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="{{ url("status/$eachStatus->id").'/edit' }}" >Edit</a>
                                                <a class="btn btn-sm btn-default" href="{{ url("status/$eachStatus->id") }}" >View</a>
                                                <a class="btn btn-sm btn-danger" href="{{ url("status/$eachStatus->id?action=del") }}" >Delete</a>
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