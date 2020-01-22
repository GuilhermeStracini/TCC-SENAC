var grande = true;
var GSize = 65;
var PSize = 35;
var tamanhoBack = 0;
function menu(){
	var menu = document.getElementById("menu");
	var menuCE = document.getElementById("canto_menu_esquerdo");
	var menuCC = document.getElementById("menu_centro");
	var menuCD = document.getElementById("canto_menu_direito");
	var menuImagens = menu.getElementsByTagName("img");
	var menuImagensTotal = menuImagens.length;
	var tamanho = menuCE.offsetHeight;
	if(grande == true){
		for(x=0;x<menuImagensTotal;x++)
			menuImagens[x].style.display = "none";
		tamanho--;
		tamanhoBack--;
		menuCE.style.height = tamanho + "px";
		menuCC.style.height = tamanho + "px";
		menuCD.style.height = tamanho + "px";
		
		menuCE.style.backgroundPosition = "0 "+tamanhoBack+"px";
		menuCC.style.backgroundPosition = "0 "+tamanhoBack+"px";
		menuCD.style.backgroundPosition = "0 "+tamanhoBack+"px";
		
		menu.onclick = function(){return false;};
		if(tamanho > PSize) setTimeout("menu()",10);
		else{
			grande = false;
			menu.onclick = function(){reativa()};
		}
	}else{		
		tamanho++;
		tamanhoBack++;
		menuCE.style.height = tamanho + "px";
		menuCC.style.height = tamanho + "px";
		menuCD.style.height = tamanho + "px";
		
		menuCE.style.backgroundPosition = "0 "+tamanhoBack+"px";
		menuCC.style.backgroundPosition = "0 "+tamanhoBack+"px";
		menuCD.style.backgroundPosition = "0 "+tamanhoBack+"px";
		
		menu.onclick = function(){return false;};
		if(tamanho < GSize) setTimeout("menu()",10);
		else{
			grande = true;
			for(x=0;x<menuImagensTotal;x++)
				menuImagens[x].style.display = "block";
			menu.onclick = function(){reativa()};
		}
	}
}
function reativa(){
	document.getElementById("menu").onclick = function(){menu()};
}