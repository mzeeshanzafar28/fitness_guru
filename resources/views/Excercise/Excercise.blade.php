@extends('Layouts.AdminLayout')
@section('title', 'All Excercises')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 style="float:left" class="mb-sm-0">Excercise</h4>
                    <a style="float:right" href="{{ URL::to('excercise/add') }}" class=" btn btn-success btn-lg">Add Excercise</a>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-12">
                <form action="{{ URL::to('excercise/show') }}" method="GET">
                    @csrf
                <div class="card">
                    <div class="card-header" style="display:flex">
                        <div style="float:left">
                            <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="month" required>
                            {{-- <option selected>{{ \carbon\carbon::now()->format('F') }}</option> --}}
                            <option value="January" {{ \carbon\carbon::now()->format('F') == "January" ? 'selected' : '' }}>January</option>
                            <option value="February" {{ \carbon\carbon::now()->format('F') == "February" ? 'selected' : '' }}>February</option>
                            <option value="March" {{ \carbon\carbon::now()->format('F') == "March" ? 'selected' : '' }}>March</option>
                            <option value="April" {{ \carbon\carbon::now()->format('F') == "April" ? 'selected' : '' }}>April</option>
                            <option value="May" {{ \carbon\carbon::now()->format('F') == "May" ? 'selected' : '' }}>May</option>
                            <option value="June" {{ \carbon\carbon::now()->format('F') == "June" ? 'selected' : '' }}>June</option>
                            <option value="July" {{ \carbon\carbon::now()->format('F') == "July" ? 'selected' : '' }}>July</option>
                            <option value="August" {{ \carbon\carbon::now()->format('F') == "August" ? 'selected' : '' }}>August</option>
                            <option value="September" {{ \carbon\carbon::now()->format('F') == "September" ? 'selected' : '' }}>September</option>
                            <option value="October" {{ \carbon\carbon::now()->format('F') == "October" ? 'selected' : '' }}>October</option>
                            <option value="November" {{ \carbon\carbon::now()->format('F') == "November" ? 'selected' : '' }}>November</option>
                            <option value="December" {{ \carbon\carbon::now()->format('F') == "December" ? 'selected' : '' }}>December</option>
                        </select>
                        </div>
                        <div style="float:left" class="ms-3">
                            <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="year" required>
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
                                {{-- <option value="" selected>Select Week</option> --}}
                                <option value="1" selected>Week 1</option>
                                <option value="2">Week 2</option>
                                <option value="3" >Week 3</option>
                                <option value="4" >Week 4</option>
                                       
                         </select>
                        </div>  
                        <div class="col-lg-6">
                            <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="day" required>
                            {{-- <option value="" selected>Select Day</option> --}}
                            <option value="1" selected>Day 1</option>
                            <option value="2">Day 2</option>
                            <option value="3" >Day 3</option>
                            <option value="4" >Day 4</option>
                            <option value="5" >Day 5</option>
                                              
                            </select>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                            {{-- <div class="col-3"> <a href="" class="btn btn-success btn-lg"> Week 1</a></div>
                            <div class="col-3"> <a href="" class="btn btn-success btn-lg"> Week 2</a></div>
                            <div class="col-3"> <a href="" class="btn btn-success btn-lg"> Week 3</a></div>
                            <div class="col-3"> <a href="" class="btn btn-success btn-lg"> Week 4</a></div> --}}

                       </div>
                    
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
@section('script')
   
@endsection