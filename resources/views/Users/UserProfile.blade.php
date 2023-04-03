@extends('Layouts.AdminLayout')
@section('title', 'User Profile')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 style="float:left" class="mb-sm-0">User Profile</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-info">
                                <table class="table">
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <img src="{{ asset('user_image/' . $user->user_profile->profile_pic) }}"
                                                style="height: 100px;width: 100px;object-fit: cover;border-radius: 50px"
                                                alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Zubair Khan</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $user->user_profile->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Goal</th>
                                        <td>{{ $user->user_profile->goal }}</td>
                                    </tr>
                                    <tr>
                                        <th>Activity</th>
                                        <td>{{ str_replace('_' , ' ' , $user->user_profile->activity) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>{{ $user->user_profile->date_of_birth }}</td>
                                    </tr>
                                    <tr>
                                        <th>Height</th>
                                        <td>{{ $user->user_profile->height }}</td>
                                    </tr>
                                    <tr>
                                        <th>Weight</th>
                                        <td>{{ $user->user_profile->weight }} KG</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="nutritions-info-container mt-4">
                                    <h3 class="mt-3 mb-3">All Nutritions Plan</h3>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Month</th>
                                                <th scope="col">Year</th>
                                                <th scope="col">Nutrition Title</th>
                                                <th scope="col">Recipee Type</th>
                                                <th scope="col">Serving</th>
                                                <th scope="col">Net Carbs</th>
                                                <th scope="col">Protien</th>
                                                <th scope="col">Fat</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $id = 0;
                                            @endphp
                                            @forelse ($nutrition_plan as $nutrition)
                                            <tr>
                                                <th scope="row">{{ ++$id }}</th>
                                                <td>{{ $nutrition->month }}</td>
                                                <td>{{ $nutrition->year }}</td>
                                                <td>{{ $nutrition->nutrition->title }}</td>
                                                <td>{{ $nutrition->recipee_type }}</td>
                                                <td>{{ $nutrition->serving }}</td>
                                                <td>{{ $nutrition->nutrition->net_carbs }}</td>
                                                <td>{{ $nutrition->nutrition->protien }}</td>
                                                <td>{{ $nutrition->nutrition->fat }}</td>
                                                <td>
                                                    @if ($nutrition->status != 0)
                                                        <span class="badge badge-soft-success">Acheive</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Not Acheive</span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    <div class="hstack gap-3 fs-15">
                                                        <a href="javascript:void(0);" class="link-primary"><i
                                                                class="ri-settings-4-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger"><i
                                                                class="ri-delete-bin-5-line"></i></a>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                                <div class="excercise-info-container mt-4">
                                    <h3 class="mt-3 mb-3">All Excersie Plan</h3>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Month</th>
                                                <th scope="col">Year</th>
                                                <th scope="col">Weak</th>
                                                <th scope="col">Day</th>
                                                <th scope="col">Excercise Name</th>
                                                <th scope="col">Task Type</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $id = 0;
                                            @endphp
                                            @forelse ($excercise_plan as $excercise)
                                            <tr>
                                                <th scope="row">{{ ++$id }}</th>
                                                <td>{{ $excercise->month }}</td>
                                                <td>{{ $excercise->year }}</td>
                                                <td>{{ $excercise->week }}</td>
                                                <td>{{ $excercise->day }}</td>
                                                <td>{{ $excercise->excercise->name }}</td>
                                                <td>
                                                    @if ($excercise->excercise->type_of_excercise == 'minutes')
                                                        {{ substr($excercise->excercise->time,0,5) }}
                                                    @else
                                                    {{ $excercise->excercise->repeats }} Repeats

                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    @if ($excercise->status != 0)
                                                        <span class="badge badge-soft-success">Acheive</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Not Acheive</span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    <div class="hstack gap-3 fs-15">
                                                        <a href="javascript:void(0);" class="link-primary"><i
                                                                class="ri-settings-4-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger"><i
                                                                class="ri-delete-bin-5-line"></i></a>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')

@endsection
