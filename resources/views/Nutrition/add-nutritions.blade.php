@extends('Layouts.AdminLayout')
@if(isset($nutrition))
@section('title', 'Update Nutrition')

@else
@section('title', 'Add Nutrition')

@endif
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        @if (isset($nutrition))
                            <h4 class="mb-sm-0">Update Nutrition</h4>
                        @else
                            <h4 class="mb-sm-0">Add Nutrition</h4>
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
                                {{ isset($nutrition) ? 'Update Nutrition' : 'Add Nutrition' }}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <a style="float:right" href="{{ URL::to('nutrition') }}"
                                        class=" btn btn-success btn-lg">All Nutrition</a>

                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ URL::to('nutrition/add') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <input type="hidden" name="id"
                                            value="{{ isset($nutrition) ? $nutrition->id : '' }}">
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="month" required>
                                                    {{-- <option selected>{{ \carbon\carbon::now()->format('F') }}</option> --}}
                                                    @if (isset($nutrition))
                                                        <option value="January"
                                                            {{ $nutrition->month == 'January' ? 'selected' : '' }}>January
                                                        </option>
                                                        <option value="February"
                                                            {{ $nutrition->month == 'February' ? 'selected' : '' }}>February
                                                        </option>
                                                        <option value="March"
                                                            {{ $nutrition->month == 'March' ? 'selected' : '' }}>March
                                                        </option>
                                                        <option value="April"
                                                            {{ $nutrition->month == 'April' ? 'selected' : '' }}>April
                                                        </option>
                                                        <option value="May"
                                                            {{ $nutrition->month == 'May' ? 'selected' : '' }}>May</option>
                                                        <option value="June"
                                                            {{ $nutrition->month == 'June' ? 'selected' : '' }}>June
                                                        </option>
                                                        <option value="July"
                                                            {{ $nutrition->month == 'July' ? 'selected' : '' }}>July
                                                        </option>
                                                        <option value="August"
                                                            {{ $nutrition->month == 'August' ? 'selected' : '' }}>August
                                                        </option>
                                                        <option value="September"
                                                            {{ $nutrition->month == 'September' ? 'selected' : '' }}>
                                                            September</option>
                                                        <option value="October"
                                                            {{ $nutrition->month == 'October' ? 'selected' : '' }}>October
                                                        </option>
                                                        <option value="November"
                                                            {{ $nutrition->month == 'November' ? 'selected' : '' }}>
                                                            November</option>
                                                        <option value="December"
                                                            {{ $nutrition->month == 'December' ? 'selected' : '' }}>
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
                                                    @if (isset($nutrition))
                                                        <option value="{{ $nutrition->year }}" selected>
                                                            {{ $nutrition->year }}</option>
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
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="goal" required>
                                                    @if (isset($nutrition))
                                                        <option value="{{ $nutrition->goal }}" selected>
                                                            {{ $nutrition->goal }} </option>
                                                    @else
                                                        <option value="" selected>Select Goal</option>
                                                    @endif
                                                    <option value="Loose Weight">Loose Weight</option>
                                                    <option value="Keep Fit">Keep Fit</option>
                                                    <option value="Get Stronger">Get Stronger</option>
                                                </select>
                                                <label for="floatingSelect">Select Goal</label>
                                            </div>
                                            @error('goal')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-lg-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox" id="inlineCheckbox1" value="Sedentry" {{ isset($nutrition) && $nutrition->Sedentry == 1 ? 'checked' : ''  }}>
                                                <label class="form-check-label" for="inlineCheckbox1">Sedentry</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox" id="inlineCheckbox2" value="Lightly_Active" {{ isset($nutrition) && $nutrition->Lightly_Active == 1 ? 'checked' : ''  }}>
                                                <label class="form-check-label" for="inlineCheckbox2">Lightly Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox" id="inlineCheckbox3" value="Moderately_Active" {{ isset($nutrition) && $nutrition->Moderately_Active == 1 ? 'checked' : ''  }}>
                                                <label class="form-check-label" for="inlineCheckbox3">Moderately Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox" id="inlineCheckbox4" value="Very_Active" {{ isset($nutrition) && $nutrition->Very_Active == 1 ? 'checked' : ''  }}>
                                                <label class="form-check-label" for="inlineCheckbox4">Very Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="activity[]" type="checkbox" id="inlineCheckbox5" value="Extra_Active" {{ isset($nutrition) && $nutrition->Extra_Active == 1 ? 'checked' : ''  }}>
                                                <label class="form-check-label" for="inlineCheckbox5">Extra Active</label>
                                            </div>
                                            @error('activity')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="recipe_type" required>
                                                    @if (isset($nutrition))
                                                        <option value="{{ $nutrition->recipe_type }}" selected>
                                                            {{ $nutrition->recipe_type }} </option>
                                                    @else
                                                        <option value="" selected>Select Recipee Type</option>
                                                    @endif
                                                    <option value="breakfast">Breakfast</option>
                                                    <option value="lunch">Lunch</option>
                                                    <option value="dinner">Dinner</option>
                                                    <option value="snacks">Snacks</option>

                                                </select>
                                                <label for="floatingSelect">Select Recipee Type</label>
                                            </div>
                                            @error('recipe_type')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="firstnamefloatingInput"
                                                    placeholder="Enter your Recipee No"
                                                    value="{{ isset($nutrition) ? $nutrition->recipe_no : '' }}"
                                                    name="recipe_no">
                                                    <label for="firstnamefloatingInput">Enter Recipee No</label>
                                            </div>
                                            @error('recipe_no')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="firstnamefloatingInput"
                                                    placeholder="Enter your Recipee Title"
                                                    value="{{ isset($nutrition) ? $nutrition->title : '' }}"
                                                    name="recipee_title">
                                                <label for="firstnamefloatingInput">Recipee Title</label>
                                            </div>
                                            @error('recipee_title')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="serving" required>
                                                    @if (isset($nutrition))
                                                        <option value="{{ $nutrition->serving }}" selected>
                                                             {{ $nutrition->serving }} Serving </option>
                                                    @else
                                                        <option value="" selected>Select Serving</option>
                                                    @endif
                                                    <option value="1">1 Serving</option>
                                                    <option value="2">2 Serving</option>
                                                    <option value="3">3 Serving</option>
                                                    <option value="4">4 Serving</option>
                                                 

                                                </select>
                                                <label for="floatingSelect">Select Serving</label>
                                            </div>
                                            @error('serving')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="firstnamefloatingInput"
                                                    placeholder="Enter your Net Carbs"
                                                    value="{{ isset($nutrition) ? $nutrition->net_carbs : '' }}"
                                                    name="net_carbs">
                                                <label for="firstnamefloatingInput">Net Carbs(In grams)</label>
                                            </div>
                                            @error('net_carbs')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="firstnamefloatingInput"
                                                    placeholder="Enter your Protien"
                                                    value="{{ isset($nutrition) ? $nutrition->protien : '' }}"
                                                    name="protien">
                                                <label for="firstnamefloatingInput">Protien(In grams)</label>
                                            </div>
                                            @error('protien')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="firstnamefloatingInput"
                                                    placeholder="Enter your Fat"
                                                    value="{{ isset($nutrition) ? $nutrition->fat : '' }}"
                                                    name="fat">
                                                <label for="firstnamefloatingInput">Fat(In grams)</label>
                                            </div>
                                            @error('fat')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12">
                                            {{-- <div class="form-floating"> --}}
                                                <label for="firstnamefloatingInput">About Recipee</label>
                                                <textarea class="form-control" id="firstnamefloatingInput"
                                                    placeholder="Enter your About Recipee"
                                                    rows="5" cols="5"
                                                    name="about_recipee">{{ isset($nutrition) ? $nutrition->about_recipee : '' }}</textarea>
                                            {{-- </div> --}}
                                            @error('about_recipee')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            {{-- <div class="form-floating"> --}}
                                                <label for="firstnamefloatingInput">Ingredients</label>

                                                <textarea class="form-control" id="firstnamefloatingInput"
                                                    placeholder="Enter your Ingredients" rows="5"
                                               
                                                    name="ingredients">{{ isset($nutrition) ? $nutrition->ingredients : '' }}</textarea>
                                            {{-- </div> --}}
                                            @error('ingredients')
                                                <div class="text-danger ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                     
                            
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">Image</h4>
                                                </div><!-- end card header -->

                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="image" id="inputGroupFile02" accept="image/*">
                                                    {{-- <label class="input-group-text" for="inputGroupFile02">Upload</label> --}}
                                                </div>
                                                <!-- end card body -->
                                            </div>

                                            <div class="mt-5">
                                                <img id="preview" src="" alt="Preview" width="100%" height="300px" style="display:none;object-fit:contain">
                                            </div>

                                            @error('image')
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
<script>
     $(document).ready(function() {
      $("#inputGroupFile02").change(function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $("#preview").attr("src", e.target.result);
            $("#preview").css("display","block");
          };
          reader.readAsDataURL(this.files[0]);
        }
      });
    });
</script>


@endsection
