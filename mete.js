var CallBackGetSuccess=function(data){
console.log("donnees api",data)
//alert("La temperature est de  :"+data.main.temp);
var element = document.getElementById('zone_meteo');
element.innerHTML="La temperature est de " + data.main.temp;

}

function buttonClickGET(){

var url="https://api.openweathermap.org/data/2.5/weather?q=Tunis,tn&appid=c21a75b667d6f7abb81f118dcf8d4611&units=metric"
$.get(url,CallBackGetSuccess).done(function(){

})
.fail(function(){
	alert("error");
})
.always(function(){
});
}