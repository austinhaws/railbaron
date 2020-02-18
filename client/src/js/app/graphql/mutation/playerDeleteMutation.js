import gameType from "../type/gameType";
import gamePhrase from "../util/gamePhrase";

export default playerId => `
  deletePlayer (playerId: ${playerId} gamePhrase: """${gamePhrase()}""") {
    ${gameType()}
  }
`;
