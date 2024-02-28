<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle border border-danger"
                    src="{{$idea->user->getimageURL()}} " alt="{{$idea->user->name}} ">

                <div>
                    <h5 class="card-title mb-0" ><a href="{{ route ('users.show', $idea->user->id ) }}"> {{$idea->user->name}}
                        </a></h5>
                </div>
             </div>
             <div>
           <form method="post" action="{{route('ideas.destroy' , $idea -> id)}}">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm fa fa-trash"></button>
            </form>
                 <a href="{{ route ('ideas.show' , $idea -> id)}}"><button class="btn btn-info btn-sm fa fa-eye mt-1"></button></a>
                    <br>
                <a href="{{ route ('ideas.edit' , $idea -> id)}}"><button class="btn btn-success btn-sm fas fa-edit mt-1"></button></a>

             </div>
          </div>
        </div>
      <div class="card-body">
        @if ($editing ?? false)
        <form action="{{ route('ideas.update' , $idea-> id ) }} " method="POST">
            @csrf
            @method('put')
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3">{{$idea -> content}}</textarea>
            @error('content')

                <span class="fs-5 text-danger">{{$message}}</span>

            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-success mb-2 btn-sm "> Edit </button>
        </div>
        </form>

        @else

        <p class="fs-6 fw-light text-muted">
            {{$idea -> content}}
        </p>
         @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span></a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea -> created_at}} </span>
            </div>
        </div>
@include('shared.comments-box')
    </div>
</div>
