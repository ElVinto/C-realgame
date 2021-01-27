@extends('layouts.mail')


@section ('content')
<div class="row">
  <h2> Vous devez atteindre <?php echo($game->objectivePrice)?> euros </h2>
  <p> Prix à terme initial : <?php echo($game->priceTermGame);?> </p>
  <p> Prix ferme initial : <?php echo($game->priceSpotGame);?> </p> 
<div>

<div class="row">
  <h3> Rappel des règles du jeu </h3>
  <section id="feature" class="section-padding">
    <div class="row">
      <div class="col-md-8 wow fadeInLeft delay-05s">
        <div class="section-title">
          <h2 class="head-title">Instructions</h2>
          <hr class="botm-line">
          <h3>Tutoriel </h3>
 <audio controls="controls"><source src="audio.mp3" type="audio/mp3" /></audio>
<hr class="botm-line">
          <p class="sec-para"> Pour aider les agriculteurs céréaliers à mieux comprendre et à utiliser la couverture financière, nous proposons une initiation aux marchés financiers à travers du jeu de simulation "C-REAL game". La version développée est destinée aux producteurs de blé tendre français. Le jeu se déroule sur une campagne agricole de plusieurs périodes, durant lesquelles l'agriculteur fait face à des variations de prix et doit vendre et acheter des contrats à terme (contrats MATIF) pour atteindre son prix de vente objectif</div>
      </div>
      <div class="col-md-8">
        <div class="col-md-4 wow fadeInRight delay-02s">
          <div class="icon">
            <i class="fa fa-flag"></i>
          </div>
          <div class="icon-text">
            <h3 class="txt-tl">Départ</h3>
            <p class="txt-para">Vous saisissez votre prix de vente objectif pour une tonne de blé. Vous observez ensuite les prix sur le marché à terme (MATIF) et sur le marché physique (prix ferme).
              Ces prix sont simulés et ne sont en aucun cas liés aux prix réels sur les marchés.</p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInRight delay-02s">
          <div class="icon">
            <i class="fa fa-step-forward"></i>
          </div>
          <div class="icon-text">
            <h3 class="txt-tl">Période suivante</h3>
            <p class="txt-para">A la période suivante, vous recevez un message présentant des informations sur l’actualité susceptibles d’influencer le marché : météorologie, événements internationaux,
              état de l’offre et la demande. Mais quel peut-être l’impact de ces informations ? Faut-il acheter ou vendre des contrats MATIF ?</p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInRight delay-04s">
          <div class="icon">
            <i class="fa fa-file"></i>
          </div>
          <div class="icon-text">
            <h3 class="txt-tl">Contrat MATIF</h3>
            <p class="txt-para">Dans le jeu, un seul contrat est nécessaire pour couvrir la totalité de la récolte.  Une fois que vous avez décidé de la quantité de contrats à acheter ou vendre, le
              nouveau prix MATIF ainsi que le nouveau prix spot sont affichés. Souhaitez-vous vendre votre récolte au prix ferme ou attendre ? Un bilan de période sera ensuite fourni indiquant les
              pertes ou les gains accumulés sur le marché à terme.</p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInRight delay-04s">
          <div class="icon">
            <i class="fa fa-bullseye"></i>
          </div>
          <div class="icon-text">
            <h3 class="txt-tl">Objectif</h3>
            <p class="txt-para">Vous avez gagné si vous avez réussi à vendre à votre prix objectif, c’est-à-dire si le prix ferme que vous avez reçu en vendant votre récolte ainsi que les gains
              perçus sur le marché à terme dépassent votre prix de vente objectif. Les autres périodes se déroulent de la même manière, jusqu'à la période 20. Si vous n’avez pas vendu votre récolte
              avant la fin de la campagne, la vente sera automatiquement exécutée au prix ferme de la dernière période. </p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInRight delay-06s">
          <div class="icon">
            <i class="fa fa-star"></i>
          </div>
          <div class="icon-text">
            <h3 class="txt-tl">Fin du jeu</h3>
            <p class="txt-para">Un bilan de la campagne sera dressé : vous pourrez voir l'évolution des prix par rapport à votre prix de vente objectif (donc si vous vous en êtes rapproché ou éloigné),
              mais aussi l’ensemble de vos gains ou pertes et votre comportement face au risque. Si vous le souhaitez, vous pourrez recommencer le jeu en restant sur la même campagne avec les mêmes
              informations sur l’actualité pour que vous puissiez changer votre prix objectif ou votre stratégie sur le MATIF. Il est également possible de créer une nouvelle partie, totalement
              différente de la précédente.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
