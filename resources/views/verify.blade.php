@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('لطفا کد فعال سازی را وارد نمایید') }}</div>

                    <div class="card-body">
                        @include('UI.Parts.message')
                        <form method="POST" action="{{ route('verify') }}">
                            @csrf


                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('کد:') }}</label>

                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control @if ($errors->has('code')) has-error @endif" name="code" required autocomplete="current-password">

                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('code') }}</small>
                                     </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                            {{ __('verify') }}
                            </button>


                            </div>
                            </div>


                        </form>
                    </div>

                </div>
               <!--  <div class="card-footer">
                    <a href="#">دریافت کد جدید</a>
                    <input type="hidden" name="phone" value="{{request()->phone}}">
                </div> -->
                    <?php $user=DB::table('users')->latest()->pluck('id')->first();?>
                <div class="card-footer">
                <a href="{{url('/reverify/'.$user)}} ">Re-Verify</a>
                <input type="hidden" name="phone" value="{{request()->phone}}">
                </div>
        </div>
    </div>
@endsection




