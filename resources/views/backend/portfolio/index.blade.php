@extends('backend.master')

@section('main-content')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Portfolio All</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Portfolio Setup</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        
        {{-- multi image list --}}
        <div class="multi_image_list">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#Sl</th>
                                    <th>Portfolio Name</th>
                                    <th>Portfolio Title</th>
                                    <th>Portfolio Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp

                                @foreach ($portfolio as $item )
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->portfolio_name }}</td>
                                        <td>{{ $item->portfolio_title }}</td>
                                        <td>
                                            <img src="{{ asset($item->portfolio_img) }}" alt="" width="220px" height="70px">
                                        </td>
                                        <td>
                                            <a href="{{ route('portfolio.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                                <i class="lni lni-pencil-alt"></i>
                                            </a>
                                            
                                            <button class="btn btn-danger btn-sm deleteImage" data-url="{{ route('portfolio.destroy', $item->id) }}">
                                                <i class="fadeIn animated bx bx-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#Sl</th>
                                    <th>Portfolio Name</th>
                                    <th>Portfolio Title</th>
                                    <th>Portfolio Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.deleteImage').forEach(function(deleteButton){
            
            deleteButton.addEventListener('click', function(e){
                e.preventDefault();
                
                const deleteUrl = this.getAttribute('data-url');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: 'No, cancel!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms, redirect to the delete URL
                        window.location.href = deleteUrl;
                    } else {
                        // If user cancels, show a message
                        Swal.fire('Cancelled', 'The image was not deleted', 'error');
                    }
                });

            });

        });
    </script>
@endsection
