TINY={};TINY.box=function(){var e,c,a,f,d,h=0;return{show:function(b){d={opacity:70,close:1,animate:1,fixed:1,mask:1,maskid:"",boxid:"",topsplit:2,url:0,post:0,height:0,width:0,html:0,iframe:0,openjs:"",farg1:"",farg2:"",html2funct:0};for(s in b){d[s]=b[s]}if(!h){e=document.createElement("div");e.className="tbox";h=document.createElement("div");h.className="tinner";a=document.createElement("div");a.className="tcontent";c=document.createElement("div");c.className="tmask";f=document.createElement("div");f.className="tclose";f.v=0;document.body.appendChild(c);document.body.appendChild(e);e.appendChild(h);h.appendChild(a);c.onclick=f.onclick=TINY.box.hide;window.onresize=TINY.box.resize}else{e.style.display="none";clearTimeout(h.ah);if(f.v){h.removeChild(f);f.v=0}}h.id=d.boxid;c.id=d.maskid;e.style.position=d.fixed?"fixed":"absolute";if(d.html&&!d.animate){h.style.backgroundImage="none";a.innerHTML=d.html;a.style.display="";h.style.width=d.width?d.width+"px":"auto";h.style.height=d.height?d.height+"px":"auto"}else{a.style.display="none";if(!d.animate&&d.width&&d.height){h.style.width=d.width+"px";h.style.height=d.height+"px"}else{h.style.width=h.style.height="100px"}}if(d.mask){this.mask();this.alpha(c,1,d.opacity)}else{this.alpha(e,1,100)}if(d.autohide){h.ah=setTimeout(TINY.box.hide,1000*d.autohide)}else{document.onkeyup=TINY.box.esc}},fill:function(p,m,l,j,g,o){if(m){if(d.image){var n=new Image();n.onload=function(){g=g||n.width;o=o||n.height;TINY.box.psh(n,j,g,o)};n.src=d.image}else{if(d.iframe){this.psh('<iframe src="'+d.iframe+'" width="'+d.width+'" frameborder="0" height="'+d.height+'"></iframe>',j,g,o)}else{var b=window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");b.onreadystatechange=function(){if(b.readyState==4&&b.status==200){h.style.backgroundImage="";TINY.box.psh(b.responseText,j,g,o)}};if(l){b.open("POST",p,true);b.setRequestHeader("Content-type","application/x-www-form-urlencoded");b.send(l)}else{b.open("GET",p,true);b.send(null)}}}}else{this.psh(p,j,g,o)}},psh:function(l,i,g,j){if(typeof l=="object"){a.appendChild(l)}else{a.innerHTML=l}var b=h.style.width,k=h.style.height;if(!g||!j){h.style.width=g?g+"px":"";h.style.height=j?j+"px":"";a.style.display="";if(!j){j=parseInt(a.offsetHeight)}if(!g){g=parseInt(a.offsetWidth)}a.style.display="none"}h.style.width=b;h.style.height=k;this.size(g,j,i,l)},esc:function(b){b=b||window.event;if(b.keyCode==27){TINY.box.hide()}},hide:function(){TINY.box.alpha(e,-1,0,3);document.onkeypress=null;if(d.closejs){d.closejs()}},resize:function(){TINY.box.pos();TINY.box.mask()},mask:function(){c.style.height=this.total(1)+"px";c.style.width=this.total(0)+"px"},pos:function(){var b;if(typeof d.top!="undefined"){b=d.top}else{b=(this.height()/d.topsplit)-(e.offsetHeight/2);b=b<20?20:b}if(!d.fixed&&!d.top){b+=this.top()}e.style.top=b+"px";e.style.left=typeof d.left!="undefined"?d.left+"px":(this.width()/2)-(e.offsetWidth/2)+"px"},alpha:function(g,i,b){clearInterval(g.ai);if(i){g.style.opacity=0;g.style.filter="alpha(opacity=0)";g.style.display="block";TINY.box.pos()}g.ai=setInterval(function(){TINY.box.ta(g,b,i)},20)},ta:function(g,b,j){var i=Math.round(g.style.opacity*100);if(i==b){clearInterval(g.ai);if(j==-1){g.style.display="none";g==e?TINY.box.alpha(c,-1,0,2):a.innerHTML=h.style.backgroundImage=""}else{if(g==c){this.alpha(e,1,100)}else{e.style.filter="";TINY.box.fill(d.html||d.url,d.url||d.iframe||d.image,d.post,d.animate,d.width,d.height)}}}else{var k=b-Math.floor(Math.abs(b-i)*0.5)*j;g.style.opacity=k/100;g.style.filter="alpha(opacity="+k+")"}},size:function(g,j,b,l){if(b){clearInterval(h.si);var i=parseInt(h.style.width)>g?-1:1,k=parseInt(h.style.height)>j?-1:1;h.si=setInterval(function(){TINY.box.ts(g,i,j,k,l)},20)}else{h.style.backgroundImage="none";if(d.close){h.appendChild(f);f.v=1}h.style.width=g+"px";h.style.height=j+"px";a.style.display="";this.pos();if(d.openjs!=""){if(d.html2funct==1){window[d.openjs](l,d.farg1,d.farg2)}else{window[d.openjs](d.farg1,d.farg2)}}}},ts:function(g,k,j,l,m){var b=parseInt(h.style.width),i=parseInt(h.style.height);if(b==g&&i==j){clearInterval(h.si);h.style.backgroundImage="none";a.style.display="block";if(d.close){h.appendChild(f);f.v=1}if(d.openjs!=""){if(d.html2funct==1){window[d.openjs](m,d.farg1,d.farg2)}else{window[d.openjs](d.farg1,d.farg2)}}}else{if(b!=g){h.style.width=(g-Math.floor(Math.abs(g-b)*0.6)*k)+"px"}if(i!=j){h.style.height=(j-Math.floor(Math.abs(j-i)*0.6)*l)+"px"}this.pos()}},top:function(){return document.documentElement.scrollTop||document.body.scrollTop},width:function(){return self.innerWidth||document.documentElement.clientWidth||document.body.clientWidth},height:function(){return self.innerHeight||document.documentElement.clientHeight||document.body.clientHeight},total:function(j){var g=document.body,i=document.documentElement;return j?Math.max(Math.max(g.scrollHeight,i.scrollHeight),Math.max(g.clientHeight,i.clientHeight)):Math.max(Math.max(g.scrollWidth,i.scrollWidth),Math.max(g.clientWidth,i.clientWidth))}}}();

function initPopupLogin() {
	document.getElementById('loginform').sourcepage.value=window.location.href;
	document.getElementById('loginform').loginid.focus();
}