@extends('layouts.mail')

@section ('content')
<div class="row">
 
 
  <h2> Nouvelle période </h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
    <br/>
  @endif
  <h3> Vous devez atteindre <?php echo($game->objectivePrice)?> euros </h3>
  <h3> Vous avez en tout <?php echo $quantiteTotal ?> tonnes à vendre </h3>

</div>
<div class="row">
  <div class="col-md-8 col-sm-8">
    <h3> FLASH NEWS : </h3>
    <?php if($informations != null ){ ?>
      <table class="table table-striped">

        <tbody>
          @foreach($informations as $information)
            <tr>
              <td>{{$information->nameInformation}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
       
    <?php } ?>
  </div>
</div>

    <div class ="row">
    <p> Prix à terme de cette période : <?php echo($termPrice);?> </p>
    <p> Prix feme de cette période : <?php echo($spotPrice);?> </p>
    </div>

<div class="row">
  <h3> À vous de choisir : </h3>
  <form method="post" action="{{ route('period.store') }}">
    {{ csrf_field() }}
     
    <?php if($isSold == null || $isSold == false){ ?>
    <div class="row">
      <div class="col-md-4">
        <label> Voulez-vous vendre votre récolte ? <a class="picto-item" aria-label="Votre récolte sera vendue au prix ferme de la période où vous avez pris la décision de vente."><span class="glyphicon glyphicon-info-sign"></a></label>
      </div>
      <div class="col-md-8">
        <input type="radio" name="isSold" value="0" id="oui"> Oui
        <input type="radio" name="isSold" value="0" id="non"> Non
      </div>
    </div>

    

    <?php }else{ ?>
    <div class="row">
      <label>
        Vous avez déjà vendu votre production lors d'une période précédente. Vous ne pouvez plus la vendre.
      </label>
      <input type="hidden" name="isSold" value="0" checked="checked">
    </div>
    <?php } ?>
     
    <?php if($numMax != $nbrPeriodes || $numMax == $nbrPeriodes){ ?>
    <div class="row">
      <div class="col-md-12">
        <label> En tout, vous
          <?php
            if ($numberContrat == 0) {echo(" avez acheté : 0 contrat. ");}
            else {
              if ($numberContrat > 0)
                {echo(" avez acheté ".$numberContrat." contrat");if($numberContrat > 1){echo("s");}}
              else
                {echo(" avez vendu ".$numberContrat*(-1)." contrat");if($numberContrat < -1){echo("s");}}
                {echo(" avez vendu ".$quantite ." tonnes");}
             }
          ?>
        </label>
      </div>
      
      <div id="show" style="display: none" >
            <div class="col-md-4" >
              <label> Voulez-vous  ? </label>
            </div>
            <div class="col-md-8">
              <input type="radio" id="vente-1" name="vente" value="-1" checked> <label for="vente-1">Vendre</label>
              <input type="radio" id="vente1" name="vente" value="1"> <label for="vente1">Acheter</label>
              <input type="radio" id="vente0" name="vente" value="0"> <label for="vente0">Ne rien faire</label>
            </div>
      
    
     
    <div class="row" id="nbContrat">
      <div class="col-md-4" id="nbContrat" style="margin-top:10px;">
        <label id="nbContrat"> Nombre de contrat : </label>
      </div>
      <div class="col-md-2" id="nbContrat">
        <input type="number" max=<?php printf($editParam->levierEBM) ?> min=0 value=0 class="form-control" name="contratPosition" id="nbContrats" data-rule="minlen:4" data-msg="Entrez prix valide" />
      </div>
      <div class="col-md-3"> Vous avez <?php echo $EBM ?> contrats</div>
    </div>
    
    <div class="row" id="nbContrat" style="margin-top:10px;">
      
      
    </div>
     
    <div class="row" id="quantite" style="margin-top:10px;">
      <div class="col-md-4" id="nbContrat">
        <label id="nbContrat"> Quantité de votre récolte à vendre sur le marché physique:</label>
      </div>
      <div class="col-md-2" id="quantite">
        <p><input type="number" max=<?php printf($editParam->quantite) ?> min=0 value=0 class="form-control" name="quantite" id="quantites" data-rule="minlen:4" data-msg="Entrez quantité valide" /> 
      </div>
      <div class="col-md-3"> Vous avez <?php echo $quantiteTotal ?> tonnes</div>
      
    </div>
     
    <div class="row" id="quantite" style="margin-top:10px;">
      
     
    </div>
     
    
    <?php }else{ ?>
    <div class="row">
      <div class="col-md-4">
        <label> Vous ne pouvez ni acheter ni vendre de contrat pour la dernière période </label>
      </div>
      <div class="col-md-8">
        <input type="hidden" id="vente-1" name="vente" value="-1"> <label for="vente-1"></label>
        <input type="hidden" id="vente1" name="vente" value="1"> <label for="vente1"></label>
        <input type="hidden" id="vente0" name="vente" value="0" checked> <label for="vente0">  </label>
        <input type="hidden" value=0 class="form-control" name="contratPosition" id="nbContrat" data-rule="minlen:4" data-msg="Entrez prix valide" />
      </div>
    </div>
    <?php }?>

    <div class="row">
      <input type="hidden" class="form-control" name="termPrice" id="termPrice" readonly/>
      <input type="hidden" class="form-control" name="spotPrice" id="spotPrice" readonly/>
      <input type="hidden" class="form-control" name="gainCumul" id="gainCumul" data-rule="minlen:4" value=<?php printf($game->idGame) ?>/>
      <input type="hidden" class="form-control" name="priceGap" id="priceGap" data-rule="minlen:4" value=<?php printf($game->idGame) ?>/>
      <input type="hidden" class="form-control" name="globalGap" id="globalGap" data-rule="minlen:4" value=<?php printf($game->idGame) ?>/>
      <input type="hidden" class="form-control" name="idGame" id="idGame" data-rule="minlen:4" value=<?php printf($game->idGame) ?> data-msg="Entrez prix valide" />
    </div>
  </div>
  </div>
    <br/>

    <div class="row">
      <button type="submit" class="btn btn-primary"> Valider </button>
    </div>
  </form>
</div>

<script>
  document.getElementById('non').addEventListener('click', function() {
  document.getElementById('show').style.display='block';
    
  });
  document.getElementById('oui').addEventListener('click', function() {
  document.getElementById('show').style.display='block';
    
  });

</script>
<script>
  document.getElementById('vente0').addEventListener('click', function() {
    document.getElementById('nbContrat').style.display='none';
    document.getElementById('quantite').style.display='none';
    bilan();
  });
  document.getElementById('vente-1').addEventListener('click', function() {
    document.getElementById('nbContrat').style.display='block';
    document.getElementById('quantite').style.display='block';
    bilan();
  });
  
 
  document.getElementById('nbContrat').addEventListener('change', function() {
    bilan();
  });
  var plancher = <?php echo $editParam->plancher ?>;
  var plafond = <?php echo $editParam->plafond ?>;
  var spread = <?php echo $editParam->spread ?>;
  var termMean = <?php echo $editParam->prixTermeEsperance ?>;
  var spotMean = <?php echo $editParam->prixSpotEsperance ?>;
  var termStd = <?php echo $editParam->prixTermeEcartType ?>;
  var spotStd = <?php echo $editParam->prixSpotEcartType ?>;
  var prevtermPrice = <?php echo $termPrice ?>;
  var d1 = <?php echo $informations[0]->deltaInformation ?>;
  var d2 = <?php echo $informations[1]->deltaInformation ?>;
  var d3 = <?php echo $informations[2]->deltaInformation ?>;
  var rand1 = (Math.random() * (0.975 - 0.025) + 0.025).toFixed(4);
  var rand2 = (Math.random() * (0.975 - 0.025) + 0.025).toFixed(4);
  var termPrice = (Math.min(Math.max(prevtermPrice + d1 + d2 + d3 + inv(rand1, termMean, termStd), plancher), plafond)).toFixed(2);
  document.getElementById("termPrice").value = termPrice;
  var spotPrice = (parseFloat(document.getElementById("termPrice").value) + inv(rand2, spotMean, spotStd)).toFixed(2);
  document.getElementById("spotPrice").value = spotPrice;
  bilan();
  function bilan(){
    // Calcul des valeurs du bilan
    var periods = <?php echo json_encode($periods) ?>;
    var gainCumul = <?php echo $gainCumul ?>;
    var objPrice = <?php echo $game->objectivePrice ?>;
    var posVente = document.querySelector('input[name="vente"]:checked').value;
    var nbContrat = document.querySelector('input[name="contratPosition"]').value;
    var isSold = false;
    var sellPrice;
    var gainCumul;
    var priceGap;
    periods.forEach(function(p) {
      if(p['isSold'] == true){
        isSold = true;
        sellPrice = p['priceSpotPeriod'];
      }
    });
    gainCumul = (gainCumul + (posVente*nbContrat) * (termPrice - prevtermPrice)).toFixed(2);
    if(isSold == false){
        priceGap = (spotPrice - objPrice).toFixed(2);
    } else {
        var priceGap = (sellPrice - objPrice).toFixed(2);
    }
    document.getElementById("gainCumul").value = gainCumul;
    document.getElementById("priceGap").value = priceGap;
    document.getElementById("globalGap").value = parseFloat(gainCumul) + parseFloat(priceGap);
  }
  // Fonction de la loi normale inverse
  function erfcinv(p) {
    var j = 0;
    var x, err, t, pp;
    if (p >= 2)
      return -100;
    if (p <= 0)
      return 100;
    pp = (p < 1) ? p : 2 - p;
    t = Math.sqrt(-2 * Math.log(pp / 2));
    x = -0.70711 * ((2.30753 + t * 0.27061) /
      (1 + t * (0.99229 + t * 0.04481)) - t);
    for (; j < 2; j++) {
      err = erfc(x) - pp;
      x += err / (1.12837916709551257 * Math.exp(-x * x) - x * err);
    }
    return (p < 1) ? x : -x;
  }
  function erfc(x) {
    return 1 - erf(x);
  }
  function erf(x) {
    var cof = [-1.3026537197817094, 6.4196979235649026e-1, 1.9476473204185836e-2,
      -9.561514786808631e-3, -9.46595344482036e-4, 3.66839497852761e-4,
      4.2523324806907e-5, -2.0278578112534e-5, -1.624290004647e-6,
      1.303655835580e-6, 1.5626441722e-8, -8.5238095915e-8,
      6.529054439e-9, 5.059343495e-9, -9.91364156e-10,
      -2.27365122e-10, 9.6467911e-11, 2.394038e-12,
      -6.886027e-12, 8.94487e-13, 3.13092e-13,
      -1.12708e-13, 3.81e-16, 7.106e-15,
      -1.523e-15, -9.4e-17, 1.21e-16,
      -2.8e-17
    ];
    var j = cof.length - 1;
    var isneg = false;
    var d = 0;
    var dd = 0;
    var t, ty, tmp, res;
    if (x < 0) {
      x = -x;
      isneg = true;
    }
    t = 2 / (2 + x);
    ty = 4 * t - 2;
    for (; j > 0; j--) {
      tmp = d;
      d = ty * d - dd + cof[j];
      dd = tmp;
    }
    res = t * Math.exp(-x * x + 0.5 * (cof[0] + ty * d) - dd);
    return isneg ? res - 1 : 1 - res;
  }
  function inv(p, mean, std) {
    return -1.41421356237309505 * std * erfcinv(2 * p) + mean;
  }
</script>

@endsection