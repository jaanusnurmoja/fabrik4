/*! Fabrik */

var onFabrikReadyBody=!1,blockDiv='<div id="blockDiv" style="position:absolute; left:0; right:0; height:100%; width:100%; z-index:9999999;"></div>';function onFabrikReadyBlock(e){return 0==blockDiv.length||(e.stopPropagation(),e.preventDefault(),alert(Joomla.JText._("COM_FABRIK_STILL_LOADING")),blockDiv=""),!1}function onFabrikReady(){"undefined"==typeof Fabrik?(!1===onFabrikReadyBody&&void 0!==document.getElementsByTagName("BODY")[0]&&((onFabrikReadyBody=document.getElementsByTagName("BODY")[0]).insertAdjacentHTML("afterbegin",blockDiv),jQuery("#blockDiv").click(function(e){return onFabrikReadyBlock(e)}),jQuery("#blockDiv").mousedown(function(e){return onFabrikReadyBlock(e)})),setTimeout(onFabrikReady,50)):jQuery("#blockDiv").remove()}"loading"!==document.readyState?onFabrikReady():document.addEventListener("DOMContentLoaded",onFabrikReady());