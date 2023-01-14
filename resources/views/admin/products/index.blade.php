@extends('layouts.admin')
@section('content')

 <div class="container-fluid pt-4 px-4">
    <a class="btn btn-sm btn-success my-2" href="{{route('admin.category.add')}}">Add New</a>
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Categories</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                   <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                     <td>
                                        <img style="height: 80px; width: 110px;" src="{{asset('admin/img/category/'.$item->image)}}">
                                    </td>
                                    <td>{{$item->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <a class="m-3" href="{{ url('category/edit/'.$item->id)}}">
                                         <i class="fa fa-light fa-pen"></i>
                                        </a>
                                        <a  href="{{ url('category/delete/'.$item->id) }}">
                                         <i class="fa fa-regular fa-trash"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                                    
                                @endforeach
                             
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
    
@endsection
