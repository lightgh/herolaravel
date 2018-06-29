@php
    $current_page = 'rank';
@endphp

@include('includes.dashboardheader')

        <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                        
                        @isset($displaystate)
                            @if ($displaystate == 'edit')
                                <div class="header">
                                <h4 class="title">Update Rank Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ url('rank/'.$rank->first()->id )}}" method="POST">

                                    @method('PUT')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Rank') }}</label>
                                                <input type="text" placeholder="{{ __('Rank') }}" class="form-control {{ $errors->has('rank') ? ' is-invalid' : '' }}" name="rank" value="{{ old('rank', $rank->first()->rank) }}" required autofocus>
                                                @if ($errors->has('rank'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('rank') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('StaffClass') }}</label>
                                                <select class="form-control {{ $errors->has('staffclass') ? ' is-invalid' : '' }}" name="staffclass" required >
                                                    <option {{ old('staffclass'=="AS"? 'selected="selected"': " ", ($rank->first()->staffclass == "AS"? 'selected': "" )) }} value="AS">AS - ACADEMIC STAFF</option>
                                                    <option {{ old('staffclass'=="NA"? 'selected="selected"': " ", ($rank->first()->staffclass == "NA"? 'selected': " ")) }}  value="NA">NA - NON-ACADEMIC STAFF</option>
                                                </select>
                                                @if ($errors->has('staffclass'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('staffclass') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $rank->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <a href="{{ url("rank/create")}}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Rank Information</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @elseif($displaystate == 'delete')
                                <div class="header">
                                <h4 class="title text-danger">Delete Rank Confirmation</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ url('rank/'.$rank->first()->id )}}" method="POST">

                                    @method('DELETE')
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-danger">Are You Sure That You Want To DELETE This Rank?</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Rank') }}</label>
                                                <input disabled="disabled" type="text" placeholder="{{ __('Rank') }}" class="form-control {{ $errors->has('rank') ? ' is-invalid' : '' }}" name="rank" value="{{ old('rank', $rank->first()->rank) }}" required autofocus>
                                                @if($errors->has('rank'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('rank') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Rank StaffClass') }}</label>
                                                <input disabled="disabled" type="text" placeholder="{{ __('Rank') }}" class="form-control {{ $errors->has('rank') ? ' is-invalid' : '' }}" name="rank" value="{{ old('rank', $rank->first()->staffclass) }}" required autofocus>
                                                @if($errors->has('rank'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('rank') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Rank Description') }}</label>
                                                <input disabled="disabled" type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $rank->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <a href="{{ url("status/create")}}" class="btn btn-default btn-fill pull-left">No, View All</a> &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-danger btn-fill pull-right">Yes I Want To DELETE Rank</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @else
                                {{-- Only Display the Information --}}
                                <div class="header">
                                <h4 class="title">View Rank Information</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" >


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Rank') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('Rank') }}" class="form-control {{ $errors->has('rank') ? ' is-invalid' : '' }}" name="rank" value="{{ old('rank', $rank->first()->rank) }}" required autofocus>
                                                @if ($errors->has('rank'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('rank') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Rank StaffClass') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('Rank StaffClass') }}" class="form-control {{ $errors->has('staffclass') ? ' is-invalid' : '' }}" name="staffclass" value="{{ old('staffclass', $rank->first()->staffclass) }}" required autofocus>
                                                @if ($errors->has('staffclass'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('staffclass') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Description') }}</label>
                                                <input readonly="readonly" type="text" placeholder="{{ __('description') }}" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description', $rank->first()->description ) }}" autofocus>
                                                @if ($errors->has('description'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ url("rank/create") }}" class="btn btn-default btn-fill pull-left">View All</a> &nbsp;&nbsp;
                                    <a href="{{ url("rank/{$rank->first()->id}").'/edit' }}" class="btn btn-info btn-fill pull-right">Edit Rank Information</a>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            @endif
                        @else
                            
                            <div class="header">
                                <h4 class="title">Add New Rank</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <form enctype="multipart/form-data" action="{{ route('rank.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('Rank') }}</label>
                                                <input type="text" placeholder="{{ __('Rank') }}" class="form-control {{ $errors->has('rank') ? ' is-invalid' : '' }}" name="rank" value="{{ old('rank') }}" required autofocus>
                                                @if ($errors->has('rank'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('rank') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('StaffClass') }}</label>
                                                <select class="form-control {{ $errors->has('staffclass') ? ' is-invalid' : '' }}" name="staffclass" required >
                                                    <option {{ old('staffclass'=="AS"? 'selected="selected"': " ", ($rank->first()->staffclass == "AS"? 'selected': "" )) }} value="AS">AS - ACADEMIC STAFF</option>
                                                    <option {{ old('staffclass'=="NA"? 'selected="selected"': " ", ($rank->first()->staffclass == "NA"? 'selected': " ")) }}  value="NA">NA - NON-ACADEMIC STAFF</option>
                                                </select>
                                                @if ($errors->has('staffclass'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('staffclass') }}</strong>
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

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add New Rank</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        @endisset
                        </div>
                    </div>
                   <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ranks Available</h4>
                                <p class="category">This is the list of All Rank Available</p>
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Rank</th>
                                        <th>Staff-Class</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($rank as $eachRank)
                                        <tr>
                                            <td>{{$eachRank->rank}}</td>
                                            <td>{{$eachRank->staffclass}}</td>
                                            <td>{{$eachRank->description}}</td>
                                            <td style="min-width: 15em">
                                                <a class="btn btn-sm btn-info" href="{{ url("rank/$eachRank->id").'/edit' }}" >Edit</a>
                                                <a class="btn btn-sm btn-default" href="{{ url("rank/$eachRank->id") }}" >View</a>
                                                <a class="btn btn-sm btn-danger" href="{{ url("rank/$eachRank->id?action=del") }}" >Delete</a>
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