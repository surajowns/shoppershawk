<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($products as $product)
        <url>
            <loc>{{url('/product_details/'.$product->slug)}}</loc>
            <lastmod>{{ gmdate('Y-m-d',strtotime($product->updated_at)) }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>