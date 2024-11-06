@extends('dashboard.layouts.master')

@section('content')

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Contacts</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contact Submissions</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date Submitted</th>
                                        <th style="width: 12%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            {{-- <td>{{ $contact->id }}</td> --}}
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>
                                                @if (strlen($contact->message) > strlen('Thank you for making the rental experience easier'))
                                                    <span data-toggle="modal" data-target="#messageModal{{ $contact->id }}" style="cursor: pointer;">
                                                        {{ substr($contact->message, 0, strlen('Thank you for making the rental experience easier')) }}...
                                                    </span>
                                            
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="messageModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel{{ $contact->id }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="messageModalLabel{{ $contact->id }}">Full Message</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{ $contact->message }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span data-toggle="modal" data-target="#messageModal{{ $contact->id }}">
                                                        {{ $contact->message }}
                                                    </span>
                                            
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="messageModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel{{ $contact->id }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="messageModalLabel{{ $contact->id }}">Full Message</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{ $contact->message }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    <button style="border: none; margin-top:10px" type="button" class="btn btn-danger" onclick="confirmDelete('{{ $contact->id }}')">
                                                        Delete
                                                    </button>

                                                    <form id="deleteForm{{ $contact->id }}" action="{{ route('motor-link-contacts.destroy', $contact->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(contactId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + contactId).submit();
                }
            });
        }
    </script>

@endsection
