/*! Fabrik */

define(["jquery"],function(a){return new Class({initialize:function(a){window.addEvent("keyup",function(b){if(b.alt)switch(b.key){case Joomla.JText._("COM_FABRIK_LIST_SHORTCUTS_ADD"):var c=a.form.getElement(".addRecord");a.options.ajax&&c.fireEvent("click"),c.getElement("a")?a.options.ajax?c.getElement("a").fireEvent("click"):document.location=c.getElement("a").get("href"):a.options.ajax||(document.location=c.get("href"));break;case Joomla.JText._("COM_FABRIK_LIST_SHORTCUTS_EDIT"):fconsole("edit");break;case Joomla.JText._("COM_FABRIK_LIST_SHORTCUTS_DELETE"):fconsole("delete");break;case Joomla.JText._("COM_FABRIK_LIST_SHORTCUTS_FILTER"):fconsole("filter")}}.bind(this))}})});