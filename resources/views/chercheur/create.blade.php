<!DOCTYPE html>
        <html lang="en">

        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>

        <body>
                <div class="info">
                        <div>
                                <h2>Bienvenu {{Auth::user()->name}}</h2>
                        </div>
                        <div class="info2">
                                <p>Veuillez donner plus d'information sur vous pour permettre  <br> aux recruteurs de mieux vous connaitre</p>
                        </div>
                </div>
                <div class="formulaire">

                        <form action="{{ route('chercheur.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Photo de profil</label>
                                        <input type="file" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Votre CV</label>
                                        <input type="file" name="cv" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example7">Parlez nous de vous</label>
                                        <textarea name="description" class="form-control" id="form6Example7" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="profil">Enrégistrer</button>

                        </form>
                </div>
        </body>

        </html>

<style>
        body{
                margin-top: 20px;
                padding: 25px;
        }
        .formulaire {
                display: flex;
                align-items: center;
                justify-content: center;

        }

        input {
                width: 600px;
        }
        .info{
                text-align: center;
        }
</style>
