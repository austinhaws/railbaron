import {observable} from "mobx"

export default class AppStore {
	@observable historyPath = '/';
	@observable isAjaxingCount = undefined;
	@observable pageTitle = 'RPG Generator';
}
