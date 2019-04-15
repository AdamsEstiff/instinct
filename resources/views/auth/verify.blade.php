@extends('layouts.app')

@section('content')
    <div  style="width: 100%; height: 91.5vh; background-image: url('https://s3.amazonaws.com/fjwp/blog/wp-content/uploads/2017/06/28043329/Inspirational-Home-Office-Workspace-Tips-to-Get-Organized.jpg')">
        <div class="content-right col-md-6">
            <div class="card"  style="border: 5px">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
