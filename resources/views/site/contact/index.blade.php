@extends('site.layout.masterwithimage')
@section('title', 'Contact')



@section('content')



<section class="contact_page">
    <div class="first_part">
        <div class="texts">
        
        <h1>CONTACT US</h1>
        <h3>Let's Chat.
            <br>

            Send your message to our team
        </h3>
        
    </div>
    </div>

</section>


<section class="contact-form">
    <h1>GET IN TOUCH!</h1>

    <form>
        <label>Name</label>
        <input type="text">

        <label>Email</label>
        <input type="text">

        <label>Subject</label>
        <input type="text">

        <label>Your message</label>
       <textarea rows="8"></textarea>


        <button>SEND</button>

    </form>


    <div class="contact_info">
        <div><i class="fas fa-envelope"></i><p>ramiz.apk7@gmail.com</p></div>
        <div><i class="fas fa-phone-alt"></i><p>+967736176331</p></div>
        <div><i class="fas fa-map-marker-alt"></i><p>San Francisco, CA</p></div>
    </div>
</section>





@endsection