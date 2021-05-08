@extends('layouts.admin')
@section('content')
  <div class="content-main-block  mrg-t-40">
    <div class="admin-create-btn-block">
      <a href="{{route('photos.create')}}" class="btn btn-danger btn-md">Add Photos</a>

      <!-- Delete Modal -->
      <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#bulk_delete"><i class="material-icons left">delete</i> Delete Selected</a>   
      <a type="button"  data-toggle="modal" data-target="#bulk_upload" class="btn btn-danger btn-md"><i class="fa fa-upload left">  </i>Bulk Import</a>

<!-- import questions modal-->
<div id="bulk_upload" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Import Photos</h6>
        </div>
          <div class="modal-body">
          
            <div class="form-group{{ $errors->has('photo_file') ? ' has-error' : '' }}">
              {!! Form::label('photo_file', 'Import Photos Via CSV File', ['class' => 'col-sm-3 control-label']) !!}
               <form style="margin-top: 15px;padding: 10px;" action="{{ url('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <br>
                <input type="file" name="photo_file" />
                <span>only csv files</span><br><br>
                <button class="btn btn-primary right">Import File</button>
            </form>
 
            </div>
          </div>
         
          </div>
      
      </div>
    </div>
  </div>
    <!-- Modal -->
      <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
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
              {!! Form::open(['method' => 'POST', 'action' => 'WorkController@bulk_delete', 'id' => 'bulk_delete_form']) !!}
                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-block box-body table-responsive">
      <table id="full_detail_table" class="table table-hover table-responsive">
        <thead>
          <tr class="table-heading-row">
            <th>
              <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>#</th>
            <th>Image</th>
            <th>Catgeory</th>
            <th>Title</th>
            <th>Description</th>
            <th>Approval</th>       
            <th>Status</th>            
            <th>Timestamp</th>
            <th>Actions</th>
          </tr>
        </thead>
        @if (isset($work))
          <tbody>
            @foreach($work as $key => $item)
              <tr>
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="{{$item->id}}" id="checkbox{{$item->id}}">
                    <label for="checkbox{{$item->id}}" class="material-checkbox"></label>
                  </div>
                  {{$key+1}}
                </td>
                <td>
                  @if ($item->workphotos->first())
                    <img src="{{ asset('images/work/'.$item->workphotos->first()->images) }}" class="img-responsive" width="80" height="80" alt="image">
                  @else
                    N/A  
                  @endif
                </td>
                <td>{{$item->categories->title}}</td>
                <td>{{$item->title}}</td>
                <td>{{str_limit($item->desc ? $item->desc : '-',30)}}</td>
                <td>
                  @if($item->status == '0')
                    <span class="label label-danger">Rejected</span>
                  @elseif($item->status == '1')
                    <span class="label label-success">Approved</span>
                  @else
                    <span class="label label-warning">Pending</span>
                  @endif
                </td>
                <td>{{$item->is_active == '1' ? 'Published' : 'Unpublished'}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                  <div class="admin-table-action-block">
                    <a href="{{route('photos.edit', $item->id)}}" data-toggle="tooltip" data-original-title="Edit" class="btn-info btn-floating"><i class="material-icons">mode_edit</i></a>
                    <!-- Delete Modal -->
                    <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#{{$item->id}}deleteModal"><i class="material-icons">delete</i> </button>
                    <!-- Modal -->
                    <div id="{{$item->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                            {!! Form::open(['method' => 'DELETE', 'action' => ['WorkController@destroy', $item->id]]) !!}
                                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        @endif  
      </table>
      {{-- <div class="eloquent-pagination">
        {{ $cities->links() }}
      </div> --}}
    </div>
  </div>
@endsection
