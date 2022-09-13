@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-12">
                @livewire('user-contact-list-component', ['id' => $user->id])

                {{-- <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        @foreach ($users as $user)
                            @livewire('user-component', ['user' => $user])
                        @endforeach
                        {{ $users->links() }}
                    </div>
                </div> --}}
            </div>
            {{-- <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Contacts</div>

                    <div class="card-body">
                        @foreach ($contacts as $contact)
                            @livewire('contact-component', ['contact' => $contact])
                        @endforeach
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
