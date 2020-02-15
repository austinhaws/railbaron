import gameType from "../type/gameType";

export default gamePhrase => `
    game(phrase: """${gamePhrase}""") {
        ${gameType()}
    }
`
;
