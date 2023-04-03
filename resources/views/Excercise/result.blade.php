@extends('Layouts.AdminLayout')
@section('title', 'All Excercises')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 style="float:left" class="mb-sm-0">Excercises</h4>
                        <a style="float:right" href="{{ URL::to('excercise/add') }}" class=" btn btn-success btn-lg">Add
                            Excercise</a>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <form action="{{ URL::to('excercise/show') }}" method="GET">
                            @csrf
                            <div class="card-header" style="display:flex">
                                <div style="float:left">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="month" required>
                                        {{-- <option selected>{{ $month }}</option> --}}
                                        <option value="January" {{ $month == 'January' ? 'selected' : '' }}>January</option>
                                        <option value="February" {{ $month == 'February' ? 'selected' : '' }}>February
                                        </option>
                                        <option value="March" {{ $month == 'March' ? 'selected' : '' }}>March</option>
                                        <option value="April" {{ $month == 'April' ? 'selected' : '' }}>April</option>
                                        <option value="May" {{ $month == 'May' ? 'selected' : '' }}>May</option>
                                        <option value="June" {{ $month == 'June' ? 'selected' : '' }}>June</option>
                                        <option value="July" {{ $month == 'July' ? 'selected' : '' }}>July</option>
                                        <option value="August" {{ $month == 'August' ? 'selected' : '' }}>August</option>
                                        <option value="September" {{ $month == 'September' ? 'selected' : '' }}>September
                                        </option>
                                        <option value="October" {{ $month == 'October' ? 'selected' : '' }}>October
                                        </option>
                                        <option value="November" {{ $month == 'November' ? 'selected' : '' }}>November
                                        </option>
                                        <option value="December" {{ $month == 'December' ? 'selected' : '' }}>December
                                        </option>
                                    </select>
                                </div>
                                <div style="float:left" class="ms-3">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="year" required>
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @for ($i = Carbon\Carbon::now()->year; $i <= Carbon\Carbon::now()->year + 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="week" required>
                                            {{-- <option value="" >{{ $week }},{{ gettype($week) }}</option> --}}
                                            <option value="1" {{ $week == '1' ? 'selected' : '' }}>Week 1</option>
                                            <option value="2" {{ $week == '2' ? 'selected' : '' }}>Week 2</option>
                                            <option value="3" {{ $week == '3' ? 'selected' : '' }}>Week 3</option>
                                            <option value="4" {{ $week == '4' ? 'selected' : '' }}>Week 4</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="day" required>
                                            {{-- <option value="" selected>Select Day</option> --}}
                                            <option value="1" {{ $day == '1' ? 'selected' : '' }}>Day 1</option>
                                            <option value="2" {{ $day == '2' ? 'selected' : '' }}>Day 2</option>
                                            <option value="3" {{ $day == '3' ? 'selected' : '' }}>Day 3</option>
                                            <option value="4" {{ $day == '4' ? 'selected' : '' }}>Day 4</option>
                                            <option value="5" {{ $day == '5' ? 'selected' : '' }}>Day 5</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-12 mt-3 mb-5">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                        </form>
                        {{-- <div class="col-3"> <a href="" class="btn btn-success btn-lg"> Week 1</a></div>
                            <div class="col-3"> <a href="" class="btn btn-success btn-lg"> Week 2</a></div>
                            <div class="col-3"> <a href="" class="btn btn-success btn-lg"> Week 3</a></div>
                            <div class="col-3"> <a href="" class="btn btn-success btn-lg"> Week 4</a></div> --}}

                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-nowrap align-middle mb-0" id="userTable">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type of Excercise</th>
                                    <th scope="col">Repeat or Minutes</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($search_result as $search)
                                    <tr>
                                        <td>
                                            <div class="flex-shrink-0 me-2">
                                                <img src="{{ asset('user_image/' . $search->image) }}" alt=""
                                                    class="avatar-xs rounded-circle shadow" />
                                            </div>
                                        </td>
                                        <td>
                                            {{ $search->name }}

                                        </td>
                                        <td>
                                            {{-- <div class="d-flex align-items-center"> --}}
                                            {{--  --}}
                                            {{-- <div class="flex-grow-1">{{ $user->name }}</div> --}}
                                            {{-- </div> --}}
                                            {{ $search->type_of_excercise }}
                                        </td>
                                        <td>{{ $search->minutes }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{ $search->id }}">
                                                Show video
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal-{{ $search->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content" style="padding: 0px;background: none;border: none;">
                                                        <div class="modal-body">
                                                            <video class="ms-auto me-auto" style="width: 100%;height: auto;border-radius: 20px;;" controls>
                                                                <source src="{{ asset('user_image/'.$search->video) }}" type="video/mp4">
                                                                {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <a href="{{ URL::to('excercise/edit/' . $search->id) }}"
                                                class="btn btn-success btn-sm">Edit Excercise</a>
                                            <a href="{{ URL::to('excercise/delete/' . $search->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
@section('script')
<script>
    $(function(){
        $("#userTable").DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>
@endsection
