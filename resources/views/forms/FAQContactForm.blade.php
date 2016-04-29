<form id="contact" method="post" action={{url('/')}}">
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