Ext.apply(Ext.app.ExtDirectAPI, {"TYPO3.Components.PageTree":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.Components.PageTree", "type":"remoting", "actions":{"DataProvider":[
	{"name":"getRoot", "len":0, "formHandler":false},
	{"name":"getNextTreeLevel", "len":2, "formHandler":false},
	{"name":"getFilteredTree", "len":3, "formHandler":false},
	{"name":"getNodeTypes", "len":0, "formHandler":false},
	{"name":"getIndicators", "len":0, "formHandler":false},
	{"name":"loadResources", "len":0, "formHandler":false},
	{"name":"setStateProvider", "len":1, "formHandler":false},
	{"name":"getStateProvider", "len":0, "formHandler":false},
	{"name":"setDataProvider", "len":1, "formHandler":false},
	{"name":"getDataProvider", "len":0, "formHandler":false},
	{"name":"setNodeRenderer", "len":1, "formHandler":false},
	{"name":"getNodeRenderer", "len":0, "formHandler":false}
], "Commands":[
	{"name":"visiblyNode", "len":1, "formHandler":false},
	{"name":"disableNode", "len":1, "formHandler":false},
	{"name":"deleteNode", "len":1, "formHandler":false},
	{"name":"restoreNode", "len":2, "formHandler":false},
	{"name":"updateLabel", "len":2, "formHandler":false},
	{"name":"setTemporaryMountPoint", "len":1, "formHandler":false},
	{"name":"moveNodeToFirstChildOfDestination", "len":2, "formHandler":false},
	{"name":"moveNodeAfterDestination", "len":2, "formHandler":false},
	{"name":"copyNodeToFirstChildOfDestination", "len":2, "formHandler":false},
	{"name":"copyNodeAfterDestination", "len":2, "formHandler":false},
	{"name":"insertNodeToFirstChildOfDestination", "len":2, "formHandler":false},
	{"name":"insertNodeAfterDestination", "len":3, "formHandler":false},
	{"name":"getViewLink", "len":1, "formHandler":false}
], "ContextMenuDataProvider":[
	{"name":"getActionsForNodeArray", "len":1, "formHandler":false},
	{"name":"getActionsForNode", "len":1, "formHandler":false},
	{"name":"setDataProvider", "len":1, "formHandler":false},
	{"name":"getDataProvider", "len":0, "formHandler":false}
]}, "namespace":"TYPO3.Components.PageTree"}, "TYPO3.LiveSearchActions":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.LiveSearchActions", "type":"remoting", "actions":{"ExtDirect":[
	{"name":"__construct", "len":0, "formHandler":false},
	{"name":"find", "len":1, "formHandler":false}
]}, "namespace":"TYPO3.LiveSearchActions"}, "TYPO3.BackendUserSettings":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.BackendUserSettings", "type":"remoting", "actions":{"ExtDirect":[
	{"name":"get", "len":1, "formHandler":false},
	{"name":"set", "len":2, "formHandler":false},
	{"name":"setFromArray", "len":1, "formHandler":false},
	{"name":"reset", "len":0, "formHandler":false},
	{"name":"unsetKey", "len":1, "formHandler":false},
	{"name":"addToList", "len":2, "formHandler":false},
	{"name":"removeFromList", "len":2, "formHandler":false}
]}, "namespace":"TYPO3.BackendUserSettings"}, "TYPO3.CSH":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.CSH", "type":"remoting", "actions":{"ExtDirect":[
	{"name":"getContextHelp", "len":2, "formHandler":false},
	{"name":"getTableContextHelp", "len":1, "formHandler":false}
]}, "namespace":"TYPO3.CSH"}, "TYPO3.ExtDirectStateProvider":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.ExtDirectStateProvider", "type":"remoting", "actions":{"ExtDirect":[
	{"name":"__construct", "len":0, "formHandler":false},
	{"name":"getState", "len":1, "formHandler":false},
	{"name":"setState", "len":1, "formHandler":false}
]}, "namespace":"TYPO3.ExtDirectStateProvider"}, "TYPO3.Xlifftranslationtool.Backend":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.Xlifftranslationtool.Backend", "type":"remoting", "actions":{"Connector":[
	{"name":"get", "len":1, "formHandler":false}
]}, "namespace":"TYPO3.Xlifftranslationtool.Backend"}, "TYPO3.EM":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.EM", "type":"remoting", "actions":{"ExtDirect":[
	{"name":"__construct", "len":1, "formHandler":false},
	{"name":"getExtensionList", "len":1, "formHandler":false},
	{"name":"getFlatExtensionList", "len":0, "formHandler":false},
	{"name":"getInstalledExtkeys", "len":1, "formHandler":false},
	{"name":"getExtensionDetails", "len":0, "formHandler":false},
	{"name":"getExtensionUpdate", "len":1, "formHandler":false},
	{"name":"getExtensionConfiguration", "len":1, "formHandler":false},
	{"name":"saveExtensionConfiguration", "len":1, "formHandler":true},
	{"name":"cleanEmConf", "len":1, "formHandler":false},
	{"name":"deleteExtension", "len":1, "formHandler":false},
	{"name":"getExtFileTree", "len":1, "formHandler":false},
	{"name":"readExtFile", "len":1, "formHandler":false},
	{"name":"saveExtFile", "len":2, "formHandler":false},
	{"name":"createNewFile", "len":3, "formHandler":false},
	{"name":"renameFile", "len":3, "formHandler":false},
	{"name":"moveFile", "len":3, "formHandler":false},
	{"name":"deleteFile", "len":2, "formHandler":false},
	{"name":"makeDiff", "len":2, "formHandler":false},
	{"name":"loadUploadExtToTer", "len":0, "formHandler":false},
	{"name":"uploadExtToTer", "len":1, "formHandler":true},
	{"name":"getExtensionDevelopInfo", "len":1, "formHandler":false},
	{"name":"getExtensionBackupDelete", "len":1, "formHandler":false},
	{"name":"getExtensionUpdateScript", "len":1, "formHandler":false},
	{"name":"getRemoteExtensionList", "len":1, "formHandler":false},
	{"name":"getRepositories", "len":0, "formHandler":false},
	{"name":"getMirrors", "len":1, "formHandler":false},
	{"name":"repositoryEditFormSubmit", "len":1, "formHandler":true},
	{"name":"deleteRepository", "len":1, "formHandler":false},
	{"name":"repositoryUpdate", "len":1, "formHandler":false},
	{"name":"getLanguages", "len":0, "formHandler":false},
	{"name":"saveLanguageSelection", "len":1, "formHandler":false},
	{"name":"fetchTranslations", "len":3, "formHandler":false},
	{"name":"getSettings", "len":0, "formHandler":false},
	{"name":"saveSetting", "len":2, "formHandler":false},
	{"name":"settingsFormLoad", "len":0, "formHandler":false},
	{"name":"settingsFormSubmit", "len":1, "formHandler":true},
	{"name":"uploadExtension", "len":1, "formHandler":true},
	{"name":"enableExtension", "len":1, "formHandler":false},
	{"name":"resetStates", "len":0, "formHandler":false}
]}, "namespace":"TYPO3.EM"}, "TYPO3.EMSOAP":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.EMSOAP", "type":"remoting", "actions":{"ExtDirect":[
	{"name":"__construct", "len":0, "formHandler":false},
	{"name":"testUserLogin", "len":0, "formHandler":false},
	{"name":"showRemoteExtInfo", "len":1, "formHandler":false},
	{"name":"checkExtensionkey", "len":1, "formHandler":true},
	{"name":"registerExtensionkey", "len":1, "formHandler":true},
	{"name":"getExtensions", "len":0, "formHandler":false},
	{"name":"deleteExtensionKey", "len":1, "formHandler":false},
	{"name":"transferExtensionKey", "len":2, "formHandler":false}
]}, "namespace":"TYPO3.EMSOAP"}, "TYPO3.Workspaces":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.Workspaces", "type":"remoting", "actions":{"ExtDirect":[
	{"name":"getWorkspaceInfos", "len":1, "formHandler":false},
	{"name":"getStageActions", "len":1, "formHandler":false},
	{"name":"getRowDetails", "len":1, "formHandler":false},
	{"name":"getCommentsForRecord", "len":2, "formHandler":false}
], "ExtDirectActions":[
	{"name":"__construct", "len":0, "formHandler":false},
	{"name":"generateWorkspacePreviewLink", "len":1, "formHandler":false},
	{"name":"swapSingleRecord", "len":3, "formHandler":false},
	{"name":"deleteSingleRecord", "len":2, "formHandler":false},
	{"name":"viewSingleRecord", "len":2, "formHandler":false},
	{"name":"saveColumnModel", "len":1, "formHandler":false},
	{"name":"loadColumnModel", "len":0, "formHandler":false},
	{"name":"sendToNextStageWindow", "len":3, "formHandler":false},
	{"name":"sendToPrevStageWindow", "len":2, "formHandler":false},
	{"name":"sendToSpecificStageWindow", "len":1, "formHandler":false},
	{"name":"getRecipientList", "len":3, "formHandler":false},
	{"name":"discardStagesFromPage", "len":1, "formHandler":false},
	{"name":"sentCollectionToStage", "len":1, "formHandler":false},
	{"name":"sendToNextStageExecute", "len":1, "formHandler":false},
	{"name":"sendToPrevStageExecute", "len":1, "formHandler":false},
	{"name":"sendToSpecificStageExecute", "len":1, "formHandler":false},
	{"name":"sendPageToPreviousStage", "len":1, "formHandler":false},
	{"name":"sendPageToNextStage", "len":1, "formHandler":false},
	{"name":"updateStageChangeButtons", "len":1, "formHandler":false}
], "ExtDirectMassActions":[
	{"name":"getMassStageActions", "len":1, "formHandler":false},
	{"name":"publishWorkspace", "len":1, "formHandler":false},
	{"name":"flushWorkspace", "len":1, "formHandler":false}
]}, "namespace":"TYPO3.Workspaces"}, "TYPO3.Ajax.ExtDirect":{"url":"http:\/\/www.layh.com\/typo3\/ajax.php?ajaxID=ExtDirect::route&namespace=TYPO3.Ajax.ExtDirect", "type":"remoting", "actions":{"ToolbarMenu":[
	{"name":"toggleWorkspacePreviewMode", "len":1, "formHandler":false},
	{"name":"setWorkspace", "len":1, "formHandler":false}
]}, "namespace":"TYPO3.Ajax.ExtDirect"}});