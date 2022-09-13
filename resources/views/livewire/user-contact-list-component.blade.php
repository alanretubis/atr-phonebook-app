<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Contacts of {{ $user->name }}</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($contacts))
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="text-center">
                                    <button class="btn btn-danger"
                                        wire:click="removeFromUser({{ $contact->id }}, {{ $user->id }})"
                                        title="Remove Contact">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                                <td>{{ $contact->name }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if (!empty($contacts))
                {{ $contacts->links() }}
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @push('scripts')
        <script></script>
    @endpush
</div>
