@extends('layouts.master-layouts')

@section('title')
Perubahan Simpanan
@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Perubahan Simpanan @endslot
@slot('li_1') <a href="{{route('checker.mytask')}}">Pengajuan</a> @endslot
@slot('li_2') Perubahan Simpanan @endslot
@endcomponent

@include('flash::message')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title mb-4">Perubahan Simpanan</h4> -->

                {!! Form::open(['route' => 'submission.submitPerubahanSimpanan','id'=>'my-form','method'=>'post']) !!}
                @include('submission.perubahansimpanan-anggota')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>



@endsection