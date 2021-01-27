@extends('layouts.masterUser')

@section ('body')
<!DOCTYPE html>

<html>
  <head>
    <title> Stratégie date </title>
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  </head>
<body>
    <div class = "container">
      <center><h1>Comparez les contrats à terme aux options</h1></center>
      <p>Vous êtes producteur de blé et vous cherchez à vous prémunir
        contre une baisse des prix sur le marché et vous décidez de vous
        couvrir soit par la vente d’un contrat à terme, soit par l’achat d’un Put
      </p>
      
      <form method="post" action="{{ route('strategie.echeance', $id) }}" >
        {{ csrf_field() }}
        
        <div class="form-group">
          <center>
            <div id="dat">
              <h3><img src="../img/calendrier3.png" > Date</h3>
              <label for="sel1">Veuillez sélectionner une date : c'est la date à laquelle vous auriez pris la décision de vous couvrir</label><br>
              <input class="form-control" name="date" placeholder="Selectionner une date" style="width: auto; display: inline;" required/> <span > <i class="glyphicon glyphicon-th"></i></span>
              <br><br>
              <button type="submit" class="btn btn-success" id="valide"> Suivant</button>
            
          </center><br><br>
        </div>
      </form><br><br>

      
    </div>
   
    <script>
        ;(function($){
              $.fn.datepicker.dates['fr'] = {
              days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
              daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
              daysMin: ["di", "lu", "ma", "me", "ju", "vu", "sa"],
              months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
              monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
              today: "Aujourd'hui",
              monthsTitle: "Mois",
              clear: "Effacer",
          
              format: 'yyyy/mm/dd',
              };
              }(jQuery));
            $(document).ready(function(){
                var date_input=$('input[name="date"]'); 
                date_input.datepicker({
                
                    format: 'yyyy/mm/dd',
                    todayHighlight: true,
                    autoclose: true,
                    daysOfWeekDisabled: "0,6",
                    startDate: "2011/10/17",
                    startView: 2,
                    clearBtn: true,
                    language: "fr",
                    orientation: "top right",
                    endDate: "2020/02/20",
                    datesDisabled: [
                    "2011/11/01","2011/11/11","2011/12/25",
                    "2012/01/01","2012/04/08","2012/04/09","2012/05/01","2012/05/08","2012/05/17","2012/05/28","2012/05/27","2012/07/14","2012/08/15","2012/11/01","2012/11/11","2012/12/25",
                    "2013/01/01","2013/05/01","2013/05/08","2013/07/14","2013/08/15","2013/11/01","2013/11/11","2013/12/25","2013/03/31","2013/04/01","2013/05/19","2013/05/20","2013/05/09",
                    "2014/01/01","2014/05/01","2014/05/08","2014/07/14","2014/08/15","2014/11/01","2014/11/11","2014/12/25","2014/04/20","2014/04/21","2014/05/29","2014/06/08","2014/06/09",
                    "2015/01/01","2015/05/01","2015/05/08","2015/07/14","2015/08/15","2015/11/01","2015/11/11","2015/12/25","2015/04/05","2015/04/06","2015/05/14","2015/05/24","2015/05/25",
                    "2016/01/01","2016/05/01","2016/05/08","2016/07/14","2016/08/15","2016/11/01","2016/11/11","2016/12/25","2016/03/27","2016/03/28","2016/05/05","2016/05/16","2016/05/15",
                    "2017/01/01","2017/05/01","2017/05/08","2017/07/14","2017/08/15","2017/11/01","2017/11/11","2017/12/25","2017/04/17","2017/04/16","2017/05/25","2017/06/05","2017/06/04",
                    "2018/01/01","2018/05/01","2018/05/08","2018/07/14","2018/08/15","2018/11/01","2018/11/11","2018/12/25","2018/04/01","2018/04/02","2018/05/10","2018/05/20","2018/05/21",
                    "2019/01/01","2019/05/01","2019/05/08","2019/07/14","2019/08/15","2019/11/01","2019/11/11","2019/12/25","2019/04/21","2019/04/22","2019/05/30","2019/06/09","2019/06/10",
                    "2020/01/01"],
                })
            });
  </script>
    
  
  </body>

</html>
@endsection