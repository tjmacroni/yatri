@extends('admin.layouts.main')
@section('content')
 <div class="main-panel">        
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Add Vehicle Type
            </h3>
           
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <form class="forms-sample" method="post" action="{{route('roomtype.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                      <label>Room Type Name</label>
                      <input type="text" class="form-control"  name="type_name">
                    </div>
                    <div class="form-group">
                      <label>Room Type Description</label>
                      <textarea class="form-control" name="type_description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Add</button>
                  </form>
                </div>
              </div>
            </div> @forelse($types as $type)
            <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">{{$type->name}}</h4>
                      <p>
                        {{$type->description}}
                      </p>
                      <a  href="{{route('vehicle.type.edit',$type->id)}}"><button class="btn btn-gradient-primary btn-rounded btn-icon">
                          <i class="mdi mdi-tooltip-edit"></i></button>
                        </a>
                        <a  href="{{route('roomtype.delete',$type->id)}}"><button class="btn btn-gradient-danger btn-rounded btn-icon">
                          <i class="mdi mdi-delete"></i></button>
                        </a>
                    </div>
                  </div>
              </div>
                  @empty
                  No Vehicle Types Available
                  @endforelse
        </div>
    </div>
</div>

@endsection