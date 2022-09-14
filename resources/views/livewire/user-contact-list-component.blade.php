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
                        <th>Contact Number</th>
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
                                <td>{{ $contact->phone_number }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="col-md-12 text-center">
                @if ($contacts->hasMorePages())
                    <button wire:click.prevent="loadMore" class="btn btn-info text-center">Load more...</button>
                @endif
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @push('scripts')
        <script></script>
    @endpush
</div>
