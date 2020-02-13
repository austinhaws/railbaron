import {action, observable} from "mobx";

export default class HistoryStore {
    @observable history = null;

    @action
    forward = path => this.history.push(path);

    @action
    back = () => this.history.goBack();
}
