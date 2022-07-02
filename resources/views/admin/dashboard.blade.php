@extends('admin/master')
@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('assets/images/user/default.png') }}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ session()->get('user_name') }}</h3>
                <p class="text-muted text-center">{{ session()->get('agent_code').' - '.session()->get('agent_name') }}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
              <div class="clearfix hidden-md-up"></div>
              <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-primary elevation-1"><i class="far fa-file-alt"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Airwaybills</span>
                    <span class="info-box-number">760</span>
                  </div>
                </div>
              </div>
              <div class="clearfix hidden-md-up"></div>
              <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="far fa-file-alt"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">On-Process</span>
                    <span class="info-box-number">760</span>
                  </div>
                </div>
              </div>
              <div class="clearfix hidden-md-up"></div>
              <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="far fa-file-alt"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Finished</span>
                    <span class="info-box-number">760</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box mb-3 bg-success">
                  <span class="info-box-icon"><i class="fas fa-wallet"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Deposit</span>
                    <span class="info-box-number">{{ number_format($agent->agent_deposit, 2) }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection