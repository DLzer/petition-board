@extends('layouts.master')

@section('content')
    <div class="row">
        <!-- Submission -->
        <div class="col-md-4" style="margin-bottom:25px;">
            <h5><strong>Welcome to Petition Board</strong></h5>
            <p style="font-size:14px;">This is a public petition board. This board allows you and all other users to create submissions for improvments, feature requests, bugs and focus areas for a specific application. </p>
            <p style="font-size:14px;">To get started, click the Make a Submission button below and fill out the form to complete your first petition. From there you can watch the progress and upvote count for your petition on the home page. Good Luck!</p>
            <div style="text-align:center; font-size: 14px;">
                <a href="/submission" style="text-align: center;" class="btn btn-info btn-md active" role="button" aria-pressed="true">Make a Submission</a>
            </div>
        </div>
        <!-- Petition Content -->
        <div class="col-md-8">
            <!-- Row -->
            @foreach($petition as $single)
            <div class="row" style="margin-bottom: 25px;">
                <div class="col col-md-1">
                    <i class="fas fa-chevron-up upvote" data-petition_id="{{$single['petition_id']}}" style="width:100%;display:block;text-align:center; cursor: pointer; font-size:22px;"></i>
                    <p class="vote_number" id="petition_vote_{{$single['petition_id']}}" style="margin-bottom:0;text-align:center; font-size:22px;"><strong>{{ $single['petition_votes'] }}</strong></p>
                </div>
                <div class="col-10 col-md-11 single_petition_container">
                    <a href="/single/{{ $single['petition_id']}}"><h5 class="petition_title"><strong>{{ $single['petition_title'] }}</strong></h5></a>
                    <p class="petition_content" style="font-size:12px;">{{ $single['petition_description'] }}</p>
                    <span class="badge badge-primary">{{ $single['petition_category'] }}</span><span class="badge badge-info" style="margin-bottom:20px;">{{ $single['petition_status'] }}</span>
                </div>
            </div>
            @endforeach
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        </div>
    </div>
@endsection