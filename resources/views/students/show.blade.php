@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                 <strong>{{$students->firstname}}</strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                  <strong>{{$students->lastname}}</strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-8">
                                  <strong>{{$students->gender}}</strong>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-8">
                                 <strong>{{$students->country}}</strong>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-8">
                                  <strong>{{$students->city}}</strong>
                            </div>
                        </div>


                          <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-8">
                                <strong>{{$students->address}}</strong>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                         
                                <a href="{{route('students.index')}}" class="btn btn-success">Home</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
