{{--
  Template Name: Directorio
--}}

@extends('layouts.directory')

@section('content')

  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

<div id="accordion">

  @php
    global $paged, $wp_query;
    $temp = $wp_query; 
    $wp_query = null; 
    $wp_query = new WP_Query();
    $wp_query->query('post_type=directorios&posts_per_page=-1&grupos=organos-de-direccion&paged='.$paged);
  @endphp
  <div class="card">
    <div class="card-header">
      <button class="btn btn-link" data-toggle="collapse" data-target="#od" aria-expanded="true" aria-controls="od">
        Órganos de Dirección
      </button>
      </div>
    <div id="od" class="card-body collapse show" aria-labelledby="od" data-parent="#accordion">
      @while ($wp_query->have_posts()) @php($wp_query->the_post())
        @include('partials.content-directory')
      @endwhile
    </div>
  </div>
  @php
    $wp_query = null; 
    $wp_query = $temp; 
  @endphp

  @php
    global $paged, $wp_query;
    $temp = $wp_query; 
    $wp_query = null; 
    $wp_query = new WP_Query();
    $wp_query->query('post_type=directorios&posts_per_page=-1&grupos=organo-de-control&paged='.$paged);
  @endphp
  <div class="card">
    <div class="card-header">
      <button class="btn btn-link" data-toggle="collapse" data-target="#oc" aria-expanded="true" aria-controls="oc">
        Órgano de Control
      </button>
      </div>
    <div id="oc" class="card-body collapse" aria-labelledby="oc" data-parent="#accordion">
      @while ($wp_query->have_posts()) @php($wp_query->the_post())
        @include('partials.content-directory')
      @endwhile
    </div>
  </div>
  @php
    $wp_query = null; 
    $wp_query = $temp; 
  @endphp

  @php
    global $paged, $wp_query;
    $temp = $wp_query; 
    $wp_query = null; 
    $wp_query = new WP_Query();
    $wp_query->query('post_type=directorios&posts_per_page=-1&grupos=organos-de-apoyo&paged='.$paged);
  @endphp
  <div class="card">
    <div class="card-header">
      <button class="btn btn-link" data-toggle="collapse" data-target="#oa" aria-expanded="true" aria-controls="oa">
        Órganos de Apoyo
      </button>
      </div>
    <div id="oa" class="card-body collapse" aria-labelledby="oa" data-parent="#accordion">
      @while ($wp_query->have_posts()) @php($wp_query->the_post())
        @include('partials.content-directory')
      @endwhile
    </div>
  </div>
  @php
    $wp_query = null; 
    $wp_query = $temp; 
  @endphp
</div>

@endsection
