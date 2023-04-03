@extends('Layouts.AdminLayout')
@section('title', 'All Nutritions')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 style="float:left" class="mb-sm-0">Excercise</h4>
                    <a style="float:right" href="{{ URL::to('nutrition/add') }}" class=" btn btn-success btn-lg">Add Nutrition</a>
                </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0 flex-grow-1">All Active Packages</h4> --}}
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <form action="{{ URL::to('nutrition/show') }}" method="GET">
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
                                            <div class="form-floating">

                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="goal" required>
                                                <option value="Loose Weight" {{ $week == 'Loose Weight' ? 'selected' : '' }}>Loose Weight</option>
                                                <option value="Keep Fit" {{ $week == 'Keep Fit' ? 'selected' : '' }}>Keep Fit</option>
                                                <option value="Get Stronger" {{ $week == 'Get Stronger' ? 'selected' : '' }}>Get Stronger</option>
    
                                            </select>
                                            <label for="floatingSelect">Select Goal</label>
                                            </div>

                                        </div>
                                        <div class="col-lg-12 mt-3 mb-5">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                            </form>
                    
    
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-nowrap align-middle mb-0" id="userTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Goal</th>
                                        <th scope="col">Recipe Type</th>
                                        <th scope="col">Recipe No</th>
                                        <th scope="col">Serving</th>
                                        <th scope="col">Net Carbs</th>
                                        <th scope="col">Protein</th>
                                        <th scope="col">Fat</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($nutrition))
                                    @foreach ($nutrition as $nutrition)
                                        <tr>
                                            <td>
                                                <div class="flex-shrink-0 me-2">
                                                    <img src="{{ asset('user_image/' . $nutrition->image) }}" alt=""
                                                        class="avatar-xs rounded-circle shadow" />
                                                </div>
                                            </td>
                                            <td>
                                                {{ $nutrition->name }}
    
                                            </td>
                                            <td>
                                                {{ $nutrition->month }} {{ $nutrition->year }},Week {{ $nutrition->week }},Day {{ $nutrition->day }}
                                            </td>
                                            <td>{{ $nutrition->goal }}</td>
                                            <td>{{ $nutrition->recipe_type }}</td>
                                            <td>
                                                Recipee {{ $nutrition->recipe_no }}
                                            </td>
                                            <td>{{ $nutrition->serving }} Serving</td>
                                            <td>{{ $nutrition->net_carbs }}g</td>
                                            <td>{{ $nutrition->protien }}g</td>
                                            <td>{{ $nutrition->fat }}g</td>
                                            <td>
                                                <a href="{{ URL::to('nutrition/edit/' . $nutrition->id) }}"
                                                    class="btn btn-success btn-sm">Edit Nutrition</a>
                                                <a href="{{ URL::to('nutrition/delete/' . $nutrition->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
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