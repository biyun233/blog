@extends('layouts/app')

@section('content')
    <div class="container-fluid w-75">
        <br>
            <div class="row card text-white justify-content-center">
                <h4 class="card-header bg-info">Contactez-moi</h4>
                <div class="container card-body w-50">
                    <form action="{{ url('contact') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('contact_name') is-invalid @enderror" name="contact_name" id="contact_name" placeholder="Votre nom" value="{{ old('nom') }}">
                            @error('contact_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" id="contact_email" placeholder="Votre email" value="{{ old('email') }}">
                            @error('contact_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('contact_message') is-invalid @enderror" name="contact_message" id="contact_message" placeholder="Message" cols="30" rows="10">{{ old('message') }}</textarea>
                            @error('contact_message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" value="Envoyer!" class="button">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



