import AppStore from "./AppStore";
import {createContext} from "react";
import HistoryStore from "./HistoryStore";
import GameStore from "./GameStore";

export const mobContextValue = {
	appStore: new AppStore(),
    gameStore: new GameStore(),
    historyStore: new HistoryStore(),
};

const MobContext = createContext(mobContextValue);
MobContext.displayName = 'MobContext';
export default MobContext;
