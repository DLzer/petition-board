@extends('layouts.master')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h2 style="text-align:center;"> Make a new submission</h2>
            <form method="POST" action="/store_petition" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="petition_title">Request Title</label>
                    <input type="text" class="form-control" id="petition_title" name="petition_title" placeholder="">
                </div>
                <div class="form-group">
                    <label for="petition_category">Request Category</label>
                    <select class="form-control" id="petition_category" name="petition_category">
                        <option>Feature Request</option>
                        <option>Bug Fix</option>
                        <option>Focus Area</option>
                        <option>Minor Adjustment</option>
                        <option>Optimization</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="petition_description">Request Description</label>
                    <textarea class="form-control" id="petition_description" rows="3" name="petition_description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection