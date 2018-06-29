@php
    $current_page = 'appointmenttype';
@endphp

@include('includes.dashboardheader')

        <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                        
                        @isset($displaystate)
                            @if ($displaystate == 'edit')
                            {{-- @dd($singleappointmenttype->appointmenttype) --}}
                                <div class="header">
                                <h4 class="title">Update Appointment Type Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ url('appointmenttype/'.$singleappointmenttype->id )}}" method="POST">

                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Appointment-Type') }}</label>
                                                <input type="text" placeholder="{{ __('Appointment-Type') }}" class="form-control {{ $errors->has('appointmenttype') ? ' is-invalid' : '' }}" name="appointmenttype" value="{{ old('appointmenttype', $singleappointmenttype->appointmenttype) }}" required autofocus>
                                                @if ($errors->has('appointmenttype'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('appointmenttype') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $singleappointmenttype->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <a href="{{ url("appointmenttype/create")}}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Appointment-Type Information</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @elseif($displaystate == 'delete')
                                <div class="header">
                                <h4 class="title text-danger">Delete Appointment-Type Confirmation</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ url('appointmenttype/'.$singleappointmenttype->id )}}" method="POST">

                                    @method('DELETE')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-danger">Are You Sure That You Want To DELETE This Appointment-Type?</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Appointment-Type') }}</label>
                                                <input disabled="disabled" type="text" placeholder="{{ __('Appointment-Type') }}" class="form-control {{ $errors->has('appointmenttype') ? ' is-invalid' : '' }}" name="appointmenttype" value="{{ old('appointmenttype', $singleappointmenttype->appointmenttype) }}" required autofocus>
                                                @if($errors->has('appointmenttype'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('appointmenttype') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Appointment-Type Description') }}</label>
                                                <input disabled="disabled" type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $singleappointmenttype->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <a href="{{ url("appointmenttype/create")}}" class="btn btn-default btn-fill pull-left">No, View All</a> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-danger btn-fill pull-right">Yes I Want To DELETE Appointment-Type</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @else
                                {{-- Only Display the Information --}}
                                <div class="header">
                                <h4 class="title">View Appointment-Type Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" >


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Appointment-Type') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('Appointment-Type') }}" class="form-control {{ $errors->has('appointmenttype') ? ' is-invalid' : '' }}" name="appointmenttype" value="{{ old('appointmenttype', $singleappointmenttype->appointmenttype) }}" required autofocus>
                                                @if ($errors->has('appointmenttype'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('appointmenttype') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $singleappointmenttype->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ url("appointmenttype/create") }}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <a href="{{ url("appointmenttype/{$singleappointmenttype->id}").'/edit' }}" class="btn btn-info btn-fill pull-right">Edit Appointment-Type Information</a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @endif
                        @else
                            
                            <div class="header">
                                <h4 class="title">Add New Appointment-Type</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ route('appointmenttype.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Appointment-Type') }}</label>
                                                <input type="text" placeholder="{{ __('Appointment-Type') }}" class="form-control {{ $errors->has('appointmenttype') ? ' is-invalid' : '' }}" name="appointmenttype" value="{{ old('appointmenttype') }}" required autofocus>
                                                @if ($errors->has('appointmenttype'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('appointmenttype') }}</strong>
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

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add New Appointment-Type</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        @endisset
                        </div>
                    </div>
                   <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Appointment Type Available</h4>
                                <p class="category">This is the list of All Appointment Type Available</p>
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Appointment-Type</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($appointmenttype as $eachAppointmenttype)
                                        <tr>
                                            <td>{{$eachAppointmenttype->appointmenttype}}</td>
                                            <td>{{$eachAppointmenttype->description}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="{{ url("appointmenttype/$eachAppointmenttype->id").'/edit' }}" >Edit</a>
                                                <a class="btn btn-sm btn-default" href="{{ url("appointmenttype/$eachAppointmenttype->id") }}" >View</a>
                                                <a class="btn btn-sm btn-danger" href="{{ url("appointmenttype/$eachAppointmenttype->id?action=del") }}" >Delete</a>
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