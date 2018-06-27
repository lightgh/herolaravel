@php
    $current_page = 'addstaff';
@endphp

@include('includes.dashboardheader')

        <div class="row">
                    <div class="col-md-10">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Add New Staff</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ route('staff.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('FirstName') }}</label>
                                                <input type="text" placeholder="{{ __('FirstName') }}" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>
                                                @if ($errors->has('firstname'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('firstname') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('LastName') }}</label>
                                                <input type="text" placeholder="{{ __('LastName') }}" class="form-control {{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>
                                                @if ($errors->has('lastname'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('lastname') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('OtherName') }}</label>
                                                <input type="text" placeholder="{{ __('OtherName') }}" class="form-control {{ $errors->has('othername') ? ' is-invalid' : '' }}" name="othername" value="{{ old('othername') }}"  autofocus>
                                                @if ($errors->has('othername'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('othername') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('Email') }}</label>
                                                <input type="email" placeholder="{{ __('Email') }}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus>
                                                @if ($errors->has('email'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('DateOfBirth') }}</label>
                                                <input type="date" class="form-control" placeholder="{{ __('dateobirth') }}" class="form-control {{ $errors->has('dateobirth') ? ' is-invalid' : '' }}" name="dateobirth" value="{{ old('dateobirth') }}"  autofocus>

                                                @if ($errors->has('dateobirth'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('dateobirth') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('Photo') }}</label>
                                                <input type="file" class="form-control" placeholder="{{ __('photo') }}" class="form-control {{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}"  autofocus>

                                                @if ($errors->has('photo'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('photo') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>{{ __('Gender') }}</label>
                                                <select name="gender" class="form-control" required="required">
                                                    <option value="M">{{ __('Male') }}</option>
                                                    <option value="F">{{ __('Female') }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>{{ __('Staff No') }}</label>
                                                <input type="text" class="form-control" placeholder="{{ __('staffno') }}" class="form-control {{ $errors->has('staffno') ? ' is-invalid' : '' }}" name="staffno" value="{{ old('staffno') }}"  autofocus>
                                                @if ($errors->has('staffno'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('staffno') }}</strong>
                                                        </span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('Department') }}</label>
                                                <select class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }} " name="department" required>
                                                    @foreach ($department as $eachDepartment)
                                                    
                                                    <option {{old('department')==$eachDepartment? $eachDepartment : ''}} value="{{$eachDepartment->id}}" >{{$eachDepartment->department}}</option>    
                                                    @endforeach
                                                </select>
                                                
                                                @if($errors->has('department'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('department') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('Level') }}</label>
                                                <select class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }} " name="level" required>

                                                    @foreach ($level as $eachLevel)

                                                    <option {{old('level')==$eachLevel? $eachLevel : ''}} value="{{$eachLevel->id}}" >{{$eachLevel->level}}</option>

                                                    @endforeach
                                                </select>
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
                                                <label>Address 1</label>
                                                <input name="address1" type="text" class="form-control" placeholder="Address 2" value="{{ old('address1') }}">
                                                @if ($errors->has('address1'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('address1') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address 2</label>
                                                <input name="address2" type="text" class="form-control" placeholder="Address 2" value="{{ old('address2') }}">
                                                @if ($errors->has('address2'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('address2') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add New Staff</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


                </div>
@include('includes.dashboardfooter')