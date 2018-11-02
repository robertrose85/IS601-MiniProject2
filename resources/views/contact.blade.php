@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!--<div class="card">
                        <div class="card-header">Contact</div>-->

                    <div class="card mt-3 pl-2 pr-2">
                        <div class="card-title">
                            <h1>Contact</h1>
                            <p class="lead">Use form to contact site admin.</p>
                        </div>

                        <div class="card-body">
                            <form role="form" id="contact-form" class="contact-form" action="{{route('contact.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input name="name" type="name" class="form-control" id="name" placeholder="First">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="body">Message</label>
                                    <textarea name="body" class="form-control" id="body" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
                        </div>
                    </div>
                <!--</div>
            </div>-->
        </div>
    </div>
@endsection