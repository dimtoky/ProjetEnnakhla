       @extends('layouts.client')

        @section('title', 'Contact')

           @section('head')

     <style>.red{color:red}.form-area{background-color:#FAFAFA;padding:10px 40px 60px;border:1px solid GREY}</style>
    <script>$(document).ready(function(){$("#characterLeft").text("200 caractères disponibles "),$("#message").keydown(function(){var e=$(this).val().length;if(e>=200)$("#characterLeft").text("Vous avez atteint la limite"),$("#characterLeft").addClass("red"),$("#btnSubmit").addClass("disabled");else{var t=200-e;$("#characterLeft").text(t+" caractères disponibles"),$("#btnSubmit").removeClass("disabled"),$("#characterLeft").removeClass("red")}})});</script>
</head>
                    @endsection

   @section('content')
      <div class="col-lg-7">
            <div class="form-area">
                <form role="form" action="{!! url('sendcontact') !!}" method="POST">
                {!! csrf_field() !!}
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Un probléme? contactez nous!</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Votre adresse mail" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Votre téléphone" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet" required>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control"  type="textarea" name="message" id="message" placeholder="Message" maxlength="200" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>
                    </div>
                    @if ($issend == 1)
                     <div class="form-group">
                        <div class="alert alert-success"> Message transmis</div>
                    </div>
                    @endif

                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Envoyer</button>
                </form>
            </div>
        </div>
            <div class="col-lg-5">
       <div class="form-area">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Coordonnées</legend>
            <address>
                <strong>Imprimerie EN-NAKHLA © S.A.R.L.</strong><br>
               Adresse : 12, Zone d'Activité 16403<br>
               El Achour Alger - Algérie<br><br>
                <abbr title="Phone">
                    Tel :</abbr>
                +213 21 91 74 74 / 91 90 70 / 91 90 68
                  <br><abbr title="Mobile">
                    Mobile :</abbr>
               0 550 24 26 11 / 0 550 24 26 50
                 <br> <abbr title="Fax">
                    Fax :</abbr>
                +213 21 91 74 53
            </address>
            <address>
                <strong>Mail</strong><br>
                <a href="mailto:#"> info@ennakhla.dz  <br> commercial@ennakhla.dz</a>
            </address>
            </form>
        </div>
         </div>
      </div>
                    @endsection