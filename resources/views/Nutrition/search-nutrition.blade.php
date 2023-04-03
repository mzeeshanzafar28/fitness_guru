@extends('Layouts.AdminLayout')
@section('title', 'All Nutritions')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 style="float:left" class="mb-sm-0">Nutrition</h4>
                    <a style="float:right" href="{{ URL::to('nutrition/add') }}" class=" btn btn-success btn-lg">Add Nutrition</a>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-12">
                <form action="{{ URL::to('nutrition/show') }}" method="GET">
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
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                aria-label="Floating label select example" name="goal" required>
                                                     
                                    <option value="" selected>Select Goal</option>
                                    <option value="Loose Weight">Loose Weight</option>
                                    <option value="Keep Fit">Keep Fit</option>
                                    <option value="Get Stronger">Get Stronger</option>
                                </select>
                           <label for="floatingSelect">Select Goal</label>
                            </div>
                        </div>  
                    
                        <div class="col-lg-12 mt-3">
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                           

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