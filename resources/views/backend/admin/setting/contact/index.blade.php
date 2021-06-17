@extends('backend.admin.master')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <span style="font-size: 1.25rem; color: black">Contact Us</span>
                                    </div>
                                    <form action="{{ url('/web/contact/store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="1">
                                        <div class="form-group">
                                            <lable for="note">Contact</lable>
                                            <textarea class="form-control summernote" name="note" rows="5" placeholder="Contact address">
                                                @if(!empty($contact->note))
                                                {{ $contact->note }}
                                                @endif
                                            </textarea>
                                        </div>
                                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
