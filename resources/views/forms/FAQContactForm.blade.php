<!-- FAQ Contact Form -->
<div id="faqForm" class="container">
    <p>If you have not found an answer to a question, please don't hesitate to contact us by
        filling out the form below with your name, e-mail, a subject, and a message.
        You will be contacted by e-mail within 24 hours. Thanks!
    </p>

    <form id="contact" method="post" action="{{url('/')}}">
        <input type="text" id="name" name="name" placeholder="Name" required="required">
        <br>
        <input type="email" id="email" name="email" placeholder="Email" required="required">
        <br>
        <input type="text" name="subject" placeholder="Subject" required="required">
        <br>
        <textarea name="content" placeholder="Your Message" required="required"></textarea>
        <br><br>
        <button class="button button--nina button--text-thick button--text-upper button--size-l"
                data-text="Send Mail"
                name="submit"
                onclick="this.form.submit();">
            <span>S</span><span>e</span><span>n</span><span>d</span>
            <span>M</span><span>a</span><span>i</span><span>l</span>
        </button>
    </form>
</div>
