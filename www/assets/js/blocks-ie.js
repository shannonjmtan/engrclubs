/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas. Dual MIT/BSD license *//*! NOTE: If you're already including a window.matchMedia polyfill via Modernizr or otherwise, you don't need this part */window.matchMedia=window.matchMedia||function(e,t){var n,r=e.documentElement,i=r.firstElementChild||r.firstChild,s=e.createElement("body"),o=e.createElement("div");return o.id="mq-test-1",o.style.cssText="position:absolute;top:-100em",s.style.background="none",s.appendChild(o),function(e){return o.innerHTML='&shy;<style media="'+e+'"> #mq-test-1 { width: 42px; }</style>',r.insertBefore(s,i),n=o.offsetWidth==42,r.removeChild(s),{matches:n,media:e}}}(document),function(e){function S(){b(!0)}e.respond={},respond.update=function(){},respond.mediaQueriesSupported=e.matchMedia&&e.matchMedia("only all").matches;if(respond.mediaQueriesSupported)return;var t=e.document,n=t.documentElement,r=[],i=[],s=[],o={},u=30,a=t.getElementsByTagName("head")[0]||n,f=t.getElementsByTagName("base")[0],l=a.getElementsByTagName("link"),c=[],h=function(){var t=l,n=t.length,r=0,i,s,u,a;for(;r<n;r++)i=t[r],s=i.href,u=i.media,a=i.rel&&i.rel.toLowerCase()==="stylesheet",!!s&&a&&!o[s]&&(i.styleSheet&&i.styleSheet.rawCssText?(d(i.styleSheet.rawCssText,s,u),o[s]=!0):(!/^([a-zA-Z:]*\/\/)/.test(s)&&!f||s.replace(RegExp.$1,"").split("/")[0]===e.location.host)&&c.push({href:s,media:u}));p()},p=function(){if(c.length){var e=c.shift();w(e.href,function(t){d(t,e.href,e.media),o[e.href]=!0,p()})}},d=function(e,t,n){var s=e.match(/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi),o=s&&s.length||0,t=t.substring(0,t.lastIndexOf("/")),u=function(e){return e.replace(/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,"$1"+t+"$2$3")},a=!o&&n,f=0,l,c,h,p,d;t.length&&(t+="/"),a&&(o=1);for(;f<o;f++){l=0,a?(c=n,i.push(u(e))):(c=s[f].match(/@media *([^\{]+)\{([\S\s]+?)$/)&&RegExp.$1,i.push(RegExp.$2&&u(RegExp.$2))),p=c.split(","),d=p.length;for(;l<d;l++)h=p[l],r.push({media:h.split("(")[0].match(/(only\s+)?([a-zA-Z]+)\s?/)&&RegExp.$2||"all",rules:i.length-1,hasquery:h.indexOf("(")>-1,minw:h.match(/\(min\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||""),maxw:h.match(/\(max\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||"")})}b()},v,m,g=function(){var e,r=t.createElement("div"),i=t.body,s=!1;return r.style.cssText="position:absolute;font-size:1em;width:1em",i||(i=s=t.createElement("body"),i.style.background="none"),i.appendChild(r),n.insertBefore(i,n.firstChild),e=r.offsetWidth,s?n.removeChild(i):i.removeChild(r),e=y=parseFloat(e),e},y,b=function(e){var o="clientWidth",f=n[o],c=t.compatMode==="CSS1Compat"&&f||t.body[o]||f,h={},p=l[l.length-1],d=(new Date).getTime();if(e&&v&&d-v<u){clearTimeout(m),m=setTimeout(b,u);return}v=d;for(var w in r){var E=r[w],S=E.minw,x=E.maxw,T=S===null,N=x===null,C="em";!S||(S=parseFloat(S)*(S.indexOf(C)>-1?y||g():1)),!x||(x=parseFloat(x)*(x.indexOf(C)>-1?y||g():1));if(!E.hasquery||(!T||!N)&&(T||c>=S)&&(N||c<=x))h[E.media]||(h[E.media]=[]),h[E.media].push(i[E.rules])}for(var w in s)s[w]&&s[w].parentNode===a&&a.removeChild(s[w]);for(var w in h){var L=t.createElement("style"),A=h[w].join("\n");L.type="text/css",L.media=w,a.insertBefore(L,p.nextSibling),L.styleSheet?L.styleSheet.cssText=A:L.appendChild(t.createTextNode(A)),s.push(L)}},w=function(e,t){var n=E();if(!n)return;n.open("GET",e,!0),n.onreadystatechange=function(){if(n.readyState!=4||n.status!=200&&n.status!=304)return;t(n.responseText)};if(n.readyState==4)return;n.send(null)},E=function(){var e=!1;try{e=new XMLHttpRequest}catch(t){e=new ActiveXObject("Microsoft.XMLHTTP")}return function(){return e}}();h(),respond.update=h,e.addEventListener?e.addEventListener("resize",S,!1):e.attachEvent&&e.attachEvent("onresize",S)}(this),function(e){function M(e){return e.replace(m,O).replace(g,function(e,t,n){var r=n.split(",");for(var i=0,s=r.length;i<s;i++){var o=q(r[i])+A,u=[];r[i]=o.replace(y,function(e,t,n,r,i){if(t)return u.length>0&&(a.push({selector:o.substring(0,i),patches:u}),u=[]),t;var s=n?D(n):_(r);return s?(u.push(s),"."+s.className):e})}return t+r.join(",")})}function _(e){return!x||x.test(e)?{className:B(e),applyClass:!0}:null}function D(t){var r=!0,s=B(t.slice(1)),o=t.substring(0,5)==":not(",a,f;o&&(t=t.slice(5,-1));var l=t.indexOf("(");l>-1&&(t=t.substring(0,l));if(t.charAt(0)==":")switch(t.slice(1)){case"root":r=function(e){return o?e!=n:e==n};break;case"target":if(i==8){r=function(t){var n=function(){var e=location.hash,n=e.slice(1);return o?e==L||t.id!=n:e!=L&&t.id==n};return z(e,"hashchange",function(){R(t,s,n())}),n()};break}return!1;case"checked":r=function(e){return S.test(e.type)&&z(e,"propertychange",function(){event.propertyName=="checked"&&R(e,s,e.checked!==o)}),e.checked!==o};break;case"disabled":o=!o;case"enabled":r=function(e){return E.test(e.tagName)?(z(e,"propertychange",function(){event.propertyName=="$disabled"&&R(e,s,e.$disabled===o)}),u.push(e),e.$disabled=e.disabled,e.disabled===o):t==":enabled"?o:!o};break;case"focus":a="focus",f="blur";case"hover":a||(a="mouseenter",f="mouseleave"),r=function(e){return z(e,o?f:a,function(){R(e,s,!0)}),z(e,o?a:f,function(){R(e,s,!1)}),o};break;default:if(!v.test(t))return!1}return{className:s,applyClass:r}}function P(){var e,t,n,r;for(var i=0;i<a.length;i++){t=a[i].selector,n=a[i].patches,r=t.replace(b,L);if(r==L||r.charAt(r.length-1)==A)r+="*";try{e=o(r)}catch(s){j("Selector '"+t+"' threw exception '"+s+"'")}if(e)for(var u=0,f=e.length;u<f;u++){var l=e[u],c=l.className;for(var h=0,p=n.length;h<p;h++){var d=n[h];H(l,d)||d.applyClass&&(d.applyClass===!0||d.applyClass(l)===!0)&&(c=U(c,d.className,!0))}l.className=c}}}function H(e,t){return(new RegExp("(^|\\s)"+t.className+"(\\s|$)")).test(e.className)}function B(e){return c+"-"+(i==6&&l?f++:e.replace(w,function(e){return e.charCodeAt(0)}))}function j(t){e.console&&e.console.log(t)}function F(e){return e.replace(k,O)}function I(e){return F(e).replace(C,A)}function q(e){return I(e.replace(T,O).replace(N,O))}function R(e,t,n){var r=e.className,i=U(r,t,n);i!=r&&(e.className=i,e.parentNode.className+=L)}function U(e,t,n){var r=RegExp("(^|\\s)"+t+"(\\s|$)"),i=r.test(e);return n?i?e:e+A+t:i?F(e.replace(r,O)):e}function z(e,t,n){e.attachEvent("on"+t,n)}function W(){if(e.XMLHttpRequest)return new XMLHttpRequest;try{return new ActiveXObject("Microsoft.XMLHTTP")}catch(t){return null}}function X(e){return r.open("GET",e,!1),r.send(),r.status==200?r.responseText:L}function V(e,t,n){function r(e){return e.substring(0,e.indexOf("//"))}function i(e){return e.substring(0,e.indexOf("/",8))}t||(t=G),e.substring(0,2)=="//"&&(e=r(t)+e);if(/^https?:\/\//i.test(e))return!n&&i(t)!=i(e)?null:e;if(e.charAt(0)=="/")return i(t)+e;var s=t.split(/[?#]/)[0];return e.charAt(0)!="?"&&s.charAt(s.length-1)!="/"&&(s=s.substring(0,s.lastIndexOf("/")+1)),s+e}function $(e){return e?X(e).replace(h,L).replace(p,function(t,n,r,i,s,o){var u=$(V(r||s,e));return o?"@media "+o+" {"+u+"}":u}).replace(d,function(t,n,r,i){return r=r||L,n?t:" url("+r+V(i,e,!0)+r+") "}):L}function J(){var e,n;for(var r=0;r<t.styleSheets.length;r++)n=t.styleSheets[r],n.href!=L&&(e=V(n.href),e&&(n.cssText=n.rawCssText=M($(e))))}function K(){P(),u.length>0&&setInterval(function(){for(var e=0,t=u.length;e<t;e++){var n=u[e];n.disabled!==n.$disabled&&(n.disabled?(n.disabled=!1,n.$disabled=!0,n.disabled=!0):n.$disabled=n.disabled)}},250)}function Y(e,r){var i=!1,s=!0,o=function(n){if(n.type=="readystatechange"&&t.readyState!="complete")return;(n.type=="load"?e:t).detachEvent("on"+n.type,o,!1),!i&&(i=!0)&&r.call(e,n.type||n)},u=function(){try{n.doScroll("left")}catch(e){setTimeout(u,50);return}o("poll")};if(t.readyState=="complete")r.call(e,L);else{if(t.createEventObject&&n.doScroll){try{s=!e.frameElement}catch(a){}s&&u()}z(t,"readystatechange",o),z(e,"load",o)}}return}(this);