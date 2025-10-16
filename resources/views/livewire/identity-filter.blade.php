<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start align-items-center gap-4">
                <div class="btn-group dropdown">
                    <button class="btn border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        All Identities
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="dropdown-item" href="#">All Identities</a>
                        </li>
                        @foreach ($identities as $identity)
                            <li>
                                <a class="dropdown-item" href="#">{{ $identity->name }}</a>
                            </li>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <li class="p-2">
                            <a class="btn btn-primary btn-full">New Identity</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h5 class="h5 m-0"><b>Filter by Identity</b></h5>
                    <span class="text-muted m-0">Filter breach data by identity</span>
                </div>
            </div>
            <div>
                <button class="btn btn-black">Manage Identities</button>
            </div>
        </div>
    </div>
</div>
