@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contáctanos</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">
            ¿Tienes alguna pregunta? Por favor, no dude en ponerse en contacto con nosotros directamente. Nuestro equipo se pondrá en contacto con usted en cuestión de horas para ayudarle.
        </p>

        <div class="row">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="{{ route('home.save.contactanos') }}" method="POST">
                    @csrf
                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control">

                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="">Correo electrónico</label>
                                <input type="text" id="email" name="email" class="form-control">

                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Asunto</label>
                                <input type="text" id="subject" name="subject" class="form-control">

                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row mt-3">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <label for="message">Mensaje</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                </form>

                <div class="text-center text-md-left mt-3">
                    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Enviar</a>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>San Francisco, CA 94126, USA</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 01 234 567 89</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>contact@mdbootstrap.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>
    </div>
</section>
@endsection