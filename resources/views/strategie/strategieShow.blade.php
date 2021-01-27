@extends('layouts.masterUser')

@section ('body')

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title> Stratégie </title>
      <link href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel = "stylesheet">
    </head>

    <body>
      <div class = "container" style="margin-top:20px;">
        <h1>Résultass</h1>
        <div id="resultat" style="margin-top:40px;">
          <p>Résultats pour une décision priseLe <b><?php echo $date?></b> , pour l'échéance
            <b><?php echo $echeance?></b> et un prix d'exercice de
            <b><?php echo $prix?></b> €/t 
            :</p>
            @foreach($resultats as $resultat) 
            <table class="table" style="background-color:#000000 ;color:white;">
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Prix obtenu avec la vente d'un contrat a terme</td>
                  <td>{{$resultat->prixVenteContrat}} </td> 
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Trésorerie minimale disponible si contrat à terme choisi</td>
                  <td>{{$resultat->tresorieMin}} </td>
                </tr>

                <tr>
                  <th scope="row">3</th>
                  <td>Trésorerie maximale disponible si contrat à terme choisi</td>
                  <td>{{$resultat->tresorieMax}}</td>
                </tr>

                <tr>
                  <th scope="row">4</th>
                  <td>Prix obtenu avec l'achat d'un put</td>
                  <td>{{$resultat->prixAchatPut}} </td>
                </tr>

                <tr>
                  <th scope="row">5</th>
                  <td>Meileur strategie </td>
                  <td>{{$resultat->meileurSt}} </td>
                </tr>
             @endforeach
           </tbody>
          </table>
          <center>
              <div class="col-md-2">
                  <a href="{{ route('strategie.index', $id) }}" class="btn btn-success">Rejouer </a>
              </div>

              <div class="col-md-2">
                  <a href="{{ route('user.show', $id) }}" class="btn btn-success">Accueil</a>
              </div>
          </center>
        </div>
      </div>
    </body>
    
  </html>

@endsection