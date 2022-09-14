<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="card card-default">
        <form wire:submit.prevent="submit">
            <div class="card-header">
                <h4 class="card-title">Add Contacts</h4>
                @if (!empty($user_name))
                    <p>Selected User:</p>
                    <h3>{{ $user_name }}</h3>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @error('user_id')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" wire:model="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Phone Number:</label>
                            <input type="text" wire:model="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror">
                            @error('phone_number')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{-- Card footer elements --}}
                <button type="submit" class="btn btn-md btn-outline-primary">Save</button>
                <a class="btn btn-md btn-outline-danger" href="">Cancel</a>
            </div>
        </form>
    </div>
    @push('scripts')
        <script></script>
    @endpush
</div>
