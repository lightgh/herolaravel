@php
    $current_page = 'zone';
@endphp

@include('includes.dashboardheader')

        <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                        
                        @isset($displaystate)
                            @if ($displaystate == 'edit')
                                <div class="header">
                                <h4 class="title">Update Zone Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ url('zone/'.$zone->first()->id )}}" method="POST">

                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Zone') }}</label>
                                                <input type="text" placeholder="{{ __('Zone') }}" class="form-control {{ $errors->has('gpzone') ? ' is-invalid' : '' }}" name="gpzone" value="{{ old('gpzone', $zone->first()->gpzone) }}" required autofocus>
                                                @if ($errors->has('gpzone'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('gpzone') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $zone->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <a href="{{ url("zone/create")}}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Zone Information</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @elseif($displaystate == 'delete')
                                <div class="header">
                                <h4 class="title text-danger">Delete Zone Confirmation</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ url('zone/'.$zone->first()->id )}}" method="POST">

                                    @method('DELETE')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-danger">Are You Sure That You Want To DELETE This Zone?</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Zone') }}</label>
                                                <input disabled="disabled" type="text" placeholder="{{ __('Zone') }}" class="form-control {{ $errors->has('gpzone') ? ' is-invalid' : '' }}" name="gpzone" value="{{ old('zone', $zone->first()->gpzone) }}" required autofocus>
                                                @if($errors->has('gpzone'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('gpzone') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Zone Description') }}</label>
                                                <input disabled="disabled" type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $zone->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <a href="{{ url("zone/create")}}" class="btn btn-default btn-fill pull-left">No, View All</a> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-danger btn-fill pull-right">Yes I Want To DELETE Zone</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @else
                                {{-- Only Display the Information --}}
                                <div class="header">
                                <h4 class="title">View Zone Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" >


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('GPZone') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('GPZone') }}" class="form-control {{ $errors->has('gpzone') ? ' is-invalid' : '' }}" name="gpzone" value="{{ old('zone', $zone->first()->gpzone) }}" required autofocus>
                                                @if ($errors->has('gpzone'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('gpzone') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $zone->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ url("zone/create") }}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <a href="{{ url("zone/{$zone->first()->id}").'/edit' }}" class="btn btn-info btn-fill pull-right">Edit Zone Information</a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @endif
                        @else
                            
                            <div class="header">
                                <h4 class="title">Add New Zone</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ route('zone.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('GPZone') }}</label>
                                                <input type="text" placeholder="{{ __('GPZone') }}" class="form-control {{ $errors->has('gpzone') ? ' is-invalid' : '' }}" name="gpzone" value="{{ old('gpzone') }}" required autofocus>
                                                @if ($errors->has('gpzone'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('gpzone') }}</strong>
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

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add New Zone</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        @endisset
                        </div>
                    </div>
                   <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">GPZone Available</h4>
                                <p class="category">This is the list of All GP-Zone Available</p>
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>GPZone</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($zone as $eachZone)
                                        <tr>
                                            <td>{{$eachZone->gpzone}}</td>
                                            <td>{{$eachZone->description}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="{{ url("zone/$eachZone->id").'/edit' }}" >Edit</a>
                                                <a class="btn btn-sm btn-default" href="{{ url("zone/$eachZone->id") }}" >View</a>
                                                {{-- <a class="btn btn-sm btn-danger" href="{{ url("zone/$eachZone->id?action=del") }}" >Delete</a> --}}
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