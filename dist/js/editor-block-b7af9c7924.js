!function(){"use strict";function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function e(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function n(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,r)}return n}function r(t){for(var r=1;r<arguments.length;r++){var o=null!=arguments[r]?arguments[r]:{};r%2?n(o,!0).forEach((function(n){e(t,n,o[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(o)):n(o).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(o,e))}))}return t}function o(t){return function(t){if(Array.isArray(t)){for(var e=0,n=new Array(t.length);e<t.length;e++)n[e]=t[e];return n}}(t)||function(t){if(Symbol.iterator in Object(t)||"[object Arguments]"===Object.prototype.toString.call(t))return Array.from(t)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}var i="undefined"!=typeof globalThis?globalThis:"undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:{};function u(t,e){return t(e={exports:{}},e.exports),e.exports}var a=function(t){return t&&t.Math==Math&&t},c=a("object"==typeof globalThis&&globalThis)||a("object"==typeof window&&window)||a("object"==typeof self&&self)||a("object"==typeof i&&i)||Function("return this")(),l=function(t){try{return!!t()}catch(t){return!0}},f=!l((function(){return 7!=Object.defineProperty({},1,{get:function(){return 7}})[1]})),s={}.propertyIsEnumerable,p=Object.getOwnPropertyDescriptor,d={f:p&&!s.call({1:2},1)?function(t){var e=p(this,t);return!!e&&e.enumerable}:s},y=function(t,e){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:e}},g={}.toString,v=function(t){return g.call(t).slice(8,-1)},b="".split,h=l((function(){return!Object("z").propertyIsEnumerable(0)}))?function(t){return"String"==v(t)?b.call(t,""):Object(t)}:Object,m=function(t){if(null==t)throw TypeError("Can't call method on "+t);return t},w=function(t){return h(m(t))},k=function(t){return"object"==typeof t?null!==t:"function"==typeof t},S=function(t,e){if(!k(t))return t;var n,r;if(e&&"function"==typeof(n=t.toString)&&!k(r=n.call(t)))return r;if("function"==typeof(n=t.valueOf)&&!k(r=n.call(t)))return r;if(!e&&"function"==typeof(n=t.toString)&&!k(r=n.call(t)))return r;throw TypeError("Can't convert object to primitive value")},O={}.hasOwnProperty,x=function(t,e){return O.call(t,e)},j=c.document,A=k(j)&&k(j.createElement),T=function(t){return A?j.createElement(t):{}},C=!f&&!l((function(){return 7!=Object.defineProperty(T("div"),"a",{get:function(){return 7}}).a})),E=Object.getOwnPropertyDescriptor,P={f:f?E:function(t,e){if(t=w(t),e=S(e,!0),C)try{return E(t,e)}catch(t){}if(x(t,e))return y(!d.f.call(t,e),t[e])}},L=function(t){if(!k(t))throw TypeError(String(t)+" is not an object");return t},B=Object.defineProperty,_={f:f?B:function(t,e,n){if(L(t),e=S(e,!0),L(n),C)try{return B(t,e,n)}catch(t){}if("get"in n||"set"in n)throw TypeError("Accessors not supported");return"value"in n&&(t[e]=n.value),t}},I=f?function(t,e,n){return _.f(t,e,y(1,n))}:function(t,e,n){return t[e]=n,t},R=function(t,e){try{I(c,t,e)}catch(n){c[t]=e}return e},D=c["__core-js_shared__"]||R("__core-js_shared__",{}),M=Function.toString;"function"!=typeof D.inspectSource&&(D.inspectSource=function(t){return M.call(t)});var z,F,N,U=D.inspectSource,G=c.WeakMap,V="function"==typeof G&&/native code/.test(U(G)),W=u((function(t){(t.exports=function(t,e){return D[t]||(D[t]=void 0!==e?e:{})})("versions",[]).push({version:"3.6.4",mode:"global",copyright:"© 2020 Denis Pushkarev (zloirock.ru)"})})),q=0,H=Math.random(),K=function(t){return"Symbol("+String(void 0===t?"":t)+")_"+(++q+H).toString(36)},Q=W("keys"),Y=function(t){return Q[t]||(Q[t]=K(t))},X={},J=c.WeakMap;if(V){var Z=new J,tt=Z.get,et=Z.has,nt=Z.set;z=function(t,e){return nt.call(Z,t,e),e},F=function(t){return tt.call(Z,t)||{}},N=function(t){return et.call(Z,t)}}else{var rt=Y("state");X[rt]=!0,z=function(t,e){return I(t,rt,e),e},F=function(t){return x(t,rt)?t[rt]:{}},N=function(t){return x(t,rt)}}var ot,it,ut={set:z,get:F,has:N,enforce:function(t){return N(t)?F(t):z(t,{})},getterFor:function(t){return function(e){var n;if(!k(e)||(n=F(e)).type!==t)throw TypeError("Incompatible receiver, "+t+" required");return n}}},at=u((function(t){var e=ut.get,n=ut.enforce,r=String(String).split("String");(t.exports=function(t,e,o,i){var u=!!i&&!!i.unsafe,a=!!i&&!!i.enumerable,l=!!i&&!!i.noTargetGet;"function"==typeof o&&("string"!=typeof e||x(o,"name")||I(o,"name",e),n(o).source=r.join("string"==typeof e?e:"")),t!==c?(u?!l&&t[e]&&(a=!0):delete t[e],a?t[e]=o:I(t,e,o)):a?t[e]=o:R(e,o)})(Function.prototype,"toString",(function(){return"function"==typeof this&&e(this).source||U(this)}))})),ct=c,lt=function(t){return"function"==typeof t?t:void 0},ft=function(t,e){return arguments.length<2?lt(ct[t])||lt(c[t]):ct[t]&&ct[t][e]||c[t]&&c[t][e]},st=Math.ceil,pt=Math.floor,dt=function(t){return isNaN(t=+t)?0:(t>0?pt:st)(t)},yt=Math.min,gt=function(t){return t>0?yt(dt(t),9007199254740991):0},vt=Math.max,bt=Math.min,ht=function(t){return function(e,n,r){var o,i=w(e),u=gt(i.length),a=function(t,e){var n=dt(t);return n<0?vt(n+e,0):bt(n,e)}(r,u);if(t&&n!=n){for(;u>a;)if((o=i[a++])!=o)return!0}else for(;u>a;a++)if((t||a in i)&&i[a]===n)return t||a||0;return!t&&-1}},mt={includes:ht(!0),indexOf:ht(!1)}.indexOf,wt=function(t,e){var n,r=w(t),o=0,i=[];for(n in r)!x(X,n)&&x(r,n)&&i.push(n);for(;e.length>o;)x(r,n=e[o++])&&(~mt(i,n)||i.push(n));return i},kt=["constructor","hasOwnProperty","isPrototypeOf","propertyIsEnumerable","toLocaleString","toString","valueOf"],St=kt.concat("length","prototype"),Ot={f:Object.getOwnPropertyNames||function(t){return wt(t,St)}},xt={f:Object.getOwnPropertySymbols},jt=ft("Reflect","ownKeys")||function(t){var e=Ot.f(L(t)),n=xt.f;return n?e.concat(n(t)):e},At=function(t,e){for(var n=jt(e),r=_.f,o=P.f,i=0;i<n.length;i++){var u=n[i];x(t,u)||r(t,u,o(e,u))}},Tt=/#|\.prototype\./,Ct=function(t,e){var n=Pt[Et(t)];return n==Bt||n!=Lt&&("function"==typeof e?l(e):!!e)},Et=Ct.normalize=function(t){return String(t).replace(Tt,".").toLowerCase()},Pt=Ct.data={},Lt=Ct.NATIVE="N",Bt=Ct.POLYFILL="P",_t=Ct,It=P.f,Rt=function(t,e){var n,r,o,i,u,a=t.target,l=t.global,f=t.stat;if(n=l?c:f?c[a]||R(a,{}):(c[a]||{}).prototype)for(r in e){if(i=e[r],o=t.noTargetGet?(u=It(n,r))&&u.value:n[r],!_t(l?r:a+(f?".":"#")+r,t.forced)&&void 0!==o){if(typeof i==typeof o)continue;At(i,o)}(t.sham||o&&o.sham)&&I(i,"sham",!0),at(n,r,i,t)}},Dt=Array.isArray||function(t){return"Array"==v(t)},Mt=function(t){return Object(m(t))},zt=function(t,e,n){var r=S(e);r in t?_.f(t,r,y(0,n)):t[r]=n},Ft=!!Object.getOwnPropertySymbols&&!l((function(){return!String(Symbol())})),Nt=Ft&&!Symbol.sham&&"symbol"==typeof Symbol.iterator,Ut=W("wks"),Gt=c.Symbol,Vt=Nt?Gt:Gt&&Gt.withoutSetter||K,Wt=function(t){return x(Ut,t)||(Ft&&x(Gt,t)?Ut[t]=Gt[t]:Ut[t]=Vt("Symbol."+t)),Ut[t]},$t=Wt("species"),qt=function(t,e){var n;return Dt(t)&&("function"!=typeof(n=t.constructor)||n!==Array&&!Dt(n.prototype)?k(n)&&null===(n=n[$t])&&(n=void 0):n=void 0),new(void 0===n?Array:n)(0===e?0:e)},Ht=ft("navigator","userAgent")||"",Kt=c.process,Qt=Kt&&Kt.versions,Yt=Qt&&Qt.v8;Yt?it=(ot=Yt.split("."))[0]+ot[1]:Ht&&(!(ot=Ht.match(/Edge\/(\d+)/))||ot[1]>=74)&&(ot=Ht.match(/Chrome\/(\d+)/))&&(it=ot[1]);var Xt=it&&+it,Jt=Wt("species"),Zt=function(t){return Xt>=51||!l((function(){var e=[];return(e.constructor={})[Jt]=function(){return{foo:1}},1!==e[t](Boolean).foo}))},te=Wt("isConcatSpreadable"),ee=Xt>=51||!l((function(){var t=[];return t[te]=!1,t.concat()[0]!==t})),ne=Zt("concat"),re=function(t){if(!k(t))return!1;var e=t[te];return void 0!==e?!!e:Dt(t)};Rt({target:"Array",proto:!0,forced:!ee||!ne},{concat:function(t){var e,n,r,o,i,u=Mt(this),a=qt(u,0),c=0;for(e=-1,r=arguments.length;e<r;e++)if(i=-1===e?u:arguments[e],re(i)){if(c+(o=gt(i.length))>9007199254740991)throw TypeError("Maximum allowed index exceeded");for(n=0;n<o;n++,c++)n in i&&zt(a,c,i[n])}else{if(c>=9007199254740991)throw TypeError("Maximum allowed index exceeded");zt(a,c++,i)}return a.length=c,a}});var oe=function(t,e,n){if(function(t){if("function"!=typeof t)throw TypeError(String(t)+" is not a function")}(t),void 0===e)return t;switch(n){case 0:return function(){return t.call(e)};case 1:return function(n){return t.call(e,n)};case 2:return function(n,r){return t.call(e,n,r)};case 3:return function(n,r,o){return t.call(e,n,r,o)}}return function(){return t.apply(e,arguments)}},ie=[].push,ue=function(t){var e=1==t,n=2==t,r=3==t,o=4==t,i=6==t,u=5==t||i;return function(a,c,l,f){for(var s,p,d=Mt(a),y=h(d),g=oe(c,l,3),v=gt(y.length),b=0,m=f||qt,w=e?m(a,v):n?m(a,0):void 0;v>b;b++)if((u||b in y)&&(p=g(s=y[b],b,d),t))if(e)w[b]=p;else if(p)switch(t){case 3:return!0;case 5:return s;case 6:return b;case 2:ie.call(w,s)}else if(o)return!1;return i?-1:r||o?o:w}},ae={forEach:ue(0),map:ue(1),filter:ue(2),some:ue(3),every:ue(4),find:ue(5),findIndex:ue(6)},ce=Object.defineProperty,le={},fe=function(t){throw t},se=function(t,e){if(x(le,t))return le[t];e||(e={});var n=[][t],r=!!x(e,"ACCESSORS")&&e.ACCESSORS,o=x(e,0)?e[0]:fe,i=x(e,1)?e[1]:void 0;return le[t]=!!n&&!l((function(){if(r&&!f)return!0;var t={length:-1};r?ce(t,1,{enumerable:!0,get:fe}):t[1]=1,n.call(t,o,i)}))},pe=ae.filter,de=Zt("filter"),ye=se("filter");Rt({target:"Array",proto:!0,forced:!de||!ye},{filter:function(t){return pe(this,t,arguments.length>1?arguments[1]:void 0)}});var ge,ve=Object.keys||function(t){return wt(t,kt)},be=f?Object.defineProperties:function(t,e){L(t);for(var n,r=ve(e),o=r.length,i=0;o>i;)_.f(t,n=r[i++],e[n]);return t},he=ft("document","documentElement"),me=Y("IE_PROTO"),we=function(){},ke=function(t){return"<script>"+t+"<\/script>"},Se=function(){try{ge=document.domain&&new ActiveXObject("htmlfile")}catch(t){}var t,e;Se=ge?function(t){t.write(ke("")),t.close();var e=t.parentWindow.Object;return t=null,e}(ge):((e=T("iframe")).style.display="none",he.appendChild(e),e.src=String("javascript:"),(t=e.contentWindow.document).open(),t.write(ke("document.F=Object")),t.close(),t.F);for(var n=kt.length;n--;)delete Se.prototype[kt[n]];return Se()};X[me]=!0;var Oe=Object.create||function(t,e){var n;return null!==t?(we.prototype=L(t),n=new we,we.prototype=null,n[me]=t):n=Se(),void 0===e?n:be(n,e)},xe=Wt("unscopables"),je=Array.prototype;null==je[xe]&&_.f(je,xe,{configurable:!0,value:Oe(null)});var Ae,Te,Ce,Ee=function(t){je[xe][t]=!0},Pe={},Le=!l((function(){function t(){}return t.prototype.constructor=null,Object.getPrototypeOf(new t)!==t.prototype})),Be=Y("IE_PROTO"),_e=Object.prototype,Ie=Le?Object.getPrototypeOf:function(t){return t=Mt(t),x(t,Be)?t[Be]:"function"==typeof t.constructor&&t instanceof t.constructor?t.constructor.prototype:t instanceof Object?_e:null},Re=Wt("iterator"),De=!1;[].keys&&("next"in(Ce=[].keys())?(Te=Ie(Ie(Ce)))!==Object.prototype&&(Ae=Te):De=!0),null==Ae&&(Ae={}),x(Ae,Re)||I(Ae,Re,(function(){return this}));var Me={IteratorPrototype:Ae,BUGGY_SAFARI_ITERATORS:De},ze=_.f,Fe=Wt("toStringTag"),Ne=function(t,e,n){t&&!x(t=n?t:t.prototype,Fe)&&ze(t,Fe,{configurable:!0,value:e})},Ue=Me.IteratorPrototype,Ge=function(){return this},Ve=Object.setPrototypeOf||("__proto__"in{}?function(){var t,e=!1,n={};try{(t=Object.getOwnPropertyDescriptor(Object.prototype,"__proto__").set).call(n,[]),e=n instanceof Array}catch(t){}return function(n,r){return L(n),function(t){if(!k(t)&&null!==t)throw TypeError("Can't set "+String(t)+" as a prototype")}(r),e?t.call(n,r):n.__proto__=r,n}}():void 0),We=Me.IteratorPrototype,$e=Me.BUGGY_SAFARI_ITERATORS,qe=Wt("iterator"),He=function(){return this},Ke=function(t,e,n,r,o,i,u){!function(t,e,n){var r=e+" Iterator";t.prototype=Oe(Ue,{next:y(1,n)}),Ne(t,r,!1),Pe[r]=Ge}(n,e,r);var a,c,l,f=function(t){if(t===o&&v)return v;if(!$e&&t in d)return d[t];switch(t){case"keys":case"values":case"entries":return function(){return new n(this,t)}}return function(){return new n(this)}},s=e+" Iterator",p=!1,d=t.prototype,g=d[qe]||d["@@iterator"]||o&&d[o],v=!$e&&g||f(o),b="Array"==e&&d.entries||g;if(b&&(a=Ie(b.call(new t)),We!==Object.prototype&&a.next&&(Ie(a)!==We&&(Ve?Ve(a,We):"function"!=typeof a[qe]&&I(a,qe,He)),Ne(a,s,!0))),"values"==o&&g&&"values"!==g.name&&(p=!0,v=function(){return g.call(this)}),d[qe]!==v&&I(d,qe,v),Pe[e]=v,o)if(c={values:f("values"),keys:i?v:f("keys"),entries:f("entries")},u)for(l in c)!$e&&!p&&l in d||at(d,l,c[l]);else Rt({target:e,proto:!0,forced:$e||p},c);return c},Qe=ut.set,Ye=ut.getterFor("Array Iterator"),Xe=Ke(Array,"Array",(function(t,e){Qe(this,{type:"Array Iterator",target:w(t),index:0,kind:e})}),(function(){var t=Ye(this),e=t.target,n=t.kind,r=t.index++;return!e||r>=e.length?(t.target=void 0,{value:void 0,done:!0}):"keys"==n?{value:r,done:!1}:"values"==n?{value:e[r],done:!1}:{value:[r,e[r]],done:!1}}),"values");Pe.Arguments=Pe.Array,Ee("keys"),Ee("values"),Ee("entries");var Je=[].join,Ze=h!=Object,tn=function(t,e){var n=[][t];return!!n&&l((function(){n.call(null,e||function(){throw 1},1)}))}("join",",");Rt({target:"Array",proto:!0,forced:Ze||!tn},{join:function(t){return Je.call(w(this),void 0===t?",":t)}});var en={};en[Wt("toStringTag")]="z";var nn="[object z]"===String(en),rn=Wt("toStringTag"),on="Arguments"==v(function(){return arguments}()),un=nn?v:function(t){var e,n,r;return void 0===t?"Undefined":null===t?"Null":"string"==typeof(n=function(t,e){try{return t[e]}catch(t){}}(e=Object(t),rn))?n:on?v(e):"Object"==(r=v(e))&&"function"==typeof e.callee?"Arguments":r},an=nn?{}.toString:function(){return"[object "+un(this)+"]"};nn||at(Object.prototype,"toString",an,{unsafe:!0});var cn=!l((function(){return Object.isExtensible(Object.preventExtensions({}))})),ln=u((function(t){var e=_.f,n=K("meta"),r=0,o=Object.isExtensible||function(){return!0},i=function(t){e(t,n,{value:{objectID:"O"+ ++r,weakData:{}}})},u=t.exports={REQUIRED:!1,fastKey:function(t,e){if(!k(t))return"symbol"==typeof t?t:("string"==typeof t?"S":"P")+t;if(!x(t,n)){if(!o(t))return"F";if(!e)return"E";i(t)}return t[n].objectID},getWeakData:function(t,e){if(!x(t,n)){if(!o(t))return!0;if(!e)return!1;i(t)}return t[n].weakData},onFreeze:function(t){return cn&&u.REQUIRED&&o(t)&&!x(t,n)&&i(t),t}};X[n]=!0})),fn=(ln.REQUIRED,ln.fastKey,ln.getWeakData,ln.onFreeze,Wt("iterator")),sn=Array.prototype,pn=Wt("iterator"),dn=function(t,e,n,r){try{return r?e(L(n)[0],n[1]):e(n)}catch(e){var o=t.return;throw void 0!==o&&L(o.call(t)),e}},yn=u((function(t){var e=function(t,e){this.stopped=t,this.result=e};(t.exports=function(t,n,r,o,i){var u,a,c,l,f,s,p,d,y=oe(n,r,o?2:1);if(i)u=t;else{if("function"!=typeof(a=function(t){if(null!=t)return t[pn]||t["@@iterator"]||Pe[un(t)]}(t)))throw TypeError("Target is not iterable");if(void 0!==(d=a)&&(Pe.Array===d||sn[fn]===d)){for(c=0,l=gt(t.length);l>c;c++)if((f=o?y(L(p=t[c])[0],p[1]):y(t[c]))&&f instanceof e)return f;return new e(!1)}u=a.call(t)}for(s=u.next;!(p=s.call(u)).done;)if("object"==typeof(f=dn(u,y,p.value,o))&&f&&f instanceof e)return f;return new e(!1)}).stop=function(t){return new e(!0,t)}})),gn=function(t,e,n){if(!(t instanceof e))throw TypeError("Incorrect "+(n?n+" ":"")+"invocation");return t},vn=Wt("iterator"),bn=!1;try{var hn=0,mn={next:function(){return{done:!!hn++}},return:function(){bn=!0}};mn[vn]=function(){return this},Array.from(mn,(function(){throw 2}))}catch(t){}var wn=function(t,e,n){for(var r in e)at(t,r,e[r],n);return t},kn=Wt("species"),Sn=_.f,On=ln.fastKey,xn=ut.set,jn=ut.getterFor,An=(function(t,e,n){var r=-1!==t.indexOf("Map"),o=-1!==t.indexOf("Weak"),i=r?"set":"add",u=c[t],a=u&&u.prototype,f=u,s={},p=function(t){var e=a[t];at(a,t,"add"==t?function(t){return e.call(this,0===t?0:t),this}:"delete"==t?function(t){return!(o&&!k(t))&&e.call(this,0===t?0:t)}:"get"==t?function(t){return o&&!k(t)?void 0:e.call(this,0===t?0:t)}:"has"==t?function(t){return!(o&&!k(t))&&e.call(this,0===t?0:t)}:function(t,n){return e.call(this,0===t?0:t,n),this})};if(_t(t,"function"!=typeof u||!(o||a.forEach&&!l((function(){(new u).entries().next()})))))f=n.getConstructor(e,t,r,i),ln.REQUIRED=!0;else if(_t(t,!0)){var d=new f,y=d[i](o?{}:-0,1)!=d,g=l((function(){d.has(1)})),v=function(t,e){if(!e&&!bn)return!1;var n=!1;try{var r={};r[vn]=function(){return{next:function(){return{done:n=!0}}}},t(r)}catch(t){}return n}((function(t){new u(t)})),b=!o&&l((function(){for(var t=new u,e=5;e--;)t[i](e,e);return!t.has(-0)}));v||((f=e((function(e,n){gn(e,f,t);var o=function(t,e,n){var r,o;return Ve&&"function"==typeof(r=e.constructor)&&r!==n&&k(o=r.prototype)&&o!==n.prototype&&Ve(t,o),t}(new u,e,f);return null!=n&&yn(n,o[i],o,r),o}))).prototype=a,a.constructor=f),(g||b)&&(p("delete"),p("has"),r&&p("get")),(b||y)&&p(i),o&&a.clear&&delete a.clear}s[t]=f,Rt({global:!0,forced:f!=u},s),Ne(f,t),o||n.setStrong(f,t,r)}("Set",(function(t){return function(){return t(this,arguments.length?arguments[0]:void 0)}}),{getConstructor:function(t,e,n,r){var o=t((function(t,i){gn(t,o,e),xn(t,{type:e,index:Oe(null),first:void 0,last:void 0,size:0}),f||(t.size=0),null!=i&&yn(i,t[r],t,n)})),i=jn(e),u=function(t,e,n){var r,o,u=i(t),c=a(t,e);return c?c.value=n:(u.last=c={index:o=On(e,!0),key:e,value:n,previous:r=u.last,next:void 0,removed:!1},u.first||(u.first=c),r&&(r.next=c),f?u.size++:t.size++,"F"!==o&&(u.index[o]=c)),t},a=function(t,e){var n,r=i(t),o=On(e);if("F"!==o)return r.index[o];for(n=r.first;n;n=n.next)if(n.key==e)return n};return wn(o.prototype,{clear:function(){for(var t=i(this),e=t.index,n=t.first;n;)n.removed=!0,n.previous&&(n.previous=n.previous.next=void 0),delete e[n.index],n=n.next;t.first=t.last=void 0,f?t.size=0:this.size=0},delete:function(t){var e=i(this),n=a(this,t);if(n){var r=n.next,o=n.previous;delete e.index[n.index],n.removed=!0,o&&(o.next=r),r&&(r.previous=o),e.first==n&&(e.first=r),e.last==n&&(e.last=o),f?e.size--:this.size--}return!!n},forEach:function(t){for(var e,n=i(this),r=oe(t,arguments.length>1?arguments[1]:void 0,3);e=e?e.next:n.first;)for(r(e.value,e.key,this);e&&e.removed;)e=e.previous},has:function(t){return!!a(this,t)}}),wn(o.prototype,n?{get:function(t){var e=a(this,t);return e&&e.value},set:function(t,e){return u(this,0===t?0:t,e)}}:{add:function(t){return u(this,t=0===t?0:t,t)}}),f&&Sn(o.prototype,"size",{get:function(){return i(this).size}}),o},setStrong:function(t,e,n){var r=e+" Iterator",o=jn(e),i=jn(r);Ke(t,e,(function(t,e){xn(this,{type:r,target:t,state:o(t),kind:e,last:void 0})}),(function(){for(var t=i(this),e=t.kind,n=t.last;n&&n.removed;)n=n.previous;return t.target&&(t.last=n=n?n.next:t.state.first)?"keys"==e?{value:n.key,done:!1}:"values"==e?{value:n.value,done:!1}:{value:[n.key,n.value],done:!1}:(t.target=void 0,{value:void 0,done:!0})}),n?"entries":"values",!n,!0),function(t){var e=ft(t),n=_.f;f&&e&&!e[kn]&&n(e,kn,{configurable:!0,get:function(){return this}})}(e)}}),function(t){return function(e,n){var r,o,i=String(m(e)),u=dt(n),a=i.length;return u<0||u>=a?t?"":void 0:(r=i.charCodeAt(u))<55296||r>56319||u+1===a||(o=i.charCodeAt(u+1))<56320||o>57343?t?i.charAt(u):r:t?i.slice(u,u+2):o-56320+(r-55296<<10)+65536}}),Tn={codeAt:An(!1),charAt:An(!0)}.charAt,Cn=ut.set,En=ut.getterFor("String Iterator");Ke(String,"String",(function(t){Cn(this,{type:"String Iterator",string:String(t),index:0})}),(function(){var t,e=En(this),n=e.string,r=e.index;return r>=n.length?{value:void 0,done:!0}:(t=Tn(n,r),e.index+=t.length,{value:t,done:!1})}));var Pn={CSSRuleList:0,CSSStyleDeclaration:0,CSSValueList:0,ClientRectList:0,DOMRectList:0,DOMStringList:0,DOMTokenList:1,DataTransferItemList:0,FileList:0,HTMLAllCollection:0,HTMLCollection:0,HTMLFormElement:0,HTMLSelectElement:0,MediaList:0,MimeTypeArray:0,NamedNodeMap:0,NodeList:1,PaintRequestList:0,Plugin:0,PluginArray:0,SVGLengthList:0,SVGNumberList:0,SVGPathSegList:0,SVGPointList:0,SVGStringList:0,SVGTransformList:0,SourceBufferList:0,StyleSheetList:0,TextTrackCueList:0,TextTrackList:0,TouchList:0},Ln=Wt("iterator"),Bn=Wt("toStringTag"),_n=Xe.values;for(var In in Pn){var Rn=c[In],Dn=Rn&&Rn.prototype;if(Dn){if(Dn[Ln]!==_n)try{I(Dn,Ln,_n)}catch(t){Dn[Ln]=_n}if(Dn[Bn]||I(Dn,Bn,In),Pn[In])for(var Mn in Xe)if(Dn[Mn]!==Xe[Mn])try{I(Dn,Mn,Xe[Mn])}catch(t){Dn[Mn]=Xe[Mn]}}}var zn=wp.i18n.__,Fn=wp.element.createElement,Nn="custom-blocks/link-button",Un=Fn("svg",{width:24,height:24},Fn("path",{d:"M19 6H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H5V8h14v8z"})),Gn={title:zn("Link Button","@textdomain"),description:zn("Add a customizable link button.","@textdomain"),icon:Un,category:"custom-blocks",keywords:[zn("button","@textdomain"),zn("link","@textdomain")]},Vn=wp.blocks,Wn=Vn.registerBlockType,$n=Vn.registerBlockStyle,qn=function(){for(var t=arguments.length,e=new Array(t),n=0;n<t;n++)e[n]=arguments[n];return o(new Set([].concat(e).filter((function(t){return"string"==typeof t})))).join(" ")},Hn=wp.editor,Kn=Hn.AlignmentToolbar,Qn=Hn.BlockControls,Yn=Hn.RichText,Xn=Hn.URLInput,Jn=Hn.InspectorControls,Zn=Hn.PanelColorSettings,tr=Hn.getColorClassName,er=Hn.withColors,nr=wp.components,rr=(nr.IconButton,nr.Dashicon,nr.PanelBody),or=nr.PanelRow,ir=nr.ToggleControl,ur=nr.TextControl,ar=nr.BaseControl;Wn(Nn,r({},Gn,{attributes:{buttonText:{type:"string"},buttonUrl:{type:"string",source:"attribute",selector:"a",attribute:"href"},buttonTarget:{type:"boolean",default:!1},buttonRel:{type:"string",default:null},buttonAlignment:{type:"string",default:"left"},buttonColor:{type:"string"}},edit:er("buttonColor")((function(t){var e=t.attributes,n=t.setAttributes,r=t.isSelected,o=t.setButtonColor,i=t.buttonColor,u=e.buttonText,a=e.buttonUrl,c=e.buttonAlignment,l=e.buttonTarget,f=e.buttonRel,s=e.className;return[Fn(Jn,{},Fn(Zn,{title:zn("Button colours","@textdomain"),colorSettings:[{value:i.color,onChange:o,label:zn("Choose a colour","@textdomain")}]}),Fn(rr,{title:zn("Link settings","@textdomain")},Fn(or,{},Fn(ir,{label:zn("Open in new tab","@textdomain"),checked:l,onChange:function(t){var r="noreferrer noopener";n({buttonTarget:t}),t?e.buttonRel||n({buttonRel:r}):e.buttonRel==r&&n({buttonRel:""})}})),Fn(or,{},Fn(ur,{label:zn("Link rel","@textdomain"),value:f,onChange:function(t){return n({buttonRel:t})}})))),Fn(Qn,{},Fn(Kn,{value:c,onChange:function(t){return n({buttonAlignment:t})}})),Fn("div",{className:"has-text-align-".concat(c)},Fn(Yn,{tagName:"span",placeholder:zn("Button text...","@textdomain"),value:u,formattingControls:[],className:qn("link-button",i.class,s),onChange:function(t){return n({buttonText:t})}})),r&&Fn(ar,{label:zn("Link","@textdomain"),id:"link-button-1",className:"wp-block-button__inline-link"},Fn(Xn,{id:"link-button-1",className:"wp-block-button__inline-link-input is-full-width has-border",value:a,onChange:function(t){return n({buttonUrl:t})}}))]})),save:function(t){var e=t.attributes,n=e.buttonText,r=e.buttonUrl,o=e.buttonTarget,i=e.buttonRel,u=e.buttonAlignment,a=e.buttonColor,c=e.className,l=tr("button-color",a)||"";return Fn("div",{className:u?"has-text-align-".concat(u):""},Fn("a",{href:r,target:o?"_blank":null,rel:i,className:qn("link-button",l,c)},Fn(Yn.Content,{value:n})))}})),$n(Nn,{name:"full",label:"Full Width"}),$n(Nn,{name:"outline",label:"Outline"});var cr=ae.find,lr=!0,fr=se("find");"find"in[]&&Array(1).find((function(){lr=!1})),Rt({target:"Array",proto:!0,forced:lr||!fr},{find:function(t){return cr(this,t,arguments.length>1?arguments[1]:void 0)}}),Ee("find"),new(function(){function e(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,e);var t=this;$(document).ready((function(){$(".accordion").each((function(){t.initializeBlock($(this))}))})),window.acf&&window.acf.addAction("render_block_preview/type=accordion",t.initializeBlock)}var n,r,o;return n=e,(r=[{key:"initializeBlock",value:function(t){t.find(".toggle").click((function(){var t=$(this).parents(".accordion");$(t).toggleClass("-open"),$(t).find(".content").slideToggle(),"true"===$(this).attr("aria-expanded")?$(this).attr("aria-expanded","false"):$(this).attr("aria-expanded","true")}))}}])&&t(n.prototype,r),o&&t(n,o),e}()),wp.domReady((function(){wp.blocks.unregisterBlockStyle("core/button","default"),wp.blocks.unregisterBlockStyle("core/button","squared"),wp.blocks.unregisterBlockStyle("core/button","fill"),wp.blocks.unregisterBlockStyle("core/separator","default"),wp.blocks.unregisterBlockStyle("core/separator","wide"),wp.blocks.unregisterBlockStyle("core/separator","dots"),wp.blocks.unregisterBlockStyle("core/quote","default"),wp.blocks.unregisterBlockStyle("core/quote","large"),wp.blocks.registerBlockStyle("core/button",{name:"regular",label:"Regular",isDefault:!0}),wp.blocks.registerBlockStyle("core/button",{name:"full",label:"Full Width"}),wp.blocks.registerBlockStyle("core/heading",{name:"default",label:"Default",isDefault:!0}),wp.blocks.registerBlockStyle("core/heading",{name:"underline",label:"Underline"}),wp.blocks.registerBlockStyle("core/separator",{name:"line",label:"Line",isDefault:!0}),wp.blocks.registerBlockStyle("core/separator",{name:"block",label:"Block"}),wp.blocks.registerBlockStyle("core/separator",{name:"dots",label:"Dots"}),wp.blocks.registerBlockStyle("core/quote",{name:"default",label:"Default",isDefault:!0}),wp.blocks.registerBlockStyle("core/quote",{name:"line",label:"Line"}),wp.blocks.registerBlockStyle("core/list",{name:"default",label:"Default",isDefault:!0}),wp.blocks.registerBlockStyle("core/list",{name:"icon",label:"Icon"})})),wp.hooks.addFilter("blocks.registerBlockType","ten-degrees/register-block-type",(function(t,e){return r({},t,{supports:r({},t.supports,{align:["wide","full"]})})}))}();
