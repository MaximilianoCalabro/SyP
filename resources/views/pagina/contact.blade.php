@extends ('index')
@section ('contenido')

<section class="page-section cta">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-sm-12 col-md-12 mx-auto">
        <div class="cta-inner text-center rounded">
          <h2 class="section-heading mb-5">
            <span class="section-heading-lower">Contactenos</span>
            <hr class="divider-w">
          </h2>

          <div class="row">

            <div class="mb-sm-20 col-xl-6 col-sm-6 col-md-6">
              <p class="address mb-5">
                <em>
                  <strong>Iriondo 1212 4b</strong>
                  <br>
                  Argentina, Santa Fe, Rosario CP 2000
                  <br>
                  (341) 156237286
                  <br>
                  paolasantos76@hotmail.com
                </em>
              </p>

              <div class="col-sm-12">
                <form id="contactForm" role="form" method="post" action="php/contact.php">
                  <div class="form-group">
                    <label class="sr-only" for="name">Nombre</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="7" id="message" name="message" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Enviar</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>

            <div class="mb-sm-20 col-xl-6 col-sm-6 col-md-6">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.1866162167103!2d-60.67324838481364!3d-32.94608208092114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab5ecd03aca5%3A0x235a96ce761c6d7a!2s4b%2C+Iriondo+1212%2C+S2002QVH+Rosario%2C+Santa+Fe!5e0!3m2!1ses-419!2sar!4v1525369173798" width="500" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection