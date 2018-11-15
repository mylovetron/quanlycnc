@extends('admin/master')
@section('content')

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
		@include('admin.blocks.errors')
		<form class="form-horizontal" action="{!! route('admin.vattu.getAdd') !!}" method="POST">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Mã vật tư</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1"  name="txtMaVattu" placeholder="Mã vật tư" class="col-xs-10 col-sm-5" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tên vật tư</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" name="txtTenVattu" placeholder="Tên vật tư" class="col-xs-10 col-sm-5" />
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Hiệu</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" name="txtHieu" placeholder="Hiệu" class="col-xs-10 col-sm-5" />
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">ĐVT</label>
				<div class="col-sm-9">
					<input type="text" id="form-field-1" name="txtDVT" placeholder="ĐVT" class="col-xs-10 col-sm-5" />
				</div>
			</div>	
			
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="Submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
							Lưu 
					</button>

						&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
							Nhập lại
					</button>
				</div>
			</div>	
		</form>

								
<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
					
@endsection