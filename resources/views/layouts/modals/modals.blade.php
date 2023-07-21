{{-- Add Class Modal --}}
<div class="modal center-modal fade" id="AddClass" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212529">
                <h5 class="modal-title">Add Class</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #212529">
                <form action="{{ route('classes.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" name="current_class" class="form-control"
                                        value="{{ old('current_class') }}" placeholder="e.g: Form 1 Science or BS 2 A"
                                        autofocus autocomplete required>
                                </div>
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-primary">Add Class</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Houses Modal --}}
<div class="modal center-modal fade" id="AddHouse" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212529">
                <h5 class="modal-title">Add House</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #212529">
                <form action="{{ route('houses.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" name="house" class="form-control"
                                        value="{{ old('house') }}" autofocus autocomplete>
                                </div>
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-primary">Add House</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Academic Year Modal --}}
<div class="modal center-modal fade" id="AddAcademicYear" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212529">
                <h5 class="modal-title">Add Academic Year</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #212529">
                <form action="{{ route('years.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="controls">
                                    <h5>Academic Year</h5>
                                    <input type="text" name="academic_year" class="form-control"
                                        value="{{ old('academic_year') }}" placeholder="e.g. 2023/2024" autofocus
                                        autocomplete required>
                                </div>
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <h5>Term</h5>
                                <div class="controls">
                                    <select name="term" id="select" class="form-control" required>
                                        <option value="{{ old('term') }}">
                                            {{ old('term') }}</option>
                                        <option value="First term">First term</option>
                                        <option value="Second Term">Second Term</option>
                                        <option value="Third Term">Third Term</option>
                                    </select>
                                </div>
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-primary">Add Academic Year</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Add Subject Modal --}}
<div class="modal center-modal fade" id="AddSubject" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212529">
                <h5 class="modal-title">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #212529">
                <form action="{{ route('subjects.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" name="subject" class="form-control"
                                        value="{{ old('subject') }}" placeholder="e.g: English Language" autofocus
                                        autocomplete required>
                                </div>
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-primary">Add Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Form Master Modal --}}
<div class="modal center-modal fade" id="AddFormMaster" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #212529">
                <h5 class="modal-title">Add Form Master</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #212529">
                <form action="{{ route('classes.masters.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <h5>Name of Class Teacher</h5>
                                <div class="controls">
                                    <select name="staff" id="select" class="form-control" required>
                                        <option value="{{ old('staff') }}">
                                            {{ old('staff') }}</option>
                                        @php
                                            $staffData = App\Models\Staff::get();
                                        @endphp
                                        @foreach ($staffData as $staff)
                                            <option value="{{ $staff->id }}">
                                                {{ ucwords($staff->sur_name . ' ' . $staff->other_names) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <h5>Class</h5>
                                <div class="controls">
                                    <select name="current_class" id="select" class="form-control" required>
                                        <option value="{{ old('current_class') }}">
                                            {{ old('current_class') }}</option>
                                        @php
                                            $classData = App\Models\CurrentClass::get();
                                        @endphp
                                        @foreach ($classData as $class)
                                            <option value="{{ $class->id }}">
                                                {{ ucwords($class->current_class) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
