import gameType from "../type/gameType";
import gamePhrase from "../util/gamePhrase";

export default () => `
    game(phrase: """${gamePhrase()}""") {
        ${gameType()}
    }
`
;
