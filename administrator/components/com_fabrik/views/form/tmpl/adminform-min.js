fabrikAdminForm=new Class({Extends:PluginManager,initialize:function(a,b){this.parent(a,b);this.opts.actions=[{value:"front",label:Joomla.JText._("COM_FABRIK_FRONT_END")},{value:"back",label:Joomla.JText._("COM_FABRIK_BACK_END")},{value:"both",label:Joomla.JText._("COM_FABRIK_BOTH")}];this.opts.when=[{value:"new",label:Joomla.JText._("COM_FABRIK_NEW")},{value:"edit",label:Joomla.JText._("COM_FABRIK_EDIT")},{value:"both",label:Joomla.JText._("COM_FABRIK_BOTH")}];this.opts.type="form"},getPluginTop:function(e,d){var c=this.getPublishedYesNo(d);var b=this._makeSel("inputbox events","jform[plugin_events][]",this.opts.when,d.event);var a=new Element("tr").adopt(new Element("td").adopt([new Element("input",{value:Joomla.JText._("COM_FABRIK_SELECT_DO"),size:4,readonly:true,"class":"readonly"}),this._makeSel("inputbox elementtype","jform[plugin][]",this.plugins,e),new Element("input",{value:Joomla.JText._("COM_FABRIK_IN"),size:1,readonly:true,"class":"readonly"}),this._makeSel("inputbox elementtype","jform[plugin_locations][]",this.opts.actions,d.location),new Element("input",{value:Joomla.JText._("COM_FABRIK_ON"),size:1,readonly:true,"class":"readonly"}),b]));var f=new Element("tr").adopt(new Element("td").set("html",c));return new Element("table").adopt(new Element("tbody").adopt([f,a]))}});