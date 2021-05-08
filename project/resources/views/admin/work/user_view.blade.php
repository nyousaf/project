@extends('layouts.admin')
@section('content')
   <section class="content-header">
  
   </section>
    
    <div class="content-block box-body table-responsive">
   <a class="btn btn-md btn-danger" href="{{ route('txt.add') }}">+Add</a>
      <table id="full_detail_table" class="table table-hover table-responsive">
        <thead>
          <tr class="table-heading-row">
            <th>
              <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>#</th>
           
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile</th>       
            <th>City</th>            
            <th>Action</th>
            <th>State</th>
            
        </thead>
        
          <tbody>
            @foreach($user as $a)
              <tr>
                @if(Auth::user()->id != $a->id)
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="{{$a->id}}" id="checkbox{{$a->id}}">
                    <label for="checkbox{{$a->id}}" class="material-checkbox"></label>
                  </div>
                </td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->email }}</td>
                <td>{{ $a->address }}</td>
                <td>{{ $a->mobile }} </td>
                <td>{{ $a->city }}</td>
               <td> 
                <div class="admin-table-action-block">
                    <a href="{{route('tax.edit', $a->id)}}" data-toggle="tooltip" data-original-title="Edit" class="btn-info btn-floating"><i class="material-icons">mode_edit</i></a>
                    <!-- Delete Modal -->
                    <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#{{$a->id}}deleteModal"><i class="material-icons">delete</i> </button>
                    <!-- Modal -->
                    <div id="{{$a->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading">Are You Sure ?</h4>
                            <p>Do you really want to delete these records? This process cannot be undone.</p>
                          </div>
                          <div class="modal-footer">
                            {!! Form::open(['method' => 'DELETE', 'action' => ['UserDashboardController@del', $a->id]]) !!}
                                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                </td>
                  <td>
                     @if($a->suspended == '0')
                    <span class="label  label-success">Running</span>
                  @else
                    <span class="label  label-danger">Suspended</span>
                  @endif
                  </td>
                  @endif
               </tr>
            @endforeach
          </tbody>
        
      </table>
    </div>
  </div>
  @endsection
 

