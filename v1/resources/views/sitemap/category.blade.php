<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

@if($category)
    @foreach ($category as $category)
        <url>
            <loc>{{ url('/') }}/category/{{ $category->slug }}</loc>           
            <lastmod>{{ \Carbon\Carbon::parse($category->created_at)->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach   
@else
@endif

@if($department)
	@foreach ($department as $department)
        <url>
            <loc>{{ url('/') }}/department/{{ $department->dept_slug }}</loc>           
            <lastmod>{{ \Carbon\Carbon::parse($department->created_at)->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
@else
@endif

@if($products)
	@foreach ($products as $products)



@php
$variant_value=DB::table('skus')->select('variant_value as size')->where('product_id',$products->id)->get()->first();
if($variant_value){
$sizes=$variant_value->size??'';
}
else{
$sizes='';
}

@endphp

@if($sizes)

        <url>
            <loc>{{ url('/') }}/product-sku-prices?slug={{ $products->slug }}&amp;size={{$sizes}}</loc>           
            <lastmod>{{ \Carbon\Carbon::parse($products->created_at)->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
@endif

    @endforeach
@else
@endif


@if($pages)
	@foreach ($pages as $pages)
        <url>
            <loc>{{ url('/') }}/{{ $pages->slug }}</loc>           
            <lastmod>{{ \Carbon\Carbon::parse($pages->created_at)->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
@else
@endif
	
	
</urlset>