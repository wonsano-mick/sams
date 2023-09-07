<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @php
        $SchoolInfoExist = App\Models\SchoolInfo::first();
    @endphp
    @if ($SchoolInfoExist->count() != 0)
        <link rel="icon" href="{{ asset('images/logo/' . $SchoolInfoExist->logo_of_school) }}">
    @else
        <link rel="icon" href="{{ asset('images/logo/logo.jpg') }}">
    @endif
    <title>@yield('title', '')</title>

    {{-- Vendors Style --}}
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

    {{-- DataTable CSS --}}
    <link href="{{ asset('frontend/vendor/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    {{-- Select2 CSS  --}}
    <link href="{{ asset('frontend/vendor/css/select2.min.css') }}" rel="stylesheet">

    <script>
        window.onload = function() {
            // Get all input elements with class "classWorkInput"
            var inputElements = document.querySelectorAll('.classWorkInput');

            // Add an event listener for each input element
            inputElements.forEach(function(inputElement) {
                inputElement.addEventListener('input', function() {
                    var currentValue = parseInt(inputElement.value);
                    var maxValue = parseInt(inputElement.getAttribute('max'));

                    if (currentValue > maxValue) {
                        inputElement.value = maxValue;
                    }
                });
            });
        };
        window.onload = function() {
            // Get all input elements with class "classWorkInput"
            var inputElements = document.querySelectorAll('.examsScore');

            // Add an event listener for each input element
            inputElements.forEach(function(inputElement) {
                inputElement.addEventListener('input', function() {
                    var currentValue = parseInt(inputElement.value);
                    var maxValue = parseInt(inputElement.getAttribute('max'));

                    if (currentValue > maxValue) {
                        inputElement.value = maxValue;
                    }
                });
            });
        };
    </script>
    <style>
        #submitAssessmentButton {
            display: none;
        }
    </style>
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        {{-- Header Starts --}}
        @include('layouts.body.header')
        {{-- Header Ends --}}

        {{-- Sidebar Starts --}}
        @include('layouts.body.sidebar')
        {{-- Sidebar Ends --}}

        {{-- Main Content Starts --}}
        @yield('content')
        {{-- Main Content Ends --}}

        {{-- Footer Starts --}}
        @include('layouts.body.footer')
        {{-- Footer Ends --}}



        {{-- Add the sidebar's background. This div must be placed immediately after the control sidebar --}}
        <div class="control-sidebar-bg"></div>

    </div>
    {{-- ./wrapper --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Vendor JS --}}
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

    {{-- DataTable --}}
    <script src="{{ asset('frontend/vendor/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/js/datatables-demo.js') }}"></script>

    {{-- Sunny Admin App --}}
    <script src="{{ asset('backend/js/template.js') }}"></script>
    <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>

    {{-- SweetAlert JS --}}
    <script src="{{ asset('frontend/js/SweetAlert.js') }}"></script>

    {{-- Select2 JS --}}
    <script src="{{ asset('frontend/vendor/js/select2.min.js') }}" type="text/javascript"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- Scripts to search for option list using select2 library --}}
    <script>
        // Script to place the blinking cursor in the input field.
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
        $(document).ready(function() {
            $("#select_student").select2({
                placeholder: "Select a Student",
                theme: "classic",
                width: 'resolve'
            }).focus();
        });
    </script>
    <script type="text/javascript">
        document.getElementById('actual-btn').onchange = function(evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function() {
                    document.getElementById('showImage').src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }

            // Not supported
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            }
        }
    </script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel, Please',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
        $(document).ready(function() {
            $(".select2-input").select2({
                placeholder: "Select an option",
                theme: "classic",
                width: 'resolve'
            });
        });

        $('.add_more').click(function() {
            var rowsCount = $('.addMoreSubject tr').length;

            var tr = `<tr>
            <td>
                <select name="staff_id[]" class="form-control staff_id select2-input" required>
                    <option value="">Select Staff</option>
                    @php
                        $staffData = App\Models\Staff::all();
                    @endphp
                    @foreach ($staffData as $staff)
                        <option value="{{ $staff->id }}">{{ ucwords($staff->sur_name . ' ' . $staff->other_names) }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="class_id[]" class="form-control class_id select2-input" required>
                    <option value="">Select Class</option>
                    @php
                        $classData = App\Models\CurrentClass::all();
                    @endphp
                    @foreach ($classData as $class)
                        <option value="{{ $class->id }}">{{ $class->current_class }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="subject_id[]" class="form-control subject_id select2-input" required>
                    <option value="">Select Subject</option>
                    @php
                        $subjectsData = App\Models\Subject::all();
                    @endphp
                    @foreach ($subjectsData as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-danger delete">
                    <i data-feather="minus-circle"></i>
                </button>
            </td>
        </tr>`;

            $('.addMoreSubject').append(tr);
            $('.select2-input').select2({
                placeholder: "Select an option",
                theme: "classic",
                width: 'resolve'
            });

            if (rowsCount === 1) {
                $('.delete').prop('disabled', false);
            }

            feather.replace();
        });

        $('.addMoreSubject').on('click', '.delete', function() {
            $(this).closest('tr').remove();

            var rowsCount = $('.addMoreSubject tr').length;

            if (rowsCount === 1) {
                $('.delete').prop('disabled', true);
            }
        });
    </script>

    <script>
        // Get the user_type dropdown element
        const userTypeDropdown = document.getElementById('userTypeSelect');

        // Get the "Other Name" field div element
        const otherNameField = document.getElementById('otherNameField');

        // Get the "Teacher" select dropdown element
        const teacherNameField = document.getElementById('teacherNameField');

        // Add event listener to the user_type dropdown to show/hide the "Name" field based on selection
        userTypeDropdown.addEventListener('change', function() {
            const selectedValue = userTypeDropdown.value;
            if (selectedValue === 'Teacher') {
                teacherNameField.style.display = 'block';
                otherNameField.style.display = 'none'; // Hide the "Other Name" field
            } else {
                teacherNameField.style.display = 'none';
                otherNameField.style.display = 'block'; // Show the "Other Name" field
            }
        });
    </script>
    <script>
        function calculatePosition(row) {
            const totalScore = parseFloat(row.querySelector(".totalScore").value);
            const rows = Array.from(row.parentElement.querySelectorAll("tr"));

            // Sort the rows by totalScore in descending order
            rows.sort((a, b) => {
                const scoreA = parseFloat(a.querySelector(".totalScore").value);
                const scoreB = parseFloat(b.querySelector(".totalScore").value);
                return scoreB - scoreA; // Descending order
            });

            // Calculate and assign positions based on sorted order
            let currentPosition = 1;
            for (let i = 0; i < rows.length; i++) {
                const currentRow = rows[i];
                const currentScore = parseFloat(currentRow.querySelector(".totalScore").value);

                if (i > 0) {
                    const previousRow = rows[i - 1];
                    const previousScore = parseFloat(previousRow.querySelector(".totalScore").value);
                    if (currentScore < previousScore) {
                        currentPosition = i + 1;
                    }
                }

                currentRow.querySelector(".position").value = currentPosition;
            }
        }

        function calculateRowScores(row) {
            const classWorkInputs = row.querySelectorAll(".classWorkInput");
            let sumClassWork = 0;

            classWorkInputs.forEach(input => {
                const value = parseFloat(input.value) || 0;
                sumClassWork += value;
            });

            const scaledClassWork = (sumClassWork / (classWorkInputs.length * 15)) * 50;
            row.querySelector(".scaledClassWork").value = scaledClassWork.toFixed(2);

            const examsScore = parseFloat(row.querySelector(".examsScore").value) || 0;
            const scaledExamsScore = (examsScore / 100) * 50;
            row.querySelector(".scaledExamsScore").value = scaledExamsScore.toFixed(2);

            const totalScore = scaledClassWork + scaledExamsScore;
            row.querySelector(".totalScore").value = totalScore.toFixed(2);

            calculatePosition(row);
        }

        function calculateAllRows() {
            const rows = document.querySelectorAll("#dataTable tbody tr");
            rows.forEach(row => {
                calculateRowScores(row);
            });
        }

        // Attach an event listener to recalculate when input changes
        const classWorkInputs = document.querySelectorAll(".classWorkInput, .examsScore");
        classWorkInputs.forEach(input => {
            input.addEventListener("input", function() {
                const row = input.closest("tr");
                calculateRowScores(row);
            });
        });

        // Calculate on page load
        calculateAllRows();
    </script>
</body>

</html>
