@extends('layouts.master')
@section('content')
    <div class="row" style="margin-bottom: 25px;">
        <div class="col col-md-1">
            <i class="fas fa-chevron-up upvote" data-petition_id="{{$petition['petition_id']}}" style="width:100%;display:block;text-align:center; cursor: pointer;font-size:22px;"></i>
            <p class="vote_number" id="petition_vote_{{$petition['petition_id']}}" style="margin-bottom:0;text-align:center;font-size:22px;">{{ $petition['petition_votes'] }}</p>
        </div>
        <div class="col-10 col-md-11 single_petition_container" style="padding-bottom:20px;">
            <h3 class="petition_title"><strong>{{ $petition['petition_title'] }}</strong><span style="padding-left:10px; font-size:14px;">{{ date('M d Y', strtotime($petition['created_at'])) }}</span> <i class="fal fa-trash-alt delete" style="color:red; cursor: pointer;" data-petition_id="{{$petition['petition_id']}}"></i></h3>
            <p class="petition_content">{{ $petition['petition_description'] }}</p>
            <span class="badge badge-primary">{{ $petition['petition_category'] }}</span><span class="badge badge-info" style="margin-bottom:20px;">{{ $petition['petition_status'] }}</span>
            <br style="margin-bottom:20px;">
            <button type="button" class="btn btn-danger admin">Admin</button>
        </div>
    </div>
    @if(!empty($petition['comments']))
        <div class="row">
            <div class="col-md-6">
                <h5><strong>Discussion</strong></h5>
            </div>
        </div>
    @endif
    @foreach($petition['comments'] as $comment)
        <div class="row single_petition_container" style="padding:10px 0px 10px 0px; margin-bottom:25px;">
            <div class="col-md-6">
                <h6><strong>Author {{ $comment['comment_author'] }}</strong><span style="padding-left:10px;">.</span><span style="padding-left:10px; font-size:12px;">{{ date('M d Y', strtotime($comment['created_at'])) }}</span></h6>
                <p style="font-size:12px;">{{ $comment['comment_content'] }}</p>
            </div>
        </div>
    @endforeach
    <div class="row justify-content-md-center" style="margin-bottom:25px;">
        <div class="col-md-6">
            <form action="/submit_comment" method="post">
                @csrf
                <div class="form-group">
                    <label for="petition_comment">Write a comment</label>
                    <textarea class="form-control" id="petition_comment" rows="1" name="petition_comment"></textarea>
                </div>
                <input type="text" hidden value="{{ $petition['petition_id'] }}" name="petition_id">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection