@extends('MasterView')

@section('dynamic_content')

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">CONTACT US</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        "Have a question or need assistance? Reach out to our friendly team for personalized support. We're here to help
        you with any questions you may have."
    </p>
</div>
<div class="container">
    <div class="row">

        <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23443.46348683359!2d73.9563808349038!3d15.16215110658819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbe4c8f7104b1ed%3A0x9b4eba313c551ef4!2sHoliday%20Inn%20Resort%20Goa%2C%20an%20IHG%20Hotel!5e1!3m2!1sen!2sin!4v1720959122391!5m2!1sen!2sin" 
                width="565" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <h5>Address</h5>
                <a href="" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                    <i class="fa-solid fa-location-dot"></i> Mobor Beach , Cavelossim , Goa , 403731 .
                </a>
                <h5 class="mt-4">Call Us</h5>
                <a href="tel: +91 77384826273" class="d-inline-block  text-decoration-none text-dark">
                    <i class="fa-solid fa-phone"></i>+91 93166 02805
                </a>
                <h5 class="mt-4">Email</h5>
                <a href="" class="d-inline-block  text-decoration-none text-dark">
                    <i class="fa-solid fa-envelope"></i> smayariya973@rku.ac.in
                </a>
                <h5 class="mt-4">Follow Us</h5>
                <a href="" class="d-inline-block text-dark fs-5 me-2">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="" class="d-inline-block text-dark fs-5 me-2">
                <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="" class="d-inline-block text-dark fs-5 ">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6  px-4">
            <div class="bg-white rounded shadow p-4 ">
                <form method="post" >
                    @CSRF
                    <h5>Send a message</h5>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight:500;">Name</label>
                            @if(session()->has('u_email'))
                                <input name="name" value="{{ $userprofile->u_name }}" type="text" class="form-control shadow-none">
                            @else
                                <input name="name" value="" type="text" class="form-control shadow-none">
                            @endif
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight:500;">Email</label>
                            @if(session()->has('u_email'))
                                <input name="email" value="{{ $userprofile->u_email }}" type="text" class="form-control shadow-none" readonly>
                            @else
                                <input name="email" value="" type="text" class="form-control shadow-none">
                            @endif                        
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight:500;">Subject</label>
                        <input name="subject" value="{{ old('subject') }}" type="text" class="form-control shadow-none">
                        @error('subject')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight:500;">Message</label>
                        <textarea name="message" value="{{ old('message') }}" class="form-control shadow-none" rows="2"></textarea>
                        @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" name="send" class="btn btn-dark form-control mt-3">SEND</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection