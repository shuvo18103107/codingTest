@extends('layouts.dashboard')

@section('breadcrumb')
    <div class="page-banner-content text-center">
        <h3 class="page-banner-heading text-white pb-15">Hey, {{ $name ?? '' }} <img
                src="{{ asset('frontend/assets/img/student-profile-img/waving-hand.png') }}" alt="student" class="me-2">
        </h3>

        <!-- Breadcrumb Start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item font-14"><a href="#">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item font-14 active" aria-current="page">{{ __('Dashboard') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="instructor-profile-right-part">
        <div class="instructor-dashboard-box">
            {{-- status box --}}

            {{-- uplaod box --}}
            {{-- free user --}}

            <div class="row upload-your-course-today mb-lg-0">

                <div class="box box-h radius-8 row">


                    <form action="{{ route('process-document') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-10" class="d-none" id="phone_div">
                            <div class="col-md-6">
                                <label class="label-text-title color-heading font-medium font-8 mb-3"
                                    for="upload_document">{{ __('Upload Document') }}</label>

                                <div class="form-group mb-0 position-relative">
                                    <input name="upload_doc" id="docPdfUpload" type="file"
                                        class="mFilerInit form-control  rounded-0" placeholder="Drop documents to get start"
                                        accept="application/pdf" />

                                    @if ($errors->has('upload_doc'))
                                        <span id="upload-doc-error" class="text-danger" style="font-size: 15px">
                                            <i class="fas fa-exclamation-triangle"></i> {{ $errors->first('upload_doc') }}
                                        </span>
                                    @endif

                                </div>




                            </div>
                        </div>
                        <div class="row mb-10 d-flex" class="d-none" id="phone_div">
                            <div class="col-md-6">

                                <label class="label-text-title color-heading font-medium font-8 mb-3"
                                    for="upload_document">{{ __('Upload Image') }}</label>

                                <div class="form-group mb-0 position-relative">
                                    <input name="upload_image" type="file" id="imageUpload"
                                        class="mFilerInit form-control  rounded-0" placeholder="Drop Image to get start"
                                        accept="image/*" />
                                    @if ($errors->has('upload_image'))
                                        <span id="upload-image-error" class="text-danger" style="font-size: 15px">
                                            <i class="fas fa-exclamation-triangle"></i> {{ $errors->first('upload_image') }}
                                        </span>
                                    @endif

                                </div>

                            </div>
                            <div class="col-md-3">

                                <label class="label-text-title color-heading font-medium font-8 mb-3"
                                    for="x_axis_image">{{ __('Image X Axis Position') }}</label>

                                <div class="form-group mb-0 position-relative">
                                    <input type="number" name="x_axis_image" id="x_axis_image"
                                        class="form-control x_axis_image">

                                </div>


                            </div>
                            <div class="col-md-3">

                                <label class="label-text-title color-heading font-medium font-8 mb-3"
                                    for="upload_document">{{ __('Image Y Axis Position') }}</label>

                                <div class="form-group mb-0 position-relative">
                                    <input type="number" name="y_axis_image" id="y_axis_image"
                                        class="form-control y_axis_image">

                                </div>


                            </div>
                        </div>
                        <div class="row mb-10 d-flex" class="d-none" id="phone_div">
                            <div class="col-md-4">

                                <label class="label-text-title color-heading font-medium font-8 mb-3"
                                    for="set_text">{{ __('Set Text') }}</label>
                                <input type="text" name="set_text" id="set_text" value="{{ old('set_text') }}"
                                    class="form-control" placeholder="{{ __('Set Text') }}">
                                @if ($errors->has('set_text'))
                                    <span class="text-danger fs-5"><i class="fas fa-exclamation-triangle"></i>
                                        {{ $errors->first('set_text') }}</span>
                                @endif

                            </div>
                            <div class="col-md-4">

                                <label class="label-text-title color-heading font-medium font-8 mb-3"
                                    for="upload_document">{{ __('Text X Axis Position') }}</label>

                                <div class="form-group mb-0 position-relative">
                                    <input type="number" name="x_axis_text" id="x_axis_text"
                                        class="form-control x_axis_text">

                                </div>


                            </div>
                            <div class="col-md-4">

                                <label class="label-text-title color-heading font-medium font-8 mb-3"
                                    for="upload_document">{{ __('Text Y Axis Position') }}</label>

                                <div class="form-group mb-0 position-relative">
                                    <input type="number" name="y_axis_text" id="y_axis_text"
                                        class="form-control y_axis_text">

                                </div>


                            </div>
                        </div>
                        <div class="row my-5 ">
                            <div class="col-12 text-center">
                                <input type="submit"
                                    style="
                                            padding: 6px 10px 7px;
                                                    border-radius: 4px;
                                                    text-transform: capitalize;
                                                    font-weight: 500;
                                                    font-size: 12px;
                                                    line-height: 15px;"
                                    value="Process Document" class="btn btn-sm btn-info p-2 mt-3" />
                            </div>
                        </div>




                    </form>


                </div>



            </div>

            {{-- paid user --}}

        </div>
        {{-- certificate list table --}}
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-30">
                            <div class=" d-flex justify-content-between">


                                {{-- <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                    data-bs-target="#add-todo-modal">
                                    <i class="fa fa-plus"></i> {{ __('Add Signatory') }}
                                </button> --}}
                            </div>



                            {{-- jquery datatable --}}
                            <div class="table-container my-4 ">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 50% !important">{{ __('SL') }}</th>
                                            <th>{{ __('Original Document') }}</th>
                                            <th>{{ __('Process Document') }}</th>
                                            <th>{{ __('File Name') }}</th>
                                            <th>{{ __('File Size') }}</th>
                                            <th>{{ __('Process Document') }}</th>
                                            <th>{{ __('Uploaded At') }}</th>

                                            <!-- New column for process document download -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($uploaded_files))
                                            @foreach ($uploaded_files as $k => $file)
                                                <tr>
                                                    <td style="max-width: 50px !important">{{ $k + 1 }}</td>

                                                    <td class="text-left p-0">
                                                        <a href="{{ url($file->original_file_path) }}" target="_blank"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i> {{ __('View') }}
                                                        </a>
                                                    </td>

                                                    <td class="text-left p-0">
                                                        <a href="{{ url($file->file_path) }}" target="_blank"
                                                            class="btn btn-sm btn-success">
                                                            <i class="fas fa-eye"></i> {{ __('View') }}
                                                        </a>
                                                    </td>

                                                    <td>{{ $file->file_name }}</td>

                                                    <td>{{ ceil($file->file_size / 1024) }} KB</td>
                                                    <td class="text-left p-0">
                                                        <a href="{{ url($file->file_path) }}" download
                                                            class="btn btn-sm btn-warning">
                                                            <i class="fas fa-download"></i> {{ __('Download') }}
                                                        </a>
                                                    </td>

                                                    <td>{{ date('d-m-Y h:i:s A', strtotime($file->created_at)) }}</td>


                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>


                                <div class="mt-3">

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="signatoryPanel">

            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <h4 class="modal-title w-100">Signatory List
                            <div class="float-end"><button class="btn btn-sm btn-primary save-signatory"
                                    onclick="saveSignatory(this)">Save</button></div>
                        </h4>
                    </div> --}}
                    <div class="modal-body">

                        <form id="savesign">
                            @csrf
                            <p>
                                <input
                                    onclick="toogleCheckbox('{{ auth()->user()->name }}','{{ auth()->user()->email }}', '{{ auth()->user()->phone_number }}','{{ auth()->user()->ekyc_status }}' , '{{ auth()->user()->cert_token }}')"
                                    type="checkbox" name="signstatus" id="signstatus" />




                                <label for="c1" class="signstatusText" style="margin-top:10px">I'm the only
                                    signer.</label>
                            </p>
                            <input type="hidden" name="signatoryID" id="signatoryID">


                            <div class="appendQuery">
                                <div class="metaInfo">
                                    <div class="form-row pt-4 d-flex">
                                        <div class="col-md-2 mx-2 ">
                                            <input placeholder="Name" class="form-control name" type="text"
                                                name="name[]">
                                        </div>
                                        <div class="col-md-2 mx-2">
                                            <input placeholder="Designation" class="form-control designation"
                                                type="text" name="designation[]">

                                        </div>
                                        <div class="col-md-2 mx-2">
                                            <input placeholder="Email" class="form-control email" type="text"
                                                name="email[]">
                                        </div>
                                        <div class="col-md-2 mx-2">
                                            <input placeholder="Phone" class="form-control phone" type="number"
                                                name="phone[]">
                                        </div>
                                        {{-- <div class="col-md-2 mx-2">
                                            <input placeholder="nid" class="form-control nid" type="number"
                                                name="nid[]">
                                        </div> --}}
                                        <div class="col-md-2 mx-2 addSign">
                                            <span title="যোগ করুন"
                                                class="btn btn-outline-primary btn-sm btn-square btn_query_add">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <button type="button" id="signSubmit" class="btn btn-info  mt-4 p-1" onclick="saveSignatory()"
                            style="
                            width: 5vw;
                            font-size: smaller;
                        ">Submit</button>
                        {{-- <div class="row">
                            <div class="col-9">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Is Signed</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    
    
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-3">
                                <h4>User List</h4>
                                <ul>
                                    @foreach ($users as $user)
                                        <li class="addAsSignatory" data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}" data-designation="{{ $user->designation }}">
                                            {{ $user->name . ', ' . $user->designation }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('style')
    <link href="{{ asset('common/css/mFiler-font.css') }}" rel="stylesheet">
    <link href="{{ asset('common/css/mFiler.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/jquery.dataTables.min.css') }}">
    {{-- checkbox css --}}
    <style>
        #example thead th:nth-child(1) {
            width: 50px;
        }

        .table-container {
            overflow-x: scroll;
            padding: 15px;
            max-width: 100%;
            margin: 0 auto;
            box-shadow: 0px 0px 10px rgb(0 0 0 / 10%);
            border-radius: 5px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f8f8;
        }

        input[type=checkbox] {
            /* Add if not using autoprefixer */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* For iOS < 15 to remove gradient background */
            background-color: rgba(0, 0, 0, 0);
            /* Not removed via appearance */
            margin: 0;
            position: relative;
            -webkit-border-radius: 0;
            display: inline-block;
            overflow: hidden;
            width: 51px;
            height: 31px;
            border-radius: 15.5px;
            background-color: #e9e9ea;
            transition: background-color 250ms;
            vertical-align: middle;
        }

        @media (prefers-reduced-motion) {
            input[type=checkbox] {
                transition: none;
            }
        }

        @media (prefers-color-scheme: dark) {
            input[type=checkbox] {
                background-color: #39393d;
            }
        }

        input[type=checkbox]:before {
            position: absolute;
            top: 2px;
            left: 2px;
            border-radius: 15.5px;
            content: "";
            dispaly: inline-block;
            width: 27px;
            height: 27px;
            background-color: white;
            transition: all 200ms;
            box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.2);
        }

        @media (prefers-reduced-motion) {
            input[type=checkbox]:before {
                transition: none;
            }
        }

        input[type=checkbox]:checked {
            background-color: #35c759;
        }

        @media (prefers-color-scheme: dark) {
            input[type=checkbox]:checked {
                background-color: #2ed158;
            }
        }

        input[type=checkbox]:checked:before {
            left: 22px;
        }

        input[type=checkbox]:disabled {
            background-color: #efefef;
        }

        @media (prefers-color-scheme: dark) {
            input[type=checkbox]:disabled {
                background-color: #1e1e1e;
            }
        }

        input[type=checkbox]:disabled:before {
            box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.1);
        }

        input[type=checkbox]:disabled:checked {
            background-color: #b7dec0;
        }

        @media (prefers-color-scheme: dark) {
            input[type=checkbox]:disabled:checked {
                background-color: #243f2a;
            }
        }

        input[type=checkbox]+label {
            vertical-align: middle;
            font-family: Verdana;
        }
    </style>
