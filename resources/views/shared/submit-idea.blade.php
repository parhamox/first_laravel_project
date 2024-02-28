@auth


<h4> Share your ideas </h4>
<div class="row">
    <form action="{{ route('ideas.create') }} " method="POST">
        @csrf
    <div class="mb-3">
        <textarea name="content" class="form-control" id="content" rows="3"></textarea>
        @error('content')

            <span class="fs-5 text-danger">{{$message}}</span>

        @enderror
    </div>
    <div class="">
        <button type="submit" class="btn btn-dark"> Share </button>
    </div>
    </form>
</div>
@endauth
@guest

<h4> log in to  Share your ideas </h4>

@endguest
