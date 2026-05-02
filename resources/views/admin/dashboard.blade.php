@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin Dashboard</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $stats['portfolio_items'] }}</h3>
                                    <p>Portfolio Items</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <a href="{{ route('admin.portfolio.index') }}" class="small-box-footer">
                                    Manage <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $stats['certificates'] }}</h3>
                                    <p>Certificates</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Manage <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $stats['pages'] }}</h3>
                                    <p>Pages</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file"></i>
                                </div>
                                <a href="{{ route('admin.pages.index') }}" class="small-box-footer">
                                    Manage <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $stats['menus'] }}</h3>
                                    <p>Menu Items</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-bars"></i>
                                </div>
                                <a href="{{ route('admin.menus.index') }}" class="small-box-footer">
                                    Manage <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection