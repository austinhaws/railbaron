import gameType from "../type/gameType";

export default numberPlayers => `
  startNewGame ${numberPlayers ? `(numberPlayers: ${numberPlayers})` : ''} {
    ${gameType()}
  }
`;