@endpush

@push('script')
    <link rel="stylesheet" href="{{ asset('admin/sweetalert2/sweetalert2.css') }}">

    <!-- All CSS files included here -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/jquery/jquery_datatable.min.css') }}">

    @stack('style')
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/metisMenu.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin/styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-extra.css') }}">
    <link href="{{ asset('common/css/select2.css') }}" rel="stylesheet">



    <script src="{{ asset('frontend/assets/js/custom/mFiler.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/data-table-page.js') }}"></script>
    <!-- include jQuery library -->

    <!-- include DataTable plugin -->
    <script src="{{ asset('frontend/assets/js/custom/jquery.dataTables.min.js') }}"></script>



    <script>
        $(document).ready(function() {
            $('#docPdfUpload').change(function() {
                $('#upload-doc-error').text('');
            });
            $('#imageUpload').change(function() {
                $('#upload-image-error').text('');
            });

            $('#docPdfUpload').on('change', function() {
                const file = this.files[0];
                if (!file) {
                    return; // No file selected, do nothing
                }

                const allowedTypes = ['application/pdf', 'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                ];
                if (!allowedTypes.includes(file.type)) {
                    alert('Please upload a DOC or PDF file.');
                    $(this).val(''); // Clear the selected file
                }
            });
            $('#imageUpload').on('change', function() {
                const file = this.files[0];
                if (!file || !file.type.startsWith('image/')) {
                    alert('Please upload an image file (JPEG, PNG, GIF).');
                    $(this).val(''); // Clear the selected file
                }
            });
            $('.mFilerInit').filer({
                showThumbs: true,
                addMore: false,
                allowDuplicates: false,
                limit: 1
            });
            $('#example').DataTable();
            var table = $('#example');
            if (!$.fn.DataTable.isDataTable(table)) {
                table.DataTable({
                    responsive: true,
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ],
                    "pagingType": "full_numbers",
                    "searching": false
                });
            }
        });
    </script>



    <script>
        function sendSignatory(pdf_doc, file_id, doc_name) {
            $.ajax({
                url: '/sendSignatory',
                method: 'post',
                data: {
                    pdf_doc,
                    file_id,
                    doc_name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // alert(response.message);

                    if (response.code == 200) {
                        toastr.success('', response.message);


                        window.open(response.body.manipulateLink, '_blank');
                        window.location.reload();
                    } else {
                        toastr.error('', 'Failed to sent signatory');

                    }

                }
            })

        }

        function loadSignatory(element, id, data) {
            let meta = JSON.parse(atob(data));
            console.log(meta);


            // console.log(meta);
            let modal = "#signatoryPanel";
            $(modal).modal('show');
            $('#signatoryID').val(id);

        }






        function downloadlink(downloadLink) {
            window.open(downloadLink, '_blank');

        }

        function manipulatelink(manipulatelink) {
            window.open(manipulatelink, '_blank');

        }

        function saveSignatory(element) {
            let formdata = $("#savesign").serializeArray()
            let modal = "#signatoryPanel";
            meta_data = {};
            $('.metaInfo').each(function(j, w) {
                meta_data[j] = {};
                meta_data[j]['name'] = $(this).find('.name').val();
                meta_data[j]['designation'] = $(this).find('.designation').val();
                meta_data[j]['email'] = $(this).find('.email').val();
                meta_data[j]['phone'] = $(this).find('.phone').val();
                // meta_data[j]['nid'] = $(this).find('.nid').val();
            })
            // let rows = $(modal).find('tbody tr');
            // $.each(rows, function(k, v) {
            //     meta.push({
            //         "user_id": $(v).data('id'),
            //         "name": $(v).find('td:eq(1)').text(),
            //         "designation": $(v).find('td:eq(2)').text(),
            //         "is_signed": $(v).find('td:eq(3)').text() == 'Yes' ? 1 : 0
            //     })
            // });
            $.ajax({
                url: '/update-sign',
                method: 'post',
                data:

                    formdata,

                success: function(response) {

                    toastr.success('', response.message);

                    if (response.status == 'success') {
                        $(modal).modal('hide');
                        window.location.reload();

                    } else {
                        toastr.error('', response.message);

                    }
                }
            })
        }
    </script>
@endpush
