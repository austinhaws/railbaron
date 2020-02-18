import LocalStorage from "../../localstorage/LocalStorage";

export default game => {
    LocalStorage.gamePhrase.set(game.phrase);
    return game;
};
