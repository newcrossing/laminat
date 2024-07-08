@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Контент')
{{-- vendor style --}}
@section('vendor-styles')

    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
{{-- page style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')

    <!-- account setting page start -->
    <section id="page-account-settings">
		@if(session('success'))
            <div class="alert bg-rgba-success alert-dismissible mb-2" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="d-flex align-items-center">
					<i class="bx bx-like"></i>
					<span>  {{session('success')}}  </span>
				</div>
			</div>
        @endif
        @if ($errors->any())
            <div class="alert bg-rgba-danger alert-dismissible mb-2" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="d-flex align-items-center">
					<i class="bx bx-error"></i>
					<span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </span>
				</div>
			</div>
        @endif
        <div class="row">
			<div class="col-12">
				<div class="row">
					<!-- left menu section -->
                    <!-- right content section -->
					<div class="col-md-12">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
											<form action="{{ (isset($content->id))? route('content.update',$content->id):route('content.store')  }}" method="POST" enctype="multipart/form-data">
												@csrf
                                                @if(isset($content->id))
                                                    @method('PUT')
                                                @endif


                                                <div class="row">
													<div class="col-12">
														<div class="form-group">
															<div class="controls">
																<label>Название</label>
																<input type="text" class="form-control" name="name" value="{{old('name',$content->name)}}" required>
															</div>
														</div>
													</div>

												</div>
												<div class="row">
													<div class="col-12">
														<div class="form-group">
															<div class="controls">
																 <textarea class="ckeditor" cols="80" id="editor1" name="text">{{old('text',$content->text)}}</textarea>
                                    						</div>
														</div>
													</div>
												</div>


												<div class="row">





													<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
														<button type="submit" name="redirect" value="apply" class="btn btn-primary glow mr-sm-1 mb-1">
															Сохранить
														</button>

														<button type="submit" name="redirect" value="save" class="btn btn-primary glow mr-sm-1 mb-1">
															Сохранить & Выйти
														</button>



														<button type="submit" name="redirect" value="cancel" class="btn btn-light glow mr-sm-1 mb-1">
															Отменить
														</button>
													</div>
												</div>
                                        </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</section>
    <!-- account setting page ends -->




@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="/adm/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/adm/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>


@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="/adm/app-assets/js/scripts/datatables/datatable.js"></script>

    <script type="text/javascript" src="/CKE/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/CKE/ckfinder.js"></script>

    <script type="text/javascript">


        if (typeof CKEDITOR == 'undefined') {
            document.write('Error');
        } else {
            var editor = CKEDITOR.replace('editor1',
                {
                    toolbar:
                        [
                            ['Source', '-', 'NewPage', 'Preview'], ['PasteText', 'PasteFromWord', '-', 'SpellChecker', 'Scayt'], ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'], '/', ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'], ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['Link', 'Unlink', 'Anchor'], ['Image', 'Table', 'HorizontalRule', 'SpecialChar'], '/', [, 'Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'], ['Maximize', 'ShowBlocks', '-', 'About']
                        ]
                });
            CKFinder.setupCKEditor(editor, '/CKE/');
        }

    </script>

@endsection
