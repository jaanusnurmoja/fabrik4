/*! Fabrik */
var FrontPackage=new Class({Extends:Canvas,initialize:function(a){a.editabe=!1,this.parent(a),this.setup(),Fabrik.addEvent("fabrik.list.add",function(a){this.loadForm(a)}.bind(this))},loadForm:function(a){Fabrik.loader.start();var b=this.pages,c=b.pages[b.activePage],d={width:100,height:100};this.insertPage(c,"forms_"+a.options.formid,"","forms",d)},insertPage:function(a,b,c,d,e,f){var g;switch(f="function"!==typeOf(f)?Function.from():f,0===e.width&&(e.width=50),0===e.height&&(e.height=50),b=b.replace(d+"_",""),g="id",d){case"list":g="listid";break;case"form":g="formid";break;case"vizualizations":d="visualization"}var h=new Element("div",{id:b,"class":"itemPlaceHolder"}).setStyles(e);h.inject(a.page),data={option:"com_fabrik",view:d,tmpl:"component",packageId:this.options.packageId,ajax:1,ajaxlinks:1},data[g]=b;{var i="index.php";new Request.HTML({url:i,data:data,method:"post",update:h,onSuccess:f}).send()}}});