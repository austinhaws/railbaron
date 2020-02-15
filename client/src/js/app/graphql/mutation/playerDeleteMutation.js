import gameType from "../type/gameType";

export default (playerId, gamePhrase) => `
  deletePlayer (playerId: ${playerId} gamePhrase: """${gamePhrase}""") {
    ${gameType()}
  }
`;
