import gameType from "../type/gameType";
import gamePhrase from "../util/gamePhrase";

export default phrase => `
    game(phrase: """${phrase || gamePhrase()}""") {
        ${gameType()}
    }
`
;
