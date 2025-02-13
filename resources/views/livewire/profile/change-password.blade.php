<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                    <!-- Success message -->
                    @if ($message)
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif

                    <!-- Error message -->
                    @if ($errorMessage)
                        <div class="alert alert-danger">
                            {{ $errorMessage }}
                        </div>
                    @endif

                    <!-- Password Change Form -->
                    <form wire:submit.prevent="changePassword">
                        <div class="row mb-3">
                            <label for="current_password"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>
                            <div class="col-md-6">
                                <input type="password" id="current_password" wire:model="current_password"
                                       class="form-control @error('current_password') is-invalid @enderror" required>

                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_password"
                                   class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input type="password" id="new_password" wire:model="new_password"
                                       class="form-control @error('new_password') is-invalid @enderror" required>

                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_password_confirmation"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Confirm New Password') }}</label>

                            <div class="col-md-6">
                                <input type="password" id="new_password_confirmation"
                                       wire:model="new_password_confirmation"
                                       class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                       required>

                                @error('new_password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
