import {mobContextValue} from "../../mobx/MobContext";
import LocalStorage from "../../localstorage/LocalStorage";

export default () => (mobContextValue.gameStore.game && mobContextValue.gameStore.game.phrase) || LocalStorage.gamePhrase.get();
