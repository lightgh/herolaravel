@php
    $current_page = 'viewstaff';
@endphp

@include('includes.dashboardheader')

        <div class="row">
            @if(false)
                <div class="col-md-10">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Update Staff Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ route('staff.update') }}" method="POST">
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
                                                @if ($errors->has('lastname'))
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

                                                @if ($errors->has('email'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
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

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('Gender') }}</label>
                                                <select name="gender" class="form-control" required="required">
                                                    <option value="M">{{ __('Male') }}</option>
                                                    <option value="F">{{ __('Female') }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{ __('Staff No') }}</label>
                                                <input type="text" class="form-control" placeholder="{{ __('staffno') }}" class="form-control {{ $errors->has('staffno') ? ' is-invalid' : '' }}" name="staffno" value="{{ old('staffno') }}"  autofocus>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address 1</label>
                                                <input name="address1" type="text" class="form-control" placeholder="Address 2" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address 2</label>
                                                <input name="address2" type="text" class="form-control" placeholder="Address 2" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Staff Record</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
            @endif
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Of Registered Staffs</h4>
                                <p class="category">This is the list of registered Staff</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Staff No</th>
                                        <th>Staff Name</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff as $eachStaff)
                                        <tr>
                                            <td>{{$eachStaff->staffno}}</td>
                                            <td>{{"{$eachStaff->fname} {$eachStaff->lname} {$eachStaff->oname}"}}</td>
                                            <td>{{ \App\Department::find(\App\StaffDepartment::where(['staff_id'=>$eachStaff->id])->first()->dept_id)->department }}</td>
                                            <td>{{ \App\Level::find(\App\Promotions::where(['staff_id'=>$eachStaff->id])->first()->level_id)->level }}</td>
                                            <td>{{"{$eachStaff->address1}"}}</td>
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