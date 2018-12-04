@extends('admin/master')
@section('pagespecificstyles')
	<style>
    	.twitter-typeahead,
    	.tt-hint,
    	.tt-input,
    	.tt-menu{
        	width: 900 ! important;
        	font-weight: normal;
        
    	}
 	</style>
@stop
@section('content')
  	<!--
	<input type="text" id="txtMaVattu" placeholder="Type to search users" autocomplete="off" >-->
	<div class="row">
		<div class="col-xs-12">
			@include('admin.blocks.errors')
		
			<form class="form-horizontal" action="{!! route('admin.phieunhap.getAdd') !!}" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ngày nhập</label>
					<div class="col-sm-9">
						<input type="date" id="dateNgayNhap"  name="dateNgayNhap" placeholder="ngày nhập" class="col-xs-10 col-sm-5" value="<?php echo date("Y-m-d"); ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Mã vật tư</label>
					<div class="col-sm-9">
						<input type="text" id="txtMaVattu" placeholder="Mã vật tư" autocomplete="off" name="txtMaVattu" class="col-xs-10 col-sm-5" 
						style="margin:0px auto;width:300px;">
					</div>
				</div>				

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="lblTenVattu">Tên vật tư</label>
					<div class="col-sm-9">
						<textarea type="text" name="txtTenVattu" id="txtTenVattu" class="col-xs-10 col-sm-5" placeholder="Tên vật tư"/>
						</textarea>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Hiệu</label>
					<div class="col-sm-9">
						<input type="text" id="txtHieu" name="txtHieu" id="txtHieu" placeholder="Hiệu" class="col-xs-10 col-sm-5" />
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">ĐVT</label>
					<div class="col-sm-9">
						<input type="text" id="txtDVT" name="txtDVT" placeholder="ĐVT" class="col-xs-10 col-sm-5" />
					</div>
				</div>	

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Số lượng</label>
					<div class="col-sm-9">
						<input type="text" id="txtSoLuong"  name="txtSoLuong" placeholder="Số lượng" class="col-xs-10 col-sm-5" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Đơn giá</label>
					<div class="col-sm-9">
						<input type="text" id="txtDonGia"  name="txtDonGia" placeholder="Đơn giá" class="col-xs-10 col-sm-5" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Người nhập</label>
					<div class="col-sm-9">
						<input type="text" id="txtNguoiNhap"  name="txtNguoiNhap" placeholder="Người nhập" class="col-xs-10 col-sm-5" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ghi chú</label>
					<div class="col-sm-9">
						<input type="text" id="txtGhiChu"  name="txtGhiChu" placeholder="GhiChu" class="col-xs-10 col-sm-5" />
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
		</div>
	</div>
@endsection

@section('pagespecificscripts')

	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <!-- Import typeahead.js -->
	<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <!-- Initialize typeahead.js on the input -->
	<script type="text/javascript">
    	$(document).ready(function() {
      		
    		var bloodhound = new Bloodhound({
				datumTokenizer: Bloodhound.tokenizers.whitespace,
				queryTokenizer: Bloodhound.tokenizers.whitespace,
				remote: {
					url: "{{url('admin/phieunhap/mavattu/find?q=%QUERY%')}}",
					wildcard: '%QUERY%'
				},
			});
			
			$('#txtMaVattu').typeahead
			(
				{
					hint: true,
					highlight: true,
					minLength: 1,

				}, 
				{
					name: 'vattu_list',
					source: bloodhound,
					displayText: function(data) {
						return data.id  
					},

					display: function(data) {
						///console.log(data);
						return data.mavattu  //Input value to be set when you select a suggestion. 
					},
					afterSelect: function(data){
    					console.log(data.id);
    					//$('#txtHieu').val("test");
					},

					templates: 
					{
						empty: [
							'<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
						],
						header: [
							'<div class="list-group search-results-dropdown">'
						],
						suggestion: function(data) {

						return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.mavattu + '</div></div>'
						},
						
					}
				}
			).bind("typeahead:selected", function(obj, datum, name) {
				//console.log(datum.hieu);
				$('#txtHieu').val(datum.hieu);
				$('#txtDVT').val(datum.dvt);
				$('#txtTenVattu').val(datum.tenvattu);

				
				//$('#txtGhiChu').val("datum.ghichu");
				//$('#txtDVT').val(datum.txtHieu);
				
				/* VI DU VE AJsAX
						var selected_mavattu = $("#txtMaVattu").val();
						var test="{{url('admin/phieunhap/tenvattu')}}"+"/"+ $("#txtMaVattu").val();
						
						$.ajax({

					        url:test,
					        method:"GET",
					        data:{},
					        success:function(data){
					        	//$('#txtTenVattu').val(selected_mavattu);
					        	$('#txtTenVattu').val(data.tenvattu);
					    	}
				        });
				*/
       
//------------------------------------------------------------------------------
			});

		});

	</script>
@stop