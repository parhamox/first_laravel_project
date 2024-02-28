<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{(Route :: is ('dashboard')) ? 'border border-danger rounded' : ''}} nav-link text-dark" href="{{route ('dashboard')}}">
                   <span>Home</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{Route ('profile')}}">View Profile </a>
    </div>
</div>
