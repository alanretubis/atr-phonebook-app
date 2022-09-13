<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Users</h4>
            <a href="{{ route('contact.list') }}" class="pull-right">View All Contacts</a>
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
                    @if (!empty($users))
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">
                                    <button class="btn btn-warning" wire:click="$emit('setUserId', {{ $user->id }})"
                                        title="Add Contact">
                                        +<i class="fa fa-phone"></i>
                                    </button>
                                    <a href="{{ route('user.contacts', [$user->id]) }}" class="btn btn-info"
                                        title="View Contacts">
                                        <i class="fa fa-address-book"></i>
                                    </a>
                                </td>
                                <td>{{ $user->name }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="col-md-12 text-center">
                @if ($users->hasMorePages())
                    <button wire:click.prevent="loadMore" class="btn btn-info text-center">Load more...</button>
                @endif
            </div>
            {{-- @if (!empty($users))
                {{ $users->links() }}
            @endif --}}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @push('scripts')
        <script></script>
    @endpush
</div>
