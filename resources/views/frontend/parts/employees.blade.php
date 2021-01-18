<section id="employees">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme employees-carousel">
                    @foreach($employees as $employee)
                        <div class="item p-1">
                            <div class="card p-3">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="rounded-circle" src="{{$employee->getImage()}}" alt="User profile picture">
                                    </div>
                                </div>
                                <h4 class="profile-username text-center">{{$employee->fio}}</h4>
                                <h5 class="text-center">{{$employee->position}}</h5>
                                <p>{!! $employee->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
