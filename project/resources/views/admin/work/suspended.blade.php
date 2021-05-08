@extends('layouts.admin')
@section('content')
   <section class="content-header">
  
   </section>
    
    <div class="content-block box-body table-responsive">
  
      <table id="full_detail_table" class="table table-hover table-responsive">
        <thead>
          <tr class="table-heading-row">
          
                
            
           
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile</th>       
            <th>City</th>            
          
            <th>State</th>
            
        </thead>
        
          <tbody>
            @foreach($user as $a)
              <tr>
                @if(Auth::user()->id != $a->id)
                   @if($a->suspended == '1')
               
                <td>{{ $a->name }}</td>
                <td>{{ $a->email }}</td>
                <td>{{ $a->address }}</td>
                <td>{{ $a->mobile }} </td>
                <td>{{ $a->city }}</td>
                  <td>
                  
                    <span class="label  label-danger">Suspended</span>
                  @else
                    <!-- <span class="label  label-danger">Suspended</span> -->
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
 

