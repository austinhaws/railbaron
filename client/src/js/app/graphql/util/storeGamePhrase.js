import LocalStorage from "../../localstorage/LocalStorage";
import {mobContextValue} from "../../mobx/MobContext";

export default game => {
    mobContextValue.gameStore.game = game;
    LocalStorage.gamePhrase.set(game.phrase);
    return game;
};
