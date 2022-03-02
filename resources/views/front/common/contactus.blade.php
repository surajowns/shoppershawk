@extends('front.master')
@section('title','Contact us')
@section('content')
<div class="contact_page_bg">
        
        <div class="container">
            <!--contact area start-->
            <div class="contact_area">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="contact_message content">
                            <h3>contact us</h3>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : N-12 & 13, First Floor, Opposite HSBC Bank,Noida, Uttar Pradesh</li>
                                <li><i class="fa fa-phone"></i> <a href="tel:+91 120-2514786;">+91 120-2514786</a></li>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:care@shoppershawk.com;">care@shoppershawk.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="contact_message form">
                            <h3>Tell us</h3>
                            <form action=""  method="post" id="enquiry_form" enctype="multipart/form-data">
                            @csrf
                                <p>
                                    <label> Your Name </label>
                                    <input name="name" placeholder="Name *" id="name" type="text" required>
                                    <span class="text-danger">{{$errors->first('name')}}</span>

                                </p>
                                <p>
                                    <label>Contact Number </label>
                                    <input name="contact_no" placeholder="Contact Number *" type="number" id="contact_no" required>
                                    <span class="text-danger">{{$errors->first('contact_no')}}</span>

                                </p>
                                <p>
                                    <label> Your Email </label>
                                    <input name="email" placeholder="Email *" type="email" id="email" required>
                                    <span class="text-danger">{{$errors->first('email')}}</span>

                                </p>
                                <p>
                                    <label>Subject</label>
                                    <input name="subject" placeholder="Subject *" type="text" id="subject" required>
                                    <span class="text-danger">{{$errors->first('email')}}</span>

                                </p>
                                <div class="contact_textarea">
                                    <label> Your Message</label>
                                    <textarea placeholder="Message *" name="message" class="form-control2" id="message" required></textarea>
                                    <span class="text-danger">{{$errors->first('message')}}</span>

                                </div>
                                <button type="submit">Send</button>
                                <p class="form-messege"></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--contact area end-->
        </div>
    </div>
@endsection
 @section('javascript')
 <script src="{{url('public/front/js/jquery.validate.min.js')}}"></script>

<script>
 $(document).ready(function(){

      
if ($("#enquiry_form").length > 0) {
$("#enquiry_form").validate({

rules: {
   name: {
       required: true,
   },
   contact_no:{
       required: true,
       maxlength: 10,
       minlength: 10,
       number: true,
   },
   email: {
       required: true,
       maxlength: 50,
       email: true,
   },

   subject: {
       required: true,
   },
   message: {
       required: true,
       minlength:10,
       
   },
  
},
messages: {

   name: {
       required: "Please enter your name",
   },
   
   contact_no: {
       required: "Please enter valid contact number",
       number: "Please enter valid contact number",
       maxlength: "The number should be  equal to 10 digits",
       maxlength: "The number should be  equal to 10 digits",

   },
   email: {
       required: "Please enter valid email",
       email: "Please enter valid email",
       maxlength: "The email name should less than or equal to 50 characters",
   },
   subject: {
       required: "Please enter subject.",
       maxlength:"The mobile number should not be greater than 10 digit"
   },
   message:{
       required : "Please enter message",
   }

},
})
}
});
</script>
<!-- <script>
    $(document).on('click','#enquiry',function(){
      
       var name=$('#name').val();
       var email=$('#email').val();
       var subject=$('#subject').val();
       var message=$('#message').val();
       alert(message)   
        
 
    $.ajax({
            Type:"POST",
            url : '{{url("/user/contactus")}}',
            dataType:'json',
            cache: true,
            data: {name:name,email:email,subject:subject,message:message},
            success: function(response){
                console.log(response);
            if(response.status == 'error'){
            toastr.warning("error");
            }
            else{
                location.reload();
            
            }
            }
        })
    })

</script> -->
@stop 