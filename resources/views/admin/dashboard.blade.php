@extends('admin.template.app')
@section('title', 'Dashboard')
@section('content')

<div class="col-lg-12 grid-margin stretch-card mt-5">
    <div class="card mb-4 rounded-3 shadow border-success">
        <div class="card-header py-3 text-white bg-dark border-primary">
            <h4 class="my-0 fw-normal">Process</h4>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Name </th>
                        <th> Phone Number </th>
                        <th> Address </th>
                        <th> Product Name </th>
                        <th> Total </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($transactions as $t)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$t->name}}</td>
                        <td>{{$t->phone_number}}</td>
                        <td>{{$t->address}}</td>
                        <td>{{$t->product_id}}</td>
                        <td>Rp. {{$t->total}}</td>
                        <td>
                            <form action="{{route('admin.approveOrder', $t->id)}}" method="post">
                                @csrf
                                <button type="submit" id="approved" class="btn btn-outline-success btn-sm mb-2">Approve
                                </button>
                            </form>
                            <form action="{{route ('admin.destroyOrder', $t->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" id="declined" class="btn btn-outline-danger btn-sm">Decline
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <div>
                    {{$transactions->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>

    @endsection