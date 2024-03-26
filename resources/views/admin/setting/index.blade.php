@extends('admin.layouts.app')

@section('content')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold pt-3 ">Update Tax</h4>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif
    <!-- form section -->
    <div class="row animate__animated animate__fadeInUp">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Update Tax</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('update-setting') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Tax</label>
                            <input
                                type="text"
                                name="key"
                                class="form-control @error('key') is-invalid @enderror"
                                id="defaultFormControlInput"
                                placeholder="Enter Tax"
                                value="{{ $tax->value }}"
                                aria-describedby="defaultFormControlHelp"
                                required
                            />
                            @error('key')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- / Content -->




@endsection
