<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List of Contact</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <p style="color: red">*Removing items from this list will cause them to be permanently deleted.</p>
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
                                    <button class="btn btn-danger" wire:click="deleteContact({{ $contact->id }})"
                                        title="Delete Contact">
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
