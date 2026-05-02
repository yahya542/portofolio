@extends('layouts.app')

@section('title', ucfirst($page->slug) . ' - Muhammad Yahya | Full Stack Engineer')
@section('meta_description', $page->meta_description ?? 'Professional portfolio page')
@section('meta_keywords', $page->meta_keywords ?? 'portfolio, web development')

@section('content')
<section class="page-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">
          {!! $page->content !!}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('styles')
<style>
  .page-section {
    padding: 80px 0;
  }

  .page-content {
    max-width: 100%;
  }

  .page-content h1,
  .page-content h2,
  .page-content h3,
  .page-content h4,
  .page-content h5,
  .page-content h6 {
    color: #222;
    margin-bottom: 20px;
    font-weight: 700;
  }

  .page-content p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
  }

  .page-content ul,
  .page-content ol {
    padding-left: 20px;
    margin-bottom: 20px;
  }

  .page-content li {
    margin-bottom: 10px;
  }
</style>
@endsection