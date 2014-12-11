/*global XMLHttpRequest, document, window
*/
var xmlData;

function weather() 
{
	clearTimeout();

	var ajax = new XMLHttpRequest();
	
	ajax.onreadystatechange = function() 
	{
		if (ajax.readyState == 4)
		{
			xmlData = ajax.responseXML;
	
			var pageTime = document.getElementById("time");
			var pageTemp = document.getElementById("temp");
			var pageWind = document.getElementById("wind");
			var pageHumid = document.getElementById("humid");
			var pagePres = document.getElementById("pres");
			var pageRad = document.getElementById("rad");

			var time = xmlData.documentElement.getElementsByTagName("time");
			var temp = xmlData.documentElement.getElementsByTagName("temp");
			var wind = xmlData.documentElement.getElementsByTagName("wind");
			var humid = xmlData.documentElement.getElementsByTagName("humid");
			var pres = xmlData.documentElement.getElementsByTagName("pres");
			var rad = xmlData.documentElement.getElementsByTagName("rad");
			var refresh = xmlData.documentElement.getElementsByTagName("refresh");

			pageTime.innerHTML = time[0].firstChild.nodeValue;
			pageTemp.innerHTML = temp[0].firstChild.nodeValue;
			pageWind.innerHTML = wind[0].firstChild.nodeValue;
			pageHumid.innerHTML = humid[0].firstChild.nodeValue;
			pagePres.innerHTML = pres[0].firstChild.nodeValue;
			pageRad.innerHTML = rad[0].firstChild.nodeValue;

			setTimeout("weather()", refresh[0]);
		}
	};
	ajax.open("GET", "Wthr_AjaxProxy.php", true);
	ajax.send();
}

window.onload = weather();


