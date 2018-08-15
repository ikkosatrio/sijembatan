<?php header('Content-type: application/xml; charset="ISO-8859-1"',true);  ?>
 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
  <url>
     <loc><?php echo base_url();?></loc>
     <priority>1.0</priority>
  </url>

  @foreach ($artikelBaru as $result)
  <url>
     <loc>{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}</loc>
     <priority>0.5</priority>
     <image:image>
      <image:loc>{{img_artikel($result->cover)}}</image:loc>
      <image:title>{{$result->judul}}</image:title>
    </image:image>
     <lastmod>@php
       $datetime = new DateTime($$result->created_at);
       $result = $datetime->format('Y-m-d\TH:i:sP');
     @endphp{{$result}}</lastmod>
  </url>
  @endforeach

  @foreach ($potensi as $result)
  <url>
     <loc>{{base_url('main/potensi/'.$result->id_potensi.'/'.seo($result->judul))}}</loc>
     <priority>0.5</priority>
     <image:image>
      <image:loc>{{img_potensi($result->cover)}}</image:loc>
      <image:title>{{$result->judul}}</image:title>
    </image:image>
     <lastmod>@php
       $datetime = new DateTime($$result->created_at);
       $result = $datetime->format('Y-m-d\TH:i:sP');
     @endphp{{$result}}</lastmod>
  </url>
  @endforeach

  @foreach ($produk as $result)
  <url>
     <loc>{{base_url('main/produk/'.$result->id_produk.'/'.seo($result->judul))}}</loc>
     <priority>0.5</priority>
     <image:image>
      <image:loc>{{img_produk($result->cover)}}</image:loc>
      <image:title>{{$result->judul}}</image:title>
    </image:image>
     <lastmod>@php
       $datetime = new DateTime($$result->created_at);
       $result = $datetime->format('Y-m-d\TH:i:sP');
     @endphp{{$result}}</lastmod>
  </url>
  @endforeach
  
</urlset>