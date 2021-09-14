@extends('layouts.layout')

@section('title', 'INN checker')

@section('meta_description', '')

@section('content')
    <div class="container mt-3">
        <form method="post">
            @csrf

            <div class="mb-3">
                <label for="inn" class="form-label">
                    {{ __('general.inn.inn') }}
                </label>

                @error('inn')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <input
                        type="text"
                        class="form-control"
                        id="inn"
                        name="inn"
                        value="{{ old('inn') }}"
                        placeholder="{{ __('general.inn.placeholder') }}"
                        required>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('general.send') }}</button>
        </form>

        @if(isset($data))
            <x-checker-alert :result="$data" />
        @endif
    </div>
@endsection
