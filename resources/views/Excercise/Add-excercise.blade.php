@extends('Layouts.AdminLayout')
@section('title', 'Add Excercise')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        @if (isset($excercise))
                            <h4 class="mb-sm-0">Update</h4>
                        @else
                            <h4 class="mb-sm-0">Add Excercise</h4>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                {{ isset($excercise) ? 'Update Excercise' : 'Add Excercise' }}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <a style="float:right" href="{{ URL::to('excercise') }}"
                                        class=" btn btn-success btn-lg">All Excercise</a>

                                </div>
                            </div>
                        </div><!-- end card header -->
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <p class="text-danger ms-3 mt-3 mb-3">All Field (times or minutes) of Days is required</p>
                    @endforeach
                           
                        @endif
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ URL::to('excercise/add') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <input type="hidden" name="id"
                                            value="{{ isset($excercise) ? $excercise->id : '' }}">
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="month" required>
                                                    {{-- <option selected>{{ \carbon\carbon::now()->format('F') }}</option> --}}
                                                    @if (isset($excercise))
                                                        <option value="January"
                                                            {{ $excercise->month == 'January' ? 'selected' : '' }}>January
                                                        </option>
                                                        <option value="February"
                                                            {{ $excercise->month == 'February' ? 'selected' : '' }}>February
                                                        </option>
                                                        <option value="March"
                                                            {{ $excercise->month == 'March' ? 'selected' : '' }}>March
                                                        </option>
                                                        <option value="April"
                                                            {{ $excercise->month == 'April' ? 'selected' : '' }}>April
                                                        </option>
                                                        <option value="May"
                                                            {{ $excercise->month == 'May' ? 'selected' : '' }}>May</option>
                                                        <option value="June"
                                                            {{ $excercise->month == 'June' ? 'selected' : '' }}>June
                                                        </option>
                                                        <option value="July"
                                                            {{ $excercise->month == 'July' ? 'selected' : '' }}>July
                                                        </option>
                                                        <option value="August"
                                                            {{ $excercise->month == 'August' ? 'selected' : '' }}>August
                                                        </option>
                                                        <option value="September"
                                                            {{ $excercise->month == 'September' ? 'selected' : '' }}>
                                                            September</option>
                                                        <option value="October"
                                                            {{ $excercise->month == 'October' ? 'selected' : '' }}>October
                                                        </option>
                                                        <option value="November"
                                                            {{ $excercise->month == 'November' ? 'selected' : '' }}>
                                                            November</option>
                                                        <option value="December"
                                                            {{ $excercise->month == 'December' ? 'selected' : '' }}>
                                                            December</option>
                                                    @else
                                                        <option value="January"
                                                            {{ \carbon\carbon::now()->format('F') == 'January' ? 'selected' : '' }}>
                                                            January</option>
                                                        <option value="February"
                                                            {{ \carbon\carbon::now()->format('F') == 'February' ? 'selected' : '' }}>
                                                            February</option>
                                                        <option value="March"
                                                            {{ \carbon\carbon::now()->format('F') == 'March' ? 'selected' : '' }}>
                                                            March</option>
                                                        <option value="April"
                                                            {{ \carbon\carbon::now()->format('F') == 'April' ? 'selected' : '' }}>
                                                            April</option>
                                                        <option value="May"
                                                            {{ \carbon\carbon::now()->format('F') == 'May' ? 'selected' : '' }}>
                                                            May</option>
                                                        <option value="June"
                                                            {{ \carbon\carbon::now()->format('F') == 'June' ? 'selected' : '' }}>
                                                            June</option>
                                                        <option value="July"
                                                            {{ \carbon\carbon::now()->format('F') == 'July' ? 'selected' : '' }}>
                                                            July</option>
                                                        <option value="August"
                                                            {{ \carbon\carbon::now()->format('F') == 'August' ? 'selected' : '' }}>
                                                            August</option>
                                                        <option value="September"
                                                            {{ \carbon\carbon::now()->format('F') == 'September' ? 'selected' : '' }}>
                                                            September</option>
                                                        <option value="October"
                                                            {{ \carbon\carbon::now()->format('F') == 'October' ? 'selected' : '' }}>
                                                            October</option>
                                                        <option value="November"
                                                            {{ \carbon\carbon::now()->format('F') == 'November' ? 'selected' : '' }}>
                                                            November</option>
                                                        <option value="December"
                                                            {{ \carbon\carbon::now()->format('F') == 'December' ? 'selected' : '' }}>
                                                            December</option>
                                                    @endif

                                                </select>
                                                <label for="floatingSelect">Select Month</label>
                                            </div>
                                            @error('month')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="year" required>
                                                    @if (isset($excercise))
                                                        <option value="{{ $excercise->year }}" selected>
                                                            {{ $excercise->year }}</option>
                                                    @endif

                                                    @for ($i = Carbon\Carbon::now()->year; $i <= Carbon\Carbon::now()->year + 10; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <label for="floatingSelect">Select Year</label>
                                            </div>
                                            @error('year')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if(!isset($excercise))
                                        <div class="week_style col-lg-12 mt-5 mb-2">
                                            <div class="col-sm-12 mt-2 mb-2  row">
                                                <div
                                                    class="col-lg-4 col-md-12 form-check form-check-inline d-flex justify-content-center sm-mb-2">
                                                    <input class="form-check-input" name="week[]" type="checkbox"
                                                        id="inlineCheckbox1" value="1"
                                                        {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label ms-2" for="inlineCheckbox1">Week
                                                        1</label>
                                                </div>
                                                <div class="col-lg-8 col-md-12 row" id="day_of_week1" style="display:none">
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline ">
                                                            <input class="form-check-input" name="week_day1[]"
                                                                type="checkbox" id="week_day1_1" value="1"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day1_1">Day 1</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day1[]"
                                                                type="checkbox" id="week_day1_2" value="2"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day1_2">Day 2</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day1[]"
                                                                type="checkbox" id="week_day1_3" value="3"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day1_3">Day
                                                                3</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day1[]"
                                                                type="checkbox" id="week_day1_4" value="4"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day1_4">Day
                                                                4</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day1[]"
                                                                type="checkbox" id="week_day5" value="5"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day5">Day 5</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('week_day1')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                    
                                            <div class="col-sm-12 mt-2 mb-2 row">
                                                <div
                                                    class="col-lg-4 col-md-12 form-check form-check-inline d-flex justify-content-center sm-mb-2">
                                                    <input class="form-check-input" name="week[]" type="checkbox"
                                                        id="inlineCheckbox2" value="2"
                                                        {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label ms-2" for="inlineCheckbox2">Week
                                                        2</label>
                                                </div>
                                                <div class="col-lg-8 col-md-12 row" id="day_of_week2"
                                                    style="display:none">
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline ">
                                                            <input class="form-check-input" name="week_day2[]"
                                                                type="checkbox" id="week_day2_1" value="1"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day2_1">Day
                                                                1</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day2[]"
                                                                type="checkbox" id="week_day2_2" value="2"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day2_2">Day
                                                                2</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day2[]"
                                                                type="checkbox" id="week_day2_3" value="3"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day2_3">Day
                                                                3</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day2[]"
                                                                type="checkbox" id="week_day2_4" value="4"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day2_4">Day
                                                                4</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day2[]"
                                                                type="checkbox" id="week_day2_5" value="5"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day2_5">Day
                                                                5</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('week_day2')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 mt-2 mb-2 row">
                                                <div
                                                    class="col-lg-4 col-md-12 form-check form-check-inline d-flex justify-content-center sm-mb-2">
                                                    <input class="form-check-input" name="week[]" type="checkbox"
                                                        id="inlineCheckbox3" value="3"
                                                        {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label ms-2" for="inlineCheckbox3">Week
                                                        3</label>
                                                </div>
                                                <div class="col-lg-8 col-md-12 row" id="day_of_week3"
                                                    style="display:none">
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline ">
                                                            <input class="form-check-input" name="week_day3[]"
                                                                type="checkbox" id="week_day3_1" value="1"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day3_1">Day
                                                                1</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day3[]"
                                                                type="checkbox" id="week_day3_2" value="2"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day3_2">Day
                                                                2</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day3[]"
                                                                type="checkbox" id="week_day3_3" value="3"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day3_3">Day
                                                                3</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day3[]"
                                                                type="checkbox" id="week_day3_4" value="4"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day3_4">Day
                                                                4</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day3[]"
                                                                type="checkbox" id="week_day3_5" value="5"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day3_5">Day
                                                                5</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('week_day3')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 mt-2 mb-2 row">
                                                <div
                                                    class="col-lg-4 col-md-12 form-check form-check-inline d-flex justify-content-center sm-mb-2">
                                                    <input class="form-check-input" name="week[]" type="checkbox"
                                                        id="inlineCheckbox4" value="4"
                                                        {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label ms-2" for="inlineCheckbox4">Week
                                                        4</label>
                                                </div>
                                                <div class="col-lg-8 col-md-12 row" id="day_of_week4"
                                                    style="display:none">
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline ">
                                                            <input class="form-check-input" name="week_day4[]"
                                                                type="checkbox" id="week_day4_1" value="1"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day4_1">Day
                                                                1</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day4[]"
                                                                type="checkbox" id="week_day4_2" value="2"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day4_2">Day
                                                                2</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day4[]"
                                                                type="checkbox" id="week_day4_3" value="3"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day4_3">Day
                                                                3</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day4[]"
                                                                type="checkbox" id="week_day4_4" value="4"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day4_4">Day
                                                                4</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="week_day4[]"
                                                                type="checkbox" id="week_day4_5" value="5"
                                                                {{ isset($excercise) && $excercise->week == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="week_day4_5">Day
                                                                5</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('week_day4')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            @error('week')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-12">

                                                </div>
                                                <div class="col-lg-3 col-sm-12">

                                                </div>
                                                <div class="col-lg-3 col-sm-12">

                                                </div>
                                                <div class="col-lg-3 col-sm-12">

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if(isset($excercise))
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="week" required>
                                                    @if (isset($excercise))
                                                       
                                                    @else
                                                        <option value="" selected>Select Week</option>
                                                    @endif
                                                    <option value="1" {{ isset($excercise) && $excercise->week == "1" ? "selected" : '' }}>Week 1</option>
                                                    <option value="2" {{ isset($excercise) && $excercise->week == "2" ? "selected" : '' }}>Week 2</option>
                                                    <option value="3" {{ isset($excercise) && $excercise->week == "3" ? "selected" : '' }}>Week 3</option>
                                                    <option value="4" {{ isset($excercise) && $excercise->week == "4" ? "selected" : '' }}>Week 4</option>

                                                </select>
                                                <label for="floatingSelect">Select Week</label>
                                            </div>
                                            @error('week')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>  
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="day" required>
                                                    @if (isset($excercise))
                                                   
                                                @else
                                                    <option value="" selected>Select Day</option>
                                                @endif
                                                <option value="1" {{ isset($excercise) && $excercise->day == "1" ? "selected" : '' }}>Day 1</option>
                                                <option value="2" {{ isset($excercise) && $excercise->day == "2" ? "selected" : '' }}>Day 2</option>
                                                <option value="3" {{ isset($excercise) && $excercise->day == "3" ? "selected" : '' }}>Day 3</option>
                                                <option value="4" {{ isset($excercise) && $excercise->day == "4" ? "selected" : '' }}>Day 4</option>
                                                <option value="5" {{ isset($excercise) && $excercise->day == "5" ? "selected" : '' }}>Day 5</option>

                                                </select>
                                                <label for="floatingSelect">Select Day</label>
                                            </div>
                                            @error('day')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @endif
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="goal" required>
                                                    @if (isset($excercise))
                                                        
                                                    @else
                                                        <option value="" selected>Select Goal</option>
                                                    @endif
                                                    <option value="Loose Weight" {{ isset($excercise) && $excercise->goal == "Loose Weight" ? "selected" : '' }}>Loose Weight</option>
                                                    <option value="Keep Fit" {{ isset($excercise) && $excercise->goal == "Keep Fit" ? "selected" : '' }}>Keep Fit</option>
                                                    <option value="Get Stronger" {{ isset($excercise) && $excercise->goal == "Get Stronger" ? "selected" : '' }}>Get Stronger</option>
                                                </select>
                                                <label for="floatingSelect">Select Goal</label>
                                            </div>
                                            @error('goal')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-lg-6 mt-4 mb-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox"
                                                    id="activity1" value="Sedentry"
                                                    {{ isset($excercise) && $excercise->Sedentry == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="activity1">Sedentry</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox"
                                                    id="activity2" value="Lightly_Active"
                                                    {{ isset($excercise) && $excercise->Lightly_Active == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="activity2">Lightly Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox"
                                                    id="activity3" value="Moderately_Active"
                                                    {{ isset($excercise) && $excercise->Moderately_Active == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="activity3">Moderately Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox"
                                                    id="activity4" value="Very_Active"
                                                    {{ isset($excercise) && $excercise->Very_Active == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="activity4">Very Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox"
                                                    id="activity5" value="Extra_Active"
                                                    {{ isset($excercise) && $excercise->Extra_Active == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="activity5">Extra Active</label>
                                            </div>
                                            @error('activity')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="firstnamefloatingInput"
                                                    placeholder="Enter your Excercise Name"
                                                    value="{{ isset($excercise) ? $excercise->name : '' }}"
                                                    name="excercise_name">
                                                <label for="firstnamefloatingInput">Excercise Name</label>
                                            </div>
                                            @error('excercise_name')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if (!isset($excercise))
                                            <div id="option_outline_value">

                                            </div>
                                            <div id="option_outline_value_week2">

                                            </div>
                                            <div id="option_outline_value_week3">

                                            </div>
                                            <div id="option_outline_value_week4">

                                            </div>
                                        @endif
                                        @if (isset($excercise))
                                        <div class="col-lg-12 row">
                                            <div class="col-lg-4 ">
                                            <!-- Outlined Styles -->
                                            <div class="hstack gap-2 flex-wrap mt-lg-4 mb-lg-4">

                                                <input type="radio" class="btn-check" value="repeats" name="options_outlined" {{ isset($excercise) && $excercise->type_of_excercise == 'repeats' ? 'checked' : '' }}
                                                    id="success-outlined" >
                                                <label class="btn btn-outline-success shadow-none"
                                                    for="success-outlined">Repeats</label>

                                                <input type="radio" class="btn-check" value="minutes" name="options_outlined" {{ isset($excercise) && $excercise->type_of_excercise == 'minutes' ? 'checked' : '' }}
                                                    id="success2-outlined">
                                                <label class="btn btn-outline-success shadow-none"
                                                    for="success2-outlined">Time</label>
                                            </div>
                                             @error('options_outlined')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div id="total_repeat" class="col-lg-8 mt-3" style="display:{{ isset($excercise) && $excercise->type_of_excercise == 'repeats' ? 'block' : 'none'  }}">
                                            <div class="form-floating">
                                                <input type="number" name="total_repeat" class="form-control"
                                                    id="firstnamefloatingInput" placeholder="Enter your Total Repeat"
                                                    value="{{ isset($excercise) && $excercise->type_of_excercise == 'repeats' ? $excercise->repeats : '' }}"
                                                    name="total_repeat">
                                                <label for="firstnamefloatingInput">Total Repeat</label>
                                            </div>
                                            @error('total_repeat')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div id="time_in_minute" class="col-lg-8 mt-3" style="display: {{ isset($excercise) && $excercise->type_of_excercise == 'minutes' ? 'block' : 'none'  }}">
                                            <div class="form-floating">
                                                <input type="text"  class="form-control"
                                                    name="time" id="cleave-time-format"
                                                    placeholder="mm:ss"
                                                    value="{{ isset($excercise) && $excercise->type_of_excercise == 'minutes' ? $excercise->time : '' }}">
                                                    <label for="cleave-time-format" >Time </label>

                                            </div>
                                            @error('time')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div> 
                                        @endif 

                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">Image of Excercise</h4>
                                                </div><!-- end card header -->

                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="image"
                                                        id="inputGroupFile02" accept="image/*">
                                                    {{-- <label class="input-group-text" for="inputGroupFile02">Upload</label> --}}
                                                </div>
                                                <!-- end card body -->
                                            </div>

                                            <div class="mt-5">
                                                <img id="preview" src="" alt="Preview" width="100%"
                                                    height="300px" style="display:none;object-fit:contain">
                                            </div>

                                            @error('image')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">Video of Excercise</h4>
                                                </div><!-- end card header -->

                                                <div class="input-group">
                                                    <input type="file" id="inputGroupFile03" class="form-control"
                                                        name="video" accept="video/mp4" />
                                                </div>
                                                <!-- end card body -->
                                            </div>

                                            <div class="mt-5">
                                                <video id="preview_video" class="ms-auto me-auto"
                                                    style="width: 100%;height: 300px;border-radius: 20px;display:none"
                                                    controls>
                                                    {{-- <source id="preview2" src="" alt="Preview" width="100%" height="300px" type="video/mp4"> --}}
                                                    {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                                    {{-- Your browser does not support the video tag. --}}
                                                </video>

                                            </div>

                                            @error('video')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="d-none code-view">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row -->


    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/pages/form-masks.init.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('input[name="week[]"]').change(function() {
                let checked_week = [];
                $('input[name="week[]"]:checked').each(function() {
                    checked_week.push($(this).val());
                })
                $('#day_of_week1').css('display', 'none');

                $('#day_of_week2').css('display', 'none');

                $('#day_of_week3').css('display', 'none');

                $('#day_of_week4').css('display', 'none');

                checked_week.forEach(element => {

                    if (element === '1') {
                        $('#day_of_week1').css('display', 'flex');
                    }
                    if (element === '2') {
                        $('#day_of_week2').css('display', 'flex');
                    }
                    if (element === '3') {
                        $('#day_of_week3').css('display', 'flex');
                    }
                    if (element === '4') {
                        $('#day_of_week4').css('display', 'flex');
                    }
                });
                checked_week = [];
            })
            $('input[name="week_day1[]"]').change(function() {
                $('#option_outline_value').empty();
                $('input[name="week_day1[]"]:checked').each(function() {
                    var append_active = `
            <div class="col-lg-12 row">
                <div class="col-lg-4 ">
                    
                    <div class="hstack gap-2 flex-wrap mt-lg-4 mb">
                        <h5>Week 1, Day ${$(this).val()}</h5>
                        <input type="radio" class="btn-check" value="repeats_${$(this).val()}" name="options_outlined_week1_${$(this).val()}"
                            id="success-outlined-${$(this).val()}-day${$(this).val()}" />
                        <label class="btn btn-outline-success shadow-none"
                            for="success-outlined-${$(this).val()}-day${$(this).val()}">Repeats</label>
                        <input type="radio" class="btn-check" value="minutes_${$(this).val()}" name="options_outlined_week1_${$(this).val()}"
          
                            id="success2-outlined-${$(this).val()}-day${$(this).val()}" />
                        <label class="btn btn-outline-success shadow-none"
                            for="success2-outlined-${$(this).val()}-day${$(this).val()}">Time</label>
                    </div>
                    @error('options_outlined_week1_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
                <div id="total_repeat_week1_${$(this).val()}" class="col-lg-8 mt-3" style="display:none">
                    <div class="form-floating">
                        <input type="number" class="form-control"
                            id="firstnamefloatingInput" placeholder="Enter your Total Repeat"
                            name="total_repeat_week1_day_${$(this).val()}" />
                        <label for="firstnamefloatingInput">Total Repeat</label>
                    </div>
                    @error('total_repeat_week1_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
                <div id="time_in_minute_week1_${$(this).val()}" class="col-lg-8 mt-3" style="display: none">
                    <div class="form-floating">
                        <input type="text"  class="cleave_input form-control"
                            name="time_week1_day_${$(this).val()}" id="cleave-time-format"
                            placeholder="mm:ss"
                            />
                        <label for="cleave-time-format" >Time </label>
                    </div>
                    @error('time_week1_day_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        `;
                    $('#option_outline_value').append(append_active);
                });
                $('#option_outline_value').on('change', 'input[name^="options_outlined_week1"]',
            function() {
                    value_text = $(this).next('label').text();
                    value_of_checkbox = $(this).val();
                    get_excercise_value = value_of_checkbox.slice(-1);

                    if (value_text == 'Time') {
                        $('#time_in_minute_week1_' + get_excercise_value).css('display', 'block');
                        $(`input[name="time_week1_day_${get_excercise_value}"]`).prop('required',true);
                        var cleave = new Cleave(`input[name="time_week1_day_${get_excercise_value}"]`, {
                                time: true,
                                timePattern: ['h', 'm']
                            });
                        $('#total_repeat_week1_' + get_excercise_value).css('display', 'none');
                        $(`input[name="total_repeat_week1_day_${get_excercise_value}"]`).prop('required',false);

                    } else {
                        $('#time_in_minute_week1_' + get_excercise_value).css('display', 'none');
                        $(`input[name="time_week1_day_${get_excercise_value}"]`).prop('required',false);
                        $('#total_repeat_week1_' + get_excercise_value).css('display', 'block');
                        $(`input[name="total_repeat_week1_day_${get_excercise_value}"]`).prop('required',true);
                    }

                });

            });

            $('input[name="week_day2[]"]').change(function() {
                $('#option_outline_value_week2').empty();
                $('input[name="week_day2[]"]:checked').each(function() {
                    var append_active = `
            <div class="col-lg-12 row">
                <div class="col-lg-4 ">
                    
                    <div class="hstack gap-2 flex-wrap mt-lg-4 mb">
                        <h5>Week 2, Day ${$(this).val()}</h5>
                        <input type="radio" class="btn-check" value="repeats_${$(this).val()}" name="options_outlined_week2_${$(this).val()}"
                            id="success-outlined-week2-${$(this).val()}-day${$(this).val()}" />
                        <label class="btn btn-outline-success shadow-none"
                            for="success-outlined-week2-${$(this).val()}-day${$(this).val()}">Repeats</label>
                        <input type="radio" class="btn-check" value="minutes_${$(this).val()}" name="options_outlined_week2_${$(this).val()}"
          
                            id="success2-outlined-week2-${$(this).val()}-day${$(this).val()}" />
                        <label class="btn btn-outline-success shadow-none"
                            for="success2-outlined-week2-${$(this).val()}-day${$(this).val()}">Time</label>
                    </div>
                       @error('options_outlined_week2_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
                <div id="total_repeat_week2_${$(this).val()}" class="col-lg-8 mt-3" style="display:none">
                    <div class="form-floating">
                        <input type="number" class="form-control"
                            id="firstnamefloatingInput" placeholder="Enter your Total Repeat"
                            name="total_repeat_week2_day_${$(this).val()}" />
                        <label for="firstnamefloatingInput">Total Repeat</label>
                    </div>
                       @error('total_repeat_week2_day_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
                <div id="time_in_minute_week2_${$(this).val()}" class="col-lg-8 mt-3" style="display: none">
                    <div class="form-floating">
                        <input type="text"  class="cleave_input form-control"
                            name="time_week2_day_${$(this).val()}" id="cleave-time-format"
                            placeholder="mm:ss"
                            />
                        <label for="cleave-time-format" >Time </label>
                    </div>
                    @error('time_week2_day_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        `;
                    $('#option_outline_value_week2').append(append_active);
                });
                $('#option_outline_value_week2').on('change', 'input[name^="options_outlined_week2"]',
                    function() {
                        value_text = $(this).next('label').text();
                        value_of_checkbox = $(this).val();
                        get_excercise_value = value_of_checkbox.slice(-1);
                        if (value_text == 'Time') {
                            $('#time_in_minute_week2_' + get_excercise_value).css('display', 'block');
                            $(`input[name="time_week2_day_${get_excercise_value}"]`).prop('required',true);
                            var cleave = new Cleave(`input[name="time_week2_day_${get_excercise_value}"]`, {
                                time: true,
                                timePattern: ['h', 'm']
                            });
                            $('#total_repeat_week2_' + get_excercise_value).css('display', 'none');
                            $(`input[name="total_repeat_week2_day_${get_excercise_value}"]`).prop('required',false);

                        } else {
                            $('#time_in_minute_week2_' + get_excercise_value).css('display', 'none');
                            $(`input[name="time_week2_day_${get_excercise_value}"]`).prop('required',false);
                            $('#total_repeat_week2_' + get_excercise_value).css('display', 'block');
                            $(`input[name="total_repeat_week2_day_${get_excercise_value}"]`).prop('required',true);
                        }

                    });

            });



            $('input[name="week_day3[]"]').change(function() {
                $('#option_outline_value_week3').empty();
                $('input[name="week_day3[]"]:checked').each(function() {
                    var append_active = `
            <div class="col-lg-12 row">
                <div class="col-lg-4 ">
                    
                    <div class="hstack gap-2 flex-wrap mt-lg-4 mb">
                        <h5>Week 3, Day ${$(this).val()}</h5>
                        <input type="radio" class="btn-check" value="repeats_${$(this).val()}" name="options_outlined_week3_${$(this).val()}"
                            id="success-outlined-week3-${$(this).val()}-day${$(this).val()}" />
                        <label class="btn btn-outline-success shadow-none"
                            for="success-outlined-week3-${$(this).val()}-day${$(this).val()}">Repeats</label>
                        <input type="radio" class="btn-check" value="minutes_${$(this).val()}" name="options_outlined_week3_${$(this).val()}"
          
                            id="success2-outlined-week3-${$(this).val()}-day${$(this).val()}" />
                        <label class="btn btn-outline-success shadow-none"
                            for="success2-outlined-week3-${$(this).val()}-day${$(this).val()}">Time</label>
                    </div>
                    @error('options_outlined_week3_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
                <div id="total_repeat_week3_${$(this).val()}" class="col-lg-8 mt-3" style="display:none">
                    <div class="form-floating">
                        <input type="number" class="form-control"
                            id="firstnamefloatingInput" placeholder="Enter your Total Repeat"
                            name="total_repeat_week3_day_${$(this).val()}" />
                        <label for="firstnamefloatingInput">Total Repeat</label>
                    </div>
                    @error('total_repeat_week3_day_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
                <div id="time_in_minute_week3_${$(this).val()}" class="col-lg-8 mt-3" style="display: none">
                    <div class="form-floating">
                        <input type="text"  class="cleave_input form-control"
                            name="time_week3_day_${$(this).val()}" id="cleave-time-format"
                            placeholder="mm:ss"
                            />
                        <label for="cleave-time-format" >Time </label>
                    </div>
                    @error('time_week3_day_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        `;
                    $('#option_outline_value_week3').append(append_active);
                });
                $('#option_outline_value_week3').on('change', 'input[name^="options_outlined_week3"]',
                    function() {
                        value_text = $(this).next('label').text();
                        value_of_checkbox = $(this).val();
                        get_excercise_value = value_of_checkbox.slice(-1);

                        if (value_text == 'Time') {
                            $('#time_in_minute_week3_' + get_excercise_value).css('display', 'block');
                            $(`input[name="time_week3_day_${get_excercise_value}"]`).prop('required',true);
                            var cleave = new Cleave(`input[name="time_week3_day_${get_excercise_value}"]`, {
                                time: true,
                                timePattern: ['h', 'm']
                            });
                            $('#total_repeat_week3_' + get_excercise_value).css('display', 'none');
                            $(`input[name="total_repeat_week3_day_${get_excercise_value}"]`).prop('required',false);

                        } else {
                            $('#time_in_minute_week3_' + get_excercise_value).css('display', 'none');
                            $(`input[name="time_week3_day_${get_excercise_value}"]`).prop('required',false);
                            $('#total_repeat_week3_' + get_excercise_value).css('display', 'block');
                            $(`input[name="total_repeat_week3_day_${get_excercise_value}"]`).prop('required',true);
                        }

                    });

            });


            $('input[name="week_day4[]"]').change(function() {
                $('#option_outline_value_week4').empty();
                $('input[name="week_day4[]"]:checked').each(function() {
                    var append_active = `
            <div class="col-lg-12 row">
                <div class="col-lg-4 ">
                    
                    <div class="hstack gap-2 flex-wrap mt-lg-4 mb">
                        <h5>Week 4, Day ${$(this).val()}</h5>
                        <input type="radio" class="btn-check" value="repeats_${$(this).val()}" name="options_outlined_week4_${$(this).val()}"
                            id="success-outlined-week4-${$(this).val()}-day${$(this).val()}" />
                        <label class="btn btn-outline-success shadow-none"
                            for="success-outlined-week4-${$(this).val()}-day${$(this).val()}">Repeats</label>
                        <input type="radio" class="btn-check" value="minutes_${$(this).val()}" name="options_outlined_week4_${$(this).val()}"
          
                            id="success2-outlined-week4-${$(this).val()}-day${$(this).val()}" />
                        <label class="btn btn-outline-success shadow-none"
                            for="success2-outlined-week4-${$(this).val()}-day${$(this).val()}">Time</label>
                    </div>
                    @error('options_outlined_week4_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
                <div id="total_repeat_week4_${$(this).val()}" class="col-lg-8 mt-3" style="display:none">
                    <div class="form-floating">
                        <input type="number" class="form-control"
                            id="firstnamefloatingInput" placeholder="Enter your Total Repeat"
                            name="total_repeat_week4_day_${$(this).val()}" />
                        <label for="firstnamefloatingInput">Total Repeat</label>
                    </div>
                    @error('total_repeat_week4_day_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
                <div id="time_in_minute_week4_${$(this).val()}" class="col-lg-8 mt-3" style="display: none">
                    <div class="form-floating">
                        <input type="text"  class="cleave_input form-control"
                            name="time_week4_day_${$(this).val()}" id="cleave-time-format"
                            placeholder="mm:ss"
                            />
                        <label for="cleave-time-format" >Time </label>
                    </div>
                    @error('time_week4_day_${$(this).val()}')
                        <div class="text-danger ps-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        `;
                    $('#option_outline_value_week4').append(append_active);
                });
                $('#option_outline_value_week4').on('change', 'input[name^="options_outlined_week4"]',
                    function() {
                        value_text = $(this).next('label').text();
                        value_of_checkbox = $(this).val();
                        get_excercise_value = value_of_checkbox.slice(-1);
                        if (value_text == 'Time') {
                            $('#time_in_minute_week4_' + get_excercise_value).css('display', 'block');
                            $(`input[name="time_week4_day_${get_excercise_value}"]`).prop('required',true);
                            var cleave = new Cleave(`input[name="time_week4_day_${get_excercise_value}"]`, {
                                time: true,
                                timePattern: ['h', 'm']
                            });
                            $('#total_repeat_week4_' + get_excercise_value).css('display', 'none');
                            $(`input[name="total_repeat_week4_day_${get_excercise_value}"]`).prop('required',false);

                        } else {
                            $('#time_in_minute_week4_' + get_excercise_value).css('display', 'none');
                            $(`input[name="time_week4_day_${get_excercise_value}"]`).prop('required',false);
                            $('#total_repeat_week4_' + get_excercise_value).css('display', 'block');
                            $(`input[name="total_repeat_week4_day_${get_excercise_value}"]`).prop('required',true);
                      }

                    });

            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#inputGroupFile02").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#preview").attr("src", e.target.result);
                        $("#preview").css("display", "block");
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#inputGroupFile03").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#preview_video").attr("src", e.target.result);
                        $("#preview_video").css("display", "block");
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
     <script>
        $(document).ready(function(){
            $("input[name='options_outlined']").change(function(){
                const get_input_value = $("input[name='options_outlined']:checked").val();
                if(get_input_value === 'minutes'){
                    $('#time_in_minute').css('display','block')
                    $('#total_repeat').css('display','none')
                    $('input[name="time"]').prop('required',true)
                    $('input[name="total_repeat"]').prop('required',false)
                }else{
                    $('#time_in_minute').css('display','none')
                    $('#total_repeat').css('display','block')
                    $('input[name="total_repeat"]').prop('required',true)

                    $('input[name="time"]').prop('required',false)
                }
            })
        })
        </script>
@endsection
