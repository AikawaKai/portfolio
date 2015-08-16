 var data = {
         labels: ["Penis", "Bajingoh", "new", "tortillas", "Coding", "cacconing", "Running"],
         datasets: [
        {
          label: "My Second dataset",
          fillColor: "rgba(151,187,205,0.2)",
          strokeColor: "rgba(151,187,205,1)",
          pointColor: "rgba(151,187,205,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(151,187,205,1)",
          data: [100, 90, 80, 19, 96, 70, 100]
        }
        ]
      };


$('#edu, #lav, #tesi, #skill').hide();
// $(".nav li").each(function(i) {
//     $(this).click(function() {
//         $("#wrapper").find("div:eq('" + i + "')").show().siblings().hide();
//     });
// });

/*
 *	Quando il sito si carica verifica l'href index.html#QUALCOSA e cerca di caricare quella pagina
 *
 *	TODO: Gestire il 404.. attualmente carica semplicemente la biografia.. che ci può anche stare come comportamento ;)
 */
$(document).on("ready", function(e){

	var loc = location.href.split("#")[1];
	$("#wrapper").find("#"+loc).show().siblings().hide();
});

/*
 *	Al click di ogni nav item prende il figlio "<a>" ne recupera l'attributo href e mostra il div giusto.
 *
 *	Criticità: 
 *		- Gli ID dei div devono essere uguali agli href.. 
 *			Questa è in realtà una falsa criticità... 
 *			se il sito fosse un onepage a scorrimento verticale avresti potuto sfruttare nativamente il redirect 
 *				con gli anchor #SEZIONE che funzionano automaticamente SE c'è un elemento con id="SEZIONE".. 
 *			Quindi ci sta come "limite"
 *
 *		- Codice ripetuto (la catena .show().siblings().hide())
 */
$(".nav li a").on("click", function(e){
	$("#wrapper").find($(this).attr('href')).show().siblings().hide();
	if($(this).attr('href') == '#skill')
	{
		var info= document.getElementById("infos").getContext("2d");
        new Chart(info).Radar(data);
	}
})
