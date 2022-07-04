@extends('partial.formtemplate')
@section('title')
        Register
@endsection

@section('content')
<div id="login-page">
        <div class="container">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" class="form-login" action="{{ route('register') }}">
                @csrf
                <h2 class="form-login-heading">Register now</h2>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="login-wrap">
                    <div class="input">
                        <input type="text" class="form-control" name="nom" placeholder="Nom" :value="old('nom')" autofocus>
                        <br>
                    </div>
                    <div class="input">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" :value="old('email')">
                       <br>
                    </div>
                    <div class="input">
                        <input type="text" class="form-control" name="pays" placeholder="Pays" :value="old('nation')">
                       <br>
                    </div>
                    <div class="input">
                        <input type="date" class="form-control" name="datenaiss" placeholder="Date de naissance" :value="old('datenaiss')">
                        <br>
                    </div>
                    <div class="input">
                        <select name="statu" class="form-control" id="">
                            <option value="">Qui êtes-vous? </option>
                            <option value="Recruteur">Recruteur</option>
                            <option value="Chercheur d'emploie">Chercheur d'emploie</option>
                        </select>
                        <br>
                    </div>
                    <div class="input">
                        <select name="activite" class="form-control" id="">
                            <option value="">Votre secteur d'activté </option>
                            <option value="Développement web">Développement web</option>
                            <option value="Réseau">Réseau</option>
                        </select>
                        <br>
                    </div>
                    <div class="input">
                        <select name="sexe" class="form-control" id="">
                            <option value="">Choisir le sexe</option>
                            <option value="F">Féminin</option>
                            <option value="M">Masculin</option>
                        </select>
                       <br>
                    </div>

                    <div class="input">
                        <input type="password" class="form-control" name="passwords" placeholder="Password" autocomplete="new-password">
                        <br>
                    </div>
                    <div class="input">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                        <br>

                    </div>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> REGISTER</button>
                    <hr>
                    <div class="login-social-link centered">
                        <p>or you can sign in via your social network</p>
                        <button class="btn btn-facebook" ><i class="fa fa-facebook"></i> Facebook</button>
                        <button class="btn btn-twitter"  ><i class="fa fa-linkedin"></i> <a href="index.html"> Linkedin</a></button>
                    </div>
                    <div class="registration">
                        Don't have an account yet?<br />
                        <a class="" href="{{route('login')}}">
                            Already registered?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
