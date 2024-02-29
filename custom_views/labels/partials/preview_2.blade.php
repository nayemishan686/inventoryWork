<table align="center" style="border-spacing: {{$barcode_details->col_distance * 1}}in {{$barcode_details->row_distance * 1}}in; overflow: hidden !important;">
@foreach($page_products as $page_product)

	@if($loop->index % $barcode_details->stickers_in_one_row == 0)
		<!-- create a new row -->
		<tr>
		<!-- <columns column-count="{{$barcode_details->stickers_in_one_row}}" column-gap="{{$barcode_details->col_distance*1}}"> modifiée <span style="display: block !important; font-size: {{16*$factor}}px">-->
	@endif
		<td align="center" valign="center">
			<div style="font-family: Arial, Helvetica, sans-serif; overflow: hidden !important;display: flex; flex-wrap: wrap;align-content: center;width: {{$barcode_details->width * 1}}in; height: {{$barcode_details->height * 1}}in;">
				

				<div>

					{{-- Business Name --}}
					@if(!empty($print['business_name']))
						<b style="display: block !important; font-size: 16px">{{$business_name}}</b>
					@endif

					{{-- Product Name --}}
					@if(!empty($print['name']))
						<span style="display: block !important; font-size: 12px">
							{{$page_product->product_actual_name}}
						</span>
					@endif

					{{-- Variation --}}
					@if(!empty($print['variations']) && $page_product->is_dummy != 1)
						<span style="display: block !important; font-size: 10px">
							{{$page_product->product_variation_name}} : {{$page_product->variation_name}}
						</span>
					@endif

					{{-- Price --}}
					@if(!empty($print['price']))
					<span style="font-size: 14px; ">
					    <b>@lang('lang_v1.price'):</b>
						@if($print['price_type'] == 'inclusive')
							{{@num_format($page_product->sell_price_inc_tax)}}
						@else
							{{@num_format($page_product->default_sell_price)}}
						@endif
						
						{{session('currency')['symbol'] ?? ''}}
					</span>
					@endif

					<br>

					{{-- Barcode --}}
					<img style="filter:contrast(200%); max-width:94% !important;height: {{$barcode_details->height*0.30}}in !important;" src="data:image/png;base64,{{DNS1D::getBarcodePNG($page_product->sub_sku, $page_product->barcode_type, 2,27,array(0, 0, 0), true)}}">
				</div>
			</div>
		
		</td>

	@if($loop->iteration % $barcode_details->stickers_in_one_row == 0)
		</tr>
	@endif
@endforeach
</table>

<style type="text/css">
	@media print{
		
		table{
			page-break-after: always;
		}
		@page {
		size: {{$paper_width}}in {{$paper_height}}in;

		/*width: {{$barcode_details->paper_width}}in !important;*/
		/*height:@if($barcode_details->paper_height != 0){{$barcode_details->paper_height}}in !important @else auto @endif;*/
		margin-top: {{$margin_top}}in !important;
		margin-bottom: {{$margin_top}}in !important;
		margin-left: {{$margin_left}}in !important;
		margin-right: {{$margin_left}}in !important;
	}
	}
</style>