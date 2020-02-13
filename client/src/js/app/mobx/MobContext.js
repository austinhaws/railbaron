import AppStore from "./AppStore";
import {createContext} from "react";
import HistoryStore from "./HistoryStore";

export const mobContextValue = {
	appStore: new AppStore(),
    historyStore: new HistoryStore(),
};

const MobContext = createContext(mobContextValue);
MobContext.displayName = 'MobContext';
export default MobContext;
